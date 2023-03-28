@extends('layouts.appAdmin')

@section('content')

    <!-- Main body -->
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb breadcrumb-style2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('features.home') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('features.permission') }}</li>
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

        {{-- @can('permission-create') --}}
            <div class="list-with-gap">
                <button class="btn btn-primary has-icon" type="button" data-toggle="modal" data-target="#addPermission"><i
                        class="material-icons mr-2">add_circle_outline</i>{{ __('permission.add_page_title') }}</button>
            </div>
        {{-- @endcan --}}
        @include('permissions.create')


        <hr class="my-2">

        <h5>DataTables</h5>
        <div class="card card-style-1">
            <div class="card-body">
                <table id="example" class="table-responsive-sm table-striped table-bordered table-sm table-hover  nowrap w-100">
                    <!-- Filter columns -->
                    <thead>
                        <tr class="thead-primary">
                            <th>No</th>
                            <th>{{ __('permission.permission_name') }}</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- /Filter columns -->

                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="text-center h5">
                                    <div class="custom-control custom-control-nolabel custom-switch">
                                        <input type="checkbox" data-id="{{ $permission->id }}"
                                            class="info checkuserstatus custom-control-input" id="{{ $permission->id }}"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-aff="Inactive" {{ $permission->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{ $permission->id }}"></label>
                                    </div>
                                </td>

                                <td>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">

                                        {{-- @can('permission-edit') --}}
                                            <a class="btn btn-link btn-icon bigger-130 text-success" data-toggle="modal"
                                                data-target="#permissionEdit{{ $permission->id }}" title="Edit"
                                                href="{{ route('permissions.edit', $permission->id) }}"><i
                                                    class="material-icons">edit</i></a></a>
                                        {{-- @endcan --}}

                                        @csrf
                                        @method('DELETE')
                                        {{-- @can('permission-delete') --}}
                                            <button type="submit" class="btn btn-link btn-icon bigger-130 text-danger"
                                                title="Delete" onclick="return confirm('{{ __('permission.delete_alert') }}');">
                                                <i class="material-icons">delete_outline</i></button>
                                        {{-- @endcan --}}
                                    </form>
                                </td>
                            </tr>

                            {{-- EDIT USER MODAL/CREATE   EDIT USER MODAL/CREATE       EDIT USER MODAL/CREATE         EDIT USER MODAL --}}

                            @include('permissions.edit')
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $permissions->render() !!} --}}
            </div>
        </div>


    </div>


    <!-- /Main body -->


    <!-- /Main -->

    <!-- Search Modal -->
    <!-- /Search Modal -->


    <!-- Backdrop for expanded sidebar -->
    <div class="sidebar-backdrop" id="sidebarBackdrop" data-toggle="sidebar"></div>

    <!-- Main Scripts -->
    <script src="{{ asset('../js/script.min.js') }}"></script>
    <script src="{{ asset('../js/app.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('../../plugins/datatables/jquery.dataTables.bootstrap4.responsive.min.js') }}"></script>
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
