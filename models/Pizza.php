<?php 

/**
 * Classe Pizza
 * Representa a entidade Pizza no sistema e gerencia a conexão com o banco de dados.
 */
class Pizza
{
    // Propriedade privada para armazenar a instância da conexão com o banco de dados
    private $conn;

    // Nome da tabela correspondente no banco de dados
    private $tabela = 'pizzas';

    // Propriedades que representam as colunas da tabela 'pizza'
    public $idPizza;
    public $nome;
    public $ingredientes;
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

        // Query SQL para selecionar todos os campos da tabela de pizzas

        $query = "SELECT idPizza, nome, ingredientes, valor FROM " . $this->tabela. " ORDER BY valor asc";

        
 
        // Prepara a query

        $stmt = $this->conn->prepare($query);
 
        // Executa a query

        $stmt->execute();
 
        return $stmt;

    }
 
}


