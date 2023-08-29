<?php
    include("base/topo.php");
    include("produtos.php");
?>
    <!-- Sessão -->
    <section class="py-5 bg-dark">
        <?php
            if (isset($_GET['id']) && isset($_GET['imagem']) && isset($_GET['nome']) && isset($_GET['preco'])) {
                $id = $_GET['id'];
                $imagem = $_GET['imagem'];
                $nome = $_GET['nome'];
                $preco = $_GET['preco'];
            } else {
                $id = "1";
                $imagem = "https://dummyimagem.com/600x700/dee2e6/6c757d.jpg";
                $nome = "Item da Loja";
                $preco = "99.99";
            }
        ?>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($produtos as $produto) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Imagem do produto -->
                            <img class="card-img-top" src="<?php echo $produto['imagem']; ?>">
                            <!-- Detalhes do produto -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Nome do produto -->
                                    <h5 class="fw-bolder"><?php echo $produto['nome']; ?></h5>
                                    <!-- Avaliações do produto -->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Preço do produto -->
                                    R$ <?php echo $produto['preco']; ?>
                                </div>
                            </div>
                            <!-- Mais informações do produto -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="info.php?id=<?php echo $produto['id']; ?>&imagem=<?php echo $produto['imagem']; ?>&nome=<?php echo $produto['nome']; ?>&preco=<?php echo $produto['preco']; ?>">Mais Informações</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php
    include("base/baixo.php");
?>