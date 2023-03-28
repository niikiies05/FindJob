<div class="modal fade bd-example-modal-lg" id="editJob{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('jobsAdmin.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">Update job</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="userName">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ $job->title }}"
                                    placeholder="Job title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Job type">Job type</label>
                                <select name="jobtype" class="form-control @error('jobtype') is-invalid @enderror">
                                    <option value="">---Job jobtype</option>
                                    @foreach ($jobTypes as $jobtype)
                                        <option value="{{ $jobtype->id }}">{{ $jobtype->name }}</option>
                                    @endforeach
                                </select>
                                @error('jobtype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">---Job category</option>
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

                            <div class="form-group">
                                <label for="sector_id">Location</label>
                                <select name="city" class="form-control @error('city') is-invalid @enderror">
                                    <option value="">---City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror"
                                    id="salary" name="salary" value="{{ $job->salary }}"
                                    placeholder="Job salary">
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="salary type">Salary type</label>
                                <select name="salarytype" class="form-control @error('salarytype') is-invalid @enderror">
                                    <option value="">---salarytype</option>
                                    @foreach ($salaryTypes as $salarytype)
                                        <option value="{{ $salarytype->id }}">{{ $salarytype->name }}</option>
                                    @endforeach
                                </select>
                                @error('salarytype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">

                            <div class="custom-file w-75">
                                <label for="Image">Image</label>
                                <input type="file"
                                    class="custom-file-input  @error('image') is-invalid @enderror"
                                    id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Avatar</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                placeholder="About your job" value="{{ $job->description }}">

                                </textarea>
                                <span class="form-text text-muted">Describe the responsibilities ,
                                    experience, skills, or education. </span>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
            $('#editJob').modal('show');
        @endif
    });
</script>

