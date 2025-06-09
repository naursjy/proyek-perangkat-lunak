<?php

namespace App\Http\Controllers;

use App\Models\m_dashboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        $data = new User;
        $pagetitle = 'Users';
        $user = Auth::user();
        if ($request->get('search')) {
            $data = User::where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('email', 'like', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('index', compact('data', 'request', 'pagetitle', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('create', compact('user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());
        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'photo-user/' . $filename;
        $user = Auth::user();

        Storage::disk('public')->put($path, file_get_contents($image));

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;

        // dd($data);

        User::create($data);

        return redirect()->route('index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $user = Auth::user();

        return view('update', compact('data', 'user'));
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

        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

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

        return redirect()->route('user.index', compact('user'));
    }

    public function delete(Request $request, $id)
    {
        // $user = Auth::user();
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('index', compact('user'))->with('success', 'Data berhasil dihapus!');
        // dd(request()->method('delete'));
    }

    public function detail(Request $request, $id)
    {
        $user = Auth::user();
        $data = User::find($id);

        return view('detail', compact('data', 'user'));
    }
}
