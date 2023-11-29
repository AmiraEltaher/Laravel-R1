<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    private $columns = ['carTitle', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('carsList', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$cars = new Car;
        //$cars->carTitle = $request->title;
        //$cars->description = $request->desribe;
        //if (isset($request->remember)) {
        //    $cars->published = true;
        //} else {
        //    $cars->published = false;
        //}

        //$cars->save();

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;

        $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:100',


        ]);
        Car::create($data);
        return "Car data added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars = Car::findOrFail($id);
        return view('carDetails', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $car = Car::findOrFail($id);
        return view('editCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Car::where('id', $id)->update($request->only($this->columns));
        return redirect('carList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return ("deleted");
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashedCar', compact('cars'));
    }
    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return ("restored");
    }
    public function delete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return ("deleted");
    }
}
