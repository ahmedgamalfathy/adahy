<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="P2P : " />
	<meta property="og:title" content="P2P : " />
	<meta property="og:description" content="P2P : " />

	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Islah </title>
	<?php
  $theme1 = "theme1";
  ?>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{$theme1}}/images/favicon.png" />
    <link href="{{$theme1}}/css/style.css" rel="stylesheet">

</head>
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">


                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#">Islah</a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    @if (session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
  @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('Email Address') }}</strong></label>
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('Password') }}</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
                                  

                                        <div class="row d-flex justify-content-between mt-4 mb-2" >
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													<label class="form-check-label" for="basic_checkbox_1"> {{ __('Remember Me') }}</label>
												</div>
                                            </div>
                                            <div class="mb-3">
                                            @if (Route::has('password.request'))
                                
                                @endif
                                            </div>
                                        </div>

                

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                        </div>

                    
                    </form>

                    <div class="new-account mt-3" >
                                      
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

