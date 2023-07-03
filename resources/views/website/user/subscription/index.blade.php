@extends('website.layouts.app',['class' => 'bg_white'])

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="pb-5 bg_ffff">
        <div class="plan_wraper">
            <div class="container">
                <div class="row">
                    <div class="class-md-12">
                        <div class="mt-4">SETUP YOUR PLAN</div>
                        <div class="mt-4">
                          
                            <div class="currency_togle">
                                <div class="togle_text text_fff mt-0">Dollar</div>
                                <label class="switch mx-2">
                                    <input type="checkbox" id="currency" class="check" <?php if($plans[0]->currency == 'INR'){echo'checked';}elseif(request('currency')=='INR')
                                    {echo 'checked';} ?> name="currency">
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
                        <div class="plan_btn_wraper d-none">
                               <!-- <div> -->
                                   <button class="plan_btn <?php if(request('plan_time')){
                                     if(request('plan_time')=='m'){
                                        echo'plan_month_select';                                    
                                     }
                                   }else{
                                    echo'plan_month_select';
                                   } ?>" data = "m">Monthly</button>
                               <!-- </div> -->
                               <!-- <div> -->
                                   <button class="plan_btn 
                                   <?php if(request('plan_time')=='y'){
                                        echo'plan_month_select';
                                   }?>" data="y">Annually</button>
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
                       @php if($plan->plan_name == 'Free'){continue;} @endphp
                        <div class="col-md-4 mb-2 mb-md-0">
                            <div class="plan_card">
                                <div class="plain_detail">
                                    <div class="plain_header text-center">{{$plan->plan_name}}</div>
                                    <div class="plan_subheader mt-2">{{$plan->description}}</div>
                                </div>
                                <div class="Plain_price">
                                    @if($plan->plan_name == "Free")
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Free forever</div>
                                    @else
                                    <div class="search-head-subtext Aubergine_at_night mt-3">Paid 
                                        @if($plan->plan_time == 'm')
                                        Monthly
                                        @else
                                        Annually
                                        @endif</div>
                                    @endif
                                    <div class="search-head-text Aubergine_at_night">@if($plan->currency == "USD")$@else₹@endif{{ number_format((float)$plan->plan_amount, 2, '.', ',')}}
                                    </div>
                                    @if($plan->plan_time == "y")                                           
                                        <div class="search-head-subtext Aubergine_at_night mt-3">(@if($plan->currency == "USD")$@else₹@endif{{ number_format($plan->plan_amount/12, 2,'.',',')}}/month)</div>
                                    @endif
                                    @if ($plan->currency == 'INR')
                                    <div>(Inclusive of all applicable taxes)</div>
                                    @endif
                                    
                                    @if ($freeTrial==true)
                                    <div class="d-flex justify-content-center">
                                        <a  href="{{route('subscription-free',['id'=>$plan->id])}}" style="text-decoration:none;">
                                            <button class="cantact-page-cmn-btn mt-2 free_button pd-20">
                                                Try for free
                                            </button>
                                        </a>
                                    </div>
                                    <div class="plan_trial_notify">
                                        Get a free 30-day trial, <br>no credit card details required
                                    </div>
                                    @else
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create',['id'=>$plan->id])}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                    @endif
                                    {{-- <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create',['id'=>$plan->id])}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create',['id'=>$plan->id])}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2 pd-30">Start 30-days<br>Free Trail</button></a></div> --}}
                                </div>
                                @php 
                                   $lc = 0;
                                @endphp
                                @foreach($modules as $module)
                                <div class="plain_industry_guide mb_2" style="position: relative;" id="myDivHeight">
                                    @if($flag == 0)
                                    <div class="industry_guide_text plan_module_elem d-none d-md-block" plan_elem = "{{strtolower(str_replace(' ','_',$module->name))}}">
                                        <span class="movie_name_text">{{$module->name}}</span>
                                    </div>
                                    @endif
                                    <div class="plan_page_list p-3 plan_module_elem" plan_elem = "{{strtolower(str_replace(' ','_',$module->name))}}">
                                        @if ($plan->getRelationalData)
                                        <ul>
                                            @foreach($plan->getRelationalData as $relation )

                                            @if($relation->module_id == $module->id)
                                            <li class="d-flex align-items-baseline"> @if($relation->limit != 0)
                                               <span class="list"></span>
                                               <span class="mx-2">
                                                   {{str_replace('#', $relation->limit, $relation->getOperation->name)}}
                                               </span>
                                               @else
                                               <span class="list"></span>
                                               <span class="mx-2">
                                                   {{$relation->getOperation->name}}
                                               </span>
                                                 @endif
                                            </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                                @endforeach

                                <!-- <div class="plain_project my-2">
                                    <div class="project_text plain_project opacity-50">
                                        <span class="movie_name_text">Projects</span>
                                    </div>
                                    <div class="plan_page_list p-3">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job">
                                    <div class="project_text plain_job opacity-50">
                                        <span class="movie_name_text">Jobs</span>
                                    </div>
                                    <div class="plan_page_list p-3">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div> -->

                                <div class="py-4 px-3">
                                    @if ($freeTrial==true)
                                    <a  href="{{route('subscription-free',['id'=>$plan->id])}}" style="text-decoration:none;">
                                    <button class="job_search_btn"> Start 30-day trial</button>
                                    </a>
                                    @else
                                    <a  href="{{route('subscription-order-create',['id'=>$plan->id])}}" style="text-decoration:none;">
                                    <button class="job_search_btn">Select {{$plan->plan_name}} Plan</button>
                                    </a>
                                    @endif
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
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Search for industry professionals</li>
                                            <li>View profiles</li>
                                            <li>Save profiles</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_project p-3 my-2">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-order-create')}}" style="text-decoration:none;">
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
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Search for industry professionals</li>
                                            <li>View profiles</li>
                                            <li>Save profiles</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_project p-3 my-2">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-order-create')}}" style="text-decoration:none;">
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
                                    <div class="d-flex justify-content-center"><a  href="{{route('subscription-order-create')}}" style="text-decoration:none;"><button class="cantact-page-cmn-btn mt-2">Get Started</button></a></div>
                                </div>
                                <div class="plain_industry_guide p-3">
                                    <div class="plan_page_list">
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
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="plain_job p-3">
                                    <div class="plan_page_list">
                                        <ul>
                                            <li>Create Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-4 px-3">
                                    <a  href="{{route('subscription-order-create')}}" style="text-decoration:none;">
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
<div class="modal fade expire_modal ">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg_3308">
            <div class="modal-body p-0">
                <section class="p-3">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="signup-text  mt-5 mt-md-5">Your free trial has ended</div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <p class="text-white">We hope you enjoyed experiencing our services during your trial period. To continue enjoying our premium features and exclusive benefits, we invite you to upgrade to a full membership. Don't miss out on the opportunity to unlock the full potential of our platform.</p>
                            </div>
                            <div class="col-md-12 py-3">
                                <button type="button" class="invite_btn" data-dismiss="modal">Upgrade Plan</button>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@include('website.include.footer')
