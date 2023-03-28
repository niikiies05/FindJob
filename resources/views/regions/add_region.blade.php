<div class="modal fade" id="addregion" tabindex="-1" role="dialog" aria-labelledby="smModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smModalLabel">{{ __('region.add_page_title') }}</h5>
                <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button"
                    data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('regions.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" name="name"
                        placeholder="{{ __('region.neighbourhood_name') }}">
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
                <div class="modal-body">
                    <select name="country_id" class="form-control">
                        <option value="">--{{ __('region.placeholder_country') }}--</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
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
      $(document).ready(function() {
        @if (count($errors) > 0)
            $('#addregion').modal('show');
        @endif
    });
</script>