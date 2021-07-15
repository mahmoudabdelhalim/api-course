@extends('layouts.main')

@section('title', 'category')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="material-icons"></i> {{ __('home') }} </a></li>
      <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{ __('Category') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('edit') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('edit') }}</h6>
				<a  href="{{route('category.index')}}" class="btn btn-danger"> {{ __('back') }}  </a>
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
                  <form action="{{route('category.update',$row->id)}}" method="POST" enctype="multipart/form-data" >
                @method('PUT')
				  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                          <div class="col-md-4">
                        <label> category img </label>
                      <div class="form-group">
                        <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('uploads/category')}}/{{ $row->image }}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                    </div>
                              <div class="form-group">
                                  <label  >{{ __('Name') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="name" value="{{$row->name}}" class="form-control"
                                         placeholder="color name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('Category') }}</label>
                                  <div class="input-group">
                                
                               <select name="parent_category_id" class="form-control" id="">
                               <option value="">Select</option>
                                 @foreach($subs as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->parent_category_id ? 'selected' : '' }}>{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>
                            
                              <div class="form-group">
                                  <label  >{{ __('desc') }}</label>
                                  <div class="input-group">
                                  <textarea class="form-control" name="desc">{{$row->description}}</textarea>
                               
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('order') }}</label>
                                  <div class="input-group">
                                  <input type="number" class="form-control" name="order" value="{{$row->order}}">
                               
                                  </div>
                              </div>
                          </div>
                         
                          
                      </div>
					
                      <div class="input-group d-flex justify-content-end text-center">
                        <a  href="{{route('category.index')}}" class="btn btn-dark mx-2"> {{ __('back') }}  </a>
                        <input type="submit" value="Add" class="btn btn-success ">                       
                    </div>
					
                  </form>
              </div>
	          
			</div>
		</div>
	</div>
</div>

@endsection