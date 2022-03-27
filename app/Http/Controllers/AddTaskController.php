<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddTaskController extends Controller
{
    public function index() {
        return view('add-task');
    }

    public function add(Request $request) {
        $request->validate([
            'title' => 'required|max:64',
            'deadline' => 'required',
        ]);
        
        Task::insert([
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('dashboard');
    }
}
