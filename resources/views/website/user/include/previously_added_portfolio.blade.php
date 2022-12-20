<section class="mb-3">
    <div class="row">
      <div class="col-md-12">
        <div class="previous_data_wraper">
          <div class="accordion" id="accordionPortfolio">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed collapse_text_design" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Portfolio
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionPortfolio">
                <div class="my-3">
                  <div class="container-fluid">
                    <div class="row">
                      <?php
                        if(count($prevData))
                        {
                          foreach($prevData as $k => $v)
                          {
                            ?>
                              <div class="col-md-4">
                                <div class="card previous_data_card">
                                  <div class="d-flex justify-content-between">
                                    <div class="crop_input_label">{{$v->project_title}}</div>
                                    <div>
                                      <a href="{{ route('portfolio-edit', ['id'=>$v->id]) }}" >
                                        <i class="fa fa-pencil mx-2 Aubergine" aria-hidden="true"></i>
                                      </a>
                                      <a class="confirmAction" href="{{route('portfolio-delete',['id'=>$v->id])}}">
                                        <i class="fa fa-trash Aubergine" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                  </div>
                                  <div class="mt-2">
                                    <div class="upload_resume_text">{{$v->getPortfolioSkill[0]->name}}</div>
                                    <div class="upload_resume_text mt-2">{{$v->getPortfolioLocation[0]->name}}</div>
                                  </div>
                                </div>
                              </div>
                            <?php
                          }
                        }  
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>