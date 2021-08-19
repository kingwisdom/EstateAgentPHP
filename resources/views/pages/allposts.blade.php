@extends('layouts.temp')
@section('content')

<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Our Amazing News / Event</h1>
            <span class="color-text-a">News</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                News
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="news-grid grid">
    <div class="container">
      <div class="row">
        
        @if (!@empty($posts))
        @foreach($posts as $p)
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
                @if($p->image)
                <img src="{{asset('images/blog-'.$p->image)}}" alt="" class="img-a " style="height: 250px;">
                @else
                <img src="{{asset('images/logo.png')}}" alt="" class="img-a " style="height: 250px;">         
                @endif
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                {{-- <div class="card-category-b">
                  <a href="blog-single.html" class="category-b">Travel</a>
                </div> --}}
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="">{{$p->title}}
                      </a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">{{$p->created_at->diffForHumans()}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            {{-- paginatin --}}
          </nav>
        </div>
      </div>
    </div>
  </section>

<div class="mt-5"></div>
{{-- body --}}
@endsection