@extends('layouts.app')

@section('header')

    <!-- /.header -->
    <div class="search-row-wrapper" style="background-image: url(images/bg.jpg)">
        <div class="inner">
            <div class="container ">
                <form action="#" method="GET">
                    <div class="row">

                        <div class="col-md-3">
                            <input class="form-control keyword" type="text" placeholder="Jobs title">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="category" id="search-category">
                                <option selected="selected" value="">All Categories</option>
                                <option value="135">Science</option>
                                <option value="136">Sport &amp; Recreation</option>
                                <option value="137">Trades &amp; Services</option>
                                <option value="138">Transport &amp; Logistics</option>

                                <option value="Other"> Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="location" id="id-location">
                                <option selected="selected" value="">All Locations</option>
                                <option value="England"> England</option>
                                <option value="UK"> UK</option>
                                <option value="Other-Locations">Other Locations</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-block btn-primary  btn-gradient"> <i class="fa fa-search"></i> Find Jobs
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
                                <h5 class="list-title"><strong><a href="#"> Date Posted </a></strong></h5>

                                <div class="filter-date filter-content">
                                    <ul>
                                        <li>
                                            <input type="radio" value="1" id="posted_1" name="posted">
                                            <label for="posted_1">24 hours</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="3" id="posted_3" name="posted">
                                            <label for="posted_3">3 days</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="7" id="posted_7" name="posted">
                                            <label for="posted_7">7 days</label>
                                        </li>
                                        <li>
                                            <input type="radio" checked="checked" value="30" id="posted_30" name="posted">
                                            <label for="posted_30">30 days</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.categories-list-->

                            <div class="list-filter">
                                <h5 class="list-title"><strong><a href="#">Employment Type</a></strong></h5>

                                <div class="filter-content filter-employment-type">
                                    <ul class="browse-list list-unstyled">
                                        <li>
                                            <input type="checkbox" id="employment_all" value="all" class="emp"
                                                checked="checked">
                                            <label for="employment_all">All</label>
                                        </li>
                                        @foreach ($jobs as $job )
                                        <li>
                                            <input type="checkbox" id="employment_jtft" value="jtft" class="emp emp-type">
                                            <label for="employment_jtft">{{ $job->jobtype->name }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <!--/.locations-list-->

                            <div class="  list-filter">
                                <h5 class="list-title"><strong><a href="#">Salary Pay Range</a></strong></h5>


                                <div class="filter-salary filter-content ">
                                    <form role="form" class="form-inline ">
                                        <div class="form-group col-lg-4 col-md-12 no-padding">
                                            <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                        <div class="form-group col-lg-4 col-md-12 no-padding">
                                            <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-12 no-padding">
                                            <button class="btn btn-default pull-right btn-block-md" type="submit">GO
                                            </button>
                                        </div>
                                    </form>

                                    <div class="clearfix"></div>

                                    <ul class="mt15">
                                        <li>
                                            <input type="radio" name="pay" id="pay_0" value="0" checked="checked">
                                            <label for="pay_0">Any</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_20" value="20">
                                            <label for="pay_20">$20,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_40" value="40">
                                            <label for="pay_40">$40,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_60" value="60">
                                            <label for="pay_60">$60,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_80" value="80">
                                            <label for="pay_80">$80,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_100" value="100">
                                            <label for="pay_100">$100,000+</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="pay" id="pay_120" value="120">
                                            <label for="pay_120">$120,000+</label>
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->


                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Specialisms</a></strong></h5>

                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="job-list.html">Engineering jobs <span class="count">12,578</span> </a>
                                    </li>
                                    <li><a href="job-list.html">Estate Agency jobs <span class="count">4,546</span> </a>
                                    </li>
                                    <li><a href="job-list.html">Financial Services jobs <span class="count">9,115</span></a>
                                    </li>
                                    <li><a href="job-list.html">Banking jobs <span class="count">1,468</span></a></li>
                                    <li><a href="job-list.html">Security &amp; Safety jobs <span
                                                class="count">723</span></a></li>
                                    <li><a href="job-list.html">Graduate jobs <span class="count">18,514</span></a></li>
                                    <li><a href="job-list.html">Health &amp; Medicine jobs <span
                                                class="count">10,621</span></a></li>
                                    <li><a href="job-list.html">Training jobs <span class="count">651</span></a></li>
                                    <li><a href="job-list.html">Hospitality &amp; Catering jobs <span
                                                class="count">7,585</span></a>
                                    </li>
                                    <li><a href="job-list.html">Human Resources jobs <span class="count">3,768</span></a>
                                    </li>
                                    <li><a href="job-list.html">IT &amp; Telecoms jobs <span class="count">17,242</span></a>
                                    </li>
                                    <li><a href="job-list.html">IT Contractor jobs <span class="count">2,102</span></a>
                                    </li>
                                </ul>

                            </div>
                            <!--/.list-filter-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    @foreach ($cities as $city)
                                    <li><a href="job-list.html">{{ $city->name }} <span class="count"> {{ $city->jobs->count() }}</span></a></li>
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
                        <div class="tab-box clearfix ">

                            <!-- Nav tabs -->
                            <div class="col-xl-12  box-title no-border">
                                <div class="inner">
                                    <h2><span> Software </span> Engineer
                                        <small> 1000+ Jobs Found</small>


                                    </h2>
                                </div>
                            </div>

                            <!-- Mobile Filter bar -->
                            <div class="mobile-filter-bar col-xl-12  ">
                                <ul class="list-unstyled list-inline no-margin no-padding">
                                    <li class="filter-toggle">
                                        <a class="">
                                            <i class="  icon-th-list"></i>
                                            Filters
                                        </a>
                                    </li>
                                    <li>


                                        <div class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle">
                                                Sort by </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="" rel="nofollow">Relevance</a></li>
                                                <li><a href="" rel="nofollow">Date</a></li>
                                                <li><a href="" rel="nofollow">Company</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="menu-overly-mask"></div>
                            <!-- Mobile Filter bar End-->


                            <div class="tab-filter hide-xs">

                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                                    <option value="Sort by ">Sort by </option>
                                    <option value="Relevance">Relevance</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div>
                            <!--/.tab-filter-->

                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter hidden-xs">
                            <div class="pull-left col-sm-6 col-xs-12">
                                <div class="breadcrumb-list text-center-xs">
                                    <a class="jobs-s-tag" rel="nofollow" title="Software Architect">Software
                                        Engineer </a>
                                    in <a rel="nofollow" class="jobs-s-tag"> New York</a>
                                </div>
                            </div>
                            <div class="pull-right col-sm-6 col-xs-12 text-right text-center-xs listing-view-action">
                                <a class="clear-all-button text-muted">Clear all</a>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->
                        <div class="adds-wrapper jobs-list">

                            @foreach ($jobs as $job)

                            <div class="item-list job-item">
                                <div class="row">
                                    <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                                        <div class="add-image">
                                            @if ($job->image)
                                            <a href="#"><img alt="company logo"
                                                src="{{ asset('storage') . '/' . $job->image }}" alt="Image" class="rounded" height="50px"></a>
                                            @else
                                            <a href=""><img alt="company logo"
                                                src="{{ asset('storage') . '/' . $job->category->image }}" class="thumbnail no-margin rounded"></a>
                                            @endif
                                            {{-- <a href=""><img alt="company logo"
                                                    src="images/jobs/company-logos/17.jpg" class="thumbnail no-margin"></a> --}}
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                                        <div class="ads-details jobs-item">

                                            <div class="d-flex justify-content-between">
                                                <h5 class="company-title "><a href="">{{ $job->user->name }}</a></h5>
                                                <h6 class="badge badge-info m-0 text-center">{{ $job->category->name }}</h6>
                                            </div>
                                            <h4 class="job-title"><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h4>
                                            <span class="info-row"> <span class="item-location"><i
                                                        class="fa fa-map-marker-alt"></i> {{ $job->city->name }}</span> <span
                                                    class="date"><i class=" icon-clock"> </i>{{ $job->jobtype->name}}</span><span
                                                    class=" salary"> <i class=" icon-money"> </i> {{ number_format($job->salary,0,",",".") }} XAF a
                                                    {{ $job->salarytype->name }}</span></span>
                                            <div class="jobs-desc"> {!! $job->description !!}
                                            </div>
                                            <div class="job-actions">
                                                <ul class="list-unstyled list-inline">
                                                    <li>
                                                        <form action="{{ route('jobs.like') }}" id="form-js">
                                                            <a class="save-job" href="#">
                                                                <input type="hidden" value="{{ $job->id }}" id="job-id-js">
                                                
                                                                <span class="far fa-star" id="none"> Save Job</span>
                                                                
                                                                {{-- <span id="count-js">{{ $job->likes->count() }}</span>  --}}
                                                            </a>

                                                            <button type="submit" class="btn btn-link">J'aime</button>
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
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                                Save Search </a></div>
                    </div>
                    <div class="pagination-bar text-center">
                        <nav aria-label="Page navigation " class="d-inline-b">
                            <ul class="pagination">

                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Looking for a job? </h2>
                        <h5> Upload your CV and easily apply to jobs from any device! </h5>
                        <a href="" class="btn btn-lg btn-border btn-post btn-danger">Upload your CV </a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->


@endsection
