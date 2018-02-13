@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="/create/todo">
                {{csrf_field()}}
                <input type="text" class="form-control" name="todo" placeholder="create a new todo">
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    @foreach($todos as $todo)


        {{$todo->todo}} at {{$todo->created_at}}


        <a href="{{route('todo.delete',['id'=>$todo->id])}}" class="btn-danger">x</a>
        <a href="{{route('todo.update',['id'=>$todo->id])}}" class="btn-primary">update</a>
        @if(!$todo->completed)
        <a href="{{route('todo.completed', ['id'=>$todo->id])}}" class="btn-success">Mark As Completed</a>
            @else
            <span class="text-success">Completed!</span>
        @endif
        <hr>

    @endforeach
    @endsection