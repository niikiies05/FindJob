<div class="modal fade" id="editcountry" tabindex="-1" role="dialog" aria-labelledby="smModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smModalLabel">{{ __('country.edit_page_title') }}</h5>
                <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button"
                    data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('countries.index') }}" method="POST" id="editcountryform"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="{{ __('country.placeholder_name') }}">
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" name="flag" id="flag"><br>
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                    {{-- <img id="previewImg" alt="Flag image" style="max-width:130px;margin-top:20px;"/> --}}

                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="zip_code" id="zip_code"
                        placeholder="{{ __('country.placeholder_zip_code') }}">
                    @error('zip_code')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-dismiss="modal">{{ __('button.close_button') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.update_button') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
