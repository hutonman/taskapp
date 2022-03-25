<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function index(Request $request) {
        DB::table('tasks')->where('id', $request->id)->delete();
        return redirect('dashboard');
    }
}