@endsection
@push('scripts')

<script>
    
    
    /*
    is_plan_page var is to control the modal of billing address to make it mandatory for a paid-subscribed user
    but not show the that modal in plan page-
    */
    var from_plan_page = true;
    
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
    $('#currency').change(function() { 
        plan = $('.plan_month_select').attr('data');
        currency = 'INR';
        link = "{{route('plans-view')}}";
          if(this.checked) { 
            currency = 'INR';
            params = '?plan_time='+plan+'&currency='+currency
            window.location.href = link+params;
          } else{
            currency = 'USD';
            params = '?plan_time='+plan+'&currency='+currency
            window.location.href = link+params;
          }
    });

    $('.plan_btn').on('click',function(){
        plan = $(this).attr('data');
        // currency = 'INR'
        link = "{{route('plans-view')}}";
        if($('#currency').is(':checked')) { 
            currency = 'INR';
            params = '?plan_time='+plan+'&currency='+currency
            window.location.href = link+params;

          } else{
            currency = 'USD';
            params = '?plan_time='+plan+'&currency='+currency
            window.location.href = link+params;
          }
    })

   
 
    var elem_arr = {};
    $('.plan_module_elem').each(function(k,v)
    {
        let elem_height = $(v).outerHeight();
        if($.inArray($(v).attr('plan_elem'),elem_arr)==-1)
        {
            elem_arr[$(v).attr('plan_elem')] = elem_height;
        }
        else
        {
            if(elem_arr[$(v).attr('plan_elem')]<elem_height)
            {
                elem_arr[$(v).attr('plan_elem')] = elem_height;
            }
        }
        
    });
    $.each(elem_arr,function(k,v)
    {
        $("[plan_elem="+k+"]").css('height',v+'px');
    })
    let freesubtrial="{{ Session::get('freeSubscription')}}";
    var isPlanPage=true;
    
    var isnotfree="{{$freeTrial}}";
    var plan_type = "{{session()->get('freeSubscription')}}";
    var free_status = "{{session()->get('subscription_status')}}";
    if (isnotfree==false && plan_type== "free" && free_status =='inactive') {
        $('.expire_modal').modal('show');
    };
    $('.free_button').click(function () {
        $(this).attr('disabled', 'true'); 
    })
</script>

@endpush
