<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TaskList;


class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = TaskList::all();
        return view('tasklist.index', compact('tasks'));
    }

    public function create()
    {
        $task=request()->validate([
            'task'=>'string',
            'user_id'=>'integer',
        ]);
        TaskList::create($task);
        return redirect()->route('index');
    }

    public function destroy(TaskList $task){
        $task->delete();
        return redirect()->route('index');
    }
}
