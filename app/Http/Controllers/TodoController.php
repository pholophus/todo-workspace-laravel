<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todolist $todolist)
    {
        $this->authorize('view', $todolist);
        $todos = $todolist->todos()->get();
        $carbon = Carbon::now();

        return view('todo.index', compact('todos', 'carbon', 'todolist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Todolist $todolist)
    {
        $this->authorize('create', $todolist);

        $validated = $request->validate([
            'name' => 'required|string',
            'date' => 'required',
            'time' => 'required'
        ]);

        $todo = new Todo();

        $todo->todo = $validated['name'];
        $todo->status = 0;
        $todo->due = new Carbon($validated['date'].' '.$validated['time']);

        $todolist->todos()->save($todo);

        return redirect()->route('todo.index', $todolist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        
        $validated = $request->validate([
            'status' => 'required',
            'todo' => 'required|string'
        ]);

        $todo->todo = $validated['todo'];
        $todo->status = $validated['status'] == 1 ? 0 : 1;

        $todo->save();

        return response()->json([
          'success' => true  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
