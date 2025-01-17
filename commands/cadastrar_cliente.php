<?php

//o require_once, diz qual é o caminho do arquivo
require_once __DIR__ . '/../config/Connection.php';
require_once __DIR__ . '/../config/Segredos.php';
require_once __DIR__ . '/../src/Cliente.php';

//o use importa especificamente a classe pelo namespace, para que não precise usar o caminho completo 
use Mercado\Connection;
use Mercado\Cliente;

// Conectar ao banco de dados
$database = new Connection();
$db = $database->connect();//armazena o método específico de conexão em $db

// Aqui é criada a instância de Cliente, chamando o construtor da classe
$cliente = new Cliente($db);

// Dados do cliente
$nome = readline("Nome do cliente: ");
$email = readline("Email do cliente: ");
$telefone = readline("Telefone do cliente: ");

// Cadastrar cliente
$cliente->cadastraCliente($nome, $email, $telefone);