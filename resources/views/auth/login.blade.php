@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-5 login-box">
                <div class="card card-default">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                {{-- <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i>
                                </span> JOB<span>CLASSIFIED </span>  --}}

                                <span class="logo-icon"><i class="fas fa-search-location"></i><i class="icon icon-search-1 ln-shadow-logo bg-danger "></i>
                                </span><span class="text-dark">FindJob</span> </a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sender-email" class="control-label">{{ __('home.email_address') }}:</label>

                                <div class="input-icon"><i class="icon-user fa"></i>
                                    <input id="sender-email" type="email" placeholder="{{ __('home.your_email') }}"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user-pass" class="control-label">{{ __('home.password') }}:</label>

                                <div class="input-icon"><i class="icon-lock fa"></i>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                        name="password" autocomplete="current-password" placeholder="{{ __('home.password') }}"
                                        id="user-pass">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary  btn-block">{{ __('home.submit') }}</button>
                            </div>
                        </div>
                        <div class="card-footer">

                            <div class="checkbox pull-left">
                                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                       {{ __('home.remember_me') }}
                                    </label>
                                </label>
                            </div>

                            {{-- <div class="checkbox pull-left">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> Keep me logged in</span>
                            </label>
                        </div> --}}


                            <p class="text-center pull-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('home.lost_password') }}
                                    </a>
                                @endif
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </form>
                </div>
                <div class="login-box-btm text-center">
                    <p> {{ __('home.do_not_account') }} <br>
                        <a href="{{ route('register') }}"><strong>{{ __('home.sign_up') }}</strong> </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
