<?php

require_once __DIR__ . '/../config/Connection.php';
require_once __DIR__ . '/../config/Segredos.php';
require_once __DIR__ . '/../src/Produto.php';

use Mercado\Connection;
use Mercado\Produto;

// Conectar ao banco de dados
$database = new Connection();
$db = $database->connect();//armazena o método específico de conexão em $db

// Aqui é criada a instância de Produto, chamando o construtor da classe
$produto = new Produto($db);
$produto->verProdutos();