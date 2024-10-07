<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct()
    {
        //atau menggunakan role
        // $this->middleware(['role:admin']);

        //jika ingin memanggil bisa menggunakan ini
        $this->middleware(['permission:view_dashboard']);

        //atau bisa menggunakan permission
        // $this->middleware(['permission:view_dashboard']);

        //jika dibuat seperti ini tidak akan bisa
        // $this->middleware(['role:admin|write', 'permission:view_dashboard']);
    }
    public function dashboard()
    {
        // dd(auth()->user()->getRoleNames());

        // if (auth()->user()->can('view_dashboard')) {

        return view('dashboard');
        // }
        return abort(403);
    }

    public function index(Request $request)
    {
        $data = new User;
        $pagetitle = 'Users';

        if ($request->get('search')) {
            $data = User::where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('email', 'like', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('index', compact('data', 'request', 'pagetitle'));
    }

    public function create()
    {
        return view('create');
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

        Storage::disk('public')->put($path, file_get_contents($image));

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;

        // dd($data);

        User::create($data);

        return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        return view('update', compact('data'));
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

        return redirect()->route('index');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('index');
    }
    public function detail(Request $request, $id)
    {
        $data = User::find($id);

        return view('detail', compact('data'));
    }
}
