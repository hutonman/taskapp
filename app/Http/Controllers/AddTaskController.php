<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        
        DB::table('tasks')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('dashboard');
    }
}
