@extends('layouts.appAdmin')
@section('content')

    <!-- Main body -->
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb breadcrumb-style2">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ads</a></li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <button class="btn btn-sm btn-icon btn-faded-success btn-close" type="button" data-dismiss="alert"><i
                        class="material-icons">close</i></button>
                <div class="media">
                    <i class="material-icons">check_circle_outline</i>
                    <div class="media-body ml-2">
                        <strong>Well Done!</strong> {{ $message }}
                    </div>
                </div>
            </div>
        @endif


        <div class="card card-style-1">
            <div class="card-body">
                @include('jobs.admin.create')
                <div class="btn-group btn-group-sm mb-3" role="group">

                        <button type="button" class="btn btn-light has-icon" data-toggle="modal" data-target="#addJob">
                            <i class="material-icons mr-1">add_circle_outline</i> {{ __('user.add_page_title') }}
                        </button>

                    <button type="button" class="btn btn-light has-icon"><i class="material-icons mr-1">refresh</i>
                        {{ __('button.refresh_button') }}</button>
                    <button type="button" class="btn btn-light has-icon"><i class="material-icons mr-1">attachment</i>
                        {{ __('button.export_button') }}</button>
                    <button type="button" class="btn btn-light has-icon"><i class="material-icons mr-1">print</i>
                        {{ __('button.print_button') }}</button>
                </div>

                <table id="example" class="table-responsive-sm table-striped table-bordered table-sm table-hover  nowrap w-100">
                    <!-- Filter columns -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Avatar</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Salary</th>
                            <th>Salary Type</th>
                            <th>City</th>
                            <th>Job-type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- /Filter columns -->

                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class="text-center">
                                    @if ($job->image)
                                        <img src="{{ asset('storage') . '/' . $job->image }}" alt="job"
                                            class="rounded-circle" width="40" height="40">
                                    @else
                                        <img src="{{ asset('storage') . '/' . $job->category->image }}" alt="job" class="rounded-circle"
                                            width="40" height="40">
                                    @endif

                                </td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->category->name }}</td>
                                <td>{{ $job->salary }}</td>
                                <td>{{ $job->salarytype->name }}</td>
                                <td>{{ $job->city->name}}</td>
                                <td>{{ $job->jobtype->name }}</td>
                                
                                <td class="text-center h5"> 
                                    <div class="custom-control custom-control-nolabel custom-switch">
                                        <input type="checkbox" data-id="{{ $job->id }}"
                                            class="info checkjobstatus custom-control-input" id="{{ $job->id }}"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-aff="Inactive" {{ $job->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{ $job->id }}"></label>
                                    </div>
                                </td>
 
                                <td>
                                    <form action="{{ route('jobsAdmin.destroy', $job->id) }}" method="POST">

                                        <a class="btn btn-link btn-icon bigger-130 text-info" title="Detail"
                                            href="{{ route('jobs.show', $job->id) }}">
                                            <i class="material-icons">visibility</i></a>

                                            <a class="btn btn-link btn-icon bigger-130 text-success" data-toggle="modal"
                                                data-target="#editJob{{ $job->id }}" title="Edit"
                                                href="{{ route('jobsAdmin.edit', $job->id) }}"><i
                                                    class="material-icons">edit</i></a></a>

                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-icon bigger-130 text-danger"
                                                title="Delete" onclick="return confirm('{{ __('user.delete_alert') }}');">
                                                <i class="material-icons">delete_outline</i></button>
                                    </form>
                                </td>

                            </tr>
                            @include('jobs.admin.edit')

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- CREATE FORM        CREATE FORM       CREATE FORM        CREATE FORM           CREATE FORM      CREATE FORM --}}

        <!-- Add user Modal -->
    </div>
    <!-- /Main body -->


    <!-- Backdrop for expanded sidebar -->
    <div class="sidebar-backdrop" id="sidebarBackdrop" data-toggle="sidebar"></div>

    <!-- Main Scripts -->
    <script src="../js/script.min.js"></script>
    <script src="../js/app.min.js"></script>

    <!-- Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.bootstrap4.responsive.min.js"></script>
    <script>
        $(() => {

            App.checkAll()

            // Run datatable
            var table = $('#example').DataTable({
                drawCallback: function() {
                    $('.dataTables_paginate > .pagination').addClass(
                        'pagination-sm') // make pagination small
                }
            })
            // Apply column filter
            $('#example .dt-column-filter th').each(function(i) {
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw()
                    }
                })
            })
            // Toggle Column filter function
            var responsiveFilter = function(table, index, val) {
                var th = $(table).find('.dt-column-filter th').eq(index)
                val === true ? th.removeClass('d-none') : th.addClass('d-none')
            }
            // Run Toggle Column filter at first
            $.each(table.columns().responsiveHidden(), function(index, val) {
                responsiveFilter('#example', index, val)
            })
            // Run Toggle Column filter on responsive-resize event
            table.on('responsive-resize', function(e, datatable, columns) {
                $.each(columns, function(index, val) {
                    responsiveFilter('#example', index, val)
                })
            })

        })
    </script>

@endsection