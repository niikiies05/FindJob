@extends('layouts.appAdmin')

@section('content')

    <!-- Main body -->
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb breadcrumb-style2">
                <li class="breadcrumb-item"><a href="index.html">{{__('features.home')}}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('features.user') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('user.index_page_title') }}</li>
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
                @include('users.create')
                <div class="btn-group btn-group-sm mb-3" role="group">

                        <button type="button" class="btn btn-light has-icon" data-toggle="modal" data-target="#addUser">
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
                            {{-- <th>Avatar</th> --}}
                            <th>{{ __('user.user_username') }}</th>
                            <th>{{ __('user.user_phone_number') }}</th>
                            <th>{{ __('user.user_email') }}</th>
                            <th>Role</th>
                            <th>{{ __('user.user_status') }}</th>
                            <th>{{ __('user.user_action') }}</th>
                        </tr>
                    </thead>
                    <!-- /Filter columns -->

                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                {{-- <td class="text-center">
                                    @if ($user->profile_photo_path)
                                        <img src="{{ asset('storage') . '/' . $user->profile_photo_path }}" alt="user"
                                            class="rounded-circle" width="40" height="40">
                                    @else
                                        <img src="{{ asset('dist/img/user1.svg') }}" alt="user" class="rounded-circle"
                                            width="40" height="40">
                                    @endif

                                </td> --}}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>

                                <td class="text-center h5">
                                    <div class="custom-control custom-control-nolabel custom-switch">
                                        <input type="checkbox" data-id="{{ $user->id }}"
                                            class="info checkuserstatus custom-control-input" id="{{ $user->id }}"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-aff="Inactive" {{ $user->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{ $user->id }}"></label>
                                    </div>

                                </td>
 
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                        <a class="btn btn-link btn-icon bigger-130 text-info" title="Detail"
                                            href="{{ route('users.showThis', $user->id) }}">
                                            <i class="material-icons">visibility</i></a>

                                            <a class="btn btn-link btn-icon bigger-130 text-success" data-toggle="modal"
                                                data-target="#userEdit{{ $user->id }}" title="Edit"
                                                href="{{ route('users.edit', $user->id) }}"><i
                                                    class="material-icons">edit</i></a></a>

                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-icon bigger-130 text-danger"
                                                title="Delete" onclick="return confirm('{{ __('user.delete_alert') }}');">
                                                <i class="material-icons">delete_outline</i></button>
                                    </form>
                                </td>

                            </tr>
                            @include('users.edit')

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
