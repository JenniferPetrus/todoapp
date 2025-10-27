<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'done' => 'boolean',
        ]);
        $task = Task::create($request->only(['title', 'done']));
        return response()->json([
            'success' => true,
            'data' => $task,
        ]);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        if(!$task){
        return response()->json([
            'success' => false,
            'message' => 'Task not found',
        ]);
        }
        $request->validate([
            'title' => 'required|max:255',
            'done' => 'boolean',
        ]);
        $task->update($request->only('title', 'done'));
        return response()->json([
            'success' => true,
            'data' => $task,
        ]);
    }

    public function destroy($id){
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'success' => false,
                'message' => 'Task not found',
            ]);
        }
        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully',
        ]);

    }
}
