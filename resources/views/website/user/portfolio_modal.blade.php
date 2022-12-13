<div class="mt-1 contact-page-text">@if (!empty($data['project_title'])) {{ $data['project_title']}} @endif</div>

@if (count($data['get_portfolio_location'])>0)
<div class="mt-3">
    @foreach ($data['get_portfolio_location'] as $k=>$v)
        <button class="curv_cmn_btn mx-2">{{$v['name']}}</button>
    @endforeach
</div>
@else
    <span><b>-</b></span>    
@endif

<div class="contact-page-subtext"><?php if (!empty($data['completion_date'])) {
     $orgDate = $data['completion_date'];  
    $newDate = date("d-m-Y", strtotime($orgDate));  
    echo $newDate; 
}?></div>

@if (count($data['get_portfolio_skill'])>0)
<div class="mt-3">
    @foreach ($data['get_portfolio_skill'] as $k=>$v)
        <button class="curv_cmn_btn mx-2">{{$v['name']}}</button>
    @endforeach
</div>
@else
    <span><b>-</b></span>    
@endif
<div class="mt-3 guide_profile_main_subtext">@if (!empty($data['description'])) {{ $data['description']}} @endif</div>
<div class="guide_profile_main_subtext deep-pink">
    @if (!empty($data['video']))
    <a href="{{json_decode($data['video'])->video_url}}" class="" target="_blank">
        {{ json_decode($data['video'])->video_url}}
    </a>
    @endif    
</div>

<div class="portfolioImage owl-carousel">
    @if (!empty($data['get_portfolio']))
    @foreach ($data['get_portfolio'] as $k=>$v)                                 
    <div class="item portfolio_item"> 
            <div class="portfolio_item_image">      
        <img src="{{ Storage::url($v['file_link']) }}" class="portfolio_img" width="100%" height="100%" />
            </div>
    </div> 
    @endforeach
    @endif             
</div>    



<script type="text/javascript">  
    $(document).ready(function () {
        $(".portfolioImage.owl-carousel").owlCarousel({
        center: true,
        autoPlay: 1000,
        autoplay: true,
        loop: true,
        nav: true,
        margin: 20,
        center: true,
        items: 2,
    }); 
    });  
</script> 