function toastMessage(status, msg) {


    var rootScript = 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js'; 
    var FLASHER_FLASH_BAG_PLACE_HOLDER = {}; 
    var options = mergeOptions({ "envelopes": [{ "notification": { "type":status.toLowerCase(), "message": msg, "title": status, "options": [] }, "handler": "flasher", "created_at": "2023-03-03 11:49:38", "uuid": "0000000077c3ce0d0000000009d2c500", "priority": 0 }], "options": { "theme.flasher": [] } }, FLASHER_FLASH_BAG_PLACE_HOLDER); function mergeOptions(first, second) { return { context: merge(first.context || {}, second.context || {}), envelopes: merge(first.envelopes || [], second.envelopes || []), options: merge(first.options || {}, second.options || {}), scripts: merge(first.scripts || [], second.scripts || []), styles: merge(first.styles || [], second.styles || []), }; } function merge(first, second) { if (Array.isArray(first) && Array.isArray(second)) { return first.concat(second).filter(function (item, index, array) { return array.indexOf(item) === index; }); } return Object.assign({}, first, second); } function renderOptions(options) { if (!window.hasOwnProperty('flasher')) { console.error('Flasher is not loaded'); return; } requestAnimationFrame(function () { window.flasher.render(options); }); } function render(options) { if ('loading' !== document.readyState) { renderOptions(options); return; } document.addEventListener('DOMContentLoaded', function () { renderOptions(options); }); } if (1 === document.querySelectorAll('script.flasher-js').length) { document.addEventListener('flasher:render', function (event) { render(event.detail); }); } if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) { render(options); } else { var tag = document.createElement('script'); tag.setAttribute('src', rootScript); tag.setAttribute('type', 'text/javascript'); tag.onload = function () { render(options); }; document.head.appendChild(tag); }



    // var errorStatus = 'Error'; 
    // var bg = 'bg-danger'
    // if (status == 1) {
    //     var errorStatus = 'Success';
    //     var bg = 'bg-success';
    // }   
    // let toast_msg = `<div class="toast align-items-end text-white ${bg} border-0 justify-content-end" id="success-toast" data-animation="true" data-autohide="true" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
    // <div class="d-flex">
    //     <div class="toast-body">
    //     ${errorStatus}: ${msg}
    //     </div>
    //     <button type="button" class="toast-close btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    // </div>
    // </div>`;
    // $(".for_authtoast").html(toast_msg);
    // $(".toast").show();   
    // $('.toast-close').on('click',function(){
    //     $(".toast").hide(); 
    // }) ; 
}  

	