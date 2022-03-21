<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->where('users.email', Auth::user()->email)->where('status' , 0)->select('users.name', 'tasks.title', 'tasks.deadline', 'users.email')->get();
        return view('dashboard', ['user' => Auth::user(), 'tasks' => $tasks]);
    }
}
