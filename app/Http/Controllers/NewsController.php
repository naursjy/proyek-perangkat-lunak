<?php

namespace App\Http\Controllers;

use App\Models\M_categories;
use App\Models\M_news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = M_news::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $categories = M_categories::all();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required', // add this
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $data['title']      = $request->title;
        $data['content']       = $request->content;
        $data['category_id']       = $request->category_id;
        M_news::create($data);

        return redirect()->route('news.index');
    }
}
