<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tasks = Tasks::all();
        // return view('tasks.index', ['tasks' => $tasks]);
        return view('tasks.index', compact('tasks')); // -> resources/views/tasks/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add() {
        return view('tasks.index');  // -> resources/views/tasks/index.blade.php(adding)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // Validation for required fields
        $request->validate([
            'name' => 'required',
        ]);

        // Getting values from the blade template form
        $task = new Tasks([
            'name' => $request->get('name'),
        ]);
        $task->save();
        return redirect('/')->with('success', 'Task saved...'); // -> resources/views/tasks/index.blade.php
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $task = Tasks::find($id);
        $task->delete(); // Easy right?
        return redirect('/')->with('success', 'Task removed...'); // -> resources/views/tasks/index.blade.php
    } 
}
