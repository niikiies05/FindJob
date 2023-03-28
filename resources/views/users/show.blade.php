@extends('layouts.appAdmin')

@section('content')

    @auth

        <!-- Main body -->
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb breadcrumb-style2">
                    <li class="breadcrumb-item"><a href="index.html">{{__('features.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('features.user') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('features.user_profile') }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
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


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card card-style-1">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                {{-- @if ($user->profile_photo_path)
                                    <img src="{{ asset('storage') . '/' . $user->profile_photo_path }}" alt="Admin"
                                        class="rounded-circle" width="150">
                                @else
                                    <img src="../img/user.svg" alt="Admin" class="rounded-circle" width="150">
                                @endif --}}
                                @if ($user->image)
                                <img src="{{ asset('storage') . '/' . $user->image }}" alt="user"
                                    class="rounded-circle" width="150" height="150">
                            @else
                                <img src="{{ asset('images/user.jpg') }}" alt="user" class="rounded-circle"
                                    width="150" height="150">
                            @endif

                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    {{-- <p class="text-secondary mb-1">{{ $user->roles->name }}</p> --}}
                                    @foreach ($user->roles as $role)
                                        <p class="text-muted font-size-sm">{{ $role->name }}</p>
                                    @endforeach
                                    {{-- <button class="btn btn-primary">Follow</button> --}}
                                    <span class="font-weight-bold">Member since </span> <span>{{ $user->created_at->format('Y-m-d. a H:m') }}</span>

                                    {{-- <button type="button" data-toggle="modal" data-target="#profileEdit{{ Auth::user()->id }}"
                                        class="btn btn-outline-primary">{{ __('user.edit_profile') }}</button> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style-1 mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-briefcase"></i> Total jobs:</h6>
                                <span class="text-secondary">{{ $user->jobs->count() }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-check-circle"></i> Jobs Validated: </h6>
                                <span class="text-secondary">{{ $user->jobs->where('status', 1)->count() }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-hourglass-half"></i> Pending jobs: </h6>
                                <span class="text-secondary">{{ $user->jobs->where('status', 0)->count()}}</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-style-1 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('user.user_username') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('setting.mobile') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->mobile }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About him</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->about_yourself }}
                                </div>
                            </div>

                            <hr>
                            {{-- <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('user.localisation') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ !empty($user->city) ? $user->city->name:'' }},
                                    {{ !empty($user->city) ? $user->city->region->name:'' }},
                                    {{ !empty($user->city) ? $user->city->region->country->name:'' }}
                                    {{ $user }}
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card card-style-1 h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-warning mr-2">rss_feed</i>Recent Connexion</h6>
                                    <div class="timeline timeline-left font-size-sm">
                                        <div class="timeline-container left">
                                            <div class="popover bs-popover-right popover-static shadow-none">
                                                <div class="arrow"></div>
                                                <div class="popover-body text-muted">
                                                    <a href="javascript:void(0)" class="text-body">{{ $user->name }}</a> {{ $user->last_login }}
                                                    <div class="small">{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 mb-3">
                            <div class="card card-style-1 h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
        <!-- /Main body -->
        {{-- @include('users.profileEdit') --}}



    @endauth

@endsection
