<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário e Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
    <div class="container py-5" style="margin-top: 6%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container p-4 p-md-5">
                    <h2 class="mb-4 text-center">
                        <i class="bi bi-person-plus me-2"></i>Cadastro
                    </h2>
                    <form action="../bd/cadastroenvio.php" method="post">
                        <div class="mb-4">
                            <label for="txtNomeFuncionario" class="form-label">Nome do Funcionário</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="txtNomeFuncionario" name="txtNomeFuncionario" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="txtDescricaoStatus" class="form-label">Descrição do Status</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                                <input type="text" id="txtDescricaoStatus" name="txtDescricaoStatus" class="form-control" required>
                            </div>
                        </div>

                        <!-- Campo oculto para status -->
                        <input type="hidden" id="txtStatus" name="txtStatus" value="2">

                        <div class="mb-4">
                            <label for="txtLogin" class="form-label">Login</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-at"></i></span>
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
                            <i class="bi bi-check2-circle me-2"></i>Cadastrar
                        </button>
                    </form>
                    <div class="text-center mt-2">
                        <a href="login.php" class="text-decoration-none">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Já tem uma conta? Faça login
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