<?php
//Importar o arquivo com a classe de conexão 
include "imovelpdo.php";
//Instância da classe de conexão 
$conexao = new Conexao();

 //isset - verificar qual botão do formulário foi configurado 
 if(isset($_POST["btnCadastrarImovel"])){ 
    $conexao->InserirImovel();
    $conexao->SelecionarRegistrosImovel(); 
}else if(isset($_POST["btnListarImovel"])){ 
   $conexao->SelecionarRegistrosImovel();
 }else if(isset($_POST["btnExcluirImovel"])){ 
     $conexao->DeletarRegistrosImovel(); 
     $conexao->SelecionarRegistrosImovel(); 
 }else if(isset($_POST["btnEditarImovel"])){ 
     $conexao->EditarRegistrosImovel(); 
     $conexao->SelecionarRegistrosImovel(); 
}else{ 
    echo "ERRO - Nenhuma ação executada."; 
}




?>