
@if(Session::has('response'))
    <div class="section">
        <div class="container-fluid">
            {{-- <div class="row"> --}}
                <div class="w-auto float-right mt-1">
                    <div class="alert alert-sm alert-{{session('response')['type']}} alert-dismissible fade show " role="alert">
                        {{-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> --}}
                        <span class="alert-text"><span class="text-wrap">{{session('response')['text']}}</span></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endif