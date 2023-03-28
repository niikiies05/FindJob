<div class="modal fade" id="salaryEdit{{ $salary->id }}" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('salaryTypes.update', $salary->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">Update salary</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">name</label>
                        {{-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} --}}
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ $salary->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light" data-dismiss="modal">{{ __('button.close_button') }}</button>
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
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
            $('#salaryEdit{{!! $salary->id !!}}').modal('show');
        @endif
    });
</script>


