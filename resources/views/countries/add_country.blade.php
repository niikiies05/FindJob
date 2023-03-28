<div class="modal fade" id="addcountry" tabindex="-1" role="dialog" aria-labelledby="smModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smModalLabel">{{ __('country.add_page_title') }}</h5>
                <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button"
                    data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <input type="text" class="form-control" name="name"
                        placeholder="{{ __('country.placeholder_name') }}">
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="modal-body">
                    <input type="file" class="form-control" name="flag"><br>
                    @error('flag')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="modal-body">
                    <input type="text" class="form-control" name="zip_code"
                        placeholder="{{ __('country.placeholder_zip_code') }}">
                    @error('zip_code')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-dismiss="modal">{{ __('button.close_button') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.add_button') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

    $(document).ready(function() {
        @if (count($errors) > 0)
            $('#addcountry').modal('show');
        @endif
    });
</script>
