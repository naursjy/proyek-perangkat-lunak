<?php

namespace App\Http\Controllers;

use App\Models\AgendaModel;
use App\Models\M_categories;
use App\Models\m_dashboard;
use App\Models\M_news;
use App\Models\m_panduan;
use App\Models\M_Pengelola;
use App\Models\M_tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

// use Illuminate\Database\Eloquent\Collection::sortBy() ;

class ViewsController extends Controller
{
    //home
    public function tampilan()
    {
        $pagetitle = 'Panduan P3M';
        $dash = m_dashboard::all();
        $berita = M_news::orderBy('created_at', 'desc')->get();
        $pengelola = M_Pengelola::all();
        $categories = M_categories::all();
        $tentang = M_tentang::all();
        $agenda = AgendaModel::all();
        return view('tampilan.index',  compact('pagetitle', 'dash', 'pengelola', 'categories', 'berita', 'tentang', 'agenda'));
    }

    //laman berita p3m
    public function berita()
    {
        $pagetitle = 'Panduan P3M';
        $berita = M_news::orderBy('created_at', 'desc')->get();
        $categories = M_categories::all();
        return view('tampilan.berita', compact('pagetitle', 'berita', 'categories'));
    }

    //list berita
    public function show($id): ViewView
    {
        $pagetitle = 'Panduan P3M';
        $berita = M_news::find($id);
        $categories = M_categories::all();
        $data = M_news::orderBy('created_at', 'desc')->take(5)->get();
        return view('tampilan.detail', compact('pagetitle', 'berita', 'categories', 'data'));
    }

    //detail berita
    public function showPortfolioDetails($id)
    {
        $pagetitle = 'Panduan P3M';
        $dat = M_news::find($id);
        $dat = M_news::orderBy('created_at', 'desc')->take(5)->get(); // Mengambil 3 berita terbaru
        return view('tampilan.detail', compact('pagetitle', 'dat', 'recentNews'));
    }

    //struktur P3M
    public function struktur()
    {
        // $dash = m_dashboard::all();
        // $berita = M_news::orderBy('created_at', 'desc')->get();
        $pagetitle = 'Panduan P3M';
        $pengelola = M_Pengelola::all();
        // $categories = M_categories::all();
        return view('tampilan.struktur',  compact('pengelola', 'pagetitle'));
    }

    //panduan
    public function panduan(Request $request)
    {
        $user = Auth::user();
        $panduan = m_panduan::all();
        $pagetitle = 'Panduan P3M';
        return view('tampilan.panduan', compact('panduan', 'pagetitle', 'user'));
    }

    //unduh panduan
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

    //tentang
    public function tentang(Request $request)
    {
        $tentang = M_tentang::all();
        $pagetitle = 'Informasi P3M';
        $berita =  M_news::orderBy('created_at', 'desc')->take(5)->get();
        return view('tampilan.tentang', compact('tentang', 'pagetitle', 'berita'));
    }

    //agenda
    public function agenda(Request $request)
    {
        $user = Auth::user();
        $agenda = AgendaModel::all();
        $kegiatan = AgendaModel::orderBy('created_at', 'desc')->take(5)->get();
        $pagetitle = 'Agenda Kegiatan P3M';
        return view('tampilan.agenda', compact('agenda', 'pagetitle', 'user', 'kegiatan'));
    }
    //list agenda
    public function listagenda($id)
    {
        $pagetitle = 'Panduan P3M';
        $agen = AgendaModel::find($id);
        $agenda = AgendaModel::orderBy('created_at', 'desc')->take(5)->get();
        return view('tampilan.detailagenda', compact('pagetitle', 'agen', 'agenda'));
    }
}
