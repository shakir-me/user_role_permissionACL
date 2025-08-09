<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Startup Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/imgs/theme/favicon.png')}}" />
        <!-- Template CSS -->
        <link href="{{asset('backend/assets/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    </head>

    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="{{ route('dashboard') }}" class="brand-wrap">
                    <img src="{{asset('backend/assets/imgs/theme/logo.png')}}" class="logo" alt="Nest Dashboard" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item active">
                        <a class="menu-link" href="{{ route('dashboard') }}">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
            
                    @can('user-list')
                    <li class="menu-item">
                        <a class="menu-link" href="{{route('user.index')}}">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">User List</span>
                        </a>
                    </li>
                  @endcan

                  @can('role-list')
                     <li class="menu-item">
                        <a class="menu-link" href="{{route('role.index')}}">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">Role List</span>
                        </a>
                    </li>
                    @endcan
            @can('permission-list')
                    <li class="menu-item">
                        <a class="menu-link" href="{{route('permission.index')}}">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">Permission List</span>
                        </a>
                    </li>
          @endcan
                    
                </ul>
            </nav>
        </aside>


        <main class="main-wrap">
           @include('layouts.sidebar')
            

            @yield('admin_content')
            <!-- content-main end// -->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; Shakir Dashboard -  2025 .
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>



        <script src="{{asset('backend/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/select2.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/chart.js')}}"></script>
        <!-- Main Script -->
        <script src="{{asset('backend/assets/js/main.js?v=1.1')}}" type="text/javascript"></script>
        <script src="{{asset('backend/assets/js/custom-chart.js')}}" type="text/javascript"></script>

   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script> 
    </body>
</html>
