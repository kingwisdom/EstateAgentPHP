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
                    <h3 class="title-d">Administrator
                      </h3>
                  </div>
                </div>
                {{-- <div class="agent-content mb-3">
                  <p class="content-d color-text-a mb-5">
                    List of what you can do
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Create Category </strong>
                      <hr>
                    </p>
                    <p>
                      <strong>Properties</strong>
                      <hr>
                    </p>
                    <p>
                      <a href="{{route('admin.users')}}"><strong>All Users</strong> </a>
                      <hr>
                    </p>
                    <p>
                      <strong>Contact Messages</strong>
                      <hr>
                    </p>
                    <p>
                      <strong>Create Property </strong>
                      <hr>
                    </p>
                  </div>
                </div> --}}
                {{-- admin menus --}}
                @include('includes.admin_menu')
              </div>
            </div>

            <div class="col-md-8">
                @if (!empty($users))
                @foreach ($users as $item)
                
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <p>Name:</p>
                            <h3>{{$item->name}}</h3>
                            <p>Email:</p>
                            <h5>{{$item->email}}</h5>
                        </div>
                        <div class="col-md-3">
                            @if ($item->is_admin == 1)
                                <form method="POST" action="{{ route('remove_admin', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <a class="text-danger" href="{{route('remove_admin', $item->id)}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Remove From Admin
                                    </a>
                                </form>
                            @else
                                <form method="POST" action="{{ route('make_admin', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <a class="text-success" href="{{route('make_admin', $item->id)}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Make Admin
                                    </a>
                                </form>
                            @endif 
                        </div>
                    </div>
                </div>


                @endforeach
                @endif
              </div>

          </div>
        </div>
        
        
      </div>
    </div>
  </section>
@endsection