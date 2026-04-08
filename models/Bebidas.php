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
    public $idBebida;
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
 
}


