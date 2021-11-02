@extends('layouts.main')

@section('title', 'product')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="material-icons"></i> {{ __('home') }} </a></li>
      <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{ __('product') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('add') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('add') }}</h6>
				<a  href="{{route('product.index')}}" class="btn btn-danger"> {{ __('back') }}  </a>
			</div>
			<div class="ms-panel-body col-md-6 col-md-offset-2">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif



				<div class="col-12 p-3">
                  <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >

				  @csrf
                      <div class="ms-auth-container row">

                          <div class="col-md-12">

                              <div class="form-group">
                                  <label  >{{ __('Name') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="name" class="form-control"
                                         placeholder=" name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('Price') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="price"  class="form-control"
                                         placeholder="price">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('Discount') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="discount"  class="form-control"
                                         placeholder="discount">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label  >{{ __('Brand') }}</label>
                                  <div class="input-group">

                               <select name="brand_id" class="form-control" id="">
                                 @foreach($brands as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label  >{{ __('Category') }}</label>
                                  <div class="input-group">

                               <select name="category_id" class="form-control" id="">

                                 @foreach($categories as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label  >{{ __('Shop') }}</label>
                                  <div class="input-group">

                               <select name="shop_id" class="form-control" id="">
                               @foreach($shops as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('desc') }}</label>
                                  <div class="input-group">
                                  <textarea class="form-control" name="description"></textarea>

                                  </div>
                              </div>
                              <div class="form-group">

                                  <div class="input-group">
                                  <label  >{{ __('Status') }}
                                      <input type="checkbox" id="newTitle" name="status"  value="1" class="form-control"
                                         placeholder="color name">
                                         </label>
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

@endsection
