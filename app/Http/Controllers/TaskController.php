<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => ['required', 'max:200'],
        ]);
    
        $userId = Auth::id();
    
        Task::create([
            'description' => $validatedData['description'],
            'status' =>  false,
            'user_id' => $userId
        ]);
    
        return redirect('/tasks');
    }


    public function index()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $userId = Auth::id();

        $tasks =  Task::with('user')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function markDone(Task $task)
    {
        $task->update([
            'status' => true,
        ]);

        return redirect('/tasks');
    }

    public function markUndone(Task $task)
    {
        $task->update([
            'status' => false,
        ]);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }

}
