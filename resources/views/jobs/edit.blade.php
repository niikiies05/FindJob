<div class="modal fade" id="jobEdit{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('jobs.update', $job->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">Edit this ads</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="ads">{{ __('home.job_ttle') }}</label>
                        <div class="col-md-8">
                            <input type="text" name="jobTitle" value="{{ $job->title }}"
                                class="form-control input-md @error('jobTitle') is-invalid @enderror"
                                placeholder="{{ __('home.job_ttle') }}">
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
                            <select title="category" name="category" id="category-group" value="{{ $job->category->id }}"
                                class="form-control @error('category') is-invalid @enderror">
                                <option selected="selected" value="{{ $job->category->id }}"> {{ $job->category->name }}</option>
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
                        <label class="col-sm-3 col-form-label" for="textarea">{{ __('home.job_description') }}
                        </label>
                        <div class="col-sm-8">
                            <textarea style="height: 250px"
                                class="form-control @error('description') is-invalid @enderror" id="job-textarea"
                                name="description" placeholder="{{ __('home.job_description') }}"
                                value="{{  $job->description  }}">{{  $job->description  }}</textarea>
                            <span class="form-text text-muted">{{ __('home.description_of_description') }}</span>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="Location">{{ __('home.location') }} </label>
                        <div class="col-sm-8">
                            <select name="location" value="{{ $job->city->id}}"
                                class="form-control @error('location') is-invalid @enderror">
                                <option selected="selected" value="{{ $job->city->id }}">{{ $job->city->name }}</option>
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
                            <select name="job_type" value="{{ $job->jobtype->id }}"
                                class="form-control @error('job_type') is-invalid @enderror" id="type">
                                <option selected="selected" value="{{ $job->jobtype->id}}">{{ $job->jobtype->name}}</option>
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
                        <label class="col-sm-3 col-form-label" for="Salary">{{ __('home.salary') }} (FCFA)</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input name="salary" value="{{ $job->salary }}"
                                    class="form-control @error('salary') is-invalid @enderror" placeholder="Salary"
                                    type="number">

                                <select name="salary_type" value="{{ $job->salarytype->id }}"
                                    class="form-control @error('salary_type') is-invalid @enderror"
                                    style="background: rgb(228, 227, 227)">
                                    <option selected="selected" value="{{ $job->salarytype->id}}">{{ $job->salarytype->name}}</option>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-faded-light"
                        data-dismiss="modal">{{ __('button.close_button') }}</button>
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
            $('#jobEdit{{!! $job->id !!}}').modal('show');
        @endif
    });
</script>
