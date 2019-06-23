<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="{{ asset('assets/site/img/favicon.png')}}" type="image/png" />
    <title>CACCOMP</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/site/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/nice-select/css/nice-select.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"
              ><img src="{{asset('assets/site/img/logo.png')}}" alt=""
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sobrenos">Sobre nós</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#projetos">Projetos</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#eventos">Eventos</a>
                </li>
                
                 <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Documentos</a
                  >
                <li class="nav-item">
                  <a class="nav-link" href="#contato">Contato</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                  CACCOMP
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                  Centro Acadêmico de Ciência da Computação
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start About Area =================-->
    <section class="about_area section_gap" id="sobrenos">
      <div class="container">
        <div class="row h_blog_item">
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="{{asset('assets/site/img/about.png')}}" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <h4>Somos o CA da Ciência da Computação</h4>
                 @foreach($textos as $t)
                <p>
                    {{$t->descricao}}
                </p>
                 @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End About Area =================-->

      @if(!empty($projetos))
    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses" id="projetos">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Projetos desenvolvidos na computação</h2>
              <p>
               Iniciações cientificas e projetos de pesquisa
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
             @foreach($projetos as $p)
             @if($p->status==1)
              <div class="single_course">
                <div class="course_head">
                  @php
                    if ($p->imagem)
                        $pathImage = url("storage/imagens/projetos/{$p->imagem}");
                   @endphp
              <!-- <img src="{{ $pathImage }}" class="img-circle"  height="200" width="200">-->
                  <img class="{{asset('assets/site/img-fluid')}}" src="{{ $pathImage }}" alt="" />
                </div>
                <div class="course_content">
                 <h4 class="mb-3">
                    <a href="course-details.html">{{$p->nome}}</a>
                  </h4>
                  <p>
                    {{$p->descricao}}
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                  >
                  </div>
                 
                </div>
              </div> 
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->
      @endif

    <!--================ Start Events Area =================-->
    <div class="events_area" id="eventos">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Próximos Eventos</h2>
              <!--<p>
                Replenish man have thing gathering lights yielding shall you
              </p>-->
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($eventos as $e)
          @if($e->status==1)
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                 @php
                    if ($e->imagem)
                        $pathImage = url("storage/imagens/eventos/{$e->imagem}");
                   @endphp
                <img src="{{$pathImage}}" alt=""  width="555" height="400" />
              </div>
              <div class="event_details">
                <!--<div class="d-flex mb-4">
                  <div class="date"><span>15</span> Jun</div>

                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                    </p>
                    <p>
                      <span class="ti-location-pin mr-2"></span> Hilton Quebec
                    </p>
                  </div>
                </div>-->
                <p>
                  {{$e->nome}}
                <!--<a href="#" class="primary-btn rounded-0 mt-3">View Details</a>-->
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
             <!-- <div class="event_thumb">
                <img src="'{{asset('assets/site/img/event/e2.jpg')}}" alt="" />
              </div>-->
              <div class="event_details">
                <!--<div class="d-flex mb-4">
                  <div class="date"><span>15</span> Jun</div>

                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                    </p>
                    <p>
                      <span class="ti-location-pin mr-2"></span> Hilton Quebec
                    </p>
                  </div>
                </div>-->
                <p>
                  {{$e->descricao}}
                </p>
                <a href="{{$e->link}}" class="primary-btn rounded-0 mt-3" target="_blank">Detahes</a>
              </div>
            </div>
          </div>
            @endif
            @endforeach
          <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="#" class="event-link">
                Ver todos os eventos<img src="{{asset('assets/site/img/next.png')}}" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    <!--<div class="testimonial_area section_gap" id="membros">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Client say about me</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t1.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t2.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t1.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t2.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t1.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('assets/site/img/testimonials/t2.jpg')}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <!--================ End Testimonial Area =================-->

    <!--================Contact Area =================-->

    <section class="contact_area section_gap">

      <div class="container" id="contato">
         <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Contato</h2>
              <p>
               Em caso de duvidas, envie-nos um email
              </p>
            </div>
             <div class="main_title">
              <h2 class="mb-3"></h2>
              <i class="ti-email"></i>
                <h3><a href="mailto:webmaster@example.com">emailca@ufes.com</a></h3>
            </div>
          </div>
        </div>
        <div class="row">
          <!--<div class="col-lg-3">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-home"></i>
                <h6>California, United States</h6>
                <p>Santa monica bullevard</p>
              </div>
              <div class="info_item">
                <i class="ti-headphone"></i>
                <h6><a href="#">00 (440) 9865 562</a></h6>
                <p>Mon to Fri 9am to 6 pm</p>
              </div>
              <div class="info_item">
                <i class="ti-email"></i>
                <h6><a href="#">support@colorlib.com</a></h6>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>-->
          <div class="col-lg-9">

            <!--<form
              class="row contact_form"
              action="contact_process.php"
              method="post"
              id="contactForm"
              novalidate="novalidate"
            >
              <div class="col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="subject"
                    name="subject"
                    placeholder="Enter Subject"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'"
                    required=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Enter Message"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Message'"
                    required=""
                  ></textarea>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" value="submit" class="btn primary-btn">
                  Send Message
                </button>
              </div>
            </form>-->
          </div>
        </div>
      </div>
    </section>
    <!--================Contact Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
       
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/site/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/site/js/popper.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/owl-carousel-thumb.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/site/js/mail-script.js')}}"></script>
    <!--gmaps Js-->
       <script src="{{asset('assets/site/js/gmaps.min.js')}}"></script>
    <script src="{{asset('assets/site/js/theme.js')}}"></script>
  </body>
</html>
