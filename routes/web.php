<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/users/upload', function (\Illuminate\Http\Request $request) {
    if($request->hasFile('file')) {
        $user = User::find(2);
        $user->addMedia($request->file('file'))->toMediaCollection('avatars');
    } else {
        throw new DomainException('oops');
    }
})->name('users');

Route::post('/posts/upload', function (\Illuminate\Http\Request $request) {
    if($request->hasFile('file')) {
        $post = Post::find(1);
        $post->addMedia($request->file('file'))->toMediaCollection('images');
    }
})->name('posts');
