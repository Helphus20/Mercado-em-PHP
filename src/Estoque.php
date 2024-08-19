<?php 

require_once "Produto.php";
class Estoque {
    private $estoque = array(); // Inicializa a propriedade $estoque como um array vazio
    
    public function __construct($estoque){
        $this -> estoque = $estoque;
    }

    public function adicionaProdutoEstoque($produto){
        $adicionarProduto = readline("Deseja adcionar um produto (s/n)? ");
        if($adicionarProduto == "s" || $adicionarProduto == "n"){
            if($adicionarProduto == "s"){
                $nomeProduto = readline("Digite o nome do produto: ");
                $preco = readline("Digite o preço do produto: ");
                $produto = new Produto($nomeProduto, $preco);
                echo "O produto "+$produto->nome+" foi adicionado ao estoque";
                $this->estoque[] = $produto;

                return $this->estoque;
            }
        }else{
            echo "Digite ou 's' ou 'n'.";
            return 0;
        }
    }
    // Método para obter o estoque atual
    public function getEstoque() {
        echo "Este é o estoque atual: \n";
        return var_dump($this->estoque);//var_dump produz uma saída detalhada sobre tipo, conteúdo e tamanho da variável
    }
}
