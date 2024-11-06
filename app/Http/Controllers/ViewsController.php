<?php

namespace App\Http\Controllers;

use App\Models\M_categories;
use App\Models\m_dashboard;
use App\Models\M_news;
use App\Models\m_panduan;
use App\Models\M_Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

// use Illuminate\Database\Eloquent\Collection::sortBy() ;

class ViewsController extends Controller
{
    public function tampilan()
    {
        $dash = m_dashboard::all();
        $berita = M_news::orderBy('created_at', 'desc')->get();
        $pengelola = M_Pengelola::all();
        $categories = M_categories::all();
        return view('tampilan.index',  compact('dash', 'pengelola', 'categories', 'berita'));
    }

    public function berita()
    {
        $berita = M_news::orderBy('created_at', 'desc')->get();
        $categories = M_categories::all();
        return view('tampilan.berita', compact('berita', 'categories'));
    }

    public function show($id): ViewView
    {
        $berita = M_news::find($id);
        $categories = M_categories::all();
        $data = M_news::orderBy('created_at', 'desc')->take(5)->get();
        return view('tampilan.detail', compact('berita', 'categories', 'data'));
    }

    public function showPortfolioDetails($id)
    {
        $dat = M_news::find($id);
        $dat = M_news::orderBy('created_at', 'desc')->take(5)->get(); // Mengambil 3 berita terbaru
        return view('tampilan.detail', compact('dat', 'recentNews'));
    }

    public function struktur()
    {
        // $dash = m_dashboard::all();
        // $berita = M_news::orderBy('created_at', 'desc')->get();
        $pengelola = M_Pengelola::all();
        // $categories = M_categories::all();
        return view('tampilan.struktur',  compact('pengelola'));
    }

    public function panduan(Request $request)
    {
        $user = Auth::user();
        $pands = m_panduan::get();
        $pagetitle = 'Panduan P3M';
        return view('tampilan.panduan', compact('pands', 'pagetitle', 'user'));
    }
}
