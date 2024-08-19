<?php 
namespace Mercado;

use PDO;//é uma extensão que define uma interface para acessar banco de dados   
use PDOException;//

class Connection{
    private $host = '192.168.100.8';
    private $dbname = 'mercado';
    private $port = '5432';
    private $username = 'postgres';
    private $password = '1234';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            //dsn = Data Source Name, uma string que contém informações para conexão com o banco, como o tipo de banco,
            //porta, host, e nome do banco
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname;
            $this->conn = new PDO($dsn, $this->username, $this->password);//conn realiza a conexão através da classa PDO
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
