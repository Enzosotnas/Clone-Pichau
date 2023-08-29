
<?php
    include("base/topo.php");
    session_start();

    // Verifica se o produto foi adicionado ao carrinho através do link
    if (isset($_GET['adicionar'])) {
        $imagem = $_GET['imagem'];
        $nome = $_GET['nome'];
        $preco = $_GET['preco'];
        $quantidade = 1;

        $produto = array(
            'imagem' => $imagem,
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => $quantidade
        );

        // Verifica se o produto já está no carrinho
        $produtoExiste = false;
        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $index => $item) {
                if ($item['nome'] == $nome) {
                    // Atualiza a quantidade do produto
                    $_SESSION['carrinho'][$index]['quantidade'] += $quantidade;
                    $produtoExiste = true;
                    break;
                }
            }
        }

        // Se o produto não existir no carrinho, adicione-o
        if (!$produtoExiste) {
            $_SESSION['carrinho'][] = $produto;
        }

        echo "<script>alert('Produto adicionado ao carrinho!');</script>";
        echo "<script>window.location.href = 'carrinho.php';</script>";
        exit;
    }
?>
    <!-- Sessão do produto -->
    <section class="py-5 bg-dark">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="<?php echo $_GET['imagem']; ?>"/>
                </div>
                <div class="col-md-6">
                    <div class="small mb-1 text-white">ID: <?php echo $_GET['id']; ?></div>
                    <h1 class="display-5 fw-bolder text-white"><?php echo $_GET['nome']; ?></h1>
                    <div class="fs-5 mb-5 text-white">
                        <br>
                        <span class="text-success">Preço: R$<?php echo $_GET['preco']; ?></span>
                    </div>
                    <p class="lead text-white fw-bold">PRODUTO DISPONÍVEL</p>
                    <div class="d-flex">
                    <a class="btn btn-outline flex-shrink-0 text-white btn-success btn-fill" href="?adicionar=1&imagem=<?php echo $_GET['imagem']; ?>&nome=<?php echo $_GET['nome']; ?>&preco=<?php echo $_GET['preco']; ?>">
                        <i class="bi bi-cart-fill me-1 text-white"></i>
                        Colocar no carrinho
                    </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include("base/baixo.php");
?>