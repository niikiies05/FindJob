@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 page-content">
            <div class="inner-box category-content">
                <h2 class="title-2"><i class="icon-user-add"></i> {{ __('home.free_account') }} </h2>

                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset>
                                <div class="form-group row required">
                                    <label class="col-md-4 control-label">{{ __('home.You_are_a') }} <sup>*</sup></label>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="">{{ __('home.select_role') }} ----</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group  row required">
                                    <label class="col-md-4 control-label">{{ __('user.user_username') }} <sup>*</sup></label>
                                    <div class="col-md-6">
                                        <input name="name" placeholder="your username"
                                            class="form-control input-md @error('name') is-invalid @enderror" required="" type="text">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
    
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group  row required">
                                    <label class="col-md-4 control-label">{{ __('home.Phone_Number') }} <sup>*</sup></label>
                                    <div class="col-md-6">
                                        <input name="mobile" placeholder="{{ __('home.Phone_Number') }}"
                                            class="form-control input-md @error('mobile') is-invalid @enderror" type="tel">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
    
                                        {{-- <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                <small> Hide the phone number on the published ads.</small>
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group row">
                                    <label class="col-md-4 control-label" for="textarea">{{ __('homeClient.about_yourself') }}</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control @error('about_yourself') is-invalid @enderror" id="textarea"
                                            name="about_yourself">{{ __('homeClient.about_yourself') }}</textarea>
                                            @error('about_yourself')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group  row required">
                                    <label for="inputEmail3" class="col-md-4 control-label">{{ __('user.user_email') }}
                                        <sup>*</sup></label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail3"
                                            placeholder="{{ __('user.user_email') }}" name="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group  row required">
                                    <label for="inputPassword3" class="col-md-4 control-label">{{ __('home.password') }}</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword3"
                                            placeholder="{{ __('home.password') }}" name="password">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            {{ __('home.at_least') }}
                                        </small>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group  row required">
                                    <label for="inputPassword3" class="col-md-4 control-label">{{ __('home.password_confirmation') }}</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword3"
                                            placeholder="Password" name="password_confirmation">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            {{ __('home.at_least') }}
                                        </small>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 control-label"></label>

                                    <div class="col-md-8">
                                        <div class="termbox mb10">
                                            <div class="col-auto my-1 no-padding">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customControlAutosizing">
                                                    <label class="custom-control-label"
                                                        for="customControlAutosizing"> <span
                                                            class="custom-control-description"> {{ __('home.i_have_read') }} <a
                                                                href="terms-conditions.html">Terms
                                                                & Conditions</a> </span></label>
                                                </div>
                                            </div>

                                        </div>
                                        <div style="clear:both"></div>
                                        <button type="submit" class="btn btn-primary">{{ __('home.register') }}</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-content -->

        <div class="col-md-4 reg-sidebar">
            <div class="reg-sidebar-inner text-center">
                <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                    <h3><strong>{{ __('home.post_a_classified') }}</strong></h3>

                    <p> {{__('home.desc_of_post_a_classified')}} </p>
                </div>
                <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                    <h3><strong>{{ __('home.create_and_manage') }}</strong></h3>

                    <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                        Praesent tristique elit pharetra magna efficitur laoreet.</p>
                </div>
                <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                    <h3><strong>{{ __('home.create_favorite') }}</strong></h3>

                    <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                        Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>


    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

