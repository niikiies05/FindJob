<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addRoleLabel">{{ __('role.add_page_title') }}</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('role.role_name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter the role name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="name">Guard name</label>
                        <input type="text" class="form-control" id="name" name="guard_name"
                            placeholder="Enter the guard name">
                    </div> --}}
                        <table id="clients">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkAll"></th>
                                <th>{{ __('role.role_name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $client)
                                <tr>
                                    <td><input type="checkbox" name="permission[]" class="cbClass" 
                                        value="{{ $client->id }} "></td>
                                    <td>{{ $client->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions : <input type="checkbox" name="" class="checkAll"></strong>
                            <br />
                            @foreach ($permissions as $value)
                                
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="ml-4 mb-3 cbClass">
                                {{ $value->name }}<br/>
                            @endforeach
                        </div>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light" data-dismiss="modal">Cancel</button>
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                    <button type="submit" value="Save" class="btn btn-primary">save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        @if (count($errors) > 0)
            // $('#addUser').modal({
            // backdrop:'static',
            // keyboards:false
            // });
            $('#addRole').modal('show');
        @endif

        $('#clients').DataTable({
            paging: false,
            scrollY: 400
        });

    });

</script>



