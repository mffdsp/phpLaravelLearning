<?php

namespace App\Models;

use PDO;

class Student {

    public function __CONSTRUCT()
	{
        $this->attributes = [
            'nome' => [
              'type' => 'string',
              'validate' => 'required',
              'size' => '50',
            ],
            'matricula' => [
                'type' => 'string',
                'validate' => 'required',
                'size' => '50',
              ],
            'cpf' => [
                'type' => 'string',
                'validate' => 'required',
                'size' => '50',
              ],
            'endereco' => [
                'type' => 'string',
                'validate' => 'required',
                'size' => '50',
            ],
            'email' => [
                'type' => 'string',
                'validate' => 'required',
                'size' => '50',
              ],
         ];
    }

    public function create($record){

        $fields = array_keys($this->attributes);
    
    }


}


?>