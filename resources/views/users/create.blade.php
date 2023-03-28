<div class="modal fade bd-example-modal-lg" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">{{ __('user.add_page_title') }}</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="userName">{{ __('user.user_username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="userName" name="username" value="{{ old('username') }}"
                                    placeholder="{{ __('user.placeholder_full_name') }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="userMobile">{{ __('user.user_phone_number') }}</label>
                                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="userMobile" name="phone_number" value="{{ old('phone_number') }}"
                                    placeholder="{{ __('user.placeholder_phone_number') }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="useremail">{{ __('user.user_email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="useremail" name="email" value="{{ old('email') }}" placeholder="{{ __('user.placeholder_email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('user.user_password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="{{ __('user.placeholder_password') }}">
                                <label for="password-confirm">{{ __('user.user_conf_password') }}</label>
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="new-password"placeholder="{{ __('user.placeholder_conf_password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">
                                <label>{{ __('user.placeholder_role') }}</label>
                                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="About">About user</label>
                                <textarea name="about" id="" cols="30" rows="10" class="form-control"
                                placeholder="About user (describe him)">
                                </textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="custom-file w-75">
                                <input type="file"
                                    class="custom-file-input  @error('profile_photo_path') is-invalid @enderror"
                                    id="customFile" name="profile_photo_path" multiple>
                                <label class="custom-file-label" for="customFile">Avatar</label>
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light" data-dismiss="modal">{{ __('button.close_button') }}</button>
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                    <input type="submit" value="{{ __('button.add_button') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        @if (count($errors) > 0)
            $('#addUser').modal('show');
        @endif
    });
</script>

