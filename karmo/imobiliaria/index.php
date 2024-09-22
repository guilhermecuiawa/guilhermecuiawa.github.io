<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K A R M O</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <header>

        <?php
        require './bd/interessepdo.php'; // Inclua seu arquivo de conexão ao banco de dados

        // Consulta para selecionar todos os dados do imóvel
        $stmt = $pdo->query("SELECT imovelID, nome, valor, quartos, banheiros, imagem FROM tbimovel");
        $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recupera todos os dados como um array associativo
        ?>


        <!-- Nav do Site -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="index.php">
                    <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">K A R M O</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobre">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobre">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link" href="contato">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Foto e Texto da página principal -->
        <div class="hero-section">
            <div>
                <h1 class="mt-5 mx-auto" style="text-transform:uppercase">Sempre ao seu lado na busca pelo lar perfeito</h1>
            </div>
        </div>
    </header>

    <section id="pesquisa">
        <div class="container-fluid mt-5">
            <div class="card p-4 shadow">
                <form class="row g-3" action="./bd/pesquisaimoveis.php" method="GET">
                    <!-- Campo para Tipo -->
                    <div class="col-md">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-select">
                            <option value="" selected>Selecione</option>
                            <option value="Alugar">Alugar</option>
                            <option value="Comprar">Comprar</option>
                        </select>
                    </div>
                    <!-- Campo para Categoria -->
                    <div class="col-md">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select id="categoria" name="categoria" class="form-select">
                            <option value="" selected>Selecione</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                        </select>
                    </div>
                    <!-- Campo para Valor -->
                    <div class="col-md">
                        <label for="valor" class="form-label">Valor</label>
                        <select id="valor" name="valor" class="form-select">
                            <option value="" selected>Selecione</option>
                            <option value="1">Até R$200 mil</option>
                            <option value="2">Até R$400 mil</option>
                            <option value="3">Até R$600 mil</option>
                            <option value="4">Até R$800 mil</option>
                            <!-- Adicionar mais opções conforme necessário -->
                        </select>
                    </div>
                    <!-- Campo para Localização -->
                    <div class="col-md-4">
                        <label for="localizacao" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localizacao" name="localizacao" placeholder="Insira a localização">
                    </div>
                    <!-- Botões -->
                    <div class="col-md d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Pesquisar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


