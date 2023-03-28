<div class="modal fade" id="addPermission" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">{{ __('permission.add_page_title') }}</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('permission.permission_name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="{{ __('permission.permission_name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light" data-dismiss="modal">{{ __('button_close_button') }}</button>
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        @if (count($errors) > 0)
            // $('#addPermission').modal({
            // backdrop:'static',
            // keyboards:false
            // });
            $('#addPermission').modal('show');
        @endif
    });
</script>
