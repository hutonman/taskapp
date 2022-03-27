<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $tasks = Task::join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 0)->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(5);
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks]);
    }

    public function over() {
        $tasks = Task::join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 0)->where('deadline' , '<', date('Y-m-d') )->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(5);
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks, 'over' => true]);
    }

    public function status() {
        $tasks = Task::join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 1)->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(5);
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks, 'status' => true]);
    }

    public function search(Request $request) {
        $tasks = Task::join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->where('title', 'like', "%$request->search%")->orWhere('content', 'like', "%$request->search%")->paginate(5);
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks, 'keyword' => $request->search]);
    }
}
