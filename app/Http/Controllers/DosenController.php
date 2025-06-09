<?php

namespace App\Http\Controllers;

use App\Models\anggotap3mModel;
use App\Models\M_categories;
use App\Models\p3mModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function dash(Request $id)
    {
        // $data = new M_news();
        $user = Auth::user();
        $data = User::find($id);
        // $jurnal = JurnalModel::get();
        // if ($request->get('search')) {
        //     $data = M_news::where('title', 'like', '%' . $request->get('search') . '%');
        // }
        // $pagetitle = 'Jurnal P3M';
        // $data = $data->get();
        // return view('jurnal.index', compact('jurnal', 'pagetitle', 'user'));
        return view('dosen.dash', compact('user', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $user = Auth::user();

        return view('dosen.profildos', compact('data', 'user'));
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'nullable',
            'image'     => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = User::find($id);

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $user = Auth::user();


        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }
        $image = $request->file('image');

        if ($image) {

            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'photo-user/' . $filename;

            if ($find->image) {

                // $image->storeAs('public/photo-user/', $image->hashName());
                Storage::disk('public')->delete('photo-user/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($image));

            $data['image'] = $filename;
        }
        $find->update($data);

        return redirect()->route('dosen.profil', ['id' => Auth::id()]);
    }

    public function upp3m(Request  $id)
    {
        // $data = new M_news();
        $pagetitle = 'Penelitian dan Pengabdian Masyarakat';
        $user = Auth::user();
        $data = User::find($id);
        $penelitians = p3mModel::where('user_id', $user->id)
            // ->orWhereNull('user_id')
            ->orderBy('created_at', 'desc')
            ->with('anggotap3m', 'kategori')
            ->get();
        // dd($penelitians);
        return view('dosen.upp3m', compact('user', 'data', 'penelitians', 'pagetitle'));
    }

    public function addp3m()
    {
        $user = Auth::user();
        $pagetitle = 'Penelitian dan Pengabdian Masyarakat';
        $categories = M_categories::all();
        return view('dosen.addp3m', compact('user', 'pagetitle', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //untuk data
            'judul' => 'required',
            'bidang' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'lamapenelitian' => 'required',
            'biaya' => 'required',
            'uppdf' => 'required|mimes:pdf|max:2048',
            //untuk profil
            'ketua' => 'required',
            'jabatan' => 'required',
            'nidn' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required|in:L,P',
            'prodi' => 'required',
            //untuk up gambar
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',

            //untuk input anggota
            'anggota' => 'required|array',
            'anggota.*.nama' => 'required|string|max:100',
            'anggota.*.prodi' => 'nullable|string|max:100',
            'anggota.*.jabatan' => 'nullable|string|max:100',

            //untuk user login yang up this data
            // 'user_id' => auth()->user()->id,
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // dd($validator->errors());
        //proses up data 
        $image = $request->file('foto');
        $filename = date('d-m-Y') . $image->getClientOriginalName();
        $path = 'photo-upp3m/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        //proses up pdf
        $uppdf = $request->file('uppdf');
        $filenamepdf = date('d-m-Y') . $uppdf->getClientOriginalName();
        $pathpdf = 'uppdf/' . $filenamepdf;
        Storage::disk('public')->put($pathpdf, file_get_contents($uppdf));

        $penelitian = p3mModel::create([
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'bidang' => $request->bidang,
            'kategori_id' => $request->kategori_id,
            'lokasi' => $request->lokasi,
            'lamapenelitian' => $request->lamapenelitian,
            'biaya' => $request->biaya,
            'uppdf' => $filenamepdf,
            'ketua' => $request->ketua,
            'jabatan' => $request->jabatan,
            'nidn' => $request->nidn,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'prodi' => $request->prodi,
            'foto' => $filename,
            // 'anggota' => json_encode($request->anggota),
        ]);

        foreach ($request->anggota as $anggota) {
            anggotap3mModel::create([
                'p3m_model_id' => $penelitian->id,
                'nama' => $anggota['nama'],
                'prodi' => $anggota['prodi'],
                'jabatan' => $anggota['jabatan'],
            ]);
        }

        // dd($request->all());
        return redirect()->route('dosen.upp3m')->with('success', 'Data berhasil disimpan!');
    }



    public function logout()
    {
        // dd('oke');
        Auth::logout();
        return redirect()->route('tampilan');
    }
}
