@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{$user->name}}</h1>
            <span class="subheading">Welcome to your dashboard!</span>
          </div>
        </div>
      </div>
    </div>
  </header>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5>you have {{$user->posts->count()}} posts published</h5>
                        <a href="/user/{{$user->id}}" class="btn btn-primary">View All Posts</a>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
