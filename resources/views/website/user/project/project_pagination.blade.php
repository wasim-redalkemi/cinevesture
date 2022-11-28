<section class="">
    <div class="container">
        <div class="row">
             @if(isset($project))
            <div class="col-12 text-center px-0 px-md-5">
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div class="">
                        <div class="flow_container">1</div>
                        <div class="w__17 d-none d-md-block mt-3">Overview</div>
                    </div>
                    <hr class="flow_hr">
                    <div class="">
                        <div class="flow_container opc_5">2</div>
                        <div class="w__17 d-none d-md-block mt-3">Details</div>
                    </div>
                    <hr class="flow_hr">
                    <div class="">
                        <div class="flow_container opc_5">3</div>
                        <div class="w__17 d-none d-md-block mt-3">Description</div>
                    </div>
                    <hr class="flow_hr">
                    <div class="">
                        <div class="flow_container opc_5">4</div>
                        <div class="w__17 d-none d-md-block mt-3">Gallery</div>
                    </div>
                    <hr class="flow_hr mr__3">
                    <div class="">
                        <div class="flow_container opc_5">5</div>
                        <div class="w__17 d-none d-md-block mt-3">Requirements</div>
                    </div>
                    <hr class="flow_hr ml__3">
                    <div class="">
                        <div class="flow_container opc_5">6</div>
                        <div class="w__17 d-none d-md-block mt-3">Preview</div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 text-center px-3 px-md-5">
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=1){echo 'active_bg';}else{echo 'inactive_bg';}?> "><span class="d-none d-md-block">1</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Overview</div>
                    </div>
                    <hr class="<?php if($page_bg>=2){echo 'flow_hr_bold';}else{echo 'flow_hr';}?>">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=2){echo 'active_bg';}else{echo 'inactive_bg';}?> "><span class="d-none d-md-block">2</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Details</div>
                    </div>
                    <hr class="<?php if($page_bg>=3){echo 'flow_hr_bold';}else{echo 'flow_hr';}?> ml_0">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=3){echo 'active_bg';}else{echo 'inactive_bg';}?>  "><span class="d-none d-md-block">3</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Description</div>
                    </div>
                    <hr class="<?php if($page_bg>=4){echo 'flow_hr_bold';}else{echo 'flow_hr';}?> mr_0">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=4){echo 'active_bg';}else{echo 'inactive_bg';}?>  "><span class="d-none d-md-block">4</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Gallery</div>
                    </div>
                    <hr class="<?php if($page_bg>=5){echo 'flow_hr_bold';}else{echo 'flow_hr';}?> ml_0 mr__2">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=5){echo 'active_bg';}else{echo 'inactive_bg';}?>  "><span class="d-none d-md-block">5</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Requirements</div>
                    </div>
                    <hr class="<?php if($page_bg>=6){echo 'flow_hr_bold';}else{echo 'flow_hr';}?> ml__2 mr_0">
                    <div class="">
                        <div class="flow_container <?php if($page_bg>=6){echo 'active_bg';}else{echo 'inactive_bg';}?>  "><span class="d-none d-md-block">6</span></div>
                        <div class="w__17 d-none d-md-block mt-3">Preview</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>