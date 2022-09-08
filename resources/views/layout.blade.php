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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-9 ms-sm-auto col-lg-10 pe-md-4 ps-md-5 py-4 border-bottom">
    <header class="navbar navbar-white top-bar sticky-top flex-md-nowrap p-0">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 d-md-none" href="#">
        <img id="logo" src="{{ asset('img/logo.png') }}">
      </a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="input-group w-50 top-search">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="search">
      </div>
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
          
          @guest
          <li class="nav-item">
            <a class="nav-link p-0 my-2 mx-4" href="#">
            <i class="fa fa-cog" class="align-text-bottom"></i>
          </a>
          </li>
          @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-cog" class="align-text-bottom"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}:
                @if (Auth::user()->is_admin)
                Admin
                @else
                User
                @endif
                </a>
                </li>
              </ul>
          </li>
          @endguest
            
          
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
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="sidebar-brand d-none d-md-block nav-link px-5 py-4" href="{{ url('gigs') }}">
              <img id="logo" src="{{ asset('img/logo.png') }}">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5 py-4" aria-current="page" href="#">
              <i class="fa fa-home" class="align-text-bottom"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active px-5 py-4" href="/gigs">
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
  </div>
    <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-0">
    @yield('content')
      </main>
    </div>
 </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
  function addActivatedLi() {
      $("ul.gig-line li").removeClass("activated");
      $('ul.gig-line button.active').parent().addClass("activated");
    } 
  </script>
  <script>
  $( document ).ready(function() {
    addActivatedLi();
       $("#salary_min, #salary_max").keyup(function(event) {
            var minSalary = $('#salary_min').val();
            var maxSalary = $('#salary_max').val();
            $('#salary').val(minSalary + "-" + maxSalary);
        });

        $("#continue_btn").click(function() {
             $("#v-pills-remuneration-tab").trigger("click");
             addActivatedLi();
        });

        $("#gig_create_back").click(function() {
             $("#v-pills-basic-tab").trigger("click");
             addActivatedLi();
        });

        $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
 
        $('ul.gig-line button.active').parent().addClass("activated");

        $("ul.gig-line button").click(function(){
          addActivatedLi();
        });
        
  });
  </script>
</body>
</html>