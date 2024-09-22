<?php
class Conexao
{
    // Constantes que definem os parâmetros do Banco de Dados
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB_NAME = "bdimobiliaria";

    private $pdo;

    public function __construct()
    {
        $this->Conectar();
    }

    public function Conectar()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                self::USER,
                self::PASSWORD
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão realizada com sucesso.";
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function InserirImovel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura os dados do formulário
            $nomeimovel = $_POST["txtNomeimovel"];
            $descricao = $_POST["txtDescricao"];
            $categoria = $_POST["txtCategoria"];
            $tipo = $_POST["txtTipo"];
            $valor = $_POST["txtValor"];
            $quartos = $_POST["txtQuartos"];
            $banheiros = $_POST["txtBanheiros"];
            $garagem = $_POST["txtGaragem"];
            $localizacao = $_POST["txtLocalizacao"];

            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'][0] == 0) {
                $imagem = file_get_contents($_FILES['imagem']['tmp_name'][0]);
            } else {
                $imagem = null;
            }
         
            // Certifique-se de que este trecho está sendo executado corretamente
            // e que $imagem está sendo passado para a função de inserção no banco de dados

            // Query para inserir o imóvel
            $query = "INSERT INTO tbimovel (nome, descricao, categoria, tipo, valor, quartos, banheiros, garagem, localizacao, imagem) VALUES (:nome, :descricao, :categoria, :tipo, :valor, :quartos, :banheiros, :garagem, :localizacao, :imagem)";
            $stmt = $this->pdo->prepare($query);

            // Bind dos parâmetros
            $stmt->bindParam(':nome', $nomeimovel);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':quartos', $quartos);
            $stmt->bindParam(':banheiros', $banheiros);
            $stmt->bindParam(':garagem', $garagem);
            $stmt->bindParam(':localizacao', $localizacao);
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_LOB); // Bind da imagem como BLOB

            // Executa a query e verifica o sucesso
            if ($stmt->execute()) {
                echo "<p>Registro inserido com sucesso.</p>";
            } else {
                echo "<p>Falha ao inserir registro.</p>";
                $errorInfo = $stmt->errorInfo();
                echo "<p>Erro: " . $errorInfo[2] . "</p>";
            }
        } else {
            echo "<p>Método de requisição inválido.</p>";
        }
    }

   
    public function SelecionarRegistrosImovel()
    {
        if (empty($_POST["txtNomeImovel"])) {
            $query = "SELECT imovelID, nome, descricao, categoria, tipo, valor, quartos, banheiros, garagem, localizacao FROM tbimovel";
            $select = $this->pdo->prepare($query);
        } else {
            $nome = $_POST["txtNomeImovel"];
            $nome = '%' . $nome . '%';
            $query = "SELECT * FROM tbimovel WHERE nome LIKE :nome";
            $select = $this->pdo->prepare($query);
            $select->bindParam(':nome', $nome);
        }
    
        $select->execute();
        $linhas = $select->fetchAll(PDO::FETCH_ASSOC);
    
        // Verifica se há registros e cria uma estrutura de tabela.
        if (empty($linhas)) {
            echo "Erro ao listar Imóveis ou tabela vazia!";
        } else {
            require_once("htmlcabecalho.php");
            require_once("tabelacabecalho.php");
    
            for ($i = 0; $i < count($linhas); $i++) {
                echo "<tr>";
                foreach ($linhas[$i] as $registro) {
                    echo "<td>" . htmlspecialchars($registro) . "</td>";
                }
    
                // Botões para Excluir e Editar com CSS inline
                echo '<td>
                        <form action="formexcluir.php" method="get" style="display:inline;">
                            <input type="hidden" name="txtImovelID" value="' . htmlspecialchars($linhas[$i]['imovelID']) . '">
                            <button type="submit" style="padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; color: white; background-color: red; font-weight: bold;">Excluir</button>
                        </form>
                      </td>';
                echo '<td>
                        <form action="formeditar.php" method="get" style="display:inline;">
                            <input type="hidden" name="txtImovelID" value="' . htmlspecialchars($linhas[$i]['imovelID']) . '">
                            <button type="submit" style="padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; color: white; background-color: blue; font-weight: bold;">Editar</button>
                        </form>
                      </td>';
    
                echo "</tr>";
            }
    
            require_once("tabelarodape.php");
            require_once("htmlrodape.php");
        }
    }
    

   


    public function DeletarRegistrosImovel()
    {
        if (isset($_POST["txtImovelID"])) {
            $imovelID = $_POST["txtImovelID"];
            $query = "DELETE FROM tbimovel WHERE imovelID = :imovelID";
            $delete = $this->pdo->prepare($query);
            $delete->bindParam(':imovelID', $imovelID);

            if ($delete->execute()) {
                echo "<p>Registro deletado com Sucesso</p>";
            } else {
                echo "<p>Falha ao deletar registro.</p>";
            }
        }
    }


    public function EditarRegistrosImovel() 
    {
        if (isset($_POST["txtImovelID"])) {
            $imovelID = $_POST["txtImovelID"];
            $nomeimovel = $_POST["txtNomeimovel"];
            $descricao = $_POST["txtDescricao"];
            $categoria = $_POST["txtCategoria"];
            $tipo = $_POST["txtTipo"];
            $valor = $_POST["txtValor"];
            $quartos = $_POST["txtQuartos"];
            $banheiros = $_POST["txtBanheiros"];
            $garagem = $_POST["txtGaragem"];
            $localizacao = $_POST["txtLocalizacao"];
    
            // Inicializa a variável da imagem
            $imagem = null;
    
            // Verifica se uma nova imagem foi enviada
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
                // Lê a imagem e a converte para binário
                $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            }
    
            // Atualiza o imóvel no banco de dados
            $query = "CALL SP_AtualizarImovel(:imovelID, :nome, :descricao, :categoria, :tipo, :valor, :quartos, :banheiros, :garagem, :localizacao, :imagem)";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindParam(':imovelID', $imovelID);
            $stmt->bindParam(':nome', $nomeimovel);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':quartos', $quartos);
            $stmt->bindParam(':banheiros', $banheiros);
            $stmt->bindParam(':garagem', $garagem);
            $stmt->bindParam(':localizacao', $localizacao);
    
            // Se uma nova imagem foi enviada, atualize a consulta para incluir a imagem
            if ($imagem !== null) {
                $stmt->bindParam(':imagem', $imagem, PDO::PARAM_LOB);
            } else {
                // Se não houver nova imagem, você pode decidir não atualizar a coluna de imagem
                $stmt->bindParam(':imagem', $imagem, PDO::PARAM_NULL);
            }
    
            if ($stmt->execute()) {
                echo "<p>Registro atualizado com sucesso.</p>";
            } else {
                echo "<p>Falha ao atualizar registro.</p>";
            }
        } else {
            echo "<p>Por favor, preencha o formulário corretamente.</p>";
        }
    }
    










}
?>
