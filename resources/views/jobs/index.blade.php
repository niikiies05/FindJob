@extends('layouts.app')

@section('header')

    <!-- /.header -->
    <div class="search-row-wrapper" style="background-image: url(images/unsplashhiring.jpg)">
        <div class="inner">
            <div class="container ">
                <form action="#">
                    {{-- <form action="{{ route('jobs.searchitems') }}" method="GET"> --}}
                    <div class="row">
                        <div class="col-md-3">
                            <input name="q" class="form-control keyword" type="text" id="searchbar"
                                placeholder="{{ __('home.job_ttle') }}" value="{{ request()->q ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="category" id="search-category">
                                <option selected="selected" value="">{{ __('home.all_categories') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="location" id="id-location">
                                <option selected="selected" value="">{{ __('home.all_location') }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-block btn-primary btn-gradient" id="BtnSearch"> <i
                                    class="fa fa-search"></i>
                                {{ __('home.find_button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.intro -->
@endsection

@section('content')


    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class=" list-filter">
                                <h5 class="list-title"><strong><a href="#"> {{ __('home.date_posted') }} </a></strong>
                                </h5>
                                <div class="filter-date filter-content">
                                    <ul>
                                        <li>
                                            <input type="radio" class="daysCheck" value="1" id="posted_1"
                                                name="posted">
                                            <label for="posted_1">24 {{ __('home.hours') }}</label>
                                        </li>
                                        <li>
                                            <input type="radio" class="daysCheck" value="3" id="posted_3"
                                                name="posted">
                                            <label for="posted_3">3 {{ __('home.days') }}</label>
                                        </li>
                                        <li>
                                            <input type="radio" class="daysCheck" value="7" id="posted_7"
                                                name="posted">
                                            <label for="posted_7">7 {{ __('home.days') }}</label>
                                        </li>
                                        <li>
                                            <input type="radio" checked="checked" class="daysCheck" value="30"
                                                id="posted_30" name="posted">
                                            <label for="posted_30">30 {{ __('home.days') }}</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.categories-list-->

                            <div class="list-filter">
                                <h5 class="list-title"><strong><a
                                            href="#">{{ __('home.employment_type') }}</a></strong>
                                </h5>
                                <div class="filter-content filter-employment-type">
                                    <ul class="browse-list list-unstyled">
                                        {{-- <li>
                                            <input type="checkbox" id="employment_all" value="all" class="emp"
                                                checked="checked">
                                            <label for="employment_all">All</label>
                                        </li> --}}
                                        @foreach ($jobTypes as $type)
                                            <li>
                                                <input type="checkbox" id="brandIdCheck" value="{{ $type->id }}"
                                                    class="try">
                                                <label for="employment_jtft">{{ $type->name }}</label>
                                                <span
                                                    class="badge badge-secondary">{{ $type->jobs->where('status', 1)->count() }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!--/.locations-list-->

                            <div class="  list-filter">
                                <h5 class="list-title"><strong><a href="#">{{ __('home.salary_range') }}</a></strong>
                                </h5>


                                <div class="filter-salary filter-content ">
                                    <form role="form" class="form-inline" action="#">
                                        {{-- <form role="form" class="form-inline" action="{{ route('jobs.searchBetween') }}"> --}}
                                        <div class="form-group col-lg-4 col-md-12 no-padding">
                                            <input type="text" placeholder="$ 2000 " id="minSalary" name="minSalary"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                        <div class="form-group col-lg-4 col-md-12 no-padding">

                                            <input type="text" placeholder="$ 3000 " id="maxSalary" name="maxSalary"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-12 no-padding">
                                            <button class="btn btn-default pull-right btn-block-md" id="BtnSalary">GO
                                            </button>
                                        </div>
                                    </form>

                                    <div class="clearfix"></div>

                                    <ul class="mt15">
                                        <li>
                                            <input type="radio" name="pay" id="payAll" value="0" class="payAll"
                                                checked="checked">
                                            <label for="pay_0">{{ __('home.any') }}</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_20" value="30000">
                                            <label for="pay_20">$30,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_40" value="70000">
                                            <label for="pay_40">$70,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_60"
                                                value="100000">
                                            <label for="pay_60">$100,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_80"
                                                value="200000">
                                            <label for="pay_80">$200,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_100"
                                                value="500000">
                                            <label for="pay_100">$500,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" class="pay" id="pay_120"
                                                value="1000000">
                                            <label for="pay_120">$1,000,000+</label>
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">{{ __('user.localisation') }}</a></strong>
                                </h5>
                                <ul class="browse-list list-unstyled long-list">
                                    @foreach ($cities as $city)
                                        <li class="filterCity" style="cursor: pointer;" value="{{ $city->id }}">
                                            {{ $city->name }} <span class="count">
                                                {{ $city->jobs->count() }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->

                <div class="col-md-9 page-content col-thin-left">

                    <div class="category-list">

                        @if (request()->input('q'))



                            <div class="tab-box clearfix ">
                                <!-- Nav tabs -->
                                <div class="col-xl-12  box-title no-border">
                                    <div class="inner">
                                        <h2><span> "{{ request()->q }} "</span>
                                            <small>
                                                @if (request()->input())
                                                    {{ $jobs->count() }} @endif
                                                {{ __('home.jobs_found') }}
                                            </small>
                                        </h2>
                                    </div>
                                </div>
                                <!-- Mobile Filter bar -->
                                <div class="mobile-filter-bar col-xl-12  ">
                                    <ul class="list-unstyled list-inline no-margin no-padding">
                                        <li class="filter-toggle">
                                            <a class="___class_+?64___">
                                                <i class="  icon-th-list"></i>
                                                Filters
                                            </a>
                                        </li>
                                        <li>
                                            {{-- <div class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle">
                                                Sort by </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="" rel="nofollow">Relevance</a></li>
                                                <li><a href="" rel="nofollow">Date</a></li>
                                                <li><a href="" rel="nofollow">Company</a></li>
                                            </ul>
                                        </div> --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="menu-overly-mask"></div>
                                <!-- Mobile Filter bar End-->
                                {{-- <div class="tab-filter hide-xs">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                                    <option value="Sort by ">Sort by </option>
                                    <option value="Relevance">Relevance</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div> --}}
                                <!--/.tab-filter-->
                            </div>
                            <!--/.tab-box-->
                            <div class="listing-filter hidden-xs">
                                {{-- <div class="pull-left col-sm-6 col-xs-12">
                                <div class="breadcrumb-list text-center-xs">
                                    <a class="jobs-s-tag" rel="nofollow" title="Software Architect">
                                        @if (request()->input('c'))
                                            {{ request()->c }}
                                        @endif 
                                    </a>
                                    in <a rel="nofollow" class="jobs-s-tag">
                                        @if (request()->input('l'))
                                            {{ request()->l }}
                                            @endif 
                                        </a>
                                </div>
                            </div> --}}
                                <div class="pull-right col-sm-6 col-xs-12 text-right text-center-xs listing-view-action">
                                    <a class="clear-all-button text-muted" href="javascript:history.go(-1)">Clear all</a>
                                </div>
                                <div style="clear:both"></div>
                            </div>

                        @endif





                        @if ($message = Session::get('success'))
                            <div class="alert alert-success fade show" role="alert">
                                <button class="btn btn-sm btn-icon btn-faded-success btn-close" type="button"
                                    data-dismiss="alert"><i class="material-icons">close</i></button>
                                <div class="media">
                                    <i class="material-icons">check_circle_outline</i>
                                    <div class="media-body ml-2">
                                        <strong>Well Done!</strong> {{ $message }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!--/.listing-filter-->
                        <div class="d-flex justify-content-center">
                            <div id="loader" style="display: none; position: absolute; margin-top:10%; z-index:9">
                                <img id="loader" src="{{ asset('ajax-loader.gif') }}" alt="loader" srcset=""
                                    height="60px" width="60px" class="___class_+?77___">
                            </div>
                        </div>
                        {{-- <div id="loader" class="d-flex justify-content-center" style="display: none">
                            <img src="{{ asset('ajax-loader.gif') }}" alt="loader" srcset="" height="60px" width="60px"
                            class="" style="position: absolute; margin-top:10%; z-index:9">
                        </div> --}}



                        <div class="adds-wrapper jobs-list" id="updateDiv">
                            {{-- <div class="adds-wrapper jobs-list" id="updateDiv"> --}}
                            @if ($premiums)
                                @foreach ($premiums as $job)
                                    <div class="d-flex justify-content-end">
                                        <p class="p-1 position-absolute text-center mt-4 text-small"
                                            style="background: gold; width:100px; z-index:99; transform: rotate(30deg); border-radius: 0% 0% 50% 70%;">
                                            Premium</p>
                                    </div>
                                    <div class="item-list job-item"
                                        style="background: rgb(247, 241, 212); border:1px solid gold">
                                        <div class="row">
                                            <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                                                <div class="add-image">
                                                    @if ($job->image)
                                                        <a href="#"><img alt="company logo"
                                                                src="{{ asset('storage') . '/' . $job->image }}"
                                                                alt="Image" class="rounded" height="50px"></a>
                                                    @else
                                                        <a href=""><img alt="company logo"
                                                                src="{{ asset('storage') . '/' . $job->category->image }}"
                                                                class="thumbnail no-margin rounded"></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--/.photobox-->
                                            <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                                                <div class="ads-details jobs-item">

                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="company-title"><a href="">{{ $job->user->name }}</a>
                                                        </h5>
                                                        <h6 class="badge badge-info text-center ">
                                                            {{ $job->category->name }}
                                                        </h6>
                                                    </div>
                                                    <h4 class="job-title"><a
                                                            href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                                                    </h4>
                                                    <span class="info-row"> <span class="item-location"><i
                                                                class="fa fa-map-marker-alt"></i>
                                                            {{ $job->city->name }}</span> <span class="date"><i
                                                                class=" icon-clock">
                                                            </i>{{ $job->jobtype->name }}</span><span
                                                            class=" salary">
                                                            <i class=" icon-money"> </i>
                                                            {{ number_format($job->salary, 0, ',', '.') }} XAF a
                                                            {{ $job->salarytype->name }}</span></span>

                                                    @if (strlen($job->description) > 200)
                                                        <p class="jobs-desc" style="">{!! substr($job->description, 0, 200) !!}
                                                            <a href="{{ route('jobs.show', $job->id) }}">voir plus...</a>
                                                        </p>
                                                    @else
                                                        <p class="jobs-desc" style="">{!! substr($job->description, 0, 200) !!}</p>
                                                    @endif

                                                    <div class="job-actions">
                                                        <ul class="list-unstyled list-inline">
                                                            <li>

                                                                <form action="{{ route('jobs.like') }}" id="form-js">
                                                                    <a class="save-job" href="#">
                                                                        <input type="hidden" value="{{ $job->id }}"
                                                                            id="job-id-js">

                                                                        <span id="count-js"
                                                                            class="count-js">{{ $job->likes->count() }}</span>
                                                                    </a>
                                                                    @auth
                                                                        @if ($job->isLikedByLoggedInUser())
                                                                            <button type="submit" class="btn btn-link like"
                                                                                id="like">Je n'aime plus</button>
                                                                        @else
                                                                            <button type="submit" class="btn btn-link like"
                                                                                id="like">J'aime</button>
                                                                        @endif
                                                                    @endauth
                                                                    
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="email-job">
                                                                    <i class="fa fa-envelope"></i>
                                                                    Email Job
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/.add-desc-box-->

                                            <!--/.add-desc-box-->
                                        </div>
                                    </div>
                                @endforeach

                            @endif


                            @include('jobs.searchAjaxCheckResult')

                            {{-- {{ $jobs->links() }} --}}

                            {{-- @foreach ($jobs as $job)

                                <div class="item-list job-item">
                                    <div class="row">
                                        <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                                            <div class="add-image">
                                                @if ($job->image)
                                                    <a href="#"><img alt="company logo"
                                                            src="{{ asset('storage') . '/' . $job->image }}" alt="Image"
                                                            class="rounded" height="50px"></a>
                                                @else
                                                    <a href=""><img alt="company logo"
                                                            src="{{ asset('storage') . '/' . $job->category->image }}"
                                                            class="thumbnail no-margin rounded"></a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                                            <div class="ads-details jobs-item">

                                                <div class="d-flex justify-content-between">
                                                    <h5 class="company-title"><a href="">{{ $job->user->name }}</a></h5>
                                                    <h6 class="badge badge-info text-center ">{{ $job->category->name }}
                                                    </h6>
                                                </div>
                                                <h4 class="job-title"><a
                                                        href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                                                </h4>
                                                <span class="info-row"> <span class="item-location"><i
                                                            class="fa fa-map-marker-alt"></i>
                                                        {{ $job->city->name }}</span> <span class="date"><i
                                                            class=" icon-clock">
                                                        </i>{{ $job->jobtype->name }}</span><span class=" salary"> <i
                                                            class=" icon-money"> </i>
                                                        {{ number_format($job->salary, 0, ',', '.') }} XAF a
                                                        {{ $job->salarytype->name }}</span></span>
                                                <div class="jobs-desc"> {!! $job->description !!}
                                                </div>
                                                <div class="job-actions">
                                                    <ul class="list-unstyled list-inline">
                                                        <li>
                                                            <form action="{{ route('jobs.like') }}" id="form-js">
                                                                <a class="save-job" href="#">
                                                                    <input type="hidden" value="{{ $job->id }}"
                                                                        id="job-id-js">

                                                                    <span class="far fa-star vide" id="vide"></span>
                                                                <span class="fa fa-star plein" id="plein"></span>

                                                                    <span id="count-js"
                                                                        class="count-js">{{ $job->likes->count() }}</span>
                                                                </a>

                                                                <button type="submit" class="btn btn-link like"
                                                                    id="like">Favori</button>
                                                            </form>

                                                        </li>
                                                        <li>
                                                            <a href="#" class="email-job">
                                                                <i class="fa fa-envelope"></i>
                                                                Email Job
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                            @endforeach --}}

                            <!--/.job-item-->
                            {{-- <div class="pagination-bar text-center">
                                {!! $jobs->links() !!}
                            </div> --}}


                        </div>
                        <!--/.adds-wrapper-->

                        {{-- <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                                Save Search </a></div>
                    </div>
                    <div class="pagination-bar text-center">
                        {{ $jobs->links() }}
                    </div> --}}
                        <!--/.pagination-bar -->

                        {{-- <div class="post-promo text-center">
                        <h2> Looking for a job? </h2>
                        <h5> Upload your CV and easily apply to jobs from any device! </h5>
                        <a href="" class="btn btn-lg btn-border btn-post btn-danger">Upload your CV </a>
                    </div> --}}
                        <!--/.post-promo-->

                    </div>
                    <!--/.page-content-->

                </div>
            </div>
        </div>
        <!-- /.main-container -->



        {{-- <script>
        $(document).ready(function(){
        
         $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });
        
         function fetch_data(page)
         {
          $.ajax({
           url:"/pagination/fetch_data?page="+page,
           success:function(data)
           {
            $('#updateDiv').html(data);
           }
          });
         }
         
        });
        </script> --}}
    @endsection
