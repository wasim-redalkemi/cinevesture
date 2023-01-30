<div class="mt-1 contact-page-text">@if (!empty($data['portfolio_title'])) {{ $data['portfolio_title']}} @endif</div>

<div class="contact-page-subtext"><?php if (!empty($data['completion_date'])) {
     $orgDate = $data['completion_date'];  
    $newDate = date("d M Y", strtotime($orgDate));  
    echo $newDate; 
} else {
    echo '<span><b>-</b></span>';
}
?></div>

@if (count($data['get_portfolio_location'])>0)
<div class="mt-1">
    @foreach ($data['get_portfolio_location'] as $k=>$v)
        <div class="">{{$v['name']}}</div>
    @endforeach
</div>
@else
    <span><b>-</b></span>    
@endif

@if (count($data['get_portfolio_skill'])>0)
<div class="mt-3">
    @foreach ($data['get_portfolio_skill'] as $k=>$v)
    <button class="curv_cmn_btn">{{$v['name']}}</button>
    @endforeach
</div>
@else
<span><b>-</b></span>
@endif
<div class="mt-3 guide_profile_main_subtext">@if (!empty($data['description'])) {{ $data['description']}} @else <span><b>-</b></span>  @endif</div>
<div class="guide_profile_main_subtext deep-pink my-2">
    @if (!empty($data['video']))
    <a href="{{json_decode($data['video'])->video_url}}" class="" target="_blank">
        {{ json_decode($data['video'])->video_url}}
    </a>
    @else
    <span><b>-</b>
    @endif    
</div>

<div class="portfolioImage owl-carousel mt-1">
    @if (!empty($data['get_portfolio']))
    @foreach ($data['get_portfolio'] as $k=>$v)                                 
    <div class="item portfolio_modal_item">
            <div class="portfolio_item_image">     
        <img src="{{ Storage::url($v['file_link']) }}" class="portfolio_img" />
            </div>
    </div> 
    @endforeach
    @endif
    
</div>




<script type="text/javascript">
    $(document).ready(function() {
        $(".portfolioImage.owl-carousel").owlCarousel({
        center: true,
        // autoPlay: 1000,
        // autoplay: true,
        loop: true,
        nav: true,
        margin: 20,
        center: true,
        items: 1,
    }); 
    });  
</script> 
