<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function index() {
     

     $tests = DB::table('tests')->get();
      
     return view('app', ['tests' => $tests]);
    }
}
