<?php
require 'Database.php';
require 'Candidato.php';
require 'CandidatoRepository.php';

$db = new Database();
$repository = new CandidatoRepository($db);

$candidato1 = new Candidato();
$candidato1->set_Nome("Thiago");
$candidato1->set_Cpf("1234");
$candidato1->set_Telefone("19988043877");
$candidato1->set_EstudouEmEscolaPublica(true);

$candidato2 = new Candidato();
$candidato2->set_Nome("Vinicius");
$candidato2->set_Cpf("1132321231");
$candidato2->set_Telefone("134123132");
$candidato2->set_EstudouEmEscolaPublica(true);

echo "<h1> Inserindo cadastro " . $candidato1->get_Nome() . " </h1>";
$repository->Create($candidato1);

echo "<h1> Inserindo cadastro " . $candidato2->get_Nome() . " </h1>";
$repository->Create($candidato2);

$candidatos = $repository->GetAll();
foreach($candidatos as $row)
{
    echo 'Dados do Candidato: ';
    echo '<br>';
    echo 'Codigo: ' . $row['codigo'];
    echo '<br>';
    echo 'Nome: ' . $row['nome'];
    echo '<br>';
    echo 'Cpf: ' . $row['cpf'];
    echo '<br>';
    echo 'Telefone: ' . $row['telefone'];
    echo '<br>';
    echo 'Estudou em escola publica: ' ;
    if ($row['ensinoPublico'])
        echo 'Sim';
    else
        echo 'Não';

    echo '<br>';
    echo '<br>';
}

$candidato1->set_Nome("Thiago Alvarez");
$candidato1->set_Cpf("1551513213");

echo "<h1> Atualizando cadastro " . $candidato1->get_Codigo() . " </h1>";
$repository->Update($candidato1);

echo "<h1> Deletando cadastro " . $candidato2->get_Codigo() . " </h1>";
$repository->Delete($candidato2);

?>