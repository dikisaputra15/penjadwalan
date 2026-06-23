<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home Page</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('Growing')}}/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('Growing')}}/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('Growing')}}/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('Growing')}}/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('Growing')}}/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="{{asset('Growing')}}/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{asset('Growing')}}/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    </head>
    <body>
      <!-- header top section start -->
      <div class="header_top">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="call_text"><a href="#"><img src="{{asset('Growing')}}/images/call-icon.png"><span class="call_text_left">+01 1234567890</span></a></div>
            </div>
            <div class="col-sm-4">
              <div class="call_text"><a href="#"><img src="{{asset('Growing')}}/images/mail-icon.png"><span class="call_text_left">admin@gmail.com</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <!-- header top section end -->
      <!-- header section start -->
      <div class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">

        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">HOME</a>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">
                        LOGOUT
                    </button>
                </form>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/alllogin') }}">LOGIN</a>
            </li>
        @endguest

    </ul>
</div>

        </nav>
        </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 padding_0">
              <div class="banner_img"><img src="{{asset('Growing')}}/images/dpc-pkb.jpeg" style="width:800px; height:450px;"></div>
            </div>
            <div class="col-sm-4">
              <h1 class="clever_text">Selamat Datang</h1>
              <h1>di Sistem Informasi</h1>
              <h1>Penjadwalan</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright_section">
        <div class="container">
          <p class="copyright">2024 All Rights. <a href="https://html.design">Free html  Templates</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('Growing')}}/js/jquery.min.js"></script>
      <script src="{{asset('Growing')}}/js/popper.min.js"></script>
      <script src="{{asset('Growing')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('Growing')}}/js/jquery-3.0.0.min.js"></script>
      <script src="{{asset('Growing')}}/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="{{asset('Growing')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{asset('Growing')}}/js/custom.js"></script>
      <!-- javascript -->
      <script src="{{asset('Growing')}}/js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
   </html>
