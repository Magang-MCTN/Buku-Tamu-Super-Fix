<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="dashboard/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="dashboard/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dashboard/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="dashboard/template/vendors/google-sign-in/google-sign-in.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="dashboard/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="dashboard/template/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <div class="row justify-content-center">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="m-auto">
                                <div class="card justify-content-center">
                                    <div class="card-body text-left pt-5 px-sm-5">
                                        <div class="brand-logo d-flex justify-content-center ">
                                            <img src="logo.png" alt="logo">
                                        </div>
                                        <h4 class="my-auto p-2 text-center">PT Mandau Cipta Tenaga Nusantara</h3>
                                    </div>
                                    <div class="card-body text-left pb-5 px-4 px-sm-5">
                                        <h4 class="py-2">Join us now</h2>
                                        <form method="POST" action="{{ route('store') }}">
                                            @csrf
                                            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password"><br>
                                            {{-- <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required>
                                                <option value="User">User</option>
                                                <option value="Admin Tim">Admin Tim</option>
                                                <option value="Admin General">Admin General</option>
                                                <option value="Admin Manager">Admin Manager</option>
                                                <option value="Administrator">Administrator</option>
                                            </select> --}}
                                            <p class="py-2">Already have an account? <a href="/login">Login here</a></p>
                                            @error('level')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="d-flex justify-content-center flex-column my-sm-2">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                                <button type="button" class="btn btn-block btn-microsoft auth-form-btn btn-outline-secondary my-sm-2">
                                                  <i class="ti-microsoft me-2"></i>Connect using Microsoft
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

