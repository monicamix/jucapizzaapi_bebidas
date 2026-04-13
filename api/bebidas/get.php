<?php

//die("cheguei aqui");
// api/bebidas/read.php
 
// Headers obrigatórios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// Incluir arquivos de banco de dados e modelo
include_once '../../config/Database.php';
include_once '../../models/Bebidas.php';
 
// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection();
 
// Instanciar o objeto Bebidas
$bebidas = new Bebidas($db);

$bebidas->idBebidas = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($bebidas->idBebidas) {
    // Busca a bebida
    $bebidas->read_single();

    if (isset($bebidas->nome)) {
        $bebidas_arr = array(
            "id" => $bebidas->idBebidas,
            "nome" => $bebidas->nome,
            "litros" => $bebidas->litros,
            "valor" => $bebidas->valor
        );
        http_response_code(200);
        // Converte para JSON e envia a resposta
        // `JSON_PRETTY_PRINT` é opcional, mas deixa o JSON mais legível
        echo json_encode($bebidas_arr, JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        echo json_encode(array("Mensagem" => "Nenhuma bebida foi encontrada com este id."), JSON_PRETTY_PRINT);
    }
} else {
        http_response_code(400);
        echo json_encode(array("Mensagem" => "ID da bebida não fornecido."), JSON_PRETTY_PRINT);
}


 