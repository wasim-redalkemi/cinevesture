@extends('website.layouts.app',['class' => 'bg_white'])

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="pb-5">
        <div class="plan_wraper">
            <div class="container">
                <div class="row">
                    <div class="class-md-12">
                        <div class="mt-4">SETUP YOUR PLAN</div>
                        <div class="mt-4">

                            <div class="currency_togle">
                                <div class="togle_text text_fff mt-0">Dollar</div>
                                <label class="switch mx-2">
                                    <input type="checkbox" class="check" name="currency" 
                                    <?php if(request('currency') == 'INR'){
                                        echo 'checked value="INR"';
                                        } ?>
                                    >
                                    <span class="slider round"></span>
                                </label>
                                <div class="togle_text text_fff mt-0">Rupee</div>
                            </div>
                            <div class="mt-4 mb-5 d-flex justify-content-center">
                                <!-- <div class="time_togle">
                        <label class="switch mx-2">
                          <input type="checkbox" class="check" value="">
                          <span class="slider">abc</span>
                        </label> 
                        </div> -->
                        <div class="plan_btn_wraper">
                               <!-- <div> -->
                                   <a href="{{route('plans-view',['plan_time'=>'m'])}}" ><button class="plan_btn" >Monthly</button></a>
                               <!-- </div> -->
                               <!-- <div> -->
                                   <a href="{{route('plans-view',['plan_time'=>'y'])}}" ><button class="plan_btn">Annually</button></a>
                               <!-- </div>  -->
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt__158">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <?php $flag = 0; ?>
                       @foreach($plans as $plan)
                        <div class="col-md-3">
                            <div class="plan_card">
                                <div class="plain_detail">
                                    <div class="plain_header text-center">{{$plan->plan_name}}</div>
                                    <div class="plan_subheader mt-2">Great for those who want to get themselves in front of the right people in the industry</div>
                                </div>
                                <div class="Plain_price">
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Free forever</div>
                                    <div class="search-head-text Aubergine_at_night">
                                        @if($plan->currency == "USD")
                                           $
                                        @else
                                           ₹
                                        @endif
                                        {{$plan->plan_amount}}</div>

                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-create',['id'=>$plan->id])}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                @foreach($modules as $module)
                                <div class="plain_industry_guide my-2">
                                    @if($flag == 0)
                                    <div class="industry_guide_text plain_industry_guide">
                                        <span class="movie_name_text">{{$module->name}}</span>
                                    </div>
                                    @endif
                                    <div class="plain_page_list p-3">
                                        <ul>
                                            @foreach($plan->getRelationalData as $relation )

                                            @if($relation->module_id == $module->id)
                                            <li> {{$relation->getOperation->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                                <!-- <div class="plain_project my-2">
                                    <div class="project_text plain_project opacity-50">
                                        <span class="movie_name_text">Projects</span>
                                    </div>
                                    <div class="plain_page_list p-3">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job">
                                    <div class="project_text plain_job opacity-50">
                                        <span class="movie_name_text">Jobs</span>
                                    </div>
                                    <div class="plain_page_list p-3">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div> -->

                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-create',['id'=>$plan->id])}}" style="text-decoration:none;">
                                    <button class="job_search_btn">Select Free Plan</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php $flag = 1; ?>
                        @endforeach
                        <!-- <div class="col-md-3">
                            <div class="plan_card">
                                <div class="plain_detail">
                                    <div class="plain_header text-center">Basic</div>
                                    <div class="plan_subheader mt-2">Great for those who want to get themselves in front of the right people in the industry</div>
                                </div>
                                <div class="Plain_price">
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Paid Monthly</div>
                                    <div class="search-head-text Aubergine_at_night">$9.99</div>
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Search for industry professionals</li>
                                            <li>View profiles</li>
                                            <li>Save profiles</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_project p-3 my-2">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-create')}}" style="text-decoration:none;">
                                    <button class="job_search_btn">Select Free Plan</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="plan_card">
                                <div class="plain_detail">
                                    <div class="plain_header text-center">Pro</div>
                                    <div class="plan_subheader mt-2">Great for those who want to get themselves in front of the right people in the industry</div>
                                </div>
                                <div class="Plain_price">
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Paid Monthly</div>
                                    <div class="search-head-text Aubergine_at_night">$14.99</div>
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Search for industry professionals</li>
                                            <li>View profiles</li>
                                            <li>Save profiles</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_project p-3 my-2">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-create')}}" style="text-decoration:none;">
                                    <button class="job_search_btn">Select Free Plan</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="plan_card">
                                <div class="plain_detail">
                                    <div class="plain_header text-center">Enterprise</div>
                                    <div class="plan_subheader mt-2">Great for those who want to get themselves in front of the right people in the industry</div>
                                </div>
                                <div class="Plain_price">
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Paid Monthly</div>
                                    <div class="search-head-text Aubergine_at_night">$39.00</div>
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Search for industry professionals</li>
                                            <li>View profiles</li>
                                            <li>Save profiles</li>
                                            <li>Save profiles</li>
                                            <li>Save profiles</li>
                                            <li>Save profiles</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_project p-3 my-2">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plain_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-create')}}" style="text-decoration:none;">
                                    <button class="job_search_btn">Select Free Plan</button>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('footer')
@include('website.include.footer')
@endsection
@push('scripts')

<script>
    // var addclass = 'card_highlight';
    // var forHead = 'active_plain_detail';
    // var $cols = $('.plan_card').click(function(e) {
    //     $cols.removeClass(addclass);
    //     $(this).addClass(addclass);
    //     $('.plain_detail').removeClass(forHead);
    //     $(this).find('.plain_detail').addClass(forHead);
    // });
    var addclass = 'card_highlight';
    var forHead = 'active_plain_detail';
    var forButton = 'active_plain_button';
    var $cols = $('.plan_card').click(function(e) {
        $cols.removeClass(addclass);
        $(this).addClass(addclass);
        $('.plain_detail').removeClass(forHead);
        $('.job_search_btn').removeClass(forButton);
        $(this).find('.plain_detail').addClass(forHead);
        $(this).find('.job_search_btn').addClass(forButton);
    });
</script>

@endpush
