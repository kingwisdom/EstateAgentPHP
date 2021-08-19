

@extends('layouts.temp')

@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{$res->title}}</h1>
            <span class="color-text-a">{{$res->category_id}}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$res->title}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="property-single">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-6 col-lg-6">
            <img src="{{asset('images/'.$res->featureImg)}}" alt="{{$res->title}}" class="responsive-img" style="width: 100%;">
            <div class="mt-5"></div>
            <div class="property-price d-flex foo" data-sr-id="1" style="; visibility: visible;  -webkit-transform: translateY(0) scale(1); opacity: 1;transform: translateY(0) scale(1); opacity: 1;-webkit-transition: -webkit-transform 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0.015s, opacity 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0.015s; transition: transform 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0.015s, opacity 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0.015s; ">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">NGN</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{$res->price}}</h5>
                  </div>
                </div>
              </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Property Description</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                    {{$res->description}}
                </p>
                
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Amenities</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                  <li>Balcony</li>
                  <li>Outdoor Kitchen</li>
                  <li>Cable Tv</li>
                  <li>Deck</li>
                  <li>Tennis Courts</li>
                  <li>Internet</li>
                  <li>Parking</li>
                  <li>Sun Room</li>
                  <li>Concrete Flooring</li>
                </ul>
              </div>
 
        </div>
      </div>
    </div>
  </section>

  <div class="mt-5"></div>
  {{-- body --}}
@endsection