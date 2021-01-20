<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoCreateRequest $request)
    {
        $userId = auth()->id();
        $request['user_id'] = $userId;
        Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'Lists Created Successfully');
    }

    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
        
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update($request->all());
        return redirect(route('todo.index'))->with('message', 'Update!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back();
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Delete Successful');
    }

    public function categoryList(Request $request)
    {
        $category = [
            'test'=>'category',
            'exam'=>'category',
            'practice'=>'category'];
        $selectedID = 3;
        
        return view('todo.create', compact($category, 'selectedID'));
    }

    
}
