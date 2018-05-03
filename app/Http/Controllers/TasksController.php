<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;

use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function index() {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            return view('tasks.index', $data);
        } else {
            return view('welcome');
        }
    }
    
    public function create() {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task
        ]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'status' => 'required',
            'content' => 'required',
        ]);

        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        return redirect('/');
    }
    
    public function show($id) {
        if (\Auth::check()) {
            $task = Task::find($id);
            
            return view('tasks.show', [
                'task' => $task
            ]);
        } else {
            return view('welcome');
        }
    }
    
    public function edit($id) {
        if (\Auth::check()) {
            $task = Task::find($id);
            
            return view('tasks.edit', [
                'task' => $task,
            ]);
        } else {
            return view('welcome');
        }
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'content' => 'required',
            'status' => 'required',
        ]);

        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);        
        
        return redirect('/');
    }
    
    public function destroy($id) {
        $task = Task::find($id);
        
        if (\Auth::user()->id == $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');
    }
    
}