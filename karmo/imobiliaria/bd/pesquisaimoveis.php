<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdimobiliaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inicializar variáveis de pesquisa
$tipo = "";
$categoria = "";
$valor = "";
$localizacao = "";


// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $tipo = $_GET['tipo'];
    $categoria = $_GET['categoria'];
    $valor = $_GET['valor'];
    $localizacao = $_GET['localizacao'];
}

// Montar a consulta SQL com base nos filtros
$sql = "SELECT * FROM tbimovel WHERE 1=1";

if (!empty($tipo)) {
    $tipo = $conn->real_escape_string($tipo);
    $sql .= " AND tipo = '$tipo'";
}

if (!empty($categoria)) {
    $categoria = $conn->real_escape_string($categoria);
    $sql .= " AND categoria = '$categoria'";
}

if (!empty($valor)) {
    switch ($valor) {
        case "1":
            $sql .= " AND valor <= 20000";
            break;
        case "2":
            $sql .= " AND valor <= 400000";
            break;
        case "3":
            $sql .= " AND valor <= 600000";
            break;
        case "4":
            $sql .= " AND valor <= 800000";
            break;
    }
}

if (!empty($localizacao)) {
    $localizacao = $conn->real_escape_string($localizacao);
    $sql .= " AND localizacao LIKE '%$localizacao%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Imóveis - K A R M O Imobiliária</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f0f0;
        color: #333;
        padding-top: 80px;
        /* Espaçamento para evitar que os cards fiquem grudados na navbar */
    }

    .property-card {
        margin-bottom: 20px;
    }

    .property-card img {
        max-height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .property-card h5 {
        margin-top: 0;
    }

    .property-card p {
        margin-bottom: 10px;
    }

    /* Estilo da navbar */
    .navbar {
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        background-color: rgb(8, 57, 102);
    }

    .navbar-nav .nav-link {
        font-family: Verdana, sans-serif;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: white;
    }
</style>
</head>

<body>
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

    <div class="container">
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card property-card">
                            <!-- Exibir a imagem do imóvel -->
                            <?php if (!empty($row['imagem'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']); ?>" class="card-img-top" alt="Imagem do Imóvel">
                            <?php else: ?>
                                <img src="./assets/placeholder.jpg" class="card-img-top" alt="Imagem não disponível">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title text-primary" style="font-weight: bold; font-size: 1.5rem;">
                                    <?php echo htmlspecialchars($row['nome']); ?>
                                </h5>
                                <p class="card-text text-muted">
                                    <?php echo isset($row['descricao']) ? htmlspecialchars($row['descricao']) : 'Sem descrição disponível.'; ?>
                                </p>
                                <hr>
                                <p class="card-text mb-2">
                                    <i class="fas fa-dollar-sign"></i> Valor: R$
                                    <?php echo isset($row['valor']) ? number_format($row['valor'], 2, ',', '.') : 'Não informado'; ?>
                                </p>
                                <p class="card-text mb-2">
                                    <i class="fas fa-home"></i> Tipo:
                                    <?php echo isset($row['tipo']) ? htmlspecialchars($row['tipo']) : 'Não informado'; ?>
                                </p>
                                <p class="card-text mb-2">
                                    <i class="fas fa-tags"></i> Categoria:
                                    <?php echo isset($row['categoria']) ? htmlspecialchars($row['categoria']) : 'Não informado'; ?>
                                </p>
                                <p class="card-text mb-2">
                                    <i class="fas fa-map-marker-alt"></i> Localização:
                                    <?php echo isset($row['localizacao']) ? htmlspecialchars($row['localizacao']) : 'Não informado'; ?>
                                </p>



                                <!-- Link para a página de detalhes -->
                                <?php
                                // Usando imovelID como identificador
                                switch ($row['imovelID']) {
                                    case 1:
                                        $detalhesPage = 'alugar1.php';
                                        break;
                                    case 2:
                                        $detalhesPage = 'alugar2.php';
                                        break;
                                    case 3:
                                        $detalhesPage = 'alugar3.php';
                                        break;
                                    case 4:
                                        $detalhesPage = 'venda1.php';
                                        break;
                                    case 5:
                                        $detalhesPage = 'venda2.php';
                                        break;
                                    case 6:
                                        $detalhesPage = 'venda3.php';
                                        break;
                                    default:
                                        $detalhesPage = '#'; // Caso não tenha uma página correspondente
                                }
                                ?>
                                <a href="<?php echo $detalhesPage . '?imovelID=' . $row['imovelID']; ?>" class="btn btn-primary mt-2">Ver Detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhum imóvel encontrado.</p>
            <?php endif; ?>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
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
                        <h6 class="text-uppercase fw-bold mb-4">K A R M O </h6>
                        <p style="text-align: justify;"> A Karmo é uma imobiliária especializada em oferecer as melhores opções de imóveis, com foco em qualidade e atendimento personalizado.
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
                            <a href="#!" class="text-reset">Comprar</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Ajuda</a>
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
                            info@example.com
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


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>