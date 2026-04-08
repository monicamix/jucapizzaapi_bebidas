<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-max-age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//echo json_encode(["message" => "Bem vindos á API Juca Pizzaria"]);
//encode transforma o array em json para ser lido por outras linguagens, como javascript, python, etc.
//decode transforma o json em array para ser lido por php

?>