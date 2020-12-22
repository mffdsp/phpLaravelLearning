<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDO;


//require_once 'App/Models/Student.php';

class StudentController extends Controller{
    
    
    protected $model;//??

    public function __construct(){
        $this->model =  new Student;
        
    }

    public function index(){
        return view('alunos');
    }

    public function post(Request $request){
        try{
            $student = [
                'cpf' => $_POST['cpf'],
                'matricula' => $_POST['matricula'],
                'email' => $_POST['email'],
                'nome' => $_POST['nome'],
                'endereco' => $_POST['endereco'],
            ];
            $this->model->create($student);

            DB::table('students')->insert($student);
            return $student;

        }catch(Exception $e){
            echo $e.getMessege();
        }
    }
    
    //Utilizo do slug, id, endpoint p acessar o bd.
    public function get($id = null){

        if($id == null){
            $student = DB::table('students')->get();
        }else {
            $student = DB::table('students')->where('cpf', $id)->get();
        }

        return view('alunos', ['student' => $student]);
    }


    public function put($id){
        parse_str(file_get_contents('php://input'), $_PUT);

        try{

            $student = [
                'cpf' => $_PUT['cpf'],
                'matricula' => $_PUT['matricula'],
                'email' => $_PUT['email'],
                'nome' => $_PUT['nome'],
                'endereco' => $_PUT['endereco'],
            ];

            DB::table('students')->where('cpf', $id)->update($student);

            return $student;

        }catch(Exception $e){
            echo $e.getMessege();
        }


    }

    public function delete($id){
        try{
        $student = DB::table('students')->where('cpf', $id)->delete();
        
        return view('alunos', ['student' => $student]);
        } catch(Exception $e){
            echo $e.getMessage();

        }
    }
   
}
