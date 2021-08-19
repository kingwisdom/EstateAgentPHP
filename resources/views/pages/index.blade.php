@extends('layouts.temp')

@section('content')
<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Lekki Phase I, Lagos
                      </p>
                    <h1 class="intro-title mb-4">
                       2 Bedroom Flat</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Buy</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Ibeju Lekki, Lagos</p>
                    <h1 class="intro-title mb-4"> 5 Bedroom Duplex</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Buy</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Surulere, Lagos
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      1 Bedroom Apartment</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Rent</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Best Products</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Providing the Client with the finest products in the best place, at the right price and backed by top-notch service.
              </p>
            </div>
            {{-- <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div> --}}
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Customer First</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Customer celebration by putting the customer first and Doing the ordinary things extra-ordinarily well
              </p>
            </div>
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Work Environment</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Insisting on an inclusive work environment where every single person is given the encouragement, support and opportunity to be successful
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest Properties</h2>
            </div>
            <div class="title-link">
              <a href="{{route('all_property')}}">All Property
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       @if (!@empty($props))
          @foreach($props as $prop)
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{asset('images/'.$prop->featureImg)}}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="{{route('property.show',$prop->slug)}}">{{$prop->title}}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">{{$prop->type}} | @convert($prop->price)</span>
                      </div>
                      <a href="{{route('property.show',$prop->slug)}}" class="link-a">Click here to view
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
      {{-- <div class="row">
        <div class="col-sm-12">
          <a class="btn btn-success" href="#">More</a>
        </div>
      </div> --}}
    </div>
  </section>
  <!--/ Property Grid End /-->

  <!--/ News Star /-->
  <section class="property-grid grid mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest News</h2>
            </div>
            <div class="title-link">
              <a href="{{route('blog.all_post')}}">All News
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       @if (!@empty($posts))
          @foreach($posts as $p)
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  @if($p->image)
                  <img src="{{asset('images/blog-'.$p->image)}}" alt="" class="img-a img-fluid" style="height: 250px;">
                  @else
                  <img src="{{asset('images/logo.png')}}" alt="" class="img-a img-fluid" style="height: 250px;">         
                  @endif
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="{{route('blog.show',$p->slug)}}">{{Str::limit($p->title, 20, $end='....')}}</a>
                       
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <a href="{{route('blog.show',$p->slug)}}" class="link-a">Read News
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
      
    </div>
  </section>
  <!--/ News End /-->

  <!--/ Testimonials Star /-->
  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimonials</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="{{ asset('assets/img/testimonial-1.jpg')}}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                    debitis hic ber quibusdam
                    voluptatibus officia expedita corpori.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="{{ asset('assets/img/mini-testimonial-1.jpg')}}" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Albert & Erika</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!--/ Testimonials End /-->

@endsection