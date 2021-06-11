@extends('layouts.main')

@section('title', 'shop')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">shop </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6></h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addNationalities"> {{ __('add') }}  </a>
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('#') }}</th>
              <th>{{ __('img') }}</th>
							<th>{{ __('name') }}</th>
              <th>{{ __('desc') }}</th>
							<th>{{ __('actions') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
              <td>  <img src="{{ asset('uploads/shop')}}/{{ $row->image }}" alt=""></td>
			  						<td>{{$row->name}}</td>
                    <td>{{$row->desc}}</td>
									  <td>
                                      <a href="{{ route('shop.edit', $row->id) }}" class="btn btn-info d-inline-block" 
                                      >edit</a>
                                        <a href="#" onclick="destroy('this shop','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$row->id}}" action="{{ route('shop.destroy', $row->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
			  						</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('modal')
<!-- Add Model -->
<div class="modal fade" id="addNationalities" tabindex="-1" role="dialog" aria-labelledby="addCourse">

    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
                  <form action="{{route('shop.store')}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                          <div class="col-md-4">
                        <label> shop img </label>
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
                              <div class="form-group">
                                  <label  >{{ __('Name') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="name" class="form-control"
                                         placeholder=" name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('desc') }}</label>
                                  <div class="input-group">
                                  <textarea class="form-control" name="desc"></textarea>
                               
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
<!-- end model -->

@endsection