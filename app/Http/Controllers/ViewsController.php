<?php

namespace App\Http\Controllers;

use App\Models\m_dashboard;
use App\Models\M_news;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function tampilan()
    {
        $dash = m_dashboard::all();
        return view('tampilan.index',  compact('dash'));
    }

    public function berita()
    {
        $berita = M_news::all();
        return view('tampilan.berita', compact('berita'));
    }
}
