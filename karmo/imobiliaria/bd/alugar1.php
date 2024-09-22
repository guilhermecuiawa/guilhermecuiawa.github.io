<!-- detalhes.php -->
<?php
require './interessepdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $imovelID = $_GET['imovelID'];
    $stmt = $pdo->prepare("SELECT * FROM tbimovel WHERE imovelID = :imovelID");
    $stmt->execute(['imovelID' => $imovelID]);
    $imovel = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Apartamento Compacto - K A R M O Imobiliária</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Estilo geral da página */
        body {
            font-family: 'Poppins', sans-serif;
            /* Define a fonte padrão da página */
            background-color: #f0f0f0;
            /* Define a cor de fundo da página */
            color: #333;
            /* Define a cor do texto da página */
        }

        /* Estilo da navbar */
        .navbar {
            position: fixed;
            /* Fixa a navbar no topo da página */
            width: 100%;
            /* A navbar ocupa toda a largura da página */
            top: 0;
            /* Posiciona a navbar no topo da página */
            z-index: 1000;
            /* Garante que a navbar fique acima de outros elementos */
            background-color: rgb(8, 57, 102);
            /* Define a cor de fundo da navbar */
        }

        .navbar-nav .nav-link {
            font-family: Verdana, sans-serif;
            /* Define a fonte dos links da navbar */
            transition: color 0.3s ease;
            /* Adiciona uma transição suave na cor dos links */
        }

        .navbar-nav .nav-link:hover {
            color: white;
            /* Altera a cor dos links quando o mouse passa sobre eles */
        }

        /* Estilo dos detalhes da casa */
        .house-details {
            background-color: #fff;
            /* Define a cor de fundo dos detalhes da casa */
            padding: 20px;
            /* Adiciona preenchimento interno */
            border-radius: 15px;
            /* Arredonda os cantos do box */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adiciona uma sombra sutil ao box */
            margin-top: 20px;
            /* Adiciona margem superior */
        }

        .house-details h2 {
            color: #007bff;
            /* Define a cor dos títulos */
        }

        .house-details p {
            margin-bottom: 10px;
            /* Adiciona margem inferior aos parágrafos */
        }

        .house-features {
            list-style-type: none;
            /* Remove os marcadores da lista */
            padding: 0;
            /* Remove o preenchimento interno da lista */
        }

        .house-features li {
            padding: 5px 0;
            /* Adiciona preenchimento vertical aos itens da lista */
        }

        .house-features i {
            color: #007bff;
            /* Define a cor dos ícones na lista de recursos */
            margin-right: 10px;
            /* Adiciona margem à direita dos ícones */
        }

        /* Estilo do botão de compra */
        .buy-button {
            background-color: #007bff;
            /* Define a cor de fundo do botão */
            color: #fff;
            /* Define a cor do texto do botão */
            padding: 10px 20px;
            /* Adiciona preenchimento interno ao botão */
            border-radius: 5px;
            /* Arredonda os cantos do botão */
            text-decoration: none;
            /* Remove o sublinhado do texto do botão */
            display: inline-block;
            /* Exibe o botão como um bloco inline */
            margin-top: 20px;
            /* Adiciona margem superior */
            border: none;
            /* Remove a borda do botão */
        }

        .buy-button:hover {
            background-color: #0056b3;
            /* Altera a cor de fundo do botão ao passar o mouse sobre ele */
        }

        /* Estilo do formulário de registro */
        .register-form {
            background-color: #fff;
            /* Define a cor de fundo do formulário */
            padding: 20px;
            /* Adiciona preenchimento interno */
            border-radius: 15px;
            /* Arredonda os cantos do formulário */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adiciona uma sombra sutil ao formulário */
        }

        .register-form h3 {
            color: #007bff;
            /* Define a cor dos títulos do formulário */
            margin-bottom: 20px;
            /* Adiciona margem inferior aos títulos */
        }

        .register-form .form-control {
            margin-bottom: 15px;
            /* Adiciona margem inferior aos controles do formulário */
        }

        .register-button {
            background-color: #007bff;
            /* Define a cor de fundo do botão de registro */
            color: #fff;
            /* Define a cor do texto do botão */
            padding: 10px 20px;
            /* Adiciona preenchimento interno ao botão */
            border-radius: 5px;
            /* Arredonda os cantos do botão */
            text-decoration: none;
            /* Remove o sublinhado do texto do botão */
            display: inline-block;
            /* Exibe o botão como um bloco inline */
            margin-top: 10px;
            /* Adiciona margem superior */
            border: none;
            /* Remove a borda do botão */
        }

        .register-button:hover {
            background-color: #0056b3;
            /* Altera a cor de fundo do botão ao passar o mouse sobre ele */
        }

        /* Estilo do container do mapa */
        .map-container {
            margin-top: 20px;
            /* Adiciona margem superior */
            border-radius: 15px;
            /* Arredonda os cantos do container do mapa */
            overflow: hidden;
            /* Garante que o conteúdo não saia do container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adiciona uma sombra sutil ao container */
            height: 350px;
            /* Define a altura fixa do container */
        }

        .map-container iframe {
            width: 100%;
            /* Define a largura do iframe como 100% do container */
            height: 350px;
            /* Define a altura do iframe como 100% do container */
            border: 0;
            /* Remove a borda do iframe */
        }

        /* Estilo do container do carrossel */
        .carousel {
            border-radius: 15px;
            /* Arredonda as bordas do contêiner do carrossel */
            overflow: hidden;
            /* Garante que o conteúdo não ultrapasse as bordas arredondadas */
        }

        /* Estilo das imagens do carrossel */
        .carousel-item img {
            border-radius: 15px;
            /* Arredonda as bordas das imagens do carrossel */
            height: 400px;
            /* Define a altura fixa para todas as imagens */
            object-fit: cover;
            /* Garante que a imagem preencha o container sem distorção */
        }


        /* Estilo do footer */
        footer .text-white {
            color: #ffffff;
            /* Define a cor do texto do footer */
        }

        footer a {
            color: #ffffff;
            /* Define a cor dos links do footer */
            text-decoration: none;
            /* Remove o sublinhado dos links */
        }

        footer a:hover {
            text-decoration: underline;
            /* Adiciona sublinhado aos links ao passar o mouse sobre eles */
        }

        /* Ajuste de margens em dispositivos menores */
        @media (max-width: 768px) {

            .house-details,
            .register-form,
            .map-container {
                margin-top: 10px;
                padding: 15px;
            }
        }

        /* Ajuste do tamanho da fonte em dispositivos menores */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 20px;
            }

            .house-details h2,
            .register-form h3 {
                font-size: 1.5rem;
            }
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="../index.php">
                <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">K A R M O</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container mt-5 pt-5">
        <div class="row">
            <!-- Coluna com carrossel e detalhes da casa -->
            <div class="col-lg-6">
                <!-- Carrossel -->
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <!-- Indicadores -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <!-- Itens do Carrossel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/casa2.jpg" class="d-block w-100 rounded" alt="Imagem 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/casa3.jpg" class="d-block w-100 rounded" alt="Imagem 2">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/casa4.jpg" class="d-block w-100 rounded" alt="Imagem 3">
                        </div>
                    </div>

                    <!-- Controles do Carrossel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>

                <div class="house-details mt-4 mb-3">
                    <h2><?php echo htmlspecialchars($imovel['nome']); ?></h2>
                    <p>Descrição: <?php echo htmlspecialchars($imovel['descricao']); ?></p>
                    <p><i class="fas fa-dollar-sign"></i> Valor: R$ <?php echo number_format($imovel['valor'], 2, ',', '.'); ?></p>
                    <p><i class="fas fa-tags"></i> Categoria: <?php echo htmlspecialchars($imovel['categoria']); ?></p>
                    <p><i class="fas fa-bed"></i> Quartos: <?php echo $imovel['quartos']; ?></p>
                    <p><i class="fas fa-bath"></i> Banheiros: <?php echo $imovel['banheiros']; ?></p>
                    <p><i class="fas fa-car"></i> Garagem: <?php echo $imovel['garagem']; ?></p>
                    <p><i class="fas fa-map-marker-alt"></i> Localização: <?php echo htmlspecialchars($imovel['localizacao']); ?></p>
                </div>


            </div>

            <!-- Coluna com formulário de cadastro -->
            <div class="col-lg-6 mb-3">
                <!-- Formulário de Cadastro -->
                <div class="register-form">
                    <h3>Ficou Interessado?</h3>
                    <form id="formInteresse" action="./interesseenvio.php" method="POST">
                        <input type="hidden" name="imovelID" value="<?php echo $imovel['imovelID']; ?>">
                        <input type="hidden" name="nome" value="<?php echo htmlspecialchars($imovel['nome']); ?>">
                        <input type="hidden" name="descricao" value="<?php echo htmlspecialchars($imovel['descricao']); ?>">
                        <input type="hidden" name="categoria" value="<?php echo htmlspecialchars($imovel['categoria']); ?>">
                        <input type="hidden" name="tipo" value="<?php echo htmlspecialchars($imovel['tipo']); ?>">
                        <input type="hidden" name="valor" value="<?php echo $imovel['valor']; ?>">
                        <input type="hidden" name="quartos" value="<?php echo $imovel['quartos']; ?>">
                        <input type="hidden" name="banheiros" value="<?php echo $imovel['banheiros']; ?>">
                        <input type="hidden" name="garagem" value="<?php echo $imovel['garagem']; ?>">
                        <input type="hidden" name="localizacao" value="<?php echo htmlspecialchars($imovel['localizacao']); ?>">
                        <input type="hidden" name="imagem" value="./assets/casa2.jpg">
                        <input type="hidden" name="imagem2" value="./assets/casa3.jpg">
                        <input type="hidden" name="imagem3" value="./assets/casa4.jpg">

                        <div class="mb-3">
                            <label for="nomeinteressado" class="form-label">Nome:</label>
                            <input type="text" name="nomeinteressado" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailinteressado" class="form-label">E-mail:</label>
                            <input type="email" name="emailinteressado" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefoneinteressado" class="form-label">Telefone:</label>
                            <input type="text" name="telefoneinteressado" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="botaoEnviar">Enviar Interesse</button>
                    </form>
                </div>
                <div class="map-container mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.1545825677623!2d-46.63330828502293!3d-23.597497984667396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59b0e838bb65%3A0x78f8f4e2ae96b8a0!2sRua%20das%20Flores%2C%20123%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1685269187443!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-3">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div>
                <!-- Espaço para ícones de redes sociais, se necessário -->
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links -->
        <section>
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">K A R M O</h6>
                        <p style="text-align: justify;">
                            A Karmo é uma imobiliária especializada em oferecer as melhores opções de imóveis, com foco em qualidade e atendimento personalizado.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Destaques</h6>
                        <p><a href="#!" class="text-reset">Propriedades</a></p>
                        <p><a href="#!" class="text-reset">Pesquisa</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Links Úteis</h6>
                        <p><a href="#!" class="text-reset">Anunciar</a></p>
                        <p><a href="#!" class="text-reset">Comprar</a></p>
                        <p><a href="#!" class="text-reset">Ajuda</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Contato -->
                        <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
                        <p><i class="fas fa-home me-3"></i> Rua Exemplo, 123, São Paulo - SP</p>
                        <p><i class="fas fa-envelope me-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone me-3"></i> + 11 97698-0212</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright K A R M O Imóveis
        </div>
        <!-- Copyright -->
    </footer>
    <script>
        document.getElementById('formInteresse').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            var formData = new FormData(this); // Coleta os dados do formulário
            var botaoEnviar = document.getElementById('botaoEnviar');

            // Muda o estado do botão para "Enviando"
            alterarEstadoBotao('btn-primary', 'Enviando...', true); // Mantém a cor original

            // Envia os dados do formulário via fetch
            fetch('./interesseenvio.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na rede'); // Lança um erro se a resposta não for ok
                    }
                    return response.text(); // Recebe a resposta como texto
                })
                .then(data => {
                    console.log(data); // Para depuração, veja a resposta do servidor
                    alterarEstadoBotao('btn-success', 'Enviado!', false); // Muda para "enviado"
                    resetarBotao(2000); // Reseta após 2 segundos
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alterarEstadoBotao('btn-danger', 'Erro!', false); // Muda para "erro"
                    resetarBotao(3000); // Reseta após 3 segundos
                });
        });

        // Função para alterar o estado do botão
        function alterarEstadoBotao(cor, texto, desabilitar) {
            var botaoEnviar = document.getElementById('botaoEnviar');
            botaoEnviar.classList.remove('btn-primary', 'btn-success', 'btn-danger');
            botaoEnviar.classList.add(cor);
            botaoEnviar.textContent = texto;
            botaoEnviar.disabled = desabilitar; // Desabilita o botão se necessário
        }

        // Função para resetar o botão
        function resetarBotao(tempo) {
            setTimeout(() => {
                var botaoEnviar = document.getElementById('botaoEnviar');
                botaoEnviar.classList.remove('btn-success', 'btn-danger');
                botaoEnviar.classList.add('btn-primary'); // Volta para a cor original
                botaoEnviar.textContent = 'Enviar Interesse';
                botaoEnviar.disabled = false; // Habilita o botão novamente
                document.getElementById('formInteresse').reset(); // Limpa os campos do formulário
            }, tempo);
        }
    </script>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>