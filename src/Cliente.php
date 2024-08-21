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

    public function verClientes(){
        echo "Mostrando Clientes...";
        $sql = "SELECT * FROM ". $this->table;
        $stmt = $this->conn->query($sql);

        //usa-se contrabarra quando uma classe pertence à um namespace global, ou quando a classe n pertence ao namespace do arquivo
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            echo "ID: " . $row['id'] . "\n";
            echo "Nome: " . $row['nome'] . "\n";
            echo "Email: " . $row['email'] . "\n";
            echo "Telefone: " . $row['telefone'] . "\n";
            echo "-----------------------\n";
        }
    }

    public function excluirCliente($id){
        echo "Deletando Cliente...";
        $sql = "DELETE FROM ". $this->table . " WHERE id = :id";

        //usando Prepared Statement para proteger contra sql injection
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        //Se não houver uma entrada inesperada para escolher o id do cliente a ser deletado...
        if ($stmt->execute()) {
            echo "Cliente deletado com sucesso.\n";
        } else {
            echo "Erro ao deletar cliente.\n";
        }
    }
}