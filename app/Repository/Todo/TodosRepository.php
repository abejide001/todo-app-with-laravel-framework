<?php

namespace App\Repository\Todo;
use App\Todo;

class TodosRepository implements TodosRepositoryInterface{
    public function __construct(Todo $todo)
    {
        $this->todo=$todo;
    }
    public function get(){
        return $this->todo->all();
    }
    public function find($id){
        return $this->todo->find($id);
    }
}