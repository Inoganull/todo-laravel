@extends('todo.layout')

@section('content')
    <div class="flex justify-between border-b pb-4 p-4">
        <h1 class="text-2xl">Update todo list</h1>
        <a href="{{route('todo.index')}}" class="text-gray-500 cursor-pointer">
            <span class="fas fa-arrow-alt-circle-left"/>
        </a>
    </div>

    <x-alert/>
    <form method="post" action="{{route('todo.update', $todo->id)}}" class="py-5">
        @csrf
        @method('patch')
        <div class="py-1">
        <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded" placeholder="title">
        </div>

        <div class="py-1">
        <textarea name="description" cols="30" rows="10" class="p-2 rounded border" placeholder="description">{{$todo->description}}</textarea>
        </div>

        

        <div class="py-1">
            <input type="hidden" name="completed" value="0">
            <input type="checkbox" name="completed" id="completed" value="1">
            <label for="completed">Task Completed</label>
        </div>

        <div class="py-1">
        <input type="submit" value="Update" class="p-2 border bg-yellow-400 rounded-lg">
        </div>
    </form>

@endsection
