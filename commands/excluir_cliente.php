<?php

require_once __DIR__ . '/../config/Connection.php';
require_once __DIR__ . '/../config/Segredos.php';
require_once __DIR__ . '/../src/Cliente.php';

use Mercado\Connection;
use Mercado\Cliente;

// Conectar ao banco de dados
$database = new Connection();
$db = $database->connect();//armazena o método específico de conexão em $db

// Aqui é criada a instância de Cliente, chamando o construtor da classe
$cliente = new Cliente($db);

$id = readline("ID do cliente que desejas excluir: ");
$cliente->excluirCliente($id);