<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request) {
        $task = Task::where('id', $_GET['id'])->first();
        return view('detail', ['task' => $task]);
        // return view('detail');
    }
}
