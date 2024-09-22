<?php

class Conexao
{

    //Constantes de definem os parâmetros do Banco de Dados 
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB_NAME = "bdimobiliaria";
    var $pdo = null;

    public function __construct()
    {
        $this->Conectar();
    }

    public function Conectar()
    {
        try {
            //Instância da classe PDO - Construtor realiza a conexão. 
            $this->pdo = new PDO(
                'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                self::USER,
                self::PASSWORD
            );
            //Parar o processo de conexão caso haja erro - lançar uma exceção. 
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão realizada com Sucesso";
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }




    public function Contato()
    {
        // Verifica se o botão de envio foi pressionado 
        if (isset($_POST["btnContato"])) {
            // Declaração das variáveis com base nos dados do formulário 
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $interesse = $_POST["interesse"];
            $mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : null; // Pode ser null se não preenchido

            // String de Inserção no Banco de dados 
            $query = "INSERT INTO tbcontato (nome, email, interesse, mensagem) VALUES (:nome, :email, :interesse, :mensagem)";

            // Atribui o Insert ao PDO 
            $insert = $this->pdo->prepare($query);

            // Define os parâmetros que serão substituídos 
            $insert->bindParam(':nome', $nome);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':interesse', $interesse);
            $insert->bindParam(':mensagem', $mensagem);

            // Verifica se houve inserção de registros no Banco de Dados 
            if ($insert->execute()) {
                // Se um registro foi inserido. 
                echo "<p>Registro inserido com sucesso.</p>";
            } else {
                // Se nenhum registro foi inserido. 
                echo "<p>Falha ao inserir registro.</p>";
            }
        }
    }






    
}
?>