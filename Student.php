<?php

namespace App\Models;
use PDO;

class Student{

    private $pdo;

    public $CPF;
    public $matricula;
    public $email;
    public $nome;
    public $endereco;

    public function __CONSTRUCT()
	{
		try{
            //$this->pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=elpis;user=postgres;password=felismino");
            //Instancia do postgre
            return "ALUNOS CONSTRUTOR";

		}catch(Exception $e){
			die($e->getMessage());
		}
    }

    public function setCPF($CPF){
        $this->CPF = $CPF;
    }

    public function getCPF(){
       return $this->CPF;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getMatricula(){
       return $this->matricula;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
       return $this->email;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
       return $this->nome;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getEndereco(){
       return $this->endereco;
    }





}


?>