<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ExampleController extends Controller
{
    public function test1()
    {
        return view("login");
    }
    public function car()
    {
        return view("addCar");
    }
}
