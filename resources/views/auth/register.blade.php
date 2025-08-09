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
    </head>

    <body>
        <main>
            
            <section class="content-main mt-80 mb-80">
                <div class="card mx-auto card-login">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create an Account</h4>
                          <form method="POST" action="{{ route('register') }}">
                          @csrf
                             <div class="mb-3">
                                <label class="form-label">Name *</label>
                                <input class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" required placeholder="Enter Your Name" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input class="form-control" placeholder="Your Email" type="text" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input class="form-control" placeholder="Your Email" type="text" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input class="form-control" placeholder="Your Email" type="text" />
                            </div>
                        
                           
                            
                            
                            <!-- form-group  .// -->
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                            <!-- form-group// -->
                        </form>
                       
                        <p class="text-center mb-2">Already have an account? <a href="#">Sign in now</a></p>
                    </div>
                </div>
            </section>
           
        </main>
        <script src="{{asset('backend/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
        <!-- Main Script -->
        <script src="{{asset('backend/assets/js/main.js?v=1.1')}}" type="text/javascript"></script>
    </body>
</html>
