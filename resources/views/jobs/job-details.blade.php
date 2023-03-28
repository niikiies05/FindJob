@extends('layouts.app')
@section('content')


    @foreach (Auth::user()->roles as $role)
        @if ($role->name == 'Admin')
            <a href="{{ route('jobs.index') }}">
            <div class="d-block"
                style="position: absolute; margin-left:3%; text-align:center; height: 110px; width:110px; background:skyblue; border-radius:50%">
                <i class="fas fa-home  justify-content-center" style="font-size: 80px"></i>
                <small>Return to admin space</small>
            </div>
        </a>
        @endif
    @endforeach

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                        <li class="breadcrumb-item"><a href="job-list.html">Jobs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $job->category->name }}</li>
                    </ol>
                </nav>
                <div class="pull-right backtolist"><a href="javascript:history.go(-1)"> <i
                            class="fa fa-angle-double-left"></i> {{ __('home.back') }}</a></div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content col-thin-right">
                <div class="inner inner-box ads-details-wrapper">
                    <h2> {{ $job->title }} </h2>
                    <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> {{ __('posted') }}:
                            {{ $job->created_at->format('Y-m-d : h:m') }}</span> - <span class="">
                            {{ $job->jobtype->name }} </span> - <span class="item-location"><i
                                class="fa fa-map-marker-alt"></i> {{ $job->city->name }} </span> </span>

                    <div class="Ads-Details ">
                        <div class="row">
                            <div class="ads-details-info jobs-details-info col-md-8">
                                {!! $job->description !!}
                            </div>
                            <div class="col-md-4">
                                <aside class="panel panel-body panel-details job-summery">
                                    <ul>

                                        <li>
                                            <p class=" no-margin "><strong>{{ __('home.category') }}:</strong>
                                                {{ $job->category->name }} </p>
                                        </li>
                                        {{-- <li><p class=" no-margin "><strong>Start Date:</strong> ASAP </p></li> --}}
                                        {{-- <li><p class=" no-margin "><strong>Company:</strong> {{ $job->user->name }} </p>
                                        </li> --}}
                                        <li>
                                            <p class=" no-margin "><strong>{{ __('home.salary') }}:</strong>
                                                {{ $job->salary }} a {{ $job->salarytype->name }}</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>{{ __('home.Work_type') }}:</strong>
                                                {{ $job->jobtype->name }}</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>{{ __('home.location') }}:</strong>
                                                {{ $job->city->name }} </p>
                                        </li>


                                    </ul>
                                </aside>
                                <div class="ads-action">
                                    <ul class="list-border">
                                        <li><a href="#"> <i class=" fa icon-mail"></i> Email job</a></li>
                                        <li><a href="#" data-toggle="modal"> <i class="fa icon-print"></i> Print job</a>
                                        </li>
                                        <li><a href="#"> <i class=" fa fa-heart"></i> Save job</a></li>
                                        <li><a href="#"> <i class="fa fa-share-alt"></i> Share job</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="content-footer text-left">
                            <a href="#applyJob" data-toggle="modal" class="btn  btn-primary"> <i
                                    class=" icon-mail-2"></i> Apply Online </a>
                            <small> or. Send your CV to: career@gmail.com</small>
                        </div> --}}
                    </div>
                </div>
                <!--/.ads-details-wrapper-->

            </div>
            <!--/.page-content-->

            <div class="col-md-3  page-sidebar-right">
                <aside>
                    <div class="card sidebar-card card-contact-seller">
                        <div class="card-header">{{ __('home.recruiter_info') }}</div>
                        <div class="card-content user-info">
                            <div class="card-body text-center">
                                <div class="seller-info">
                                    {{-- <div class="company-logo-thumb">
                                        <a><img alt="img" class="img-responsive img-circle"
                                                src="images/jobs/company-logos/17.jpg"> </a></div> --}}
                                    <h3 class="no-margin"> {{ $job->user->name }}</h3><br>
                                    <p>{{ __('home.location') }} : <strong>{{ $job->city->name }}</strong></p><br>
                                    <p>{{ __('home.About_him') }} : <strong>{{ $job->user->about_yourself }}</strong>
                                    </p>

                                    {{-- <p> Web: <strong>www.demoweb.com</strong></p> --}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card sidebar-card">
                        <div class="card-header"><i class="icon-lamp"></i> {{ __('home.successful_cv') }}</div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <ul class="list-check">
                                    <li> {{ __('home.tailor_a_cv') }}</li>
                                    <li> {{ __('home.keep_it') }}</li>
                                    <li> {{ __('home.include_key') }}</li>
                                    <li> {{ __('home.showcase') }}</li>
                                </ul>
                                <p><a class="pull-right" href="#"> {{ __('home.know_more') }} <i
                                            class="fa fa-angle-double-right"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <!--/.categories-list-->
                </aside>
            </div>
            <!--/.page-side-bar-->
        </div>
    </div>


@endsection
