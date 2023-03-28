<div class="modal fade" id="addcity" tabindex="-1" role="dialog" aria-labelledby="smModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smModalLabel">{{ __('city.add_page_title') }}</h5>
                <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button"
                    data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('cities.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" name="name"
                        placeholder="{{ __('city.placeholder_name') }}">
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="modal-body">
                    <select name="region_id" class="form-control">
                        <option value="#">--{{ __('city.placeholder_region') }}--</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                    @error('region_id')<p class="text-danger">{{ $message }}</p>@enderror
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
        $('#addcity').modal('show');
    @endif
});
</script>
