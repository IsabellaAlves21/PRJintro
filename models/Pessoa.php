<?php
 
namespace app\models;
 
use DateTime;
use DateInterval;
 
class Pessoa {
 
    public string $nome;
    public string $cpf;
    private DateTime $dataNascimento;
 
    public function __construct(string $pNome, string $pCpf, DateTime $pDataNascimento) {
        $this->setNome($pNome);
        $this->setCpf($pCpf);
        $this->dataNascimento = $pDataNascimento;
    }
 
    /**
     * Get the value of idade
     */
    public function getIdade(): int {
        $hoje = new DateTime();
        $idade = $hoje->diff($this->dataNascimento)->y;
        return $idade;
    }
 
    /**
     * Check if the person is of legal age
     */
    public function maiorDeIdade(): bool {
        $hoje = new DateTime();
        $dataLimite = new DateTime('18 years ago');
        return $this->dataNascimento <= $dataLimite;
    }
 
    /**
     * Get the value of nome
     */
    public function getNome(): string {
        return $this->nome;
    }
 
    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }
 
    /**
     * Get the value of cpf
     */
    public function getCpf(): string {
        return $this->cpf;
    }
 
    /**
     * Set the value of cpf
     *
     * @return  self
     */
    private function setCpf(string $cpf): self {
        $this->cpf = $cpf;
        return $this;
    }
 
    /**
     * Get the value of dataNascimento
     */
    public function getDataNascimento(): string {
        return $this->dataNascimento->format('d/m/Y');
    }
 
    /**
     * Display all data of the person
     */
    public function exibirDadosPessoa(): string {
        return "Nome: " . $this->getNome() . "; " .
               "CPF: " . $this->getCpf() . "; " .
               "Data de Nascimento: " . $this->getDataNascimento() . "; " .
               "Idade: " . $this->getIdade() . " anos; " .
               "Maior de idade: " . ($this->maiorDeIdade() ? 'Sim' : 'Não');
    }
}
?>
 