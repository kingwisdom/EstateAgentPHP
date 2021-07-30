@extends('layouts.temp')

@section('content')
    
    
  <!--/ Intro Single star /-->
 
  <!--/ Intro Single End /-->

  <!--/ About Star /-->
  <section class="section-about" style="margin-top: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-img-box">
            <img src="img/slide-about-1.jpg" alt="" class="img-fluid">
          </div>
          <div class="sinse-box">
            <h3 class="sinse-title">EstateAgency
              <span></span>
              <br> Sinse 2017</h3>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="{{ asset('assets/img/about-2.jpg') }}" alt="" class="img-fluid">
            </div>
            
            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">About Us</h3>
              </div>
              <p class="color-text-a">
                We are a dynamic multifaceted Pan-African real estate company concerned primarily on the supply side of the industry with strong presence in REAL ESTATE investment, Development, Training/Consultancy and Marketing Syndications. </p>

              <p>We partner with reputable industry players to deliver pocket friendly real estate solutions to the emerging middle class and HNIs. </p>

              <!--vission-->
              <div class="title-box-d">
                <h3 class="title-d">Our Vision</h3>
              </div>
              <p class="color-text-a">
                To be a leading & affordable real estate solution provider by building homes and providing landed properties thereby becoming a household homebuilder and city developer in Africa then Globally .
              </p>

              <!--mission-->
              <div class="title-box-d">
                <h3 class="title-d">Our Mission</h3>
              </div>
              <p class="color-text-a">
                To be the leading real estate company by making buying and selling of real-estate cost effective, affordable, faster and easier while maintaining the highest level of service to all stakeholders.
              </p>

              <!--CORE VALUES-->
              <div class="title-box-d">
                <h3 class="title-d">Our Core Values</h3>
              </div>
              <ul>
                <li>Excellence</li>
                <li>Professionalism</li>
                <li>Integrity</li>
                <li>Loyalty</li>
                <li>Service</li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ About End /-->

  <!--/ Team Star /-->
  <section class="section-agents section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">MANAGEMENT TEAM</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/agent-7.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Akinyemi Bola <br> Managing Director
                     </a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> agents@example.com</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Team End /-->

@endsection