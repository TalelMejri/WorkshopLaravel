<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        $todos=Todo::All();
        return view("todos",["tab"=>$todos]);
    }

    public function getTodoById($id){
        $todo=Todo::find($id);
        return view("details",["val"=>$todo]);
    }

    public function deleteTodo($id){
        $todo=Todo::find($id);
        $message="";
        if($todo==null){
            $message="Todo with $id Not Found";
        }else{
            $todo->delete();
        }
        $todos=Todo::All();
        return view("todos",["tab"=>$todos,"message"=>$message]);
    }


    public function ShowFormulaire(){
        return view("create_todo");
    }

    public function AddTodo(Request $request){

        $todo=new Todo();
        $todo->title=$request->titre;
        $todo->description=$request->description;
        $todo->save();

        // $todo=Todo::create([
        //     "title"=>$request->titre,
        //     "description"=>$request->description
        // ]);

        $todos=Todo::All();
        return view("todos",["tab"=>$todos]);
    }

    public function ShowUpdateForm($id){
        $todo=Todo::find($id);
        return view("UpdateTodo",["val"=>$todo]);
    }
    public function UpdateTodo(Request $request){

        $todo=Todo::find($request->id);
        // $todo->title=$request->titre;
        // $todo->description=$request->description;
        // $todo->save();

        $todo->update([
            "title"=>$request->titre,
            "description"=>$request->description
        ]);
      
        $todos=Todo::All();
        return view("todos",["tab"=>$todos]);
    }
}
