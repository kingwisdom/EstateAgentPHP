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
                <a href="#">All Properties</a>
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
                @if (!empty($properties))
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($properties as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->lga}} {{$item->state}}</td>
                        <td>
                            @if ($item->published == 1)
                                <form method="POST" action="{{ route('unpublish', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <a class="text-danger" href="{{route('unpublish', $item->id)}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Unpublish
                                    </a>
                                </form>
                            @else
                                <form method="POST" action="{{ route('publish', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <a class="text-success" href="{{route('publish', $item->id)}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Publish
                                    </a>
                                </form>
                            @endif 
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


@endsection