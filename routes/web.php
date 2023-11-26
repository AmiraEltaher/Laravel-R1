<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return 'Welcome to my first route';
});
/*
Route::get('user/{name}/{age}', function($name,$age){
    
        return 'The username is: '.$name;
    
    
});

Route::get('user/{name}/{age?}', function($name,$age=0){
    if($age == 0){
        return 'The username is: '.$name;
    }
    else{
        return 'The username is: '.$name. "and age is".$age;
    }
    
});
Route::get('user/{name}/{age?}', function($name,$age=0){
    $msg='The username is: '.$name;
    if($age == 0){
       
        return $msg;
    }
    else{
        $msg.="and age is".$age;
        return $msg;
    }
    
});


Route::get('user/{name}/{age?}', function ($name, $age = 0) {
    $msg = 'The username is: ' . $name;
    if ($age > 0) {
        $msg .= " and age is" . $age;
    }
    return $msg;
})->whereIn('name', ['amira', 'ahmed']);
//->where(['age' => '[0-9]+', 'name' => '[a-zA-Z0-9]+']);
//->whereAlpha('name');
//->whereNumber('age');
//->where (['age'=> '[0-9]+']);
Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return 'product home page';
    });
    Route::get('laptop', function () {
        return 'laptop  page';
    });
    Route::get('camera', function () {
        return 'camera  page';
    });
    Route::get('projector', function () {
        return 'projector  page';
    });
});


//Task 2//
Route::get('about', function () {
    return 'about page';
});
Route::get('contactUs', function () {
    return 'contact us page';
});

Route::prefix('support')->group(function () {
    Route::get('/', function () {
        return 'support home page';
    });

    Route::get('chat/{userName}', function ($username) {
        return 'Hello ' . $username . ' , How can I help you';
    })->where(['userName' => '[a-zA-Z]+']);

    Route::get('call', function () {
        return 'call  page';
    });
    Route::get('ticket/{userName}/{email}', function ($name, $email) {
        return 'Your name is' . $name . ' and your email is ' . $email;
    })->where(['email' => '[a-zA-Z0-9#?!@$%^&*-]+', 'username' => '[a-zA-Z]+']);
});

Route::prefix('training')->group(function () {
    Route::get('/', function () {
        return 'training home page';
    });
    Route::get('hr', function () {
        return 'hr  page';
    });
    Route::get('ict', function () {
        return 'ict  page';
    });
    Route::get('marketing', function () {
        return 'marketing  page';
    });
    Route::get('logistics', function () {
        return 'logistics  page';
    });
});*/

Route::get('cv', function () {
    return view('cv');
});

Route::get('login', function () {
    return view('login');
});

Route::post('recieve', function () {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        return 'Your email address is: ' . $email;
    }
})->name('recieve');

Route::get('test1', [ExampleController::class, 'test1']);


//Task3
// Route::post('add', function () {
//     if ($_SERVER["REQUEST_METHOD"] === "POST") {
//         $title = $_POST["title"];
//         $price = $_POST["price"];
//         $desribe = $_POST["desribe"];
//         $publish = $_POST["remember"];
//         if ($publish) {
//             $published = "published";
//         } else {
//             $published = "NOT published";
//         }


//         return 'Car title is: ' . $title . "<br>" . "Car Price is: " . $price . "<br>" . "Describtion: " . $desribe . "<br>" . $published;
//     }
// })->name('add');



Route::get('addCar', [ExampleController::class, 'car']);

Route::post('received', [ExampleController::class, 'receivedData'])->name('receivedData');

Route::post('addCar', [CarController::class, 'store'])->name('addCar');

//Task4
//Route::get('addNews', [ExampleController::class, 'addNews']);
//::post('receivedNews', [ExampleController::class, 'receivedNews'])->name('receivedNews');

Route::get('addNewsForm', [NewsController::class, 'index']);
Route::post('addNews', [NewsController::class, 'store'])->name('addNews');


Route::get('carList', [CarController::class, 'index']);
Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::get('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');
