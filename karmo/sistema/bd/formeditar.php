<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        .form-control {
            border-radius: 5px;
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
            background-color: #007bff;
            color: white;
            padding: 1rem;
            border-radius: 10px 10px 0 0;
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group.file-input {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-group.file-input input[type="file"] {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 0.5rem;
            cursor: pointer;
        }

        .custom-file-label::after {
            content: "Selecionar";
        }

        .form-group.mt-4 {
            margin-top: 2rem;
        }

        .fieldset {
            border: none;
        }

        .fieldset legend {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .form-group.text-center button {
            margin: 0.5rem;
        }

        .form-container .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
            margin-bottom: 0;
        }

        .form-container .card-body {
            padding: 1.5rem;
            background-color: #ffffff;
            color: #495057;
        }

        .form-container .form-control {
            background-color: #ffffff;
            color: #495057;
            border: 1px solid #ced4da;
        }

        .form-container .form-group {
            margin-bottom: 1.5rem;
        }

        .form-container .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
        }


        textarea {

            resize: none;
        }
    </style>
    <title>Edição de Registro de Imóvel</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h2>Edição de Registro de Imóvel</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET["txtImovelID"])) {
                            $imovelID = $_GET["txtImovelID"];
                        ?>
                            <form method="post" action="imovelenvio.php" id="frmContato" autocomplete="off" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="txtImovelID">ID do Imóvel:</label>
                                        <input type="text" class="form-control" value="<?= htmlspecialchars($imovelID) ?>" id="txtImovelID" name="txtImovelID" readonly required />
                                    </div>
                                    <div class="form-group">
                                        <label for="txtNomeimovel">Nome do Imóvel:</label>
                                        <input type="text" class="form-control" id="txtNomeimovel" name="txtNomeimovel" maxlength="100" placeholder="Nome do Imóvel" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="txtDescricao">Descrição:</label>
                                        <textarea class="form-control" id="txtDescricao" name="txtDescricao" maxlength="500" placeholder="Descrição do Imóvel" required></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtCategoria">Categoria:</label>
                                            <select class="form-control" id="txtCategoria" name="txtCategoria" required>
                                                <option value="" disabled selected>Selecione a Categoria</option>
                                                <option value="Apartamento">Apartamento</option>
                                                <option value="Casa">Casa</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="txtTipo">Tipo:</label>
                                            <select class="form-control" id="txtTipo" name="txtTipo" required>
                                                <option value="" disabled selected>Selecione o Tipo</option>
                                                <option value="Alugar">Alugar</option>
                                                <option value="Comprar">Comprar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtValor">Valor:</label>
                                            <input type="text" class="form-control" id="txtValor" name="txtValor" placeholder="Valor do Imóvel" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="txtQuartos">Quartos:</label>
                                            <input type="text" class="form-control" id="txtQuartos" name="txtQuartos" placeholder="Número de Quartos" required />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtBanheiros">Banheiros:</label>
                                            <input type="text" class="form-control" id="txtBanheiros" name="txtBanheiros" placeholder="Número de Banheiros" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="txtGaragem">Garagem:</label>
                                            <input type="text" class="form-control" id="txtGaragem" name="txtGaragem" placeholder="Número de Vagas na Garagem" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLocalizacao">Localização:</label>
                                        <input type="text" class="form-control" id="txtLocalizacao" name="txtLocalizacao" maxlength="100" placeholder="Localização do Imóvel" required />
                                    </div>
                                    <div class="form-group file-input">
                                        <label for="imagem">Imagem:</label>
                                        <input type="file" class="form-control-file" id="imagem" name="imagem" accept="image/*" required>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="btnEditarImovel" class="btn btn-primary">Editar</button>
                                        <button type="reset" name="btnLimpar" class="btn btn-secondary">Limpar</button>
                                    </div>
                                </fieldset>
                            </form>
                        <?php
                        }
                        ?>
                        <a href="../inseririmovel.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>