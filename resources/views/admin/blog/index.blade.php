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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#blog">
                Create Blog Post
              </button>
              <hr>
              @if(session('message'))
                  <div class="alert alert-info">{{ session('message') }}</div>
              @endif
                @if (!empty($blog))
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Action</th>
                      
                    </tr>
                    
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($blog as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        @if($item->image)
                        <td><img src="{{ asset('images/blog-'.$item->image) }}" style="width: 50px;height:50px;" alt=""></td>
                        @else
                        <td><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;height:50px;" alt=""></td>
                        @endif
                        
                        <td>{{Str::limit($item->title, 50, $end='....')}}</td>
                        <td>{{Str::limit($item->body, 100, $end='....')}}</td>
                        <td>
                          <a href="{{ route('blog.edit', $item->id) }}" class="text-warning">Edit</a>
                          <form method="POST" action="{{ route('post.delete', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="text-danger" href="{{route('post.delete', $item->id)}}" onclick="if( confirm('Are you sure?')) {event.preventDefault(); this.closest('form').submit();}">
                                Delete
                            </a>
                        </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                
                @endif
              </div>

          </div>
        </div>
        
        
      </div>
    </div>
  </section>

  
<!-- Modal -->
<div class="modal fade" id="blog" tabindex="-1" role="dialog" aria-labelledby="blogTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="blogTitle">Create Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{route('blog.create')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control" id="recipient-name" required="">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Enter Blog Content *</label>
              <textarea id="textMessage" name="body" class="form-control" placeholder="Content" name="message" cols="45" rows="8" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Image</label>
              <input type="file" name="file" accept="image/*" class="form-control form-control-lg form-control-a" id="inputName">
            </div>
            
            <button type="submit" class="btn btn-success">Post </button>
          </form>
      </div>
      
    </div>
  </div>
</div>
@endsection

