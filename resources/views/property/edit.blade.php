@extends('layouts.temp')

@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Edit Property</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Edit
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        
        
        <div class="col-md-12 col-lg-12">
          
           <div class="form-comments">
            <div class="title-box-d">
              <h5 class="title-d"> Edit Property</h5>
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div> 
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form class="form-a" method="POST" action="{{ route('property.update', $item->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="row">
                {{-- <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Enter name</label>
                    <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required="">
                  </div>
                </div> --}}
                <input type="text" value="{{Auth()->user()->id}}" name="user_id" hidden>
                <input type="text" value="{{$item->item_code}}" name="item_code" hidden>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="inputUrl">Title *</label>
                    <input type="text" name="title" value="{{$item->title}}" class="form-control form-control-lg form-control-a" id="title" placeholder="Title" required="">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="inputName">Category</label>
                      <select class="form-control form-control-lg form-control-a" name="category_id" id="Type">
                        <option value="1">House</option>
                        <option value="2">Car</option>
                        <option value="3">Generator</option>
                      </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Type</label>
                    <select class="form-control form-control-lg form-control-a"  name="type" id="Type">
                        <option value="{{$item->type}}" selected>{{$item->type}}</option>
                      <option value="Lease">For Lease</option>
                      <option value="Rent">For Rent</option>
                      <option value="Sale">For Sale</option>
                    </select>
                  </div>
              </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputName">Condition</label>
                      <select class="form-control form-control-lg form-control-a" name="condition" id="Type">
                        <option value="New">New</option>
                        <option value="Old">Used</option>
                      </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputName">Price</label>
                      <input type="number" value="{{$item->price}}" name="price" class="form-control form-control-lg form-control-a" id="inputPrice" placeholder="Price">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Upload  <span class="text-danger">(you can select more than one images and upload)</span></label>
                    <input type="file" multiple name="file[]" accept="image/*" multiple="multiple" class="form-control form-control-lg form-control-a" id="inputName">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">LGA*</label>
                    <input type="text" name="lga" value="{{$item->lga}}"  class="form-control form-control-lg form-control-a" id="inputName" placeholder="LGA " required="">
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputName">State*</label>
                      <input type="text" name="state" value="{{$item->state}}" class="form-control form-control-lg form-control-a" id="inputName" placeholder="State" required="">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="inputUrl">Phone Number *</label>
                    <input type="text" name="phone" value="{{$item->phone}}" class="form-control form-control-lg form-control-a" id="inputPhone" placeholder="Phone Number" required="">
                  </div>
                </div>

                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="inputUrl">Address *</label>
                    <input type="text" name="address" value="{{$item->address}}" class="form-control form-control-lg form-control-a" id="inputAddress" placeholder="Address" required="">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="textMessage">Enter description *</label>
                    <textarea id="textMessage" name="description" class="form-control" placeholder="Description" name="message" cols="45" rows="8" required="">{{$item->description
                    }}</textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <button type="submit" class="btn btn-a">Update</button>
                </div>
                
              </div>
            </form>
          </div> 


        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            @php
                $img = json_decode($item->image);
              //   foreach($img as $i){
              //     echo "<img src=\""asset('images/'.$i)" alt=\"\">";
              //   }
            @endphp
            <ul>
                @if(!empty($img))
              @foreach ($img as $i)
                  <li style="text-decoration:none; display: inline;"><img src="{{asset('images/'.$i)}}" alt="" width="80" height="80"></li>
              @endforeach
              @endif
              </ul>
          </div>
      </div>
    </div>
    <div style="margin-top: 30px;"></div>
  </section>
  @endsection