@extends('layouts.main')

@section('title', 'product')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home </a></li>
        <li class="breadcrumb-item active" aria-current="page">product </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6></h6>
                <a href="{{route('product.create')}}" class="btn btn-dark"> {{ __('add') }} </a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>{{ __('#') }}</th>
                           
                            <th>{{ __('name') }}</th>
                            <th>{{ __('brand') }}</th>
                            <th>{{ __('price') }}</th>
                            <th>{{ __('price_after_discount') }}</th>
                            <th>{{ __('desc') }}</th>
                            <th>{{ __('actions') }}</th>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{ $index +1 }}</td>
                            
                                <td>{{$row->name}}</td>
                                <td>{{$row->brand->name ?? ''}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->price_after_discount}}</td>
                               
                                <td>{{$row->description}}</td>
                             
                        
                                <td>
                                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                    <a href="#" onclick="destroy('this product','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('product.destroy', $row->id) }}" method="POST" style="display: none;">
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
