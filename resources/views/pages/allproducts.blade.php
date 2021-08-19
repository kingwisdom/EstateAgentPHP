@extends('layouts.temp')

@section('content')

<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Our Amazing Properties</h1>
            <span class="color-text-a">Properties</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Properties
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  {{-- real properties --}}
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
    @if (!@empty($prop))
    @foreach($prop as $p)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{asset('images/'.$p->featureImg)}}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{route('property.show',$p->slug)}}">{{$p->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$p->type}} | NGN @convert($p->price)</span>
                  </div>
                  <a href="{{route('property.show',$p->slug)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    @endforeach
    @else
    <div class="col-sm-12">Product is empty</div>
    @endif
      </div>
      <div class="row">
        <div class="col-sm-12">
          {{-- pagination --}}
          {{ $prop->links() }}
        </div>
      </div>
    </div>
  </section>
<div class="mt-5"></div>
{{-- body --}}
@endsection