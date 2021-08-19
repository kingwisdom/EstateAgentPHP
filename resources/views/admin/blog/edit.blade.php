@extends('layouts.temp')

@section('content')

<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{Auth()->user()->name}}</h1>
            <span class="color-text-a">@php Auth()->user()->is_admin == 1 ? "Admin" : "Agent"; @endphp</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
              
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-3 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d">Blogs
                      </h3>
                  </div>
                </div>
                
                @include('includes.admin_menu')
              </div>
            </div>

            <div class="col-md-8">
              
              @if(session('message'))
                  <div class="alert alert-info">{{ session('message') }}</div>
              @endif
               
              <form method="POST" action="{{route('post.update', $item->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Title:</label>
                  <input type="text" name="title" class="form-control" id="recipient-name" value="{{$item->title}}">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Enter Blog Content *</label>
                  <textarea id="textMessage" name="body" class="form-control" placeholder="Content" cols="45" rows="8">{{$item->body}}</textarea>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Image</label>
                  <input type="file" name="file" accept="image/*" class="form-control form-control-lg form-control-a" id="inputName">
                </div>
                
                <button type="submit" class="btn btn-success">Update Post </button>
              </form>
              </div>

          </div>
        </div>
        
        
      </div>
    </div>
  </section>


  
@endsection

