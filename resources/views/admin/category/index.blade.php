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
                    <h3 class="title-d">Categories
                      </h3>
                  </div>
                </div>
                
                @include('includes.admin_menu')
              </div>
            </div>

            <div class="col-md-8">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#category">
                Create Category
              </button>
              <hr>
                @if (!empty($cats))
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($cats as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          <a href="#" class="text-warning">Edit</a>
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
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="categoryTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryTitle">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{route('category.create')}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category Name:</label>
              <input type="text" name="name" class="form-control" id="recipient-name" required="">
            </div>
            
            <button type="submit" class="btn btn-success">Save </button>
          </form>
      </div>
      
    </div>
  </div>
</div>
@endsection