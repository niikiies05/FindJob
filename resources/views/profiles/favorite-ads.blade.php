@extends('partials.sidebar')
@section('content-sidebar')

    <div class="col-md-9 page-content">
        <div class="inner-box">
            <h2 class="title-2"><i class="icon-heart-1"></i> {{ __('sidebarClient.favourite') }} </h2>
            @auth

                @if (Auth::user()->likes->count() > 0)
                    <div class="table-responsive">
                        <div class="table-action">
                            <label for="checkAll">
                                <input type="checkbox" id="checkAll">
                                Select: All | <a href="#" class="btn btn-sm btn-danger">Delete <i
                                        class="glyphicon glyphicon-remove "></i></a> </label>

                            <div class="table-search pull-right col-sm-7">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-5 control-label text-right">{{ __('button.search') }} <br>
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
                                    <th data-sort-ignore="true"> Details</th>
                                    <th data-type="numeric"> {{ __('home.salary') }}</th>
                                    <th> Option</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Auth::user()->likes as $like)

                                    <tr>
                                        <td style="width:2%" class="add-img-selector">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td style="width:14%" class="add-img-td"><a href="ads-details.html">
                                                @if ($like->job->image)
                                                    <img class="thumbnail  img-responsive"
                                                        src="{{ asset('storage') . '/' . $like->job->image }}" alt="img">
                                                @else
                                                    <img class="thumbnail  img-responsive"
                                                        src="{{ asset('storage') . '/' . $like->job->category->image }}"
                                                        alt="img">
                                                @endif
                                            </a></td>
                                        <td style="width:58%" class="ads-details-td">
                                            <div>
                                                <p><strong> <a href="{{ route('jobs.show', $like->job->id) }}" title="SAMSUNG GALAXY S CORE Duos ">
                                                            {{ $like->job->title }}</a> </strong></p>

                                                <p><strong> Posted On </strong>:
                                                    {{ $like->job->created_at->format('Y-m-d H:m') }} </p>

                                                <p><strong>Visitors </strong>: 221 <strong>Located In:</strong>
                                                    {{ $like->job->city->name }}
                                                </p>
                                            </div>
                                        </td>
                                        <td style="width:16%" class="price-td">
                                            <div><strong> {{ number_format($like->job->salary, 0, ',', '.') }} XAF</strong>
                                            </div>
                                        </td>
                                        <td style="width:10%" class="action-td">
                                            <form action="{{ route('favorite.delete', $like->id) }}" method="post">
                                                @csrf
                                                <div>
                                                    <p><a class="btn btn-info btn-sm"> <i class="fa fa-mail-forward"></i> Share
                                                        </a></p>
                                                    @method('DELETE')
                                                    <p><button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class=" fa fa-trash"></i> Remove
                                                        </button></p>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
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
                            <p class="card-text">Aucun favori</p>
                            <a href="{{ route('jobs.index') }}"
                                class="btn btn-primary">{{ __('homeClient.back_job_list') }}</a>
                        </div>
                    </div>
                @endif
            @endauth



        </div>
    </div>


    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery/jquery-3.3.1.min.js">\x3C/script>')
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/vendors.min.js"></script>

    <!-- include custom script for site  -->
    <script src="assets/js/main.min.js"></script>




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
