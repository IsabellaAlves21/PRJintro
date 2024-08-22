<?php
namespace app\models;
 
use Exception;
 
class Produto{
 
    //atributos
    public string $nome;
    //acesso/tipo/nomeAtributo
    public float $valor;
    //metodos
    public function __construct(){
 
    }
 
    public function setNome(string $pNome){
        $this->nome = $pNome;  
    }
 
    public function setValor(float $pValor){
        if ($pValor<=0) {
            throw new Exception("Valor inválido - O valor deve ser maior que zero");
        }
        $this->valor = $pValor;
    }
    public function getNome(){
        return $this->nome;
    }
 
    public function getValor(){
        return number_format($this->valor,2);
    }
 
    public function exibirDadosProduto():string{
        $mensagem = "Produto: " . $this->getNome() . ", Valor(R$)" . $this->getValor();
        return $mensagem;
    }
 
    /* Criar um método que aplique descontos aos produtos de acordo com a seguinte regra:
    - Produtos que custam mais que R$ 100 e R$ 1000 - desconto de 5%
    -Produtos que custam menos de R$ 100 não aplicar desconto
    */
 
    public function retornarDesconto():float{
        $desconto=0;
        if ($this->valor>100 && $this->valor<=1000) {
            $desconto = 0.05;
        } elseif ($this->valor>1000) {
            $desconto = 0.1;
        }
 
        return $this->valor*$desconto;
    }
    public function retornarPrecoDesconto():float{
        return $this->valor-$this->retornarDesconto();
    }
}
 
?>