<?php

namespace App\Http\Controllers;

use App\Models\ajuan_penelitianModel;
use App\Models\kum_penelitianModel;
use App\Models\kum_pengabdianModel;
use App\Models\p3mModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewlprnController extends Controller
{

    public function upp3m(Request  $id)
    {
        // $data = new M_news();
        $pagetitle = 'Proposal Pengabdian Masyarakat';
        $user = Auth::user();
        $data = User::find($id);
        if ($user->role == 'admin') {
            // Kalau admin, ambil semua data
            $penelitians = p3mModel::with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Kalau bukan admin, ambil yang sesuai user_id
            $penelitians = p3mModel::where('user_id', $user->id)
                ->with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // $penelitians = p3mModel::where('user_id', $user->id)
        //     // ->orWhereNull('user_id')
        //     ->orderBy('created_at', 'desc')
        //     ->with('anggotap3m')
        //     ->get();
        // dd($penelitians);
        return view('plppm.lpengabdian', compact('user', 'data', 'penelitians', 'pagetitle'));
    }

    public function ajuanpeneliti(Request  $id)
    {
        // $data = new M_news();
        $pagetitle = 'Proposal Penelitian Masyarakat';
        $user = Auth::user();
        $data = User::find($id);
        if ($user->role == 'admin') {
            // Kalau admin, ambil semua data
            $penelitians = ajuan_penelitianModel::with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Kalau bukan admin, ambil yang sesuai user_id
            $penelitians = ajuan_penelitianModel::where('user_id', $user->id)
                ->with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        // dd($penelitians);
        return view('plppm.lpeneleitian', compact('user', 'data', 'penelitians', 'pagetitle'));
    }

    public function kpengabdianp3m()
    {
        $user = Auth::user();
        $pagetitle = 'Laporan Pengabdian Masyarakat';
        if ($user->role == 'admin') {
            // Kalau admin, ambil semua data
            $penelitians = kum_pengabdianModel::with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Kalau bukan admin, ambil yang sesuai user_id
            $penelitians = kum_pengabdianModel::where('user_id', $user->id)
                ->with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('plppm.kpengabdian', compact('user', 'pagetitle', 'penelitians'));
    }

    public function kpeneliti(Request  $id)
    {
        // $data = new M_news();
        $pagetitle = 'Laporan Penelitian Masyarakat';
        $user = Auth::user();
        $data = User::find($id);
        if ($user->role == 'admin') {
            // Kalau admin, ambil semua data
            $penelitians = kum_penelitianModel::with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Kalau bukan admin, ambil yang sesuai user_id
            $penelitians = kum_penelitianModel::where('user_id', $user->id)
                ->with('anggotap3m')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        // dd($penelitians);
        return view('plppm.kpenelitian', compact('user', 'data', 'penelitians', 'pagetitle'));
    }

    public function dajupeneliti($tipe, $id, $request)
    {
        $user = Auth::user();
        $pagetitle = 'Detail Data Proposal';
        // $tipe = ajuan_penelitianModel::with('anggotap3m')->findOrFail($id);
        switch ($tipe) {
            case 'ajupengab':
                $data = p3mModel::with('anggotap3m')->findOrFail($id);
                break;
            case 'ajupenel':
                $data = ajuan_penelitianModel::with('anggotap3m')->findOrFail($id);
                break;
            // case 'kpenel':
            //     $data = kum_penelitianModel::with('anggotap3m')->findOrFail($id);
            //     break;
            // case 'kpengab':
            //     $data = kum_pengabdianModel::with('anggotap3m')->findOrFail($id);
            //     break;
            default:
                abort(404);
        }
        if ($user->role != 'admin' && $data->user_id != $user->id) {
            abort(403, 'Kamu tidak boleh mengakses data ini.');
        }

        // searching data
        if ($request->get('search')) {
            $keyword = $request->get('search');

            if ($tipe === 'ajupengab') {
                $data = p3mModel::with('anggotap3m')
                    ->where('id', $id)
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->firstOrFail();
            } elseif ($tipe === 'ajupenel') {
                $data = ajuan_penelitianModel::with('anggotap3m')
                    ->where('id', $id)
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->firstOrFail();
            }
        }

        return view('detail.detail', [
            'penelitians' => $data,
            'pagetitle' => $pagetitle,
            'tipe' => $tipe,
            'user' => $user,
            'layout' => ($user->role === 'admin') ? 'layout.main' : 'layout.doslayout'
        ]);
    }

    public function kumpengneli($tipe, $id)
    {
        $user = Auth::user();
        $pagetitle = 'Detail Data Laporan';
        // $tipe = ajuan_penelitianModel::with('anggotap3m')->findOrFail($id);
        switch ($tipe) {
            case 'kpengeabdian':
                $data = kum_pengabdianModel::with('anggotap3m')->findOrFail($id);
                break;
            case 'kpeneliti':
                $data = kum_penelitianModel::with('anggotap3m')->findOrFail($id);
                break;
            // case 'kpenel':
            //     $data = kum_penelitianModel::with('anggotap3m')->findOrFail($id);
            //     break;
            // case 'kpengab':
            //     $data = kum_pengabdianModel::with('anggotap3m')->findOrFail($id);
            //     break;
            default:
                abort(404);
        }

        return view('detail.detailk', [
            'penelitians' => $data,
            'type' => 'penelitian',
            'user' => $user,
            'pagetitle' => $pagetitle,
            'layout' => ($user->role === 'admin') ? 'layout.main' : 'layout.doslayout'
        ]);
    }
}
