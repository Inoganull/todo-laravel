@extends('todo.layout')

@section('content')

    <a href="/home"><span class="fas fa-user-circle"/></a>

    <div class="flex justify-between border-b pb-4 p-4">
        <h1 class="text-2xl">Daily todo list</h1>
        <a class="mx-5 py-1 text-green-300 cursor-pointer" href="/todo/create">
            <span class="fas fa-plus-circle"/>
        </a>
    </div>

    <ul class="my-5">
    <x-alert/>
        @forelse($todos as $todo)
        <li class="flex justify-between p-2">
        <div>
            @include('todo.completedButton')
        </div>

            @if($todo->completed)
                <p class="line-through">{{$todo->title}}</p>
                @else
                <a class="cursor-pointer" href="{{'/todo/'.$todo->id.'/show'}}">{{$todo->title}}</a>
            @endif

            <div>                
                <a class="text-yellow-500 cursor-pointer" href="{{'/todo/'.$todo->id.'/edit'}}">
                    <span class="fas fa-edit px-2"/>
                </a>

                <span class="fas fa-trash text-red-500 cursor-pointer px-2" 
                        onclick="event.preventDefault();
                                if(confirm('Are you really want to delete?')){
                                    document.getElementById('form-delete-{{$todo->id}}').submit()
                                }"/>
                        
                <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy', $todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
            
        </li>
        @empty
                                <p>Welcome to todo list.Now you can start create new task.</p>
        @endforelse
    </ul>

@endsection