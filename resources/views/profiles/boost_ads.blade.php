  <!-- Modal -->
  <div class="modal fade" id="boostAds{{ $job->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Premium</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('job.boost', $job->id) }}" method="post" id="formBoost">
                @csrf
                @method('PUT')
                  <div class="modal-body">
                      <div class="card bg-light card-body mb-3">
                          <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium
                          </h3>

                          <p>Premium ads help sellers promote their product or service by getting
                              their ads more visibility with more
                              buyers and sell what they want faster. <a href="help.html">Learn
                                  more</a></p>

                          <div class="form-group row">
                              <table class="table table-hover checkboxtable">
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="exampleRadios"
                                                      id="optionsRadios0" value="option1" checked>
                                                  Regular List
                                              </label>
                                          </div>

                                      </td>
                                      <td>
                                          <p>$00.00</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                  <input class="form-check-input optionsRadios1" type="radio" name="price" value="1000">
                                                      <input type="radio" name="day" class="optionsday1 hidden" value="1">
                                                  <strong> Top of the Page Ad during 1 day</strong>
                                              </label>
                                          </div>

                                      </td>
                                      <td>
                                          <p>1000 XAF</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                  <input class="form-check-input optionsRadios2" type="radio" name="price" value="3000">
                                                      <input type="radio" name="day" class="optionsday2 hidden" value="7">
                                                  <strong> Top of the Page Ad during 1 week</strong>
                                              </label>
                                          </div>

                                      </td>
                                      <td>
                                          <p>3000 XAF</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                  <input class="form-check-input optionsRadios3" type="radio" name="price" value="5000">
                                                      <input type="radio" name="day" class="optionsday3 hidden" value="30">
                                                  <strong> Top of the Page Ad during 1 month</strong>
                                              </label>
                                          </div>

                                      </td>
                                      <td>
                                          <p>5000 XAF</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="form-group row">
                                              <div class="col-sm-8">
                                                  <select class="form-control" name="Method" id="PaymentMethod">
                                                      <option value="2">Select Payment Method
                                                      </option>
                                                      <option value="3">Credit / Debit Card
                                                      </option>
                                                      <option value="5">Paypal</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <p><strong>Solde : {{ Auth::user()->credit->solde }} XAF</strong></p>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="btnboost">Subscribe</button>
                  </div>
              </form>

          </div>
      </div>
  </div>

  <script>
    //   $('#optionsRadios1').click(function(e) {
    //     console.log('form submiitend');

    //     $('#optionsday1').click(function (e) { 
    //         // e.preventDefault();
            
    //     });

         
    //   });
  </script>
