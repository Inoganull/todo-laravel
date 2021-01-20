@extends('todo.layout')

@section('content')

    <div class="border-b pb-4 p-4">
        <h1 class="text-2xl flex justify-center">{{$todo->title}}</h1>
        
        <a href="{{route('todo.index')}}" class="text-gray-500 cursor-pointer">
            <span class="fas fa-arrow-alt-circle-left"/>
        </a>

    </div>

    <div>
        <div class="p-2 rounded border">
            <p class="flex justify-center inset-x-0 top-0 bg-yellow-500 rounded border">Category: {{$todo->category}}</p>
            <p class="p-2">{{$todo->description}}</p>            
        </div>
    </div>

@endsection