<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --fonte-primaria: 'Poppins', sans-serif;
            /* Definindo a variável */
        }

        body {
            font-family: var(--fonte-primaria);
            /* Usando a variável */
            background-color: #EBECEE;
            /* Exemplo de cor de fundo */
            font-size: 16px;
            font-weight: 300;
        }

        .card {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .card-header {
            background-color: red;
            color: white;
            padding: 1rem;
            border-radius: 10px 10px 0 0;
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 0.5rem;
            background-color: #ffffff;
            color: #495057;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
        }

        .form-group.text-center button {
            margin: 0.5rem;
        }

        .fieldset {
            border: none;
        }

        .fieldset legend {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
    <title>Exclusão de Registro</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_GET["txtImovelID"])) {
                    $imovelID = $_GET["txtImovelID"];
                ?>
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h2>Exclusão de Registro</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="imovelenvio.php" id="frmExcluir" autocomplete="off">
                                <fieldset>
                                    <legend class="">Tem certeza que deseja excluir o Registro?</legend>
                                    <div class="form-group">
                                        <label for="txtImovelID">ID do Imóvel:</label>
                                        <input type="text" class="form-control mt-2" id="txtImovelID" name="txtImovelID" value="<?= htmlspecialchars($imovelID) ?>" readonly />
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="btnExcluirImovel" class="btn btn-danger">Excluir</button>
                                        <a href="../inseririmovel.php" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>