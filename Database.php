<?php
class Database{

    private string $host = "127.0.0.1";
    private string $username = "root";
    private string $password = "";
    private string $dbname = "VestibularDb";

    private PDO $conn;

    public function __construct()
    {
        try{
    
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Ocorreu um erro ao tentar acessar ao banco de dados: " . $e->getMessage();
        }
    }

    public function ExecuteCommand(string $sql)
    {
        try{
            return $this->conn->exec($sql);
        }
        catch (PDOException $e)
        {
            echo "Falha ao executar Comando: " . $sql . "<br>Motivo: " . $e->getMessage();
        }
        
    }

    public function Query(string $sql)
    {
        try{
            return $this->conn->query($sql);
        }
        catch (PDOException $e)
        {
            echo "Falha ao executar Query: " . $sql . "<br>Motivo: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        unset($this->conn);
    }
}
?>