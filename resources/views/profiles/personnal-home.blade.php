@extends('partials.sidebar')
@section('content-sidebar')

        <div class="col-md-9 page-content">
            <div class="inner-box">
                <div class="row">
                    <div class="col-md-5 col-xs-4 col-xxs-12">
                        <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg"
                                    src="images/user.jpg"
                                    alt="user"> {{ Auth::user()->name }}
                        </a></h3>
                    </div>
                    <div class="col-md-7 col-xs-8 col-xxs-12">
                        <div class="header-data text-center-xs">
                            <div class="hdata">
                                <div class="mcol-left">
                                    <!-- Icon with red background -->
                                    <i class="fas fa-envelope ln-shadow"></i></div>
                                <div class="mcol-right">
                                    <!-- Number of visitors -->
                                    <p><a href="account-message-inbox.html">15</a> <em>Mail</em></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- Traffic data -->
                            <div class="hdata">
                                <div class="mcol-left">
                                    <!-- Icon with red background -->
                                    <i class="fa fa-eye ln-shadow"></i></div>
                                <div class="mcol-right">
                                    <!-- Number of visitors -->
                                    <p><a href="#">7000</a> <em>visits</em></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- revenue data -->
                            <div class="hdata">
                                <div class="mcol-left">
                                    <!-- Icon with green background -->
                                    <i class="icon-th-thumb ln-shadow"></i></div>
                                <div class="mcol-right">
                                    <!-- Number of visitors -->
                                    <p><a href="#">{{ Auth::user()->jobs->count() }}</a><em>{{ __('homeClient.ads') }}</em></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- revenue data -->
                            <div class="hdata">
                                <div class="mcol-left">
                                    <!-- Icon with blue background -->
                                    <i class="fa fa-user ln-shadow"></i></div>
                                <div class="mcol-right">
                                    <!-- Number of visitors -->
                                    <p><a href="#">{{ Auth::user()->likes->count() }}</a> <em>{{ __('homeClient.Favorites') }} </em></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <button class="btn btn-sm btn-icon btn-faded-success btn-close" type="button" data-dismiss="alert"><i
                        class="material-icons">close</i></button>
                <div class="media">
                    <i class="material-icons">check_circle_outline</i>
                    <div class="media-body ml-2">
                        <strong>Well Done!</strong> {{ $message }}
                    </div>
                </div>
            </div>
        @endif

            <div class="inner-box">
                <div class="welcome-msg">
                    <h3 class="page-sub-header2 clearfix no-padding">Hello {{ Auth::user()->name }} </h3>
                    <span class="page-sub-header-sub small">You last logged in at: {{Auth::user()->last_login }} [ Time (GMT + 0:00hrs)] {{ \Carbon\Carbon::parse(Auth::user()->last_login)->diffForHumans() }}</span>
                </div>

                <div id="accordion" class="panel-group">
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title"><a href="#collapseB1" aria-expanded="true"  data-toggle="collapse" > {{ __('homeClient.my_details') }} </a></h4>
                        </div>
                        <div class="panel-collapse collapse show" id="collapseB1">
                            <div class="card-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('personnal.update', Auth::user()->id) }}">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ __('user.user_username') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
                                        
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ Auth::user()->email }}">
                                        
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ __('homeClient.about_yourself') }}</label>
                                        <div class="col-sm-9">
                                            <textarea name="about_yourself" id="" cols="30" rows="10" class="form-control @error('about_yourself') is-invalid @enderror">
                                                {{ Auth::user()->about_yourself }}
                                            </textarea>
                                        
                                        @error('about_yourself')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Phone" class="col-sm-3 control-label">{{ __('setting.mobile') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="Phone" name="mobile"
                                                value="{{ Auth::user()->mobile }}">
                                        
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-default">{{ __('homeClient.update') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title"><a href="#collapseB2" aria-expanded="true"  data-toggle="collapse" > {{ __('homeClient.settings') }} </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapseB2">
                            <div class="card-body">
                                <form class="form-horizontal" role="form" action="{{ route('password.update', Auth::user()->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        {{-- <div class="col-sm-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Comments are enabled on my ads </label>
                                            </div>
                                        </div> --}}
                                    </div>    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ __('homeClient.new_password') }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ __('homeClient.confirm_password') }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="" name="password_confirmation">
                                        
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-default">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title"><a href="#collapseB3" aria-expanded="true"  data-toggle="collapse" >
                                Preferences </a></h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapseB3">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                I want to receive newsletter. </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                I want to receive advice on buying and selling. </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-box End-->

            </div>
        </div>
        <!--/.page-content-->


@endsection