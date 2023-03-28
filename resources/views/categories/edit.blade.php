<div class="modal fade" id="categoryEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header d-flex align-items-center bg-dark text-white">
                    <h6 class="modal-title mb-0" id="addUserLabel">{{ __("category.edit_page_title") }}</h6>
                    <button class="btn btn-icon btn-sm btn-text-light rounded-circle" type="button"
                        data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">{{ __('category.category_name') }}</label>
                        {{-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} --}}
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ $category->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image représentatrice de la category</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @error('image')
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
            $('#categoryEdit{{!! $category->id !!}}').modal('show');
        @endif
    });
</script>


