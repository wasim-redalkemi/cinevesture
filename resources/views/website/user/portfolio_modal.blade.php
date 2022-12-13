<div class="mt-1 contact-page-text">@if (!empty($data['project_title'])) {{ $data['project_title']}} @endif</div>
<div class="contact-page-subtext">@if (!empty($data['completion_date'])) {{ $data['completion_date']}} @endif</div>

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
<div class="guide_profile_main_subtext deep-pink">@if (!empty($data['video'])) {{ $data['video']}} @endif</div>
<div class="mt-3 modal_image_wraper">
    @if (!empty($data['get_portfolio']))
        <img src="{{ Storage::url($data['get_portfolio'][0]['file_link']) }}" width="100%" height="100%" />
    @else        
        <img src="{{ asset('images/asset/user-profile.png') }}" width="100%" height="100%" />
    @endif
</div>
<div class="portfolioImage owl-carousel">
                                      
                                        <div class="item portfolio_item" onclick="">
                                            <div class="portfolio_item_image">
                                                <img src="" class="portfolio_img" width="100%">
                                                imageee
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="icon_container"> <a href="{{ route('portfolio-edit', ['id'=>$v['id']]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
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
        items: 1,
    }); 
    });  
</script> 