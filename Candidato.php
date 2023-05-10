<?php
class Candidato
{
    private int $codigo;
    private string $nome;
    private string $cpf;
    private string $telefone;
    private bool $possuiEnsinoPublico;

    public function get_Codigo()
    {
        return $this->codigo;
    }

    public function set_Codigo(int $id)
    {
        return $this->codigo = $id;
    }

    public function get_Nome() 
    {
         return $this->nome; 
    }   

    public function set_Nome(string $nome)
    {
        $this->nome = $nome;
    }

    public function get_Cpf()
    {
        return $this->cpf;
    }

    public function set_Cpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function get_Telefone()
    {
        return $this->telefone;
    }

    public function set_Telefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function get_EstudouEmEscolaPublica()
    {
        return $this->possuiEnsinoPublico;
    }

    public function set_EstudouEmEscolaPublica(bool $estudou)
    {
        $this->possuiEnsinoPublico = $estudou;
    }    
}

?>