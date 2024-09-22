<?php
class Conexao {
    // Constantes que definem os parâmetros do Banco de Dados
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAME = 'bdimobiliaria';

    // Propriedade para armazenar a instância PDO
    private $pdo;

    public function __construct() {
        $this->conectar();
    }

    // Método para estabelecer a conexão com o banco de dados
    private function conectar() {
        try {
            // Instância da classe PDO - Construtor realiza a conexão
            $this->pdo = new PDO(
                'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                self::USER,
                self::PASSWORD
            );
            // Definir o modo de erro para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    // Método para executar uma stored procedure
    public function executarProcedure($nomeProc, $params) {
        try {
            $stmt = $this->pdo->prepare("CALL $nomeProc(" . implode(',', array_fill(0, count($params), '?')) . ")");
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro ao executar a stored procedure: ' . $e->getMessage();
        }
    }
}
?>
