@extends('partials.sidebar')
@section('content-sidebar')

    <div class="col-md-9 page-content">

        @if (session()->has('notification.message'))
            <div class="alert alert-{{ session('notification.type') }}">
                {{ session('notification.message') }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Well Done!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($message = Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="inner-box">
            <h2 class="title-2"><i class="icon-docs"></i> {{ __('sidebarClient.my_ads') }} </h2>

            @auth

                @if (Auth::user()->jobs->where('status', 1)->count() > 0)
                    <div class="table-responsive">
                        <div class="table-action">
                            <label for="checkAll">
                                <input type="checkbox" id="checkAll">
                                Select: All | <a href="#" class="btn btn-sm btn-danger">Delete <i
                                        class="glyphicon glyphicon-remove "></i></a> </label>

                            <div class="table-search pull-right col-sm-7">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-5 control-label text-right">{{ __('button.search') }}<br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>

                                        <div class="col-sm-7 searchpan">
                                            <input type="text" class="form-control" id="filter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="addManageTable" class="table table-striped table-bordered add-manage-table table demo"
                            data-filter="#filter" data-filter-text-only="true">
                            <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true">Details</th>
                                    <th data-type="numeric"> {{ __('home.salary') }}</th>
                                    <th> Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td style="width:2%" class="add-img-selector">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td style="width:14%" class="add-img-td">
                                            @if ($job->image)
                                                <a href="{{ route('jobs.show', $job->id) }}"><img
                                                        class="thumbnail  img-responsive"
                                                        src="{{ asset('storage') . '/' . $job->image }}" alt="img"></a>
                                            @else
                                                <a href="{{ route('jobs.show', $job->id) }}"><img alt="img"
                                                        src="{{ asset('storage') . '/' . $job->category->image }}"
                                                        class="thumbnail  img-responsive"></a>
                                            @endif
                                        </td>
                                        <td style="width:58%" class="ads-details-td">
                                            <div>
                                                <p><strong> <a href="{{ route('jobs.show', $job->id) }}"
                                                            title="Sony Xperia TX ">{{ $job->title }} </a> </strong></p>
                                                <p><strong> Posted On </strong>:
                                                    {{ $job->created_at }} </p>
                                                <p><strong>Visitors </strong>: 221 <strong>Located In:</strong>
                                                    {{ $job->city->name }}
                                                </p>
                                                @if ($job->premium)
                                                    <span class="d-flex justify-content-end">
                                                        <p class="p-1 position-absolute text-center text-small"
                                                            style="background: gold; width:100px; margin-top:100px; border-radius: 5px">
                                                            Premium</p>
                                                    </span>
                                                @endif

                                            </div>
                                        </td>
                                        <td style="width:16%" class="price-td">
                                            <div><strong> {{ number_format($job->salary, 0, ',', '.') }} XAF</strong></div>
                                        </td>
                                        <td style="width:10%" class="action-td">

                                            <p><a class="btn btn-sm" href="{{ route('job.boost', $job->id) }}"
                                                    data-toggle="modal" data-target="#boostAds{{ $job->id }}"
                                                    style="background-color: skyblue"> <i class="fas fa-bolt"></i> Booster
                                                </a>
                                            </p>
                                            @include('profiles.boost_ads')

                                            <form action="{{ route('jobs.destroy', $job->id) }}" method="post">
                                                <div>
                                                    <p><a class="btn btn-primary btn-sm" data-toggle="modal"
                                                            data-target="#jobEdit{{ $job->id }}" title="Edit"
                                                            href="{{ route('jobs.edit', $job->id) }}"> <i
                                                                class="fa fa-edit"></i> Edit </a>
                                                    </p>

                                                    <p><a class="btn btn-info btn-sm"> <i class="fa fa-mail-forward"></i> Share
                                                        </a>
                                                    </p>

                                                    @csrf
                                                    @method('DELETE')

                                                    <p><button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('{{ __('Are you sure ? ') }}');">
                                                            <i class=" fa fa-trash"></i> Delete</button></p>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('jobs.edit')

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--/.row-box End-->
                @else
                    <div class="card text-center">
                        <div class="card-header bg-primary text-white">
                            Whooops
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ __('homeClient.no_jobs') }}</p>
                            <a href="{{ route('jobs.index') }}"
                                class="btn btn-primary">{{ __('homeClient.back_job_list') }}</a>
                        </div>
                    </div>
                @endif
            @endauth

            @guest
                <div class="card text-center">
                    <div class="card-header bg-primary text-white">
                        Whooops
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ __('homeClient.no_jobs') }}</p>
                        <a href="{{ route('jobs.index') }}"
                            class="btn btn-primary">{{ __('homeClient.back_job_list') }}</a>
                    </div>
                </div>
            @endguest



        </div>
    </div>
    <!--/.page-content-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery/jquery-3.3.1.min.js">\x3C/script>')
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/vendors.min.js"></script>

    <!-- include custom script for site  -->
    <script src="assets/js/main.min.js"></script>



    <!-- include footable   -->

    <script src="assets/js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="assets/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#addManageTable').footable().bind('footable_filtering', function(e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            });

            $('.clear-filter').click(function(e) {
                e.preventDefault();
                $('.filter-status').val('');
                $('table.demo').trigger('footable_clear_filter');
            });

        });
    </script>
    <!-- include custom script for ads table [select all checkbox]  -->
    <script>
        function checkAll(bx) {
            var chkinput = document.getElementsByTagName('input');
            for (var i = 0; i < chkinput.length; i++) {
                if (chkinput[i].type == 'checkbox') {
                    chkinput[i].checked = bx.checked;
                }
            }
        }
    </script>


@endsection
