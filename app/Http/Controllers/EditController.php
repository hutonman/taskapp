<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index(Request $request) {
        $task = Task::where('id', $request->id)->first();
        return view('edit', ['task' => $task]);
    }

    public function edit(Request $request) {
        $task = Task::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);
        $task = Task::where('id', $request->id)->first();
        return view('detail', ['task' => $task]);
    }
}
