<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhoneController;

Route::get('/', function () {
    return view('welcome'); // "../resources/views/welcome.blade.php"
});


/*********** BASIC ROUTES ***********/

Route::get('hello', function () {
    return "Hello World!";
});

Route::get('hello/user/', function () {
    return "Hi! Hello World!";
});

# Route Parameters
Route::get('/user/{user_id}', function ($user_id) {
    return "This is user ID: <span style='font-size:20px; color:#33f;'>$user_id.</span>";
});

// Variables that appear in the URI part need to be ordered as well as named.
// Route::get('/{username}/post/{post_id}', function($username, $post_id){
//     return "Post ID: $post_id. This is the post of $username";
// });

# Naming Routes
Route::get('/dashboard/admin', function () {
    return "Welcome admin!";
})->name('adm');

Route::get('/dashboard/subscriber', function () {
    return "Welcome subscriber!";
})->name('sub');

Route::get('login', function () {
    return redirect()->route('adm');
});

# Routing Controller
Route::get('/post', [PostController::class, 'index']);

# Passing Data Controller
Route::get('/post/{post_id}', [PostController::class, 'viewPost']);

Route::get('/{username}/post/{post_id}', [PostController::class, 'viewUserPost']);

# Act1 & Act2
Route::get('/show/{username}', [PostController::class, 'show']);

# View Controller
Route::get('view-all', [PostController::class, 'viewAllPosts']);

# View Passing Data
Route::get('view-post/{username}/{post_id}', [PostController::class, 'viewUserPost']);


/************************ ELOQUENT ************************/
# CREATE
Route::get('/store/save', [PostController::class, 'save']);
Route::get('/store/create', [PostController::class, 'create']);

# READ
Route::get('/read-all', [PostController::class, 'index']);
Route::get('/read/{post_id}', [PostController::class, 'show']);

# READ (where)
Route::get('read-where/{post_id}', [PostController::class, 'showWhere']);

# UPDATE
Route::get('/update/{post_id}', [PostController::class, 'update']);

# DELETE
Route::get('/delete/{post_id}', [PostController::class, "delete"]);
Route::get('destroy/{post_id}', [PostController::class, 'destroy']);


/************************ ELOQUENT RELATIONSHIPS  *******************/
// One to One
Route::get('/user/{user_id}/show', [UserController::class, 'show']);

// One to One (inverse)
Route::get('/phone/{phone_id}/show', [PhoneController::class, 'showUserInfo']);
