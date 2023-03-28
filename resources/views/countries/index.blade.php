@extends('layouts.appAdmin')
@section('content')
<div class="main-body">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb breadcrumb-style2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('features.home') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('features.country') }}</li>
        </ol>
    </nav>

    <h5>{{ __('country.index_page_title') }}</h5>

    @include('countries.add_country')
    @include('countries.edit_country')

    <div class="card card-style-1">
        <div class="card-body">
            <div class="btn-group btn-group-sm mb-3" role="group">
                <button type="button" class="btn btn-light has-icon" data-toggle="modal" data-target="#addcountry"><i
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
                    <button class="btn btn-sm btn-icon btn-faded-success btn-close" type="button" data-dismiss="alert"><i
                            class="material-icons">close</i></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <table id="datatable" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100"
                data-bulk-target="#bulk-dropdown" data-checked-class="table-warning">
                <!-- Filter columns -->
                <thead>
                    <tr>
                        <th scope="col"><a href="javascript:void(0)" class="sorting asc">Id</a></th>
                        <th scope="col"><a href="javascript:void(0)" class="sorting">{{ __('country.country_name') }}</a>
                        </th>
                        <th scope="col"><a href="javascript:void(0)" class="sorting">{{ __('country.country_flag') }}</a>
                        </th>
                        <th scope="col"><a href="javascript:void(0)"
                                class="sorting">{{ __('country.country_zip_code') }}</a></th>
                        <th scope="col" class="text-center"> {{ __('country.country_status') }} </th>
                        <th scope="col" class="text-center">{{ __('country.country_date') }}</th>
                        <th scope="col" class="text-center">{{ __('country.country_action') }}</th>
                    </tr>
                </thead>
                <!-- /Filter columns -->

                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->name }}</td>
                            <td><img src="{{ asset('assets/flags') }}/{{ $country->flag }}" style="max-width:60px;" />
                            </td>
                            <td class="font-number">{{ $country->zip_code }}</td>
                            <td class="text-center">
                                <div class="custom-control custom-control-nolabel custom-switch">
                                    <input type="checkbox" data-id="{{ $country->id }}"
                                        class="info checkcountrystatus custom-control-input" id="{{ $country->id }}"
                                        data-offstyle="danger" data-toggle="toggle" data-on="Active" data-aff="Inactive"
                                        {{ $country->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $country->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $country->created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs" role="group">
                                    <a href="javascript:void(0)"
                                        class="editctry btn btn-link btn-icon bigger-130 text-success"><i
                                            class="material-icons">edit</i></a>
                                    <form action="{{ route('countries.destroy', $country->id) }}" id="form-delete"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bigger-130 text-danger"
                                            onclick="return confirm('{{ __('country.delete_alert') }}')"
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
@endsection
