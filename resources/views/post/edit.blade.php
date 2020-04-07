@extends('layouts.app')
@section('content') 
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Edit The Post</h1>
            <span class="subheading">Use the form below to edit your post.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="sentMessage" id="contactForm" 
        action='/posts/{{$post->id}}' 
        method="POST"
        enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" 
               class="form-control" 
               placeholder="Title"
               id="title" 
               name='title'
               value="{{$post->title}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Content</label>
              <textarea rows="5" 
              class="form-control" 
              placeholder="Content" 
              id="content"
              name="content">{{$post->content}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Image</label>
              <input
              class="form-control" 
              id="image"
              name="image"
              type="file" />
              <p class="help-block text-danger"></p>
            </div>
            <div>
              <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </div>
            
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>
  @endsection