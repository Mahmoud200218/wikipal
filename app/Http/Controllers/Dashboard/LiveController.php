<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function live(){
        return view('front/live/live');
    }
}
