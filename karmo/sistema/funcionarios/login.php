<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .input-group-text {
            background-color: transparent;
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .input-group:focus-within .input-group-text {
            border-color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="form-container p-4 p-md-5">
                    <h2 class="mb-4 text-center">
                        <i class="me-2"></i>Login
                    </h2>
                    <form action="../inseririmovel.php" method="post">
                        <div class="mb-4">
                            <label for="txtLogin" class="form-label">Login</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="txtLogin" name="txtLogin" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtSenha" class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" id="txtSenha" name="txtSenha" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-check2-circle me-2"></i>Entrar
                        </button>
                    </form>
                    <div class="text-center mt-2">
                        <a href="cadastro.php" class="text-decoration-none">
                            <i class="bi bi-person-plus me-1"></i>Não tem uma conta? Cadastre-se
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