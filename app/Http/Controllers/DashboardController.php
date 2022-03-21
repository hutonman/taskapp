<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DashboardController extends Controller
{
    public function index() {
        $tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 0)->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(5);
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks]);
    }

    // public function overDeadline() {
    //     $tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 0)->where('deadline' , '<', new Date() )->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(2);
    //     return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks]);
    // }

    // public function completed() {
    //     $tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 1)->select('tasks.id', 'users.name', 'tasks.title', 'tasks.deadline', 'users.email')->paginate(2);
    //     return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks]);
    // }
}
