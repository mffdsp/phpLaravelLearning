<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use PDO;

//require_once 'App/Models/Student.php';

class StudentController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=elpis;user=postgres;password=felismino");
        $data = new Student();
        // $data->nome = $_REQUEST['nome'];
        // $data->endereco = $_REQUEST['endereco'];
        // $data->cpf = $_REQUEST['cpf'];
        // $data->email = $_REQUEST['email'];
        // $data->matricula = $_REQUEST['matricula'];

        //Example
        $data->nome = "Mateus";
        $data->endereco = "Cidade 01";
        $data->cpf = "079797979";
        $data->email = "something@example.com";
        $data->matricula = "sdadsoakdok";

        try {

		$sqlCmd = "INSERT INTO Students (cpf, matricula, email, nome, endereco) VALUES (?, ?, ?, ?, ?)";

		$pdo->prepare($sqlCmd)->execute(
				array(
                    $data->cpf, 
                    $data->matricula,
                    $data->email,
                    $data->nome,
                    $data->endereco,
                )
            );
            
            return('alunos');
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=elpis;user=postgres;password=felismino");
        try {

            
            $sqlCmd = "SELECT * FROM Students WHERE cpf = :id";
            $cmd = $pdo->prepare($sqlCmd);
            
            $stocks = [];
            while ($row = $cmd->fetch(\PDO::FETCH_ASSOC)) {
                $stocks[] = [
                    'nome' => $row['nome'],
                    'cpf' => $row['cpf'],
                    'endereco' => $row['endereco']
                ];
            }
            return $stocks;
            
        } catch (Exception $e) {
			die($e->getMessage());
		}
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
