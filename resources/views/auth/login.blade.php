<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="dashboard/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="dashboard/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="dashboard/template/vendors/google-sign-in/google-sign-in.css">
    <link rel="stylesheet" href="dashboard/template/css/vertical-layout-light/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="dashboard/template/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo d-flex justify-content-center">
                                <img src="logo1.png" alt="logo">
                            </div>
                            <h5 class="d-flex justify-content-center">PT Mandau Cipta Tenaga Nusantara</h5><br>
                            <p class="fw-light">Sign in to continue.</p>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <p>Don't have an account? <a href="/register">Register here</a></p>

                                <div class="d-grid gap-2">
                                    <!-- Tombol Login -->
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <!-- Tombol Signin Google -->
                                    <button class="gsi-material-button btn border border-black" onclick="window.location.href = '{{ '/auth/redirect' }}';">
                                      <div class="gsi-material-button-state"></div>
                                      <div class="gsi-material-button-content-wrapper">
                                        <div class="gsi-material-button-icon">
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                            <path fill="none" d="M0 0h48v48H0z"></path>
                                          </svg>
                                        </div>
                                        <span class="gsi-material-button-contents">Sign in with Google</span>
                                        <span style="display: none;">Sign in with Google</span>
                                      </div>
                                    </button>

                                    <!-- Tombol Signin Microsoft -->
                                    <button type="button" class="btn btn-secondary">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-microsoft me-2" viewBox="0 0 16 16">
                                        <path d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z"/>
                                      </svg> Sign in with Microsoft
                                    </button>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="dashboard/template/vendors/js/vendor.bundle.base.js"></script>
</body>

</html>




{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="dashboard/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="dashboard/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="dashboard/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="dashboard/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="dashboard/template/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="dashboard/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="dashboard/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="dashboard/template/images/favicon.png" />
</head>
<form method="POST" action="{{ route('login') }}">
    @csrf
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
         <div class="card col-lg-4 mx-auto">
            <div class="card-body text-left py-5 px-4 px-sm-5">
       <div class="brand-logo d-flex justify-content-center">
               <img src="dashboard/template/images/MCTN.png" alt="logo">

              </div>
              <h5 class="d-flex justify-content-center">PT Mandau Cipta Tenaga Nusantara</h5><br>
              <p class="fw-light">Sign in to continue.</p>
              <form class="pt-3">
                <div class="form-group">
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group">
                  <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
                </div>
                <p>Don't have account? <a href="/register">Register here</a></p>
                <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                            Login
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
                <br>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">

                        <!-- tambahkan script di bawah ini untuk membuat tombol signin google -->
                        <a class="btn btn-danger" href="{{ '/auth/redirect'}}">google</a>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="mb-2 d-flex justify-content-center">
                  <button type="button" class="btn btn-block btn-microsoft auth-form-btn">
                    <i class="ti-microsoft me-2"></i>Connect using Microsoft
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="dashboard/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="dashboard/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="dashboard/template/js/off-canvas.js"></script>
  <script src="dashboard/template/js/hoverable-collapse.js"></script>
  <script src="dashboard/template/js/template.js"></script>
  <script src="dashboard/template/js/settings.js"></script>
  <script src="dashboard/template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html> --}}
