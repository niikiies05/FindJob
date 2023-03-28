        {{-- CREATE FORM        CREATE FORM       CREATE FORM        CREATE FORM           CREATE FORM      CREATE FORM --}}

        <!-- Add user Modal -->
        <div class="modal fade bd-example-modal-lg" id="profileEdit{{ Auth::user()->id }}" tabindex="-1" role="dialog"
            aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('update.profile', Auth::user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header d-flex align-items-center bg-dark text-white">
                            <h6 class="modal-title mb-0" id="addUserLabel">{{ __('user.edit_user_profile') }}</h6>
                            <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                                data-dismiss="modal">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="userName">{{ __('user.user_username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="userName" name="username" value="{{ Auth::user()->username }}"
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
                                    id="userMobile" name="phone_number" value="{{ Auth::user()->phone_number }}"
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
                                    id="useremail" name="email" value="{{ Auth::user()->email }}"
                                    placeholder="{{ __('user.placeholder_email') }}">
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
                                    name="password_confirmation" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="web_site">{{ __('user.web_site') }}</label>
                                <input type="url" class="form-control @error('web_site') is-invalid @enderror"
                                    id="web_site" name="web_site" value="{{ Auth::user()->web_site }}"
                                    placeholder="{{ __('user.placeholder_web_site') }}">
                                @error('web_site')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div><label for="avatar">Avatar</label></div>
                                <div class="custom-file w-75">
                                    <input type="file"
                                        class="custom-file-input  @error('profile_photo_path') is-invalid @enderror"
                                        id="customFile" name="profile_photo_path" multiple>
                                    <label class="custom-file-label" for="customFile">Avatar</label>
                                    @error('profile_photo_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="name">Roles</label>
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <input type="radio" value="1" {{ Auth::user()->status == '1' ? 'checked' : '' }}
                                id="active" name="status" hidden>
                            <input type="radio" value="0" {{ Auth::user()->status == '0' ? 'checked' : '' }}
                                id="inactive" name="status" hidden>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-faded-light" data-dismiss="modal">{{ __('button.close_button') }}</button>
                            {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                            <input type="submit" value="{{ __('button.save_button') }}" class="btn btn-primary">
                        </div>
                    </form>
                </div>
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
                    $('#profileEdit').modal('show');
                @endif
            });
        </script>


        <!-- /Main body -->
