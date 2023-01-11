<div class="mb_3">{{count($jobs)}} Results Founds</div>
<div class="white_bg_wraper my-3 my-md-0 mb-xl-4">
    @foreach($jobs as $job)
<div class="border_btm profile_wraper_padding">
    <div class="d-flex justify-content-between">
        {{-- <a href="{{route('posted-job-single-view',['job_id'=>$job->id])}}" class="guide_profile_main_text"> --}}
       
        <div class="d-flex align-items-center">
            <a href="{{route('after_search-job-single-view',['job_id'=>$job->id])}}" class="guide_profile_main_text">
            {{ucFirst($job->title)}}
        </a>
        @if ($job->Promote)            
        <span class="mx-4">
            <button class="verified_cmn_btn"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> PROMOTED</button>
        </span>
        @endif
        </div>
      
        <div class="pointer fav-icon">
            <i data-id="{{$job->id}}" class="fa {{is_null($job->favorite) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
        </div>
    </div>

    <div class="preview_headtext lh_54 candy-pink">
        
        {{ucFirst($job->company_name)}} - {{@$job->jobLocation->name}} - {{@$job->jobEmployements[0]->name}}

    </div>
    <div class="posted_job_header Aubergine_at_night" style="word-break: break-all;">
        {{ucFirst($job->description)}}
    </div>
    <div class="d-flex justify-content-between mt-4">
        <div class="w-75">
            @foreach($job->jobSkills as $skill)
            <button class="curv_cmn_btn">{{$skill->name}}</button>
            @endforeach
        </div>
        @if(!isset($showApplied) || $showApplied)
        <div>
            @if(is_null($job->applied))
          <button class="guide_profile_btn">  <a href="{{route('showApplyJob',['jobId'=>$job->id])}}" class="">Apply now</a></button>
            @else
            <button disabled class="guide_profile_btn">Applied</button>
            @endif
        </div>      
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
{{$jobs->links()}}