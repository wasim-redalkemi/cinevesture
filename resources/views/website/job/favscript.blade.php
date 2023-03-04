@push('scripts')

<script>
    $(".fav-icon .aubergine").on('click', function() {

        try {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var jobId = $(this).attr('data-id')
            var classList = $(this).attr('class').split(/\s+/);
            var $elem = $(this);
            $.ajax({
                type: 'post',
                data: {
                    'job_id': jobId
                },
                url: "{{route('addJobToFavList')}}",
                success: function(resp) {
                    if (resp.status) {
                        $elem.toggleClass("fa-heart-o fa-heart");
                        // toastMessage(1, resp.message);
                        toastMessage("Success",resp.message)
                    } else {
                       toastMessage("error", resp.message);
                    }
                },
                error: function(error) {
                    toastMessage("error", "something went wrong, please try again.");
                }
            });
        } catch (error) {
            toastMessage("error", "something went wrong, please try again.");
        }

    });
</script>

@endpush