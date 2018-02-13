@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{route('todos.save', ['id'=>$todos->id])}}">
                {{csrf_field()}}
                <input type="text" class="form-control" name="todo" value="{{$todos->todo}}">
            </form>
        </div>
    </div>
    @endsection