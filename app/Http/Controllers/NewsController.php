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
        $news = new News;
        $news->newsTitle = $request["title"];
        $news->newsAuthor = $request["author"];
        $news->newsContent = $request["content"];
        if (isset($request["published"])) {
            $news->published = true;
        } else {
            $news->published = true;
        }

        $news->save();
        return "News added successfully";
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


        News::where('id', $id)->update($request->only($this->columns));

        return redirect('newsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::where('id', $id)->delete();
        return ("deleted");
    }
}
