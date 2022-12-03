@foreach($jobs as $job)
<div class="profile_wraper profile_wraper_padding">
    <div class="d-flex justify-content-between">
        <a href="{{route('posted-job-single-view',['job_id'=>$job->id])}}" class="guide_profile_main_text">
            {{$job->title}}
        </a>
        <div class="pointer fav-icon">
            <i data-id="{{$job->id}}" class="fa {{is_null($job->favorite) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
        </div>
    </div>

    <div class="preview_headtext lh_54 candy-pink">
        {{$job->company_name}}-{{$job->jobLocation->name}}
    </div>
    <div class="posted_job_header Aubergine_at_night">
        {{$job->description}}
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
@if(blank($jobs))
    <div class="text-center mt-5">
        <h1>{{$notFoundMessage}}</h1>
    </div>
    @endif
{{$jobs->links()}}