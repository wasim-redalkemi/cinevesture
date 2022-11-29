 <!-- Modal for employments List -->
 <div class="modal fade" id="employments-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body" style="padding: 0px;">
                 <section>
                     <div class="container" style="padding: 0px;">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="modal_container">
                                     <div class="list-group">
                                         @foreach($employments as $employment)
                                         <label class="list-group-item">

                                             @if(isset(request('employments')[0]) && in_array($employment->id, request('employments')))
                                             <input class="form-check-input me-1" type="checkbox" checked name="employments[]" value="{{$employment->id}}">
                                             {{$employment->name}}
                                             @else
                                             <input class="form-check-input me-1" type="checkbox" name="employments[]" value="{{$employment->id}}">
                                             {{$employment->name}}
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