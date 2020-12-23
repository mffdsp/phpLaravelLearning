<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//require_once 'App/Models/Student.php';

class StudentController extends Controller{


    public function index(){
        return view('alunos', ['student' => null]);
    }

    public function store(Request $request){
        try{
            
            $student = [
                'cpf' => $request->cpf,
                'matricula' =>  $request->matricula,
                'email' => $request->email, 
                'nome' => $request->nome,
                'endereco' =>  $request->endereco,
            ];
            
            Student::create($student);
            return $student;

        }catch(Exception $e){
            echo $e.getMessege();
        }
    }
    
    //Utilizo do slug, id, endpoint p acessar o bd.
    public function read($id = null){


        if($id == null){
            $student = Student::get();
        }else {
            $student = Student::where('cpf', $id)->get();
        }

        return view('alunos', ['student' => $student]);
    }


    public function update($id, Request $request){
        parse_str(file_get_contents('php://input'), $_PUT);

        try{

            $student = [
                'cpf' => $request->cpf,
                'matricula' =>$request->matricula,
                'email' => $request->email,
                'nome' => $request->nome,
                'endereco' => $request->endereco,
            ];

            $student = Student::where('cpf', $request->cpf)->update($student);

            return view('alunos', ['student' => $student]);

        }catch(Exception $e){
            echo $e.getMessege();
        }


    }

    public function delete($id){
        try{
        $student = Student::where('cpf', $id)->delete();
        
        return view('alunos', ['student' => $student]);
        } catch(Exception $e){
            echo $e.getMessage();

        }
    }
   
}
