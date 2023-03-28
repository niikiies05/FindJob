@extends('layouts.appAdmin')
@section('content')
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb breadcrumb-style2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('features.home') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('features.region') }}</li>
            </ol>
        </nav>

        <h5>{{ __('region.index_page_title') }}</h5>

        <div class="card card-style-1">
            <div class="card-body">

                <div class="btn-group btn-group-sm mb-3" role="group">
                    <button type="button" class="btn btn-light has-icon" data-toggle="modal" data-target="#addregion"><i
                            class="material-icons mr-1">add_circle_outline</i> {{ __('button.add_button') }}</button>
                    <button type="button" class="btn btn-light has-icon"><i class="material-icons mr-1">refresh</i>
                        {{ __('button.refresh_button') }}</button>
                    <button type="button" class="btn btn-light has-icon"><i
                            class="material-icons mr-1">attachment</i>{{ __('button.export_button') }}</button>
                    <button type="button" class="btn btn-light has-icon"><i class="material-icons mr-1">print</i>
                        {{ __('button.print_button') }}</button>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-success fade show" role="alert">
                        <button class="btn btn-sm btn-icon btn-faded-success btn-close" type="button"
                            data-dismiss="alert"><i class="material-icons">close</i></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                <table id="datatable" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100">
                    <!-- Filter columns -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('region.region_name') }}</th>
                            <th>{{ __('region.region_country') }}</th>
                            <th> {{ __('region.region_status') }} </th>
                            <th>{{ __('region.region_date') }}</th>
                            <th>{{ __('region.region_action') }}</th>
                        </tr>
                    </thead>
                    <!-- /Filter columns -->

                    <tbody>
                        @foreach ($regions as $region)
                            <tr>
                                <td>{{ $region->id }}</td>
                                <td>{{ $region->name }}</td>
                                <td>{{ $region->country->name }}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-control-nolabel custom-switch">
                                        <input type="checkbox" data-id="{{ $region->id }}"
                                            class="info checkregionstatus custom-control-input" id="{{ $region->id }}"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-aff="Inactive"
                                            {{ $region->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{ $region->id }}"></label>
                                    </div>
                                </td>
                                <td>{{ $region->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs" role="group">
                                        <a href="javascript:void(0)"
                                            class="editreg btn btn-link btn-icon bigger-130 text-success"><i
                                                class="material-icons">edit</i></a>
                                        <form action="{{ route('regions.destroy', $region->id) }}" id="form-delete"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bigger-130 text-danger"
                                                onclick="return confirm('{{ __('region.delete_alert') }}')"
                                                style="padding:0.01rem;width:1.5rem;height:1.5rem;"><i
                                                    class="material-icons">delete_outline</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('regions.add_region')
    @include('regions.edit_region')


@endsection
