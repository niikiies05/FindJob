<div class="sidebar">

    <!-- Sidebar header -->
    <div class="sidebar-header">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon"><i class="fas fa-search-location"></i><i class="icon icon-search-1 ln-shadow-logo bg-danger "></i>
            </span><span class="text-white">FindJob</span> </a>
    </a>
        <a href="#" class="nav-link nav-icon rounded-circle ml-auto" data-toggle="sidebar">
            <i class="material-icons">close</i>
        </a>
    </div>
    <!-- /Sidebar header -->

    <!-- Sidebar body -->
    <div class="sidebar-body">
        <ul class="nav nav-sub" id="menu">
            <li class="nav-label">{{ __('features.dashboard') }}</li>

            <li class="nav-item">
                <a class="nav-link has-icon {{ request()->is('admin-dashboard') ? 'active ' : '' }}" href="{{ route('admin.index') }}">
                    <i class="bx bxs-home"></i>{{ __('features.dashboard') }}
                </a>
            </li>


            {{-- <li class="nav-item">
                <a class="nav-link has-icon active" href="index.html"><i class="fa fa-shopping-basket"></i>Sales
                    Monitoring</a>
            </li> --}}

            <li class="nav-label">MENU</li>
            {{-- @role('Admin|Commerciaux') --}}

            <li class="nav-item">
                <a class="nav-link has-icon dropdown-toggle" href="#"><i
                        class="material-icons">people</i>{{ __('features.user') }}</a>
                <ul>
                    {{-- <li><a class="" --}}
                        <li><a class="{{ request()->is('users') ? 'active ' : '' }}"
                            href="{{ route('users.index') }}"><i
                                class='bx bxs-user-detail'></i>{{ __('features.users_management') }}</a>
                    </li>
                    {{-- @role('Admin') --}}
                    <li><a class="{{ request()->is('permissions') ? 'active' : '' }}" href="{{ route('permissions.index') }}"><i
                                class='bx bxs-toggle-right'></i>Permissions</a>
                    </li>
                    <li><a class="{{ request()->is('roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                            <i class='bx bxl-react'></i>Roles</a>
                    </li>
                    {{-- @endrole --}}
                </ul>
            </li>
            {{-- @endrole --}}
            <li class="nav-item">
                <a class="nav-link has-icon dropdown-toggle" href="#"><i class="fas fa-briefcase"></i>{{ __('features.Ads') }}</a>
                <ul>
                    {{-- <li><a class="active" --}}
                    <li><a class="{{ request()->is('jobsAdmin') ? 'active ' : '' }}"
                            href="{{ route('jobsAdmin.index') }}"><i class="fas fa-briefcase"></i>{{ __('features.ads_management') }}</a>
                    </li>
                    <li><a class="{{ request()->is('categories') ? 'active' : '' }}" href="{{ route('categories.index') }}"><i
                                class='bx bxs-toggle-right'></i>Categories</a>
                    </li>
                    <li><a class="{{ request()->is('jobTypes') ? 'active' : '' }}" href="{{ route('jobTypes.index') }}">
                            <i class='bx bxl-react'></i>{{ __('features.ads_type') }}</a>
                    </li>
                    <li>
                        <a class="has-icon {{ request()->is('salaryTypes') ? 'active' : '' }}"
                            href="{{ route('salaryTypes.index') }}"><i class="fas fa-money-bill-wave"></i>{{ __('features.salary_type') }}</a>
                    </li>
                    {{-- @endrole --}}
                </ul> 
            </li>


            {{-- @role('Admin') --}}
            <li class="nav-item">
                <a class="nav-link has-icon dropdown-toggle" href="#"><i class='bx bx-target-lock'></i>Localisation</a>
                <ul>
                    <li><a class="{{ request()->is('countries') ? 'active' : '' }}"
                            href="{{ route('countries.index') }}"><i
                                class='bx bxs-flag-alt'></i>{{ __('features.countries') }}</a></li>
                    <li><a class="{{ request()->is('regions') ? 'active' : '' }}"
                            href="{{ route('regions.index') }}"><i
                                class='bx bxs-donate-heart'></i>{{ __('features.regions') }}</a></li>
                    <li><a class="{{ request()->is('cities') ? 'active' : '' }}"
                            href="{{ route('cities.index') }}"><i
                                class='bx bxs-city'></i>{{ __('features.cities') }}</a></li>
                    {{-- <li><a class="{{ request()->is('neighbourhoods') ? 'active' : '' }}"
                            href="{{ route('neighbourhoods.index') }}"><i
                                class='bx bx-expand-alt'></i>{{ __('features.neighbourhoods') }}</a></li> --}}
                </ul>
            </li>
            {{-- @endrole --}}

            <li class="nav-item">
                <a class="nav-link has-icon dropdown-toggle" href="#"><i class='bx bx-money'></i>Payement</a>
                <ul>
                    <li>
                        <a class="has-icon"
                            href="#"><i
                                class='bx bxs-cart-download'></i>{{ __('features.reload_sms') }}</a>
                    </li>
                    <li><a href="chart-bar.html"><i class='bx bx-history'></i>{{ __('features.sms_history') }}</a>
                    </li>
                </ul>
            </li>
                
    </div>

    <!-- /Sidebar body -->

</div>
