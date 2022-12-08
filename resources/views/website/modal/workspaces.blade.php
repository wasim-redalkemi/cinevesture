 <!-- Modal for workspaces List -->
 <div class="modal fade" id="workspaces-list"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body" style="padding: 0px;">
                                        <section>
                                            <div class="container" style="padding: 0px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="modal_container">
                                                            <div class="list-group">
                                                                @foreach($workspaces as $workspace)
                                                                <label class="list-group-item">

                                                                    @if(isset(request('workspaces')[0]) && in_array($workspace->id, request('workspaces')))
                                                                    <input class="form-check-input me-1" type="checkbox" checked name="workspaces[]" value="{{$workspace->id}}">
                                                                    {{$workspace->name}}
                                                                    @else
                                                                    <input class="form-check-input me-1" type="checkbox" name="workspaces[]" value="{{$workspace->id}}">
                                                                    {{$workspace->name}}
                                                                    @endif
                                                                </label>
                                                                @endforeach

                                                            </div>
                                                            <button type="button" class="btn modal-close-filter" data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>