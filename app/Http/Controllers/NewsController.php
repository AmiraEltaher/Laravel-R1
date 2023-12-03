<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    private $columns = [
        'newsTitle',
        'newsAuthor',
        'newsContent',
        'published',

    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        return view('newsList', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*  $news = new News;
        $news->newsTitle = $request["newsTitle"];
        $news->newsAuthor = $request["newsAuthor"];
        $news->newsContent = $request["newsContent"];
        if (isset($request["published"])) {
            $news->published = true;
        } else {
            $news->published = true;
        }
        $news->save();
         */
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;

        $request->validate([
            'newsTitle' => 'required|string',
            'newsAuthor' => 'required|string',
            'newsContent' => 'required|string|max:100',

        ]);
        News::create($data);

        return redirect('newsList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('newsDetails', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
        News::where('id', $id)->update($data);

        return redirect('newsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::where('id', $id)->delete();
        return redirect('newsList');
    }

    public function newsTrashed()
    {
        $news = News::onlyTrashed()->get();
        return view('trashedNews', compact('news'));
    }

    public function newsRestore(string $id)
    {
        News::where('id', $id)->restore();
        return redirect('newsList');
    }
    public function newsForceDelete(string $id)
    {
        News::where('id', $id)->forceDelete();
        return ("deleted");
    }
}
