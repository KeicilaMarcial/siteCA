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
                  <a class="nav-link" href="{{url('/')}}">Home</a>
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
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
                <h2>Documentos Disponíveis para Download</h2>
            </div>
          </div>
        </div>
        <div class="row h_blog_item">
          <div class="col-lg-12">
          
          <div class="col-lg-12">

             <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nome do Documento</th>
                    <th scope="col">Download</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($arquivos as $a)
                  @if($a->tipo==1 && $a->status==1)
                    <tr>
                      <th scope="row">{{$a->nome}}</th>
                      <td>
                        @php
                        if ($a->arquivo)
                        $pathArquivo = url("storage/arquivos/{$a->arquivo}");
                      @endphp
                    <a href="{{ $pathArquivo }}" download>
                      <img src="{{asset('assets/site/img/pdf_icon.png')}}" width="30" height="30" alt=""
                     />
                      </td>                      
                    </tr>
                  @endif
                  @endforeach
                    
               </tbody>
               {{ $arquivos->links() }}
          </table>

        </div>
      </div>
    </section>
    <!--================ End About Area =================-->


  
    
    <!--<!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
       
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="https://www.facebook.com/groups/Cienciacompceunes"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-instagram"></i></a>
            <!--<a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>-->
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
