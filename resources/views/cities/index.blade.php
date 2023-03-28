@extends('layouts.appAdmin')
@section('content')
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb breadcrumb-style2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cities</li>
            </ol>
        </nav>

        <h5>{{ __('city.index_page_title') }}</h5>

        <div class="card card-style-1">
            <div class="card-body">
                <div class="btn-group btn-group-sm mb-3" role="group">
                    <button type="button" class="btn btn-light has-icon" data-toggle="modal" data-target="#addcity"><i
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
                            <th>{{ __('city.city_name') }}</th>
                            <th>{{ __('city.city_region') }}</th>
                            <th>{{ __('city.city_status') }} </th>
                            <th>{{ __('city.city_date') }}</th>
                            <th>{{ __('city.city_action') }}</th>
                        </tr>
                    </thead>
                    <!-- /Filter columns -->

                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->region->name }}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-control-nolabel custom-switch">
                                        <input type="checkbox" data-id="{{ $city->id }}"
                                            class="info checkcitystatus custom-control-input" id="{{ $city->id }}"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-aff="Inactive"
                                            {{ $city->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{ $city->id }}"></label>
                                    </div>
                                </td>
                                <td>{{ $city->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs" role="group">
                                        <a href="javascript:void(0)"
                                            class="editcit btn btn-link btn-icon bigger-130 text-success"><i
                                                class="material-icons">edit</i></a>
                                        <form action="{{ route('cities.destroy', $city->id) }}" id="form-delete"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bigger-130 text-danger"
                                                onclick="return confirm('{{ __('city.delete_alert') }}')"
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
    
    @include('cities.add_city')
    @include('cities.edit_city')

@endsection
