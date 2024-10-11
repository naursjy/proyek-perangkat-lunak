<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function tampilan()
    {

        return view('tampilan.index');
    }
}
