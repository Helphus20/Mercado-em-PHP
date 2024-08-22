<?php

//o require_once, diz qual é o caminho do arquivo
require_once __DIR__ . '/../config/Connection.php';
require_once __DIR__ . '/../config/Segredos.php';
require_once __DIR__ . '/../src/Produto.php';

//o use importa especificamente a classe pelo namespace, para que não precise usar o caminho completo 
use Mercado\Connection;
use Mercado\Produto;

// Conectar ao banco de dados
$database = new Connection();
$db = $database->connect();//armazena o método específico de conexão em $db

// Aqui é criada a instância de Produto, chamando o construtor da classe
$produto = new Produto($db);

// Dados do Produto
$nome = readline("Nome do Produto: ");
echo 'Use o ponto (.) para colocar o valor decimal';
$preco = readline("\nPreco do Produto: ");
$categoria = readline("Categoria do Produto: ");

// Cadastrar Produto
$produto->cadastraProduto($nome, $preco, $categoria);