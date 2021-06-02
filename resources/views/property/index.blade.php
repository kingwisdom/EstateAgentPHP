@extends('layouts.temp')
 
@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">All My Uploads</h1>
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

  {{-- liss --}}

  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        
        
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <div class="title-box-d">
              <div class="row">
                  <div class="col-sm-8"><h3 class="title-d">Uploads Properties</h3></div>
                  <div class="col-sm-4"><a href="{{route('property.create')}}" class="btn btn-success">Create Property</a></div>
              </div>
            
          </div>
          <div class="box-comments">
            <ul class="list-comments">

              @if (!empty($props))
                  @foreach($props as $prop)
                  <li>
                    
                       {{-- @foreach($test as $value)  --}}
                        <div class="comment-avatar">
                          @if($prop->featureImg)
                          <img src="{{ asset('images/'.$prop->featureImg) }}" alt="">
                          @else
                          <img src="{{ asset('images/no-image.jpg') }}" alt="">
                          @endif
                        </div>
                       {{-- @endforeach  --}}
                    <div class="comment-details">
                      <a href="{{route('property.edit',$prop->id)}}"><h4 class="comment-author">{{$prop->title}}</h4></a>
                      <span>{{$prop->created_at}}  @php if($prop->published == 0) {echo "<p>in review</p>";} else{echo "<p style=\"color:green;\">published</p>";} @endphp</span>
                      <p class="comment-description">
                        {{$prop->description}}
                      </p>
                    </div>
                  </li>
                  @endforeach
                 
                  @else
                   <h3 class="mx-auto">No Property(s) Found!</h3>   
              @endif
              
            </ul>
          </div>
          {{-- <div class="form-comments">
            <div class="title-box-d">
              <h3 class="title-d"> Leave a Reply</h3>
            </div>
            <form class="form-a">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Enter name</label>
                    <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required="">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputEmail1">Enter email</label>
                    <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required="">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="inputUrl">Enter website</label>
                    <input type="url" class="form-control form-control-lg form-control-a" id="inputUrl" placeholder="Website">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="textMessage">Enter message</label>
                    <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required=""></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-a">Send Message</button>
                </div>
              </div>
            </form>
          </div> --}}
        </div>
      </div>
    </div>
  </section>
@endsection