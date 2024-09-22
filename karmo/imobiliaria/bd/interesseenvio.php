<?php
require 'interessepdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imovelID = $_POST['imovelID'];
    $nomeinteressado = $_POST['nomeinteressado'];
    $emailinteressado = $_POST['emailinteressado'];
    $telefoneinteressado = $_POST['telefoneinteressado'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $quartos = $_POST['quartos'];
    $banheiros = $_POST['banheiros'];
    $garagem = $_POST['garagem'];
    $localizacao = $_POST['localizacao'];

    // Captura as imagens que foram enviadas
    $imagem = $_POST['imagem'];
    $imagem2 = $_POST['imagem2'];
    $imagem3 = $_POST['imagem3']; // Correção aqui

    // Inserindo os dados na tabela tbinteressecliente
    $stmt = $pdo->prepare ("INSERT INTO tbinteressecliente (imovelID, nomeinteressado, emailinteressado, telefoneinteressado, nome, descricao, categoria, tipo, valor, quartos, banheiros, garagem, localizacao, imagem, imagem2, imagem3, data_interesse) VALUES (:imovelID, :nomeinteressado, :emailinteressado, :telefoneinteressado, :nome, :descricao, :categoria, :tipo, :valor, :quartos, :banheiros, :garagem, :localizacao, :imagem, :imagem2, :imagem3, NOW())");

    $stmt->execute([
        'imovelID' => $imovelID,
        'nomeinteressado' => $nomeinteressado,
        'emailinteressado' => $emailinteressado,
        'telefoneinteressado' => $telefoneinteressado,
        'nome' => $nome,
        'descricao' => $descricao,
        'categoria' => $categoria,
        'tipo' => $tipo,
        'valor' => $valor,
        'quartos' => $quartos,
        'banheiros' => $banheiros,
        'garagem' => $garagem,
        'localizacao' => $localizacao,
        'imagem' => $imagem,
        'imagem2' => $imagem2,
        'imagem3' => $imagem3 // Correção aqui
    ]);

    echo "Seu interesse foi registrado com sucesso!";
}
?>