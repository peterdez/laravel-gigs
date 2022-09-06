<!-- layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/gigs-dashboard.css') }}" rel="stylesheet" type="text/css" />
  <style>
        body {
          background-color: #fbfbff;
        }
        .table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
        th {
          border-bottom-width: 0 !important;
        }
        td:first-child,
        th:first-child {
          border-radius: 10px 0 0 10px;
          padding-left: 20px;
        }

        td:last-child,
        th:last-child {
          border-radius: 0 10px 10px 0;
          padding-right: 20px;
        }
        .navbar-brand {
            background-color: transparent !important;
            box-shadow: none !important;
        }
        .sidebar {
          padding-top: 10px !important;
          background-color: #fcfcff;
          z-index: 9999 !important;
        }
        #sidebarMenu .nav-item {
          margin-bottom: 10px;
        }
        #sidebarMenu #logo {
          max-width: 80px;
        }
        .top-bar .nav-link {
          color: #555064 !important;
        }
        .sidebar .nav-link .feather {
          color: #a9b0c5 !important;
      }

  
      .sidebar .nav-link {
        color: #a7a4ae !important;
      }
      .sidebar .nav-link.active, .sidebar .nav-link.active .feather {
        color: #fbb30b !important;
      }
      .below-pills .btn-primary {
          background: none;
          border: 1px solid #cccccc;
          color: #a9b0c5;
      }
      .below-pills .btn-primary.active {
          background: none;
          border: 1px solid #fbb30b;
          color: #fbb30b;
      }
      .nav-pills-index {
          border-bottom: 3px solid #cccccc;
      }
      .nav-pills-index .nav-link {
          background-color: transparent;
          color: #a9b0c5 !important;
      }
      .nav-pills-index .nav-link.active, .nav-pills-index .show>.nav-link {
          position: relative;
          bottom: -3px;
          background-color: transparent;
          color: #a7a4ae !important;
          font-weight: bold;
          border-bottom: 3px solid #fbb30b;
      }
      .nav-pills-inner .nav-link {
        color: #a9b0c5;
      }
      .nav-pills-inner .nav-link.active {
          background: none;
          color: #fbb30b;
      }
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

        @media (max-width: 767.98px) {
            .top-search {width: 100% !important;}
            header .navbar-nav {
                width: 100%;
            }

            .nav-pills-inner, .tab-content {
                width: 100% !important;
                display: block;
            }
        }
  
        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
      </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 border-bottom">
    <header class="navbar navbar-white top-bar sticky-top flex-md-nowrap p-0">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 d-md-none" href="#">
        <img id="logo" src="{{ asset('img/logo.png') }}">
      </a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-50 top-search rounded border" type="text" placeholder="Search" aria-label="Search">
      <div class="navbar-nav pt-4 pt-md-0">
        <ul class="nav d-flex justify-content-between">
        @auth
          <li class="nav-item">
          <a class="nav-link p-0 my-2 mx-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </a>
        </li>
           @else
            <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="{{ route('login') }}">Log in
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="{{ route('register') }}">Register
          </a>
          </li>
          @endauth 
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4 position-relative" href="#">
              <i class="fa fa-bell-o" class="align-text-bottom"></i>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="#">
            <i class="fa fa-envelope-o" class="align-text-bottom"></i>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="#">
            <i class="fa fa-cog" class="align-text-bottom"></i>
          </a>
          </li>  
          
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="#">
            <img class="img-profile rounded-circle" src="{{ asset('img/profile-pic.jpg') }}" width="25">
          </a>
          </li>
        </ul>
      </div>
     </header>
    </div>
  </div>
  
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="sidebar-brand nav-link px-5 py-4" href="{{ url('gigs') }}">
              <img id="logo" src="{{ asset('img/logo.png') }}">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active px-5 py-4" aria-current="page" href="#">
              <i class="fa fa-home" class="align-text-bottom"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5 py-4" href="#">
              <i class="fa fa-briefcase" class="align-text-bottom"></i>
              Gigs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5 py-4" href="#">
              <i class="fa fa-building" class="align-text-bottom"></i>
              Company
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5 py-4" href="#">
              <i class="fa fa-user" class="align-text-bottom"></i>
              Account
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-0">
    @yield('content')
    </div>
    </div>
 </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>