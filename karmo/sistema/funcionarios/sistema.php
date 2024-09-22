<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Sistema</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">Bem-vindo ao Sistema</h1>
                <p class="lead">Escolha uma opção para continuar</p>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-md-5">
                <div class="card h-100 shadow">
                    <img src="https://via.placeholder.com/500x200?text=Login" class="card-img-top" alt="Login">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-box-arrow-in-right me-2"></i>Login</h5>
                        <p class="card-text">Acesse sua conta existente para utilizar o sistema.</p>
                        <a href="login.php" class="btn btn-primary btn-lg mt-3">
                            <i class="bi bi-person-check me-2"></i>Fazer Login
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card h-100 shadow">
                    <img src="https://via.placeholder.com/500x200?text=Cadastro" class="card-img-top" alt="Cadastro">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-person-plus me-2"></i>Cadastro</h5>
                        <p class="card-text">Crie uma nova conta para começar a usar o sistema.</p>
                        <a href="cadastro.php" class="btn btn-success btn-lg mt-3">
                            <i class="bi bi-pencil-square me-2"></i>Cadastrar-se
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle com Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>