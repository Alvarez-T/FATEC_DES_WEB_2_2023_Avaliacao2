<?php

abstract class Repository
{
    protected Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public abstract function Create($value);
    public abstract function Delete($value);
    public abstract function GetAll();
    public abstract function Update($value);
} 
?>