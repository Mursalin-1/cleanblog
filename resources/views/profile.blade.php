@extends('layouts.app')
  @section('content')
  
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{$user->name}}</h1>
            <span class="subheading">has {{$user->posts->count()}} posts</span>
          </div>
        </div>
      </div>
    </div>
  </header>


<!-- Main Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach($posts as $post)
        <div class="post-preview">
          <a href="/posts/{{$post->id}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
            {{ str_limit($post->content, $limit = 150, $end = '...') }}

            </h3>
          </a>
          <p class="post-meta">Posted 
            on {{ date('F d, Y', strtotime($post->created_at)) }}</p>
        </div>
        <hr>
        @endforeach
        
        <!-- Pager -->
        <div class="clearfix">
          {{$posts->links()}}
        </div>
      </div>
    </div>
</div>
<hr>
@endsection