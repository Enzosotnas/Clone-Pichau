<?php
    include("base/topo.php");
    session_start();

    // Verifica se o carrinho está vazio
    $carrinhoVazio = true;
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $carrinhoVazio = false;
    }

    // Limpa o carrinho
    if (isset($_GET['limpar'])) {
        unset($_SESSION['carrinho']);
        header("Location: carrinho.php");
        exit;
    }

    // Calcula o valor total dos itens no carrinho
    $valorTotal = 0;
    if (!$carrinhoVazio) {
        foreach ($_SESSION['carrinho'] as $item) {
            $valorTotal += $item['preco'] * $item['quantidade'];
        }
    }
?>
<style>
    body {
        background-color: #222;
        color: #fff;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    .limpar-btn {
        display: inline-block;
        padding: 8px 16px;
        border: 2px solid red;
        background-color: red;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    .limpar-btn:hover {
        background-color: #cc0000;
    }
</style>
<body>
    <br>
    <h1>Carrinho de Compras</h1>

    <?php if ($carrinhoVazio): ?>
        <p>O carrinho está vazio.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Produto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th class="text-center">Quantidade</th>
            </tr>
            <?php foreach ($_SESSION['carrinho'] as $item): ?>
                <tr>
                    <td><img src="<?php echo $item['imagem']; ?>" alt="Imagem do Produto" width="100"></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['preco']; ?></td>
                    <td class="text-center"><?php echo $item['quantidade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <p><strong>Valor Total: R$<?php echo $valorTotal; ?></strong></p>
        <br>
        <a class="limpar-btn" href="?limpar=1">Limpar Carrinho</a>
    <?php endif; ?>
</body>