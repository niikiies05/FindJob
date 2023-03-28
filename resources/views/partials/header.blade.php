<div class="header">
    <nav class="navbar navbar-site navbar-light navbar-expand-md" style="background: #1D4354" role="navigation">
        <div class="container">

            <a href="{{ route('home') }}" class="navbar-brand logo logo-title">
                <span class="logo-icon"><i class="fas fa-search-location"></i><i class="icon icon-search-1 ln-shadow-logo bg-danger "></i>
                </span><span class="text-white">FindJob</span> </a> 

            <button class="flag-menu country-flag d-block d-sm-none btn btn-secondary hidden"
                href="#select-country" data-toggle="modal"> <span class="flag-icon flag-icon-us"></span> <span
                    class="caret"></span>
            </button>

            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler" type="button">
                <span class="sr-only">Toggle navigation</span> &#x2630;</button>


            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">

                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('jobs.index') }}">{{ __('headerClient.browse') }}</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="job-signup.html">Add Resume</a></li> --}}

                </ul>
                <ul class="nav navbar-nav ml-auto navbar-right">
                    @auth
                        <li class="nav-item">
                            @include('partials.notificationsUser')
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('jobs.index') }}">Credit: {{ number_format(Auth::user()->credit->solde, 0, ',', '.') }} XAF</a>
                        </li>
                        @endauth

                    @guest
                        
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white"><i class="fas fa-sign-in-alt mr-1"></i>
                        {{-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> --}}
                            {{ __('features.login') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white"><i class="fas fa-user mr-1"></i>
                        {{-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> --}}
                            {{ __('home.register') }}</a>
                    </li>
                    @endguest


                    {{-- @guest
                        <li class="postadd nav-item"><a
                            class="btn btn-block  btn-border btn-post btn-primary nav-link"
                            href="{{ route('login') }}">{{ __('features.login') }}</a>
                        </li>
                    @endguest --}}
                    @auth
                    <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link text-white"
                            data-toggle="dropdown">

                            <span>{{ Auth::user()->name }}</span> <i class="icon-user fa"></i> <i
                                class=" icon-down-open-big fa"></i></a>
                        <ul class="dropdown-menu user-menu dropdown-menu-right" style="width: 200px">
                            <li class="active dropdown-item"><a href="{{ route('personnal-home') }}"><i
                                        class="icon-home"></i> {{ __('headerClient.Personnal') }}

                                </a>
                            </li>
                            <li class="dropdown-item"><a href="{{ route('my-ads') }}"><i class="icon-th-thumb"></i>
                                    {{ __('headerClient.my_ads') }} </a>
                            </li>
                            <li class="dropdown-item"><a href="{{ route('favorites-ads') }}"><i
                                        class="icon-heart"></i> {{ __('headerClient.favorite') }} </a>
                            </li>
                            {{-- <li class="dropdown-item"><a href="account-saved-search.html"><i
                                        class="icon-star-circled"></i> Saved search

                                </a>
                            </li>
                            <li class="dropdown-item"><a href="account-archived-ads.html"><i
                                        class="icon-folder-close"></i> Archived ads

                                </a>
                            </li> --}}
                            <li class="dropdown-item"><a href="{{ route('pending-ads') }}"><i
                                        class="icon-hourglass"></i> {{ __('headerClient.pendinng') }}</a>
                            </li>
                            <li class="dropdown-item"><a href="statements.html"><i class=" icon-money "></i>
                                    Payment history </a>
                            </li>

                            <li class="dropdown-item"><a href="{{ route('ads.alert') }}"><i class="fas fa-exclamation-triangle"></i>
                                Alerts </a>
                            </li>


                            <li class="dropdown-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class=" icon-logout "></i> {{ __('headerClient.Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </li>
                    @endauth

                    <li class="postadd nav-item"><a
                            class="btn btn-block   btn-border btn-post btn-danger nav-link"
                            href="{{ route('jobs.create') }}">{{ __('headerClient.post_job') }}</a>
                    </li>

                    <li class="dropdown  lang-menu nav-item">
                        @if (count(config('app.languages')) > 1)

                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <span class="lang-title">{{ strtoupper(app()->getLocale()) }}</span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-right user-menu" role="menu">

                            @foreach (config('app.languages') as $langLocale => $langName)
                            <li class="dropdown-item">
                                    <a class="active" href="{{ url()->current() }}?change_language={{ $langLocale }}">
                                        <span class="lang-name">{{ strtoupper($langLocale) }}
                                            ({{ $langName }})</span></a>
                                </li>
                            @endforeach

                            
                        </ul>
                        @endif

                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
