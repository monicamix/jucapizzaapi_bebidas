<?php 

/**
 * Classe Bebidas
 * Representa a entidade Bebidas no sistema e gerencia a conexão com o banco de dados.
 */
class Bebidas
{
    // Propriedade privada para armazenar a instância da conexão com o banco de dados
    private $conn;

    // Nome da tabela correspondente no banco de dados
    private $tabela = 'bebidas';

    // Propriedades que representam as colunas da tabela 'bebidas'
    public $idBebidas;
    public $nome;
    public $litros;
    public $valor;

    /**
     * Método Construtor
     * @param PDO $db Recebe uma instância de conexão com o banco de dados (geralmente um objeto PDO)
     * e a atribui à propriedade local $conn para ser usada nos métodos de CRUD.
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {

        // Query SQL para selecionar todos os campos da tabela de bebidas

        $query = "SELECT idBebidas, nome, litros, valor FROM " . $this->tabela. " ORDER BY valor asc";

        
 
        // Prepara a query

        $stmt = $this->conn->prepare($query);
 
        // Executa a query

        $stmt->execute();
 
        return $stmt;

    }

    
    public function read_single()
    {
        // Cria a consulta
        $query = 'SELECT
            p.idBebidas,
            p.nome,
            p.litros,
            p.valor
        FROM
            ' . $this->tabela . ' p
        WHERE
            p.idBebidas = ?
        LIMIT 1';
 
        // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Vincula o ID
        $stmt->bindParam(1, $this->idBebidas);
 
        // Executa a query
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Define as propriedades
        $this->nome = $row['nome'];
        $this->litros = $row['litros'];
        $this->valor = $row['valor'];
    }

    public function create()
    {
        // Query de inserção
        $query = 'INSERT INTO ' . $this->tabela . ' SET nome = :nome, litros = :litros, valor = :valor';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->litros = htmlspecialchars(strip_tags($this->litros));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
       
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':litros', $this->litros);
        $stmt->bindParam(':valor', $this->valor);
 
        // Executar a query
        if ($stmt->execute()) {
            return true;
        }    
        return false;
    }

    public function update() {
        // Query de atualização
        $query = 'UPDATE ' . $this->tabela . ' SET nome=:nome, litros=:litros, valor=:valor WHERE idBebidas=:id';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->litros = htmlspecialchars(strip_tags($this->litros));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->idBebidas = htmlspecialchars(strip_tags($this->idBebidas));
 
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':litros', $this->litros);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->idBebidas);
 
        // Executar a query
        if($stmt->execute()) {
            return true;
        }
     
        return false;
    }
 
}


