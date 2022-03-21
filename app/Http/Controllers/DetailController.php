<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index(Request $request) {
        $task = DB::table('tasks')->where('id', $_GET['id'])->first();
        return view('detail', ['task' => $task]);
        // return view('detail');
    }
}
