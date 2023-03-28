@extends('layouts.appAdmin')
@section('content')

    <!-- Main body -->
    <div class="main-body">


        
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
        <div class="row row-cols-2 row-cols-lg-4 gutters-sm">
            <!-- Number of users -->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-body">
                        <h6 class="card-title">Number of users</h6>
                        <div class="d-flex align-items-center font-number mb-1">
                            <i class="material-icons mr-2">shopping_basket</i>
                            <h3 class="mb-0 mr-2">{{ $numberOfUsers }}</h3>
                            {{-- <span class="small text-success">1.2%<i class="material-icons align-bottom">keyboard_arrow_up</i></span> --}}
                        </div>
                        <div class="sparkline-data"
                            data-value="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,10,0,0,0,45,0,0,37,0,39,0,0,0,5,0,31,0,43,0,0,30,0,0,0,0,0,0,0,0,0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Number of users -->

            <!-- Number of jobs -->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-body">
                        <h6 class="card-title">Number of jobs</h6>
                        <div class="d-flex align-items-center font-number mb-1">
                            <i class="material-icons mr-2">bar_chart</i>
                            <h3 class="mb-0 mr-2">{{ $numberOfJobs }}</h3>
                            {{-- <span class="small text-danger">0.7%<i class="material-icons align-bottom">keyboard_arrow_down</i></span> --}}
                        </div>
                        <div class="sparkline-data"
                            data-value="0,0,0,0,0,0,0,0,0,0,0,40,0,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,45,1,0,0,35,0,0,40,0,0,45,0,0,0,5,0,0,20,0,5,0,0,0,0,0,0,0,0,0,0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Number of jobs -->

            <!-- New Users -->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-body">
                        <h6 class="card-title">Simple user</h6>
                        <div class="d-flex align-items-center font-number mb-1">
                            <i class="material-icons mr-2">person</i>
                            <h3 class="mb-0 mr-2"> {{ $nberOfJobseekers }}</h3>
                            {{-- <span class="small text-danger">0.3%<i
                                    class="material-icons align-bottom">keyboard_arrow_down</i></span> --}}
                        </div>
                        <div class="sparkline-data"
                            data-value="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,40,0,0,10,0,0,0,0,0,0,0,0,0,0,0,50,0,40,0,5,0,0,10,0,0,25,0,0,0,5,0,0,0,0,25,0,0,0,0,40,0,0,0,0,0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /New Users -->

            <!-- Unique Visitors -->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-body">
                        <h6 class="card-title">Nbre of recruitors</h6>
                        <div class="d-flex align-items-center font-number mb-1">
                            <i class="material-icons mr-2">pie_chart</i>
                            <h3 class="mb-0 mr-2">{{ $nberOfRecruitors }}</h3>
                            {{-- <span class="small text-success">2.1%<i
                                    class="material-icons align-bottom">keyboard_arrow_up</i></span> --}}
                        </div>
                        <div class="sparkline-data"
                            data-value="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,10,0,0,0,45,0,0,37,0,39,0,0,0,5,0,31,0,43,0,0,30,0,0,0,0,0,0,0,0,0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Unique Visitors -->
        </div>

        <div class="row gutters-sm">

            <!-- Number of users chars-->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-header py-1">
                        <i class="material-icons mr-2">show_chart</i>
                        <h6>Number of users chars</h6>
                        <button type="button" data-action="fullscreen"
                            class="btn btn-sm btn-text-secondary btn-icon rounded-circle shadow-none ml-auto">
                            <i class="material-icons">fullscreen</i>
                        </button>
                    </div>
                    <div class="card-body" style="height:300px;width:600px;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- /Number of users chars-->

            <!-- Ads created by days -->
            <div class="col mb-3">
                <div class="card card-style-1">
                    <div class="card-header">
                        Ads by day
                        <button type="button" data-action="fullscreen"
                            class="btn btn-sm btn-text-secondary btn-icon rounded-circle shadow-none ml-auto">
                            <i class="material-icons">fullscreen</i>
                        </button>
                    </div>
                    <div class="card-body" id="chart-container" style="height:300px;width:600px;">
                    </div>
                </div>
            </div>
            <!-- /Ads created by days -->

 

                        <!-- like by month -->
                        <div class="col mb-3">
                          <div class="card card-style-1">
                              <div class="card-header">
                                  likes by month
                                  <button type="button" data-action="fullscreen"
                                      class="btn btn-sm btn-text-secondary btn-icon rounded-circle shadow-none ml-auto">
                                      <i class="material-icons">fullscreen</i>
                                  </button>
                              </div>
                              <div class="card-body" id="chart-like" style="height:300px;width:600px;">
                              </div>
                          </div>
                      </div>
                      <!-- /like by month -->
          
          
        </div>

    </div>
    <!-- /Main body -->

    @include('partials.chart_admin_script')
@endsection
