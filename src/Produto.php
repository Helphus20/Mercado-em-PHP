<?php

namespace Mercado;
class Produto {
    public $conn;
    private $table = 'mercado.produto';
    
    public function __construct($db){//o parâmetro que é passado armazena em outra classe o método conect de Connection
        $this->conn = $db;
    }

    public function cadastraProduto($nome, $preco, $categoria){
        $sql = "INSERT INTO ". $this->table ." (nome, preco, categoria) VALUES (:nome, :preco, :categoria)"; 
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':categoria', $categoria);

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar Produto.";
        }
    }

    public function verProdutos(){
        echo "Mostrando Produtos...";
        $sql = "SELECT * FROM ". $this->table;
        $stmt = $this->conn->query($sql);

        //usa-se contrabarra quando uma classe pertence à um namespace global, ou quando a classe n pertence ao namespace do arquivo
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            echo "ID: " . $row['id'] . "\n";
            echo "Nome: " . $row['nome'] . "\n";
            echo "Preço: " . $row['preco'] . "\n";
            echo "Categoria: " . $row['categoria'] . "\n";
            echo "-----------------------\n";
        }
    }

    public function excluirProduto($id){
        echo "Deletando Produto...\n";
        $sql = "DELETE FROM ". $this->table . " WHERE id = :id";

        //usando Prepared Statement para proteger contra sql injection
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        //Se não houver uma entrada inesperada para escolher o id do Produto a ser deletado...
        if ($stmt->execute()) {
            echo "Produto deletado com sucesso.\n";
        } else {
            echo "Erro ao deletar Produto.\n";
        }
    }
}

