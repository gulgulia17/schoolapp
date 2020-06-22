<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SchoolApp</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Site">
    <meta property="og:title" content="School App" />
    <meta property="og:description" content="This is demo admin control panel of School App for testing purposes.
    Please login with given user id & password to check the admin features.
    Call us or send whatsapp for any query - 9352529594" />
    <meta property="og:image" itemprop="image" src="./image/logo/logo_1.png">
    <meta property="og:type" content="website" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="login-page" style="min-height: 512.391px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              <div class="login-logo">
        <img src="./image/logo/logo_1.png" class="w-100"/>
    </div> 
            </div>
            <div class="col-md-6">
              <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
              
                    <form action="/login" method="post">
                        @csrf
                      <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required autocomplete="email" autofocus>
                       
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <div class="icheck-primary">
                            <input type="checkbox" id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                              Remember Me
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
<!--                    <p>This is demo admin control panel of School App for testing purposes.-->
<!--Please login with given user id & password to check the admin features.-->
<!--Call us or send whatsapp for any query -<a href="whatsapp://send?text=Hello , I'm interested in your school app.&phone=+919352529594">9352529594</a> </p>-->
              
                    
                    <!-- /.social-auth-links -->
              
                    <!--<p class="mb-1">-->
                    <!--  @if (Route::has('password.request'))-->
                    <!--    <a href="{{ route('password.request') }}">-->
                    <!--        {{ __('Forgot Your Password?') }}-->
                    <!--    </a>-->
                    <!--@endif-->
                    <!--</p>-->
                    
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
            </div>
        </div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  
  
  
  </body></html>