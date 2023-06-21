  <!-- Modal for Loactions List -->
  <div class="modal fade" id="categories-list"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
        <div class="modal-content">
            <div class="modal-body">
                <section class="filter_option_wrap">
                    <div class="container no-padding">
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col-md-4 filter_options">
                                <label class="list-group-item">
                                    @if(isset(request('categories')[0]) && in_array($category->id, request('categories')))
                                    <input class="form-check-input me-1" type="checkbox" name="categories[]" checked value="{{$category->id}}">
                                    {{$category->name}}
                                    @else
                                    <input class="form-check-input me-1" type="checkbox" name="categories[]" value="{{$category->id}}">
                                    {{$category->name}}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>