<div class="tab-pane active" id="tab_default_2">
  <!-- Add img -->
  <div class="row">
    <div class="col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <button class=" btn btn-dark" data-toggle="modal" data-target="#addSlider"> new slider</button>
        </div>
        <div class="ms-panel-body">

          <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
              <thead>
                <tr>
                  <th scope="col">Img</th>

                  <th scope="col">Order</th>

                  <th scope="col"></th>

                </tr>
              </thead>
              <tbody>
@foreach($slideImages as $images)
                <tr>
                  <td><img src="{{ asset('uploads/product')}}/{{ $images->image }}" alt=""></td>

                  <td>{{$images->image_order}}</td>


                  <td>
                    <a href="#" class="btn btn-info d-inline-block editimgslider" data-toggle="modal" data-target="#editSlider{{$images->id}}" data-id="">edit</a>

                    <a href="#" onclick="destroy('this image','{{$images->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$images->id}}" action="{{ route('deleteProductImage')}}"  method="POST" style="display: none;">
									@csrf

                  <input type="hidden" name="product_image_id" value="{{$images->id}}">

									<button type="submit" value=""></button>
									</form>

                  </td>
                </tr>

                <div class="modal fade" id="editSlider{{$images->id}}" tabindex="-1" role="dialog" aria-labelledby="editSlider">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

      </button>
      <h3>Edit Slider Image</h3>
      <div class="modal-body" id="editimageslider">
      <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="{{route('updateProductImage')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{$row->id}}">
              <input type="hidden" name="product_image_id" value="{{$images->id}}">
              <div class="ms-auth-container row">
                <div class="col-md-6">
                  <div class="form-group">

                  <div id="uploadOne" class="img-upload">
                      <img src="{{ asset('uploads/product')}}/{{ $images->image }}" alt="">
                      <div class="upload-icon">
                            <input type="file" name="image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group">
                    <label>order</label>
                    <div class="input-group">
                      <input type="number" name="image_order" value="{{$images->image_order}}">

                    </div>
                  </div>
                </div>



              </div>
              <div class="input-group d-flex justify-content-end text-center">


                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                <input type="submit" value="Add" class="btn btn-success ">

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!----- ---------------Add Slider ----------->


<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="addSlider">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

      </button>
      <h3>New Slider Image </h3>
      <div class="modal-body">


        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="{{route('storeProductImage')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{$row->id}}">
              <div class="ms-auth-container row">
                <div class="col-md-6">
                <div class="form-group">

                        <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group">
                    <label>order</label>
                    <div class="input-group">
                      <input type="number" name="image_order">

                    </div>
                  </div>
                </div>



              </div>
              <div class="input-group d-flex justify-content-end text-center">


                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                <input type="submit" value="Add" class="btn btn-success ">
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



<!----- Edit Slider------>



<script>

</script>
