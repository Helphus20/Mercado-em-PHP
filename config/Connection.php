<?php 
namespace Mercado;

use Config\Segredos;
use PDO;//é uma extensão que define uma interface para acessar banco de dados   
use PDOException;//

class Connection{
    private $conn;

    public function connect() {
        $this->conn = null;

        $segredos = new Segredos();

        //resgatando as variáveis do arquivo Segredos.php
        $host = $segredos->getHost();
        $dbname = $segredos->getDbName();
        $port = $segredos->getPort();
        $username = $segredos->getUsername();
        $password = $segredos->getPassword();

        try {
            //dsn = Data Source Name, uma string que contém informações para conexão com o banco, como o tipo de banco,
            //porta, host, e nome do banco
            $dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname;
            $this->conn = new PDO($dsn, $username, $password);//conn realiza a conexão através da classa PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo("conexão estabelecida\n");
        } catch (PDOException $e) {//caso exista algum erro, PDOException o exibe
            echo"Erro de conexão: \n" . $e->getMessage();
        }

        return$this->conn;
    }
}

//$conn = new Connection;
//$conn->connect();
