<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller{
    

    public function index(){
        return view('teachersView', ['teacher' => null]);
    }

    public function store(Request $request){
        try{
            
            $teacher = [
                'cpf' => $request->cpf,
                'turmas' =>  $request->turmas,
                'email' => $request->email, 
                'nome' => $request->nome,
                'imagem' => 'imagePath',
            ];
            
            Teacher::create($teacher);
            return $teacher;

        }catch(Exception $e){
            echo $e.getMessege();
        }
    }
    
    //Utilizo do slug, id, endpoint p acessar o bd.
    public function read($id = null){

        if($id == null){
            $teacher = Teacher::get();
        }else {
            $teacher = Teacher::where('cpf', $id)->get();
        }           
        return view('teachersView', ['teacher' => $teacher]);
    }


    public function update($id, Request $request){
        parse_str(file_get_contents('php://input'), $_PUT);

        try{

            $teacher = [
                'cpf' => $request->cpf,
                'turmas' =>$request->turmas,
                'email' => $request->email,
                'nome' => $request->nome,
            ];
            $teacher = Teacher::where('cpf', $request->cpf)->update($teacher);

            return view('teachersView', ['teacher' => $teacher]);

        }catch(Exception $e){
            echo $e.getMessege();
        }


    }

    public function delete($id){
        try{
        $teacher = Teacher::where('cpf', $id)->delete();
        
        return view('teachersView', ['teacher' => $teacher]);
        } catch(Exception $e){
            echo $e.getMessage();

        }
    }

    public function uploadImage(Request $request, $id){

        if($request->file('imagem')){
            $file = $request->file('imagem');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . $ext;
            $file->move('uploads/images/', $filename);

        }else {
            return $file;
        }

        $teacher = Teacher::where('cpf', $id)->get()->first();

        if($teacher) {
            
            $newTeacher = [
                'nome' => $teacher->nome,
                "turmas" =>  $teacher->turmas,
                "cpf" =>  $teacher->cpf,
                "email" =>  $teacher->email,
                "imagem" => $filename
            ];

            return Teacher::where('cpf', $id)->update($newTeacher);
        }else return 'NOT FOUND';
        
    }

    public function downloadImage(Request $request, $id){

        $teacher = Teacher::where('cpf', $id)->get()->first();

        if($teacher){
           return redirect('uploads/images/' . $teacher->imagem);
        }else return 'NOT FOUND';
        
    }
   
}
