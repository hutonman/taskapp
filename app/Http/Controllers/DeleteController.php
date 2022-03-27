<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function index(Request $request) {
        Task::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
}
