<div class="mb_2 mt-2 mt-md-0">{{($jobs->total())}} Results Founds</div>

<div class="white_bg_wraper my-3 my-md-0 mb-xl-4">
    @foreach($jobs as $job)
<div class="border_btm profile_wraper_padding">
    <div class="d-flex justify-content-between">
        {{-- <a href="{{route('posted-job-single-view',['job_id'=>$job->jobDetails->id])}}" class="guide_profile_main_text"> --}}
       
        <div class="d-flex align-items-center">
            <a href="{{route('after_search-job-single-view',['job_id'=>$job->jobDetails->id])}}" class="guide_profile_main_text">
            {{ucFirst($job->jobDetails->title)}}
        </a>
        @if ($job->jobDetails->save_type=='unpublished' || empty($job->jobDetails->user) ||$job->jobDetails->user->status=='0' || ($job->jobDetails->deleted_at) )
            <span class="does_not_exist">
                <i class="fa fa-info-circle" title="This entity doesn't exist anymore"></i>
            </span>
        @endif
        
        @if ($job->jobDetails->Promote)            
        <span class="mx-4">
            <button class="verified_cmn_btn"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> PROMOTED</button>
        </span>
        @endif
        </div>
      
        @if($job->jobDetails->user_id!=auth()->user()->id)
        <div class="pointer fav-icon">
            <i data-id="{{$job->jobDetails->id}}" class="fa {{is_null($job->jobDetails->favorite) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
        </div>
        @endif
    </div>

    <div class="preview_headtext lh_54 candy-pink">
        
        {{ucFirst($job->jobDetails->company_name)}} - {{@$job->jobDetails->jobLocation->name}} - <span style="color: #971E9B"> {{@$job->jobDetails->jobEmployements[0]->name}}</span>

    </div>
    <div class="posted_job_header Aubergine_at_night forTextBreak" style="word-break: break-all;">
       <span class=""> {{ucFirst($job->jobDetails->description)}}</span>
    </div>
    <div class="d-block d-md-flex justify-content-between mt-2 mt-md-4">
        <div class="w_75">
            @foreach($job->jobDetails->jobSkills as $skill)
            <button class="curv_cmn_btn">{{$skill->name}}</button>
            @endforeach
        </div>
        @if($job->jobDetails->user_id!=auth()->user()->id)
     
            {{-- @if(!isset($showApplied) || $showApplied) --}}
                <div class="mt-2 mt-md-0">
                    @if(is_null($job->jobDetails->applied))
                <button class="guide_profile_btn">  <a href="{{route('showApplyJob',['jobId'=>$job->jobDetails->id])}}" class="">Apply now</a></button>
                    @else
                    <button disabled class="guide_profile_btn">Applied</button>
                    @endif
                </div>      
            {{-- @endif --}}
        @endif
    </div>
    </div>
    @endforeach
</div>
@if(blank($jobs))
    {{-- <div class="text-center mt-5">
        <h1>{{$notFoundMessage}}</h1>
    </div> --}}
   {!! config('constants.NO_DATA_SEARCH') !!}
    @endif
{{-- {{$jobs->links()}} --}}
{!! $jobs->onEachSide(0)->links() !!}