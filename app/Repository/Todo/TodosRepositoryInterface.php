<?php

namespace App\Repository\Todo;

interface TodosRepositoryInterface{
    public function get();
    public function find($id);
}