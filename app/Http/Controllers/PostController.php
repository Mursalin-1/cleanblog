<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){
        $posts = Post::latest()->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }
    public function create(){
        return view('post.create');
    }

    public function store()
    {   
        $data = request()->validate([
            'title'=> 'required',
            'content'=> 'required',
            'image'  =>  ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(request('image')->getRealPath());
        $image->fit(800,800);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'content'=>$data['content'],
            'image'  =>$imagePath
        ]);

        return redirect('/posts');
    }
    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }
    public function update(Post $post){

        $this->authorize('update', $post);

        $data = request()->validate([
            'title'=> 'required',
            'content'=> 'required',
            'image'  =>  '',
        ]);

        if(request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(request('image')->getRealPath());
            $image->fit(800,450);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/posts/'.$post->id);

    }

    public function delete(Post $post){
        $this->authorize('update', $post);

        if(unlink(storage_path('app/public/'.$post->image))){
            Post::where('id', $post->id)->delete();
        }
        
        

        return redirect('/posts');
    }
}
