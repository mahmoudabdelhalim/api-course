@extends('layouts.main')

@section('title', 'Color')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">Color </li>
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
							<th>{{ __('name') }}</th>
              <th>{{ __('color id') }}</th>
							<th>{{ __('actions') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
			  						<td>{{$row->name}}</td>
                    <td>{{$row->colorid}}</td>
									  <td>
                                      <a href="{{ route('color.edit', $row->id) }}" class="btn btn-info d-inline-block" 
                                      >edit</a>
                                        <a href="#" onclick="destroy('this color','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$row->id}}" action="{{ route('color.destroy', $row->id) }}"  method="POST" style="display: none;">
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
                  <form action="{{route('color.store')}}" method="POST">
                  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('Name') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="name" class="form-control"
                                         placeholder="Color name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  >{{ __('Color Id') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="colorid" class="form-control"
                                         placeholder="Color Id">
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