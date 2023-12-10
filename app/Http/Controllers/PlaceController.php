<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dataEntryForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'placeTitle' => 'required|string',
            'description' => 'required|string',
            'placeImage' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['PlaceImage'] = $fileName;
        $data['published'] = isset($request->published);
        Place::create($data);

        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
