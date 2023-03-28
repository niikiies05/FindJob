<div class="intro jobs-intro hasOverly"
    style="background-image: url(images/jobs/1.jpg); background-position: center center;">
    <div class="dtable hw100">
        <div class="dtable-cell hw100">
            <div class="container text-center">
                <h1 class="intro-title animated fadeInDown"> {{ __('home.find_right_job') }} </h1>

                <p class="sub animateme fittext3 animated fadeIn"> {{ __('home.find_latest') }}
                </p>
                {{-- <form action="#"> --}}
                    <form action="{{ route('jobs.searchHome') }}">

                    <div class="row search-row animated fadeInUp">

                        <div class="col-xl-4 col-sm-4 search-col relative locationicon">
                            <div class="search-col-inner">
                                <i class="icon-location-2 icon-append ml-4"></i>
                                
                                    <select name="city" 
                                    class="form-control selecter locinput input-rel searchtag-input has-icon">
                                    @foreach ($cities as $city)
                                        <option selected="selected" value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                    </select>
                                
                                {{-- <input type="text" name="city" id="autocomplete-ajax"
                                    class="form-control locinput input-rel searchtag-input has-icon" placeholder="city"
                                    value=""> --}}

                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 search-col relative">
                            <div class="search-col-inner"><i class="icon-docs icon-append" style="margin-left: 118px"></i>
                                <input type="text" name="ads" class="form-control has-icon"
                                    placeholder="{{ __('home.keyword') }}" value="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 search-col">
                            <button class="btn btn-primary btn-search btn-block  btn-gradient"><i
                                    class="icon-search"></i><strong>{{ __('home.find_button') }}</strong></button>
                        </div>
                    </div>
                </form>

                {{-- <div class="resume-up">
                <a><i class="icon-doc-4"></i></a> <a><b>Upload your CV</b></a> and easily apply to jobs from
                any
                device!
            </div> --}}

            </div>
        </div>
    </div>
</div>
