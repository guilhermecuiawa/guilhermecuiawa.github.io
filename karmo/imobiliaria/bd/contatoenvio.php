<?php 
//Importar o arquivo com a classe de conexão 
include "contatopdo.php"; 
//Instância da classe de conexão 
$conexao = new Conexao(); 
 //isset - verificar qual botão do formulário foi configurado 
 if(isset($_POST["btnContato"])){ 
    $conexao->Contato(); 
}else{ 
    echo "ERRO - Nenhuma ação executada."; 
}
?>