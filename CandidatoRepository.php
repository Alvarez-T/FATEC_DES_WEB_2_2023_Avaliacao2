<?php

require 'Repository.php';

class CandidatoRepository extends Repository
{
    public function __construct(Database $database)
    {
        parent::__construct($database); 
    }

    public function Create($value)
    {
        $sql = "Insert into Candidato values ( 
            null,
            '" . $value->get_Nome() . "', 
            '" . $value->get_Cpf() . "' ,
            '" . $value->get_Telefone() . "' , 
            '" . $value->get_EstudouEmEscolaPublica() . "')";
            
        if ($this->database->ExecuteCommand($sql) == 0)
        {
            throw new ErrorException("Não foi possível cadastrar Candidato");
        }
        
        $sqlId = "Select LAST_INSERT_ID();";

        $queryResult = $this->database->Query($sqlId);
        $id = $queryResult->fetch()[0];

        $value->set_Codigo(intval($id));
    }

    public function Update($value)
    {
        $sql = "Update Candidato set 
            nome = '" . $value->get_Nome() . "', 
            cpf = '" . $value->get_Cpf() . "', 
            telefone = '" . $value->get_Telefone() . "', 
            ensinoPublico = " . $value->get_EstudouEmEscolaPublica() . "
            WHERE Codigo = " . $value->get_Codigo() . ";";

        $this->database->ExecuteCommand($sql);
    }

    public function GetAll()
    {
        $sql = "Select * from Candidato";
       return $this->database->Query($sql);
    }

    public function Delete($value)
    {
        $sql = "Delete from Candidato where Codigo = " . $value->get_Codigo();
        $this->database->ExecuteCommand($sql);
    }
}

?>