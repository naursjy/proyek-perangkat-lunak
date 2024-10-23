<?php

namespace App\Http\Controllers;

use App\Models\M_categories;
use App\Models\M_news;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    // public function pagetitle()
    // {
    //     $pagetitle = 'Berita Terkini';
    //     return view('berita_terkini', compact('pagetitle'));
    // }

    public function index(Request $request)
    {
        // $data = new M_news();
        $user = Auth::user();
        $news = M_news::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();
        // if ($request->get('search')) {
        //     $data = M_news::where('title', 'like', '%' . $request->get('search') . '%');
        // }
        $pagetitle = 'Berita Terkini';
        // $data = $data->get();
        return view('news.index', compact('news', 'pagetitle', 'user'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $pagetitle = 'Berita Terkini';
        $user = Auth::user();

        $news = M_news::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        })
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();
        return view('news.index', compact('news', 'search', 'pagetitle', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = M_categories::all();
        $pagetitle = 'Tambah Data Berita';
        return view('news.create', compact('categories', 'pagetitle', 'user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'category_id' => 'required', // add this
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $image = $request->file('image');
        $filename = date('d-m-Y') . $image->getClientOriginalName();
        $path = 'photo-news/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        // $user = auth()->user();
        $data['title']       = $request->title;
        $data['content']     = $request->content;
        $data['category_id'] = $request->category_id;
        $data['image']       = $filename;
        $data['date']        = date('Y-m-d', strtotime($request->date));
        $data['user_id']     = Auth::user()->id;
        $user = Auth::user();

        M_news::create($data);

        return redirect()->route('news.index');
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        $news = M_news::findOrFail($id);
        $categories = M_categories::all();
        $pagetitle = 'Edit Data Berita';
        return view('news.edit', compact('news', 'categories', 'pagetitle', 'user'));
    }

    public function update(Request $request,  $id)
    {
        $find = M_news::find($id);
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'category_id' => 'required', // add this
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['title'] = $request->title;
        $data['content'] = $request->input('content');
        $data['category_id'] = $request->category_id;
        $data['date']        = date('Y-m-d', strtotime($request->date));
        $data['user_id']     = Auth::user()->id;

        $image = $request->file('image');
        if ($image) {
            $filename = date('d-m-Y') . $image->getClientOriginalName();
            $path = 'photo-news/' . $filename;
            if ($find->image) {
                Storage::disk('public')->delete('photo-news/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($image));
            $data['image'] = $filename;
        }

        $find->update($data);
        return redirect()->route('news.index');
    }

    public function delete(Request $request, $id)
    {
        $news = M_news::find($id);
        if ($news) {
            $news->delete();
        }
        return redirect()->route('news.index');
    }
    public function read(Request $request, $id)
    {
        $user = Auth::user();
        $data = M_news::find($id);
        $categories = M_categories::all();
        $pagetitle = 'Detail Data Berita';
        return view('news.read', compact('data', 'categories', 'pagetitle', 'user'));
    }
}
