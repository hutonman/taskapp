<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function index(Request $request) {
        $task = DB::table('tasks')->where('id', $request->id)->first();
        return view('edit', ['task' => $task]);
    }

    public function edit(Request $request) {
        $task = DB::table('tasks')->where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);
        $task = DB::table('tasks')->where('id', $request->id)->first();
        return view('detail', ['task' => $task]);
    }
}
