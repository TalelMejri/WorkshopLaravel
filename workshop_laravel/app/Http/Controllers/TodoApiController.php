<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoApiController extends Controller
{
    public function getTodo(){
        $todos=Todo::All();
        return response()->json(["data"=>$todos],200);
    }

    public function addTodo(Request $request){

        // $todo=new Todo();
        // $todo->title=$request->titre;
        // $todo->description=$request->description;
        // $todo->save();

        Todo::create([
            "title"=>$request->titre,
            "description"=>$request->description
        ]);
        return response()->json(["message"=>"todoAdded"],201);
    }

    public function deleteTodo($id){
        $todos= Todo::find($id);
        $message ="";
        if($todos==null){
            $message="todo with $id not found";
            return response()->json(["message"=>$message],404);
        }
        else{
            $todos->delete();
            return response()->json(["message"=>"todo deleted"],200);
        }
    }

    public function UpdateTodo(Request $request, $id){
        $todo=Todo::find($id);
        if($todo==null){
            return response()->json(["message"=>"Todo Not Found"],404);
        }
        $todo->update([
            "title"=>$request->titre,
            "description"=>$request->description
        ]);
        return response()->json(["message"=>"Update Done"],200);
    }

    public function getTodoById($id){
        $todo=Todo::find($id);
        return response()->json(["data"=>$todo],200);
    }

}