<!-- Destaques da Semana -->
<section>
    <div class="container mt-5">
        <h1 class="text-center">NOVAS PROPRIEDADES</h1>

        <!-- Imóveis para Venda -->
        <h3 class="text-left mt-5" id="#comprar">Destaques</h3>
        <h3 class="text-left">Imóveis para venda</h3>
        <div class="row">
            <!-- Imóvel 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[0]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[0]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[0]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format ($imoveis[0]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[0]['quartos']; ?> QUARTOS, <?php echo $imoveis[0]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/venda1.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[0]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Imóvel 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[1]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[1]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[1]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format($imoveis[1]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[1]['quartos']; ?> QUARTOS, <?php echo $imoveis[1]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/venda2.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[1]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Imóvel 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[2]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[2]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[2]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format($imoveis[2]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[2]['quartos']; ?> QUARTOS, <?php echo $imoveis[2]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/venda3.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[2]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Imóveis para Alugar -->
        <h3 class="mt-5" id="#alugar">Destaques</h3>
        <h3>Imóveis para alugar</h3>
        <div class="row">
            <!-- Imóvel 4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[3]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[3]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[3]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format($imoveis[3]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[3]['quartos']; ?> QUARTOS, <?php echo $imoveis[3]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/alugar1.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[3]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Imóvel 5 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[4]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[4]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[4]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format($imoveis[4]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[4]['quartos']; ?> QUARTOS, <?php echo $imoveis[4]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/alugar2.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[4]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Imóvel 6 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($imoveis[5]['imagem'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($imoveis[5]['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível" style="max-width: 100%; height: auto;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($imoveis[5]['nome']); ?></h5>
                        <p class="card-text">R$ <?php echo number_format($imoveis[5]['valor'], 2, ',', '.'); ?> - <?php echo $imoveis[5]['quartos']; ?> QUARTOS, <?php echo $imoveis[5]['banheiros']; ?> BANHEIROS</p>
                        <form action="./bd/alugar3.php" method="GET">
                            <input type="hidden" name="imovelID" value="<?php echo $imoveis[5]['imovelID']; ?>">
                            <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <section>
        <div class="form-container">
            <div class="contact-section">
                <h2 class="contact-title">Entre em contato</h2>
                <p class="contact-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nihil voluptatem dicta aliquam cumque voluptatibus voluptate error fugiat velit, tempora mollitia amet cum dignissimos repudiandae nam officiis assumenda sint eum.</p>
                <p class="contact-address">Rua Exemplo, 123, São Paulo - SP</p>
                <p class="contact-email">Email: info@kamorra.com.br</p>

                <div class="map-wrapper">
                    <iframe class="map-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.155264374073!2d-46.633308!3d-23.550520!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59b4e4b4b4b4%3A0x4b4b4b4b4b4b4b4b!2sSão%20Paulo%2C%20SP!5e0!3m2!1sen!2sbr!4v1633024800000!5m2!1sen!2sbr"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="form-section">
                <h2 class="form-title">Informe-nos</h2>

                <form id="contactForm" method="post" action="#">
                    <div class="form-group form-required">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-input" id="nome" name="nome" placeholder="Seu nome" required>
                    </div>
                    <div class="form-group form-required">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-input" id="email" name="email" placeholder="Seu e-mail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-radio-label">Você deseja:</label>
                        <div class="form-check form-check-inline form-radio-option">
                            <input class="form-check-input" type="radio" id="alugar" name="interesse" value="alugar" required>
                            <label class="form-check-label" for="alugar">Alugar</label>
                        </div>
                        <div class="form-check form-check-inline form-radio-option">
                            <input class="form-check-input" type="radio" id="comprar" name="interesse" value="comprar" required>
                            <label class="form-check-label" for="comprar">Comprar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-textarea" id="mensagem" name="mensagem" placeholder="Digite sua mensagem..."></textarea>
                    </div>
                    <button type="submit" class="form-button" name="btnContato" id="btnContato">Enviar</button>

                    <?php
                    include ('./bd/contatoenvio.php');
                    ?>
                </form>
            </div>
        </div>
    </section>

    <!-- Seção de Depoimentos -->
    <section>
        <div class="testimonials-section ">
            <div class="container">
                <h2 class="text-center p-5 mb-3">O que nossos clientes dizem!</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="testimonial">
                            <p>A Karmo Imobiliária foi incrível! Encontrei a casa dos meus sonhos em poucos dias.</p>
                            <p><strong>Maria Silva</strong></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="testimonial">
                            <p>O atendimento foi excelente e o processo de compra foi muito tranquilo. Recomendo demais!</p>
                            <p><strong>João Santos</strong></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="testimonial">
                            <p>Estou muito satisfeito com o serviço. Consegui alugar meu apartamento rapidamente.</p>
                            <p><strong>Fernanda Oliveira</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-4">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->
         
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            K A R M O
                        </h6>
                        <p style="text-align: justify;">
                            A Karmo é uma imobiliária especializada em oferecer as melhores opções de imóveis, com foco em qualidade e atendimento personalizado.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Destaques
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Propriedades</a>
                        </p>
                        <p>
                            <a href="#pesquisa" class="text-reset">Pesquisa</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Links Úteis
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Anunciar</a>
                        </p>
                        <p>
                            <a href="#comprar" class="text-reset">Comprar</a>
                        </p>
                        <p>
                            <a href="#alugar" class="text-reset">Alugar</a>
                        </p>
                        <p>
                            <a href="../sistema/funcionarios/sistema.php" class="text-reset">Cadastrar</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
                        <p><i class="fas fa-home me-3"></i> Rua Exemplo, 123, São Paulo - SP</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            imobiliariakarmo@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 11 97698-0212</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright K A R M O Imóveis
        </div>
        <!-- Copyright -->
    </footer>




    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>