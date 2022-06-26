<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    //
    public function ownerIndex()
    {
        // 
        return view('pages.owner.index');
    }
    public function staffIndex()
    {
        // 
        return view('pages.staff.index');
    }
}
