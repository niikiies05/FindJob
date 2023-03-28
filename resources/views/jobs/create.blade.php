@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-briefcase"></i> {{ __('home.post_a_job') }}
                        </strong>
                    </h2> 

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" method="POST" action="{{ route('jobs.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset>

                                    <!-- Text input-->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"
                                            for="jobTitle">{{ __('home.job_ttle') }}</label>
                                        <div class="col-md-8">
                                            <input id="jobTitle" name="jobTitle" value="{{ old('job_Title') }}"
                                                placeholder="{{ __('home.job_ttle') }}"
                                                class="form-control input-md @error('jobTitle') is-invalid @enderror"
                                                type="text">
                                            <span class="form-text text-muted">{{ __('home.great_title') }} </span>
                                            @error('jobTitle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">{{ __('home.category') }}</label>
                                        <div class="col-md-8">
                                            <select title="category" name="category" id="category-group"
                                                value="{{ old('category') }}"
                                                class="form-control @error('category') is-invalid @enderror">
                                                <option selected="selected"> {{ __('home.select_category') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"
                                            for="textarea">{{ __('home.job_description') }}
                                        </label>
                                        <div class="col-sm-8">
                                            <textarea id="job-textarea"
                                                class="form-control @error('description') is-invalid @enderror"
                                                name="description" placeholder="{{ __('home.job_description') }}"
                                                value="{{ old('description') }}">
                                            </textarea>
                                            <span class="form-text text-muted">{{ __('home.description_of_description') }}
                                            </span>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="Location">{{ __('home.location') }}
                                        </label>
                                        <div class="col-sm-8">
                                            <select name="location" value="{{ old('location') }}"
                                                class="form-control @error('location') is-invalid @enderror">
                                                <option>{{ __('home.select_city') }}</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Multiple Radios (inline) -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">{{ __('home.job_type') }}</label>
                                        <div class="col-sm-8">
                                            <select name="job_type" value="{{ old('job_type') }}"
                                                class="form-control @error('job_type') is-invalid @enderror" id="type">
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('job_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>


                                    <!-- Prepended text-->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="Salary">{{ __('home.salary') }}
                                            (FCFA)</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input name="salary" value="{{ old('salary') }}"
                                                    class="form-control @error('salary') is-invalid @enderror"
                                                    placeholder="{{ __('home.salary') }}" type="number">

                                                <select name="salary_type" value="{{ old('salary_type') }}"
                                                    class="form-control @error('salary_type') is-invalid @enderror"
                                                    style="background: rgb(228, 227, 227)">
                                                    @foreach ($salaryTypes as $salaryType)
                                                        <option value="{{ $salaryType->id }}">{{ $salaryType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('salary')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @error('salary_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="Image">Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="image" value="{{ old('image') }}"
                                                placeholder="Add image(no required)"
                                                class="form-control input-md @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>




                                    {{-- -------------  si l'user n'est pas connecté cette parie cree son compte puis le connecte -------------- --}}
                                    @guest

                                        <div>

                                            <div class="content-subheading"><i class="icon-user fa"></i> <strong>Recuiter
                                                    informations</strong></div>

                                            <!-- Text input-->

                                            <div class="form-group row required">
                                                <label class="col-md-3 control-label">{{ __('home.You_are_a') }}
                                                    <sup>*</sup></label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select name="role"
                                                            class="form-control @error('role') is-invalid @enderror">
                                                            {{-- <option value="">{{ __('home.select_role') }} ----</option> --}}
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('role')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group  row required">
                                                <label class="col-md-3 control-label">{{ __('user.user_username') }}
                                                    <sup>*</sup></label>
                                                <div class="col-md-8">
                                                    <input name="name" placeholder="your username"
                                                        class="form-control input-md @error('name') is-invalid @enderror"
                                                        type="text">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group  row required">
                                                <label class="col-md-3 control-label">{{ __('home.Phone_Number') }}
                                                    <sup>*</sup></label>
                                                <div class="col-md-8">
                                                    <input name="mobile" placeholder="{{ __('home.Phone_Number') }}"
                                                        class="form-control input-md @error('mobile') is-invalid @enderror"
                                                        type="tel">
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label"
                                                    for="textarea">{{ __('homeClient.about_yourself') }}</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control @error('about_yourself') is-invalid @enderror"
                                                        id="textarea"
                                                        name="about_yourself">{{ __('homeClient.about_yourself') }}</textarea>
                                                    @error('about_yourself')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group  row required">
                                                <label for="inputEmail3"
                                                    class="col-md-3 control-label">{{ __('user.user_email') }}
                                                    <sup>*</sup></label>
                                                <div class="col-md-8">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="{{ __('user.user_email') }}"
                                                        name="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group  row required">
                                                <label for="inputPassword3"
                                                    class="col-md-3 control-label">{{ __('home.password') }}</label>
                                                <div class="col-md-8">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="inputPassword3" placeholder="{{ __('home.password') }}"
                                                        name="password">
                                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                                        {{ __('home.at_least') }}
                                                    </small>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group  row required">
                                                <label for="inputPassword3"
                                                    class="col-md-3 control-label">{{ __('home.password_confirmation') }}</label>
                                                <div class="col-md-8">
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="inputPassword3" placeholder="Password" name="password_confirmation">
                                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                                        {{ __('home.at_least') }}
                                                    </small>
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="card bg-light card-body mb-3">
                                            <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium
                                            </h3>

                                            <p>Premium ads help sellers promote their product or service by getting
                                                their ads more visibility with more
                                                buyers and sell what they want faster. <a href="help.html">Learn
                                                    more</a></p>

                                            <div class="form-group row">
                                                <table class="table table-hover checkboxtable">
                                                    <tr>
                                                        <td>

                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="exampleRadios" id="optionsRadios0"
                                                                        value="option1" checked>
                                                                    Regular List
                                                                </label>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>$00.00</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="exampleRadios" id="optionsRadios1"
                                                                        value="option1">
                                                                    <strong> Urgent Ad</strong>
                                                                </label>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>$10.00</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="exampleRadios" id="optionsRadios2"
                                                                        value="option2">
                                                                    <strong> Top of the Page Ad</strong>
                                                                </label>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <p>$20.00</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="exampleRadios" id="optionsRadios3"
                                                                        value="option3">
                                                                    <strong> Top of the Page Ad + Urgent Ad</strong>
                                                                </label>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <p>$40.00</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="Method"
                                                                        id="PaymentMethod">
                                                                        <option value="2">Select Payment Method
                                                                        </option>
                                                                        <option value="3">Credit / Debit Card
                                                                        </option>
                                                                        <option value="5">Paypal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p><strong>Payable Amount : $40.00</strong></p>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div> --}}

                                            <!-- terms -->
                                            <div class="form-group row">

                                                <div class="col-sm-8">

                                                    {{-- <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember
                                                        above contact information</label>
                                                </div> --}}


                                                </div>
                                            </div>
                                        </div>
                                    @endguest
                                    {{-- ------------------- END ----------------------- --}}
                                    <!-- Button  -->
                                    <div class="form-group row">

                                        <div class="col-sm-8"><button type="submit" id="button1id"
                                                class="btn btn-success btn-lg">{{ __('home.submit') }}</button></div>
                                    </div>


                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.page-content -->

            <div class="col-md-3 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <div class="promo-text-box"><i class=" icon-lamp fa fa-4x icon-color-1"></i>

                        <h3><strong>{{ __('home.effective_job') }} </strong></h3>

                        <p> {{ __('home.text_effective') }} </p>
                    </div>

                    <div class="card sidebar-card">
                        <div class="card-header uppercase">
                            <small><strong> {{ __('home.job_posting_tips') }}</strong></small>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <ul class="list-check">
                                    <li> {{ __('home.add_keyword') }}</li>
                                    <li> {{ __('home.user_familiar') }}</li>
                                    <li> {{ __('home.give_detail') }}</li>
                                    <li> {{ __('home.expand_location') }}</li>
                                    <li> {{ __('home.easy_read') }}</li>
                                    <li> {{ __('home.keep_it_simple') }}</li>

                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--/.reg-sidebar-->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#job-textarea'))
            // $('#job-textarea').height(100);
            .catch(error => {
                console.error(error);
            });
            
    </script>
@endsection
