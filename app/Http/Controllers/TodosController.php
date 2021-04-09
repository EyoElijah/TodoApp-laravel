<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    public function index()
    {
        // fetch all todo from database
        $todos = Todo::all();
        // display them in the todos.index
        return view('todos.index')->with('todos', $todos);
        // return view('todos.index', compact('todos'));
    
    }
    public function show(Todo $todo)
    {
        // $todo = Todo::find($todo_id);
        return view('todos.show')->with('todo', $todo); 
    }
    public function create()
    {
        return view('todos.create');
    }

    public function store ()
    {

        $this->validate(request(),
        [
            'name'=>'required|min:6|max:20',
            'description'=>'required',
        ]
        );
        
        $todo = new Todo();
        $data = Request()->all() ;

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed=false;

        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/todos');

    }

    public function edit(Todo $todo)
    {
        // $todo = Todo::find($todo_id);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $this->validate(request(),
        [
            'name'=>'required|min:6|max:20',
            'description'=>'required',
        ]
        );

        // $todo =  Todo::find($todo_id);

        $data = Request()->all() ;

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        // $todo->completed=false;

        $todo->save();

        session()->flash('success', 'Todo updated successfully');


        return redirect('/todos');

        
    }
    public function destroy(Todo $todo)
    {
        // $todo = Todo::find($todo_id);

        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');
        
        return redirect('/todos');
    }
    
    public function complete(Todo $todo)
    {
        $todo->completed=true;
        $todo->save();
        session()->flash('success', 'Todo completed successfully');
        return redirect('/todos');
    }
}