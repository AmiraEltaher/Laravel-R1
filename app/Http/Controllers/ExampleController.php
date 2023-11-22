<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ExampleController extends Controller
{
    public function test1()
    {
        return view("login");
    }

    //Task3
    public function car()
    {
        return view("addCar");
    }
    public function receivedData(Request $request)
    {
        return 'Car title is: ' . $request['title'] . "<br>" . 'Car price is: ' . $request['price'];
    }

    //Task4
    public function addNews()
    {
        return view("addNews");
    }
    public function receivedNews(Request $request)
    {
        return 'News title is: ' . $request['title'] . "<br>" . 'News content is: ' . $request['content'] . "<br>" . 'News Author is: ' . $request['author'];
    }
}
