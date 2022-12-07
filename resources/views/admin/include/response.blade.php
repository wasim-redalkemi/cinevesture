
<?php
    if(Session::has('response'))
    {
        if(session('response')['type'] == 'danger')
        {
            toastr()->error(session('response')['text'], 'Error!');
        }
        else 
        {
            toastr()->success(session('response')['text'], 'Success');
        }
    }
?>
