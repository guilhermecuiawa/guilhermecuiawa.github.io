<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexao = new Conexao();

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    // Verifica as credenciais
    $resultado = $conexao->executarProcedure('SP_Login', [$login, $senha]);
    $resultado = $resultado[0]['Resultado'];

    if (strpos($resultado, 'Bem Vindo(a)') !== false) {
        $_SESSION['usuario'] = $login; // Define a sessão
        header('Location: cadastrar.php'); // Redireciona para a página de cadastro de casas
        exit();
    } else {
        echo '<p>' . $resultado . '</p>'; // Exibe a mensagem de erro
    }
}
?>
