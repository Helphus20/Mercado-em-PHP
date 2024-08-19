<?php

namespace Mercado;
class Cliente{
    public $conn;
    private $table = 'mercado.cliente';

    public function __construct($db){//db é uma variável que armazena em outra classe o método conect de Connection
        $this->conn = $db;
    }

    public function cadastraCliente($nome, $email, $telefone){
        //Dentro de VALUES, os valores a serem recebidos são antecedidos de ':'
        //Isso se deve a sintaxe de Placeholders nomeados, que evitam SQL Injection
        $sql = "INSERT INTO ". $this->table ." (nome, email, telefone) VALUES (:nome, :email, :telefone)";
        $stmt = $this->conn->prepare($sql);//substitui os placeholders e prepara a instrução SQL para execução

        //faz a relação com as variáveis com os placeholders
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);

        if ($stmt->execute()) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar cliente.";
        }
    }
}