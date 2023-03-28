<div class="adds-wrapper jobs-list">
    {{-- <p>{{ $jobs->count() }} founds</p> --}}

    @if (request()->ajax())

        <div class="col-xl-12  box-title no-border">
            <div class="inner">
                <h2>
                    <span> "{{ $jobs->count() }} "</span>
                    <small>
                        {{-- {{ $jobs->count() }} --}}
                        {{ __('home.jobs_found') }}
                    </small>
                </h2>
            </div>
        </div>
    @endif

    @foreach ($jobs as $job)

        <div class="item-list job-item">
            <div class="row">
                <div class="col-sm-1 col-2  col-xs-2 no-padding photobox">
                    <div class="add-image">
                        @if ($job->image)
                            <a href="#"><img alt="company logo" src="{{ asset('storage') . '/' . $job->image }}"
                                    alt="Image" class="rounded" height="50px"></a>
                        @else 
                            <a href=""><img alt="company logo"
                                    src="{{ asset('storage') . '/' . $job->category->image }}"
                                    class="thumbnail no-margin rounded"></a>
                        @endif
                        {{-- <a href=""><img alt="company logo"
                            src="images/jobs/company-logos/17.jpg" class="thumbnail no-margin"></a> --}}
                    </div>
                </div>
                <!--/.photobox-->
                <div class="col-sm-10 col-10  col-xs-10  add-desc-box">
                    <div class="ads-details jobs-item">

                        <div class="d-flex justify-content-between">
                            <h5 class="company-title"><a href="">{{ $job->user->name }}</a></h5>
                            <h6 class="badge badge-info text-center ">{{ $job->category->name }}</h6>
                        </div>
                        <h4 class="job-title"><a
                                href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h4>
                        <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker-alt"></i>
                                {{ $job->city->name }}</span> <span class="date"><i class=" icon-clock">
                                </i>{{ $job->jobtype->name }}</span><span class=" salary"> <i
                                    class=" icon-money"> </i> {{ number_format($job->salary, 0, ',', '.') }} XAF a
                                {{ $job->salarytype->name }}</span></span>
                        {{-- <div class="jobs-desc">
                        {!! $job->description !!}
                    </div> --}}

                        @if (strlen($job->description) > 200)
                            <p class="jobs-desc" style="">{!! substr($job->description, 0, 200) !!}
                                <a href="{{ route('jobs.show', $job->id) }}">voir plus...</a>
                            </p>
                        @else
                            <p class="jobs-desc" style="">{!! substr($job->description, 0, 200) !!}</p>
                        @endif

                        <div class="job-actions">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <form action="{{ route('jobs.like') }}" id="form-js">
                                        <a class="save-job" href="#">
                                            <input type="hidden" value="{{ $job->id }}" id="job-id-js">

                                            <span id="count-js"
                                                class="count-js">{{ $job->likes->count() }}</span>
                                        </a>
                                        @auth
                                            @if ($job->isLikedByLoggedInUser())
                                                <button type="submit" class="btn btn-link like" id="like">Je n'aime plus</button>
                                            @else
                                            <button type="submit" class="btn btn-link like" id="like">J'aime</button>
                                            @endif

                                        @endauth
                                    </form>

                                </li>
                                {{-- <li class="saved-job hide">
                                <a href="#" class="saved-job">
                                    <span class="fa fa-star"></span>
                                    Saved Job
                                </a>
                            </li> --}}
                                <li>
                                    <a href="#" class="email-job">
                                        <i class="fa fa-envelope"></i>
                                        Email Job
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.add-desc-box-->

                <!--/.add-desc-box-->
            </div>
        </div>
    @endforeach
    <!--/.job-item-->
    {{-- <div class="pagination-bar text-center">
        {!! $jobs->links() !!}
    </div> --}}

</div>


{{-- <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
    Save Search </a></div>
</div>
<div class="pagination-bar text-center"> 
{{ $jobs->links() }}
</div> --}}

{{-- <script>
        $(document).ready(function(){
        
         $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });
        
         function fetch_data(page)
         {
          $.ajax({
           url:"/pagination/fetch_data?page="+page,
           success:function(data)
           {
            $('#updateDiv').html(data);
           }
          });
         }
         
        });
        </script> --}}
