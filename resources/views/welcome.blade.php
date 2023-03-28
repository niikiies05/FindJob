@extends('layouts.app')

@section('header')

    @include('partials.jobIntro')
    <!-- /.intro -->
@endsection

@section('content')

    <div class="container">

        <div style="clear: both"></div>


        <div class="col-xl-12 content-box ">
            <div class="row row-featured row-featured-category">
                <div class="col-xl-12  box-title no-border">
                    <div class="inner">
                        <h2><span>{{ __('home.browse_by') }}</span>
                            {{ __('home.category') }} <a href="category.html" class="sell-your-item"> View more <i
                                    class="  icon-th-list"></i> </a></h2>
                    </div>
                </div>
                @foreach ($categories as $category)

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <div class="justify-content-between" style="position:absolute; z-index: 10">
                            <span class="badge badge-pill badge-secondary">{{ $category->jobs->count() }}</span>
                        </div>
                        <a href="{{ route('jobs.category', $category->id) }}"><img
                                src="{{ asset('storage') . '/' . $category->image }}" class="img-responsive" alt="img"
                                height="auto" width="auto">
                            <h6> {{ $category->name }} </h6>
                        </a>
                    </div>

                @endforeach

            </div>


        </div>


        <div style="clear: both"></div>

        <div class="row">

            <div class="col-md-9 page-content col-thin-right">
                <div class="content-box col-xl-12">
                    <div class="row row-featured row-featured-category">
                        <div class="col-xl-12  box-title no-border">
                            <div class="inner">
                                <h2><span>{{ __('home.latest') }}</span> {{ __('home.job') }}
                                    <a href="{{ route('jobs.index') }}" class="sell-your-item">
                                        {{ __('home.view_more') }} <i class="  icon-th-list"></i> </a>
                                </h2>
                            </div>
                        </div>

                        <div class="adds-wrapper jobs-list" id="homeresult">

                            {{-- @foreach ($jobs as $job)

                                <div class="item-list job-item">
                                    <div class="row">

                                        <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                                            <div class="add-image">
                                                @if ($job->image)
                                                    <a href="#"><img alt="company logo"
                                                            src="{{ asset('storage') . '/' . $job->image }}" alt="Image"
                                                            class="rounded" height="50px"
                                                            class="thumbnail no-margin"></a>
                                                @else
                                                    <a href="#"><img alt="company logo"
                                                            src="{{ asset('storage') . '/' . $job->category->image }}"
                                                            class="thumbnail no-margin"></a>
                                                @endif
                                            </div>
                                        </div>
                                        <!--/.photobox-->
                                        <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                                            <div class="ads-details jobs-item">
                                                <h5 class="company-title "><a href="#">{{ $job->user->name }}</a></h5>
                                                <h4 class="job-title"><a href="{{ route('jobs.show', $job->id) }}">
                                                        {{ $job->title }}</a>
                                                </h4>
                                                <span class="info-row"> <span class="item-location"><i
                                                            class="fa fa-map-marker-alt"></i> {{ $job->city->name }}
                                                    </span>
                                                    <span class="date"><i class=" icon-clock">
                                                        </i>{{ $job->jobtype->name }}</span><span class=" salary">
                                                        <i class=" icon-money">
                                                        </i>XAF{{ number_format($job->salary, 0, ',', '.') }} a
                                                        {{ $job->salarytype->name }}</span></span>

                                                <div class="jobs-desc"> {{ $job->description }}</div>


                                                <div class="job-actions">
                                                    <ul class="list-unstyled list-inline">
                                                        <li>
                                                            <a class="save-job" href="#">
                                                                <span class="far fa-star"></span>
                                                                Save Job
                                                            </a>
                                                        </li>
                                                        <li class="saved-job hide">
                                                            <a href="#" class="saved-job">
                                                                <span class="fa fa-star"></span>
                                                                Saved Job
                                                            </a>
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

                            @endforeach --}}

                            @foreach ($jobs as $job)

                            <div class="item-list job-item">
                                <div class="row">
                                    <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                                        <div class="add-image">
                                            @if ($job->image)
                                                <a href="#"><img alt="company logo" src="{{ asset('storage') . '/' . $job->image }}"
                                                        alt="Image" class="rounded" height="50px"></a>
                                            @else
                                                <a href=""><img alt="company logo"
                                                        src="{{ asset('storage') . '/' . $job->category->image }}"
                                                        class="thumbnail no-margin rounded"></a>
                                            @endif
                                            {{-- <a href=""><img alt="company logo"
                                                src="images/jobs/company-logos/17.jpg" class="thumbnail no-margin"></a> --}}
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                                        <div class="ads-details jobs-item">
                    
                                            <div class="d-flex justify-content-between">
                                                <h5 class="company-title"><a href="">{{ $job->user->name }}</a></h5>
                                                <h6 class="badge badge-info text-center ">{{ $job->category->name }}</h6>
                                            </div>
                                            <h4 class="job-title"><a
                                                    href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h4>
                                            <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker-alt"></i>
                                                    {{ $job->city->name }}</span> <span class="date"><i class=" icon-clock">
                                                    </i>{{ $job->jobtype->name }}</span><span class=" salary"> <i
                                                        class=" icon-money"> </i> {{ number_format($job->salary, 0, ',', '.') }} XAF a
                                                    {{ $job->salarytype->name }}</span></span>
                                            {{-- <div class="jobs-desc">
                                            {!! $job->description !!}
                                        </div> --}}
                    
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
                                                                <input type="hidden" value="{{ $job->id }}" id="job-id-js">
                    
                                                                {{-- <span class="far fa-star vide" id="vide"></span>
                                                            <span class="fa fa-star plein" id="plein"></span> --}}
                    
                                                                <span id="count-js"
                                                                    class="count-js">{{ $job->likes->count() }}</span>
                                                            </a>
                    
                                                            <button type="submit" class="btn btn-link like" id="like">Favori</button>
                                                        </form>
                    
                                                    </li>
                                                    {{-- <li class="saved-job hide">
                                                    <a href="#" class="saved-job">
                                                        <span class="fa fa-star"></span>
                                                        Saved Job
                                                    </a>
                                                </li> --}}
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
                    

                            <!--/.job-item-->


                        </div>

                        <div class="tab-box  save-search-bar text-center"><a class="text-uppercase"
                                href="{{ route('jobs.index') }}"> <i class=" icon-briefcase "></i>
                                {{ __('home.view_all_job') }} </a></div>
                    </div>

                </div>
            </div>

            <div class="col-md-3 page-sidebar col-thin-left">
                <aside>
                    <div class="inner-box no-padding">
                        <div class="inner-box-content"><a href="#"><img class="img-responsive" src="images/site/app.jpg"
                                    alt="tv"></a>
                        </div>
                    </div>
                    <div class="inner-box">
                        <h2 class="title-2">Top Job Categories </h2>

                        <div class="inner-box-content">
                            <ul class="cat-list arrow">
                                @foreach ($categories as $category)
                                    <li><a href="job-list.html">{{ $category->name }} <span
                                                class="count">{{ $category->jobs->count() }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                    </div>
                </aside>
            </div>
        </div>

        <div style="clear: both"></div>
        <div class="col-xl-12 content-box ">
            <div class="row row-featured">

                <div style="clear: both"></div>

                <div class=" relative w100 content  clearfix">

                    <div class="tab-lite w100">

                        <!-- Nav tabs -->
                        <ul role="tablist" class="nav nav-tabs ">
                            <li class="active nav-item" role="presentation"><a data-toggle="tab" role="tab"
                                    aria-controls="tab1" href="#tab1" aria-expanded="true" class="nav-link"><i
                                        class="icon-location-2"></i>{{ __('home.top_location') }}</a>
                                {{-- class="icon-location-2"></i>Top Job Locations</a> --}}
                            </li>
                            <li role="presentation" class="nav-item"><a data-toggle="tab" role="tab"
                                    aria-controls="tab2" href="#tab2" aria-expanded="false" class="nav-link"><i
                                        class="icon-briefcase"></i>{{ __('home.top_title') }}</a>
                            </li>
                            {{-- <li role="presentation" class="nav-item"><a data-toggle="tab" role="tab"
                                aria-controls="tab3" href="#tab3" aria-expanded="false" class="nav-link"><i
                                    class="icon-commerical-building"></i>Top Companies</a>
                        </li> --}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab1">

                                <div class="col-xl-12 tab-inner">

                                    <div class="row">
                                        <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html">Atlanta</a></li>
                                            <li><a href="job-list.html"> Dallas </a></li>
                                            <li><a href="job-list.html"> New York </a></li>
                                            <li><a href="job-list.html">Santa Ana/Anaheim </a></li>
                                            <li><a href="job-list.html">Wichita </a></li>
                                            <li><a href="job-list.html"> Anchorage </a></li>

                                            <li><a href="job-list.html"> Miami </a></li>
                                            <li><a href="job-list.html">Los Angeles</a></li>
                                        </ul>

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html">Boston </a></li>
                                            <li><a href="job-list.html">Houston</a></li>
                                            <li><a href="job-list.html">Salt Lake City </a></li>
                                            <li><a href="job-list.html">Virginia Beach </a></li>
                                            <li><a href="job-list.html"> San Diego </a></li>

                                            <li><a href="job-list.html">San Francisco </a></li>
                                            <li><a href="job-list.html">Tampa </a></li>
                                            <li><a href="job-list.html"> Washington DC </a></li>

                                        </ul>

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html">Virginia Beach </a></li>
                                            <li><a href="job-list.html"> San Diego </a></li>
                                            <li><a href="job-list.html">San Francisco </a></li>
                                            <li><a href="job-list.html">Tampa </a></li>
                                            <li><a href="job-list.html"> Washington DC </a></li>
                                            <li><a href="job-list.html">Boston </a></li>
                                            <li><a href="job-list.html">Houston</a></li>
                                            <li><a href="job-list.html">Salt Lake City </a></li>


                                        </ul>

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">

                                            <li><a href="job-list.html">Salt Lake City </a></li>
                                            <li><a href="job-list.html">San Francisco </a></li>
                                            <li><a href="job-list.html">Tampa </a></li>
                                            <li><a href="job-list.html"> Washington DC </a></li>
                                            <li><a href="job-list.html">Virginia Beach </a></li>
                                            <li><a href="job-list.html"> San Diego </a></li>
                                            <li><a href="job-list.html">Boston </a></li>
                                            <li><a href="job-list.html">Houston</a></li>

                                        </ul>

                                    </div>

                                </div>


                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab2">

                                <div class="col-xl-12 tab-inner">

                                    <div class="row">

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html">
                                                    Full Time Jobs

                                                </a></li>
                                            <li><a href="job-list.html"> Part Time Jobs
                                                    Retail Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Construction Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Marketing Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Accounting Jobs
                                                    Customer Service Jobs
                                                </a></li>

                                        </ul>


                                        <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html"> Hospitality Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Government Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Medical Assistant Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Nursing Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Pharmacy Assistant Jobs
                                                </a></li>
                                        </ul>

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html"> Criminal Justice Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> HSE Manager Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Pharmaceutical Sales Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Electrician Jobs
                                                </a></li>

                                        </ul>

                                        <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                            <li><a href="job-list.html"> Online Teaching Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Police Officer Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Federal Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Flight Attendant Jobs
                                                </a></li>
                                            <li><a href="job-list.html"> Cruise Ship Jobs
                                                </a></li>
                                            </a></li>

                                        </ul>


                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>



                </div>

            </div>
        </div>

    </div>


@endsection
