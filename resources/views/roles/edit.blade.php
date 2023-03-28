<div class="modal fade" id="roleEdit{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addRoleLabel">Add new role</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Role name</label>
                        {{-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} --}}
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                        name="name" value="{{ $role->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach ($permissions as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                    {{ $value->name }}</label>

                                    {{-- <label for="">{{ $permissions}}</label>e --}}

                                <br />
                            @endforeach
                            @error('permission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light" data-dismiss="modal">Cancel</button>
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
            $('#roleEdit{{!! $role->id !!}}').modal('show');
        @endif
    });
</script>

