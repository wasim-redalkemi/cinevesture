
<div class="free_trial_msg free_trial_wrap">
    <div class="alert-warning-theam d-flex justify-content-between rounded p-2">
        <div class="p_right">
        <strong >Free trial</strong> If you want to buy paid plan so click on this button 
    </div>
    
    <div>
        <a href="{{route('plans-view')}}"><button class="btn btn-primary btn-sm" >Buy plan</button></a>
        <button type="button" class="close hide_msg btn btn-sm btn-danger">
        Close
        </button>
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