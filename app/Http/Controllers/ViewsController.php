<?php

namespace App\Http\Controllers;

use App\Models\M_categories;
use App\Models\m_dashboard;
use App\Models\M_news;
use App\Models\m_panduan;
use App\Models\M_Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $panduan = m_panduan::all();
        $pagetitle = 'Panduan P3M';
        return view('tampilan.panduan', compact('panduan', 'pagetitle', 'user'));
    }

    public function unduh($id)
    {
        // Temukan file berdasarkan ID
        Log::info("Download attempt for ID: " . $id);
        $panduan = m_panduan::findOrFail($id);

        // Tentukan path file yang akan diunduh
        $filePath = public_path('uplouds/' . $panduan->generated_name); // Sesuaikan dengan lokasi penyimpanan file Anda
        // dd($filePath);
        Log::info("File path: " . $filePath);
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan: ' . $filePath);
        }
        Log::info("File found, preparing to download.");
        return response()->download($filePath, $panduan->original_name);
    }
}
