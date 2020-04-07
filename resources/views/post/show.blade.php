@extends('layouts.app')
  @section('content')
  
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/storage/{{$post->image}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>
            <span class="meta">Posted by
              <a href="/user/{{$post->user->id}}">{{$post->user->name}}</a>
              on {{ date('F d, Y', strtotime($post->created_at)) }}</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @can('update', $post)
          <div class="d-flex justify-content-between py-20">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" >Edit Post</a>
            <div>
              <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">
                  Delete Post
                </button>
              </form>
            </div>
          </div>
          @endcan
          <p>{!! nl2br($post->content) !!}</p>
        </div>
      </div>
    </div>
  </article>

  <hr>

  @endsection