<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

class UserController extends Controller
{
    //
    public function index(User $user){
        $posts = Post::where('user_id', $user->id)->latest()->paginate();
        return view('profile', compact('posts', 'user'));
    }
}
