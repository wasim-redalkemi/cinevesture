@push('scripts')
<script>
    $('.like-profile').on('click', function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var profile_id = $(this).attr('data-id');
        var classList = $(this).attr('class').split(/\s+/);
        var element = $(this);
        $.ajax({
            type: 'post',
            data: {'id':profile_id},
            url: "{{route('favourite-update')}}",
            success: function(resp) {
                if (resp.status) {
                    for (var i = 0; i < classList.length; i++) {
                        if (classList[i] == 'fa-heart-o') {
                            element.removeClass('fa-heart-o');
                            element.addClass('fa-heart')
                            toastMessage("success", response.msg);
                            break;
                        }
                        if(classList[i] == 'fa-heart')
                        {
                            element.removeClass('fa-heart');
                            element.addClass('fa-heart-o');
                            toastMessage("error", response.msg);

                            break;
                        }

                    }
                } else {

                }
            },
            error: function(error) {
                
            }
        });

    });
</script>

@endpush