<div class="main-header">
    <a class="nav-link nav-icon rounded-circle" href="#" data-toggle="sidebar"><i class="material-icons">menu</i></a>
    <form class="form-inline ml-3 d-none d-md-flex">
        <span class="input-icon">
            {{-- <i class="material-icons">search</i>
            <input type="search" placeholder="Search..." class="form-control shadow-none bg-light border-0"> --}}
        </span>
    </form>
    <div class="col-md-2">
        <ul class="navbar-nav ml-auto">
            @if (count(config('app.languages')) > 1)
                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach (config('app.languages') as $langLocale => $langName)
                            <a class="dropdown-item"
                                href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif 
        </ul>
    </div>


    <ul class="nav nav-circle nav-gap-x-1 ml-auto deranger">
        {{-- <li class="nav-item d-md-none"><a class="nav-link nav-icon" data-toggle="modal" href="#searchModal"><i
                    class="material-icons">search</i></a></li> --}}
        <li class="nav-item d-none d-sm-block"><a class="nav-link nav-icon" href="" id="refreshPage"><i
                    class="material-icons">refresh</i></a></li>
        <li class="nav-item dropdown nav-notif">
            <a class="nav-link nav-icon dropdown-toggle no-caret" href="#" data-toggle="dropdown" data-display="static">
                <i class="material-icons">color_lens</i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow border-0 p-3">
                <form>
                    <h6>Navigation theme</h6>
                    <div class="custom-color custom-color-lg">
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-blue.min.css"
                                id="sidebar-theme-blue" class="custom-control-input" checked>
                            <label class="rounded-circle" for="sidebar-theme-blue"
                                style="background-color:#2b579a"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-cyan.min.css"
                                id="sidebar-theme-cyan" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-cyan"
                                style="background-color:#006064"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-gray.min.css"
                                id="sidebar-theme-gray" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-gray"
                                style="background-color:#37474f"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-green.min.css"
                                id="sidebar-theme-green" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-green"
                                style="background-color:#217346"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-pink.min.css"
                                id="sidebar-theme-pink" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-pink"
                                style="background-color:#ad1457"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-purple.min.css"
                                id="sidebar-theme-purple" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-purple"
                                style="background-color:#7151c8"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-red.min.css"
                                id="sidebar-theme-red" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-red"
                                style="background-color:#b7472a"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-dark.min.css"
                                id="sidebar-theme-dark" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-dark"
                                style="background-color:#272822"></label>
                        </div>
                        <div class="color-item color-item-light">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-white.min.css"
                                id="sidebar-theme-white" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-white"
                                style="background-color:#fff"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-royal.min.css"
                                id="sidebar-theme-royal" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-royal"
                                style="background-color:#243b55"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-ash.min.css"
                                id="sidebar-theme-ash" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-ash"
                                style="background-color:#606c88"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-crimson.min.css"
                                id="sidebar-theme-crimson" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-crimson"
                                style="background-color:#573662"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-namn.min.css"
                                id="sidebar-theme-namn" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-namn"
                                style="background-color:#9b3333"></label>
                        </div>
                        <div class="color-item">
                            <input type="radio" name="sidebar-theme" value="../css/sidebar-frost.min.css"
                                id="sidebar-theme-frost" class="custom-control-input">
                            <label class="rounded-circle" for="sidebar-theme-frost"
                                style="background-color:#00275a"></label>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        @include('partials.notifications')

        {{-- @include('partials.messages') --}}

        {{-- <li class="nav-item">
            <a class="nav-link nav-icon has-badge" href="#chatModal" data-toggle="modal">
                <i class="material-icons">chat</i>
                <span class="badge badge-pill badge-warning">2</span>
            </a>
        </li> --}}
    </ul>









    <ul class="nav nav-pills">
        <li class="nav-link-divider mx-2"></li>
        <li class="nav-item dropdown">
            <a class="nav-link has-img dropdown-toggle px-2" href="#" data-toggle="dropdown">
                @if (Auth::user() && Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage') . '/' . Auth::user()->profile_photo_path }}" alt="Admin"
                        class="rounded-circle mr-2">
                        @foreach (Auth::user()->roles as $role)
                            <span class="d-none d-sm-block">{{ $role->name }}</span>
                        @endforeach
                @else
                    <img src="{{ asset('images/user.jpg') }}" alt="Admin" class="rounded-circle mr-2">
                    {{-- @foreach ( Auth::user()->roles as $role )
                        <span class="d-none d-sm-block">{{ $role->name }}</span>
                    @endforeach --}}
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow border-0 p-0">
                <div class="card border-0">
                    <div class="card-header flex-column px-5">
                        @if (Auth::user())
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage') . '/' . Auth::user()->profile_photo_path }}" alt="User"
                                    class="rounded-circle mb-2" width="75" height="75">
                            @else
                                <img src="{{ asset('images/user.jpg') }}" alt="User" class="rounded-circle mb-2" width="75"
                                    height="75">
                                    {{-- <span class="d-none d-sm-block">Admin</span> --}}
                            @endif
                            <h6>{{ Auth::user()->username }}</h6>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        @else
                            <img src="{{ asset('images/user.jpg') }}" alt="User" class="rounded-circle mb-2" width="75" height="75">
                        @endif
                    </div>

                    <div class="list-group list-group-flush list-group-sm list-group-borderless py-2">
                        @auth
                            {{-- <a href="{{ route('users.show', Auth::user()->id) }}" --}}
                                <a href="#"
                                class="list-group-item list-group-item-action has-icon"><i
                                    class="material-icons mr-2">person</i>{{ __('auth.my_profile') }}</a>


                            <a href="#" class="list-group-item list-group-item-action has-icon"><i
                                    class="material-icons mr-2">settings</i>{{ __('auth.setting') }}</a>
                            <a href="{{ route('logout') }}"
                                class="list-group-item list-group-item-action has-icon text-danger" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="material-icons mr-2">exit_to_app</i>{{ __('auth.logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="#" class="list-group-item list-group-item-action has-icon"><i
                                    class="material-icons mr-2">settings</i>{{ __('auth.setting') }}</a>

                            <a href="{{ route('login') }}"
                                class="list-group-item list-group-item-action has-icon text-success" >
                                <i class="material-icons mr-2">exit_to_app</i>{{ __('auth.login') }}</a>

                            {{-- <form id="login-form" action="{{ route('login') }}" method="POST" class="d-none">
                                @csrf
                            </form> --}}

                        @endauth
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
