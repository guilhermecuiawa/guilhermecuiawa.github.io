<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexao = new Conexao();

    // Dados do funcionário
    $nomeFuncionario = $_POST['txtNomeFuncionario'];

    // Inserir Funcionário
    $resultadoFuncionario = $conexao->executarProcedure('SP_InserirFuncionario', [$nomeFuncionario]);
    $ultimoIdFuncionario = end($resultadoFuncionario)['FnID'];

    // Dados do Status
    $descricaoStatus = $_POST['txtDescricaoStatus'];

    // Inserir Status
    $resultadoStatus = $conexao->executarProcedure('SP_InserirStatus', [$descricaoStatus]);
    $ultimoIdStatus = end($resultadoStatus)['StID'];

    // Dados do Usuário
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    // Criar Usuário
    $resultadoUsuario = $conexao->executarProcedure('SP_InserirUsuario', [$login, $senha, $ultimoIdFuncionario, $ultimoIdStatus]);

    echo '<p>Usuário criado com sucesso.</p>';
}
?>
