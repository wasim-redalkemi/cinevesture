function toastMessage(status, msg) {
    var errorStatus = 'Error'; 
    var bg = 'bg-danger'
    if (status == 1) {
        var errorStatus = 'Success';
        var bg = 'bg-success';
    }   
    let toast_msg = `<div class="toast align-items-end text-white ${bg} border-0 justify-content-end" id="success-toast" data-animation="true" data-autohide="true" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
        ${errorStatus}: ${msg}
        </div>
        <button type="button" class="toast-close btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    </div>`;
    $(".for_authtoast").html(toast_msg);
    $(".toast").show();   
    $('.toast-close').on('click',function(){
        $(".toast").hide(); 
    }) ; 
}  

	