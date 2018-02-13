<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Repository\Todo\TodosRepository;
class TodosController extends Controller
{
    public function __construct(TodosRepository $todo)
    {
            $this->todo=$todo;
    }

    public function index(){
        $todos=$this->todo->get();

        return view('todos')->with('todos', $todos);
    }
    public function store(Request $request){
            $todo=new Todo;
            $todo->todo=$request->input('todo');
            $todo->save();
            return redirect('/')->with('success', 'Todo Created Sucessfully');

    }
    public function delete($id){
            $todos=$this->todo->find($id);

            $todos->delete();
            return redirect()->back()->with('success', 'Todo deleted Successfully');
    }
    public function update($id){
        $todos=$this->todo->find($id);
        return view('update')->with('todos', $todos);
    }
    public function save(Request $request, $id){


        $todos=Todo::find($id);
        $todos->todo=$request->input('todo');
        $todos->save();
        return redirect('/')->with('success', 'Todo updated Sucessfully');
    }
    public function completed($id){
        $todos=Todo::find($id);
        $todos->completed=1;
        $todos->save();
        return redirect('/');
    }
}
