@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3 page-sidebar">
            <aside>
                <div class="inner-box">
                    <div class="user-panel-sidebar">
                        <div class="collapse-box">
                            <h5 class="collapse-title no-border"> {{ __('sidebarClient.my_classified') }} <a href="#MyClassified"  aria-expanded="true"  data-toggle="collapse"
                                                                                   class="pull-right"><i
                                    class="fa fa-angle-down"></i></a></h5>

                            <div class="panel-collapse collapse show" id="MyClassified">
                                <ul class="acc-list">
                                    <li><a class="{{ request()->is('account-personnal-home') ? 'active' : '' }}" href="{{ route('personnal-home') }}"><i class="icon-home"></i>
                                        {{ __('sidebarClient.personnal_home') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.collapse-box  -->
                        <div class="collapse-box">
                            <h5 class="collapse-title"> {{ __('sidebarClient.my_ads') }} <a href="#MyAds" aria-expanded="true"  data-toggle="collapse"
                                                                  class="pull-right"><i
                                    class="fa fa-angle-down"></i></a></h5>

                            <div class="panel-collapse collapse show" id="MyAds">
                                <ul class="acc-list">
                                    <li><a class="{{ request()->is('account-my-ads') ? 'active' : '' }}"  href="{{ route('my-ads') }}"><i class="icon-docs"></i> {{ __('sidebarClient.my_ads') }} 
                                        <span class="badge">{{ Auth::user()->jobs->where('status',1)->count() }}</span>
                                         </a></li>

                                    <li><a class="{{ request()->is('account-my-favorites-ads') ? 'active' : '' }}" href="{{ route('favorites-ads') }}"><i class="icon-heart"></i>
                                        {{ __('sidebarClient.favourite') }} 
                                        <span class="badge badge-secondary">{{ Auth::user()->likes->count() }}</span>
                                     </a></li>

                                    {{-- <li><a href="account-saved-search.html"><i class="icon-star-circled"></i>
                                        Saved search 
                                        <span class="badge badge-secondary">42</span> 
                                    </a></li>

                                    <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i>
                                        Archived ads 
                                        {{-- <span class="badge badge-secondary">42</span> --}}
                                    {{-- </a></li>  --}}

                                    <li><a href="{{ route('pending-ads') }}" class="{{ request()->is('account-my-pending-ads') ? 'active' : '' }}"><i
                                            class="icon-hourglass"></i> {{ __('sidebarClient.pending') }} 
                                            <span class="badge">{{ Auth::user()->jobs->where('status',0)->count() }}</span>
                                        </a></li>

                                    <li class=""><a href="account-message-inbox.html"><i
                                            class="icon-mail"></i> Message Inbox <span
                                            class="badge">15</span></a>
                                    </li>

                                    <li><a href="{{ route('ads.alert') }}"><i class="icon-folder-close"></i>
                                        Alerts 
                                        <span class="badge badge-secondary">42</span>
                                    </a></li> 
        
        
                                </ul>
                            </div>
                        </div>
                        <!-- /.collapse-box  -->

                        {{-- <div class="collapse-box">
                            <h5 class="collapse-title"> {{ __('sidebarClient.terminate_account') }} <a href="#TerminateAccount"
                                                                             aria-expanded="true"  data-toggle="collapse"
                                                                             class="pull-right"><i
                                    class="fa fa-angle-down"></i></a></h5>

                            <div class="panel-collapse collapse show" id="TerminateAccount">
                                <ul class="acc-list">
                                    <li><a href="account-close.html"><i class="icon-cancel-circled "></i> {{ __('sidebarClient.close_account') }} </a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- /.collapse-box  -->
                    </div>
                </div>
                <!-- /.inner-box  -->

            </aside>
        </div>
        <!--/.page-sidebar-->

        @yield('content-sidebar')
        <!--/.page-content-->
    </div>
    <!--/.row-->
</div>


@endsection