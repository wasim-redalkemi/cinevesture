
<div class="free_trial_msg free_trial_wrap">
    <div class="alert-warning-theam d-flex justify-content-between rounded p-2">
        <div class="p_right">
        Your<strong > Free Trial</strong> is expiring in {{ Session::get('freeEndDateSub')}} days. To enjoy seamless services of cinevesture upgrade your plan!
    </div>
    
    <div class="d-flex margin_side">
        <div class="margin_side"><a href="{{route('plans-view')}}"><button class="buy_plan_btn_sm btn-sm" >Buy Plan</button></a></div>
        <div>
            <button type="button" class="close hide_msg btn btn-sm btn-danger">
                Close
            </button>
        </div>
    </div>

    </div>
</div>

@push('scripts')
<script>
    $('document').ready(function () {
        $(".hide_msg").click(function () {
            $(".free_trial_msg").hide();
            sessionStorage.setItem('freeToastMSG',"1");
        })
    })
</script>
@endpush