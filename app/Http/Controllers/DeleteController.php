<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function index() {
        DB::table('tasks')->where('id', $_GET['id'])->delete();
        return redirect('dashboard');
    }
}
