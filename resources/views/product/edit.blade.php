@extends('layouts.main')

@section('title', 'product')


@section('crumb')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="material-icons"></i> {{ __('home') }}
                </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{ __('product') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('add') }} </li>
        </ol>
    </nav>

@endsection
@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header d-flex justify-content-between">
                    <h6>{{ __('add') }}</h6>
                    <a href="{{ route('product.index') }}" class="btn btn-danger"> {{ __('back') }} </a>
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
                        <form action="{{ route('product.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="ms-auth-container row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>{{ __('Name') }}</label>
                                        <div class="input-group">
                                            <input type="text" id="newTitle" name="name" value="{{ $row->name }}"
                                                class="form-control" placeholder=" name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Price') }}</label>
                                        <div class="input-group">
                                            <input type="text" id="newTitle" name="price" value="{{ $row->price }}"
                                                class="form-control" placeholder="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Discount') }}</label>
                                        <div class="input-group">
                                            <input type="text" id="newTitle" name="discount" value="{{ $row->discount }}"
                                                class="form-control" placeholder="discount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Brand') }}</label>
                                        <div class="input-group">

                                            <select name="brand_id" class="form-control" id="">
                                                @foreach ($brands as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $type->id == $row->brand_id ? 'selected' : '' }}>
                                                        {{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Category') }}</label>
                                        <div class="input-group">

                                            <select name="category_id" class="form-control" id="">

                                                @foreach ($categories as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $type->id == $row->category_id ? 'selected' : '' }}>
                                                        {{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Shop') }}</label>
                                        <div class="input-group">

                                            <select name="shop_id" class="form-control" id="">
                                                @foreach ($shops as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $type->id == $row->shop_id ? 'selected' : '' }}>
                                                        {{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('desc') }}</label>
                                        <div class="input-group">
                                            <textarea class="form-control"
                                                name="description">{{ $row->description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="input-group">
                                            <label>{{ __('Status') }}
                                                <input type="checkbox" id="newTitle" name="status" value="1"
                                                    class="form-control" @if ($row->status == 1) checked @endif
                                                    placeholder="color name">
                                            </label>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="input-group d-flex justify-content-end text-center">
                                <a href="{{ route('product.index') }}" class="btn btn-dark mx-2"> Cancel</a>

                                <input type="submit" value="Add" class="btn btn-success ">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- -------------tabs ---------------->




    <div class="tabbable-panel">
        <div class="tabbable-line">
            <ul class="nav nav-tabs " role="tablist">


                <li class="btn btn-light ">
                    <a href="#tab_default_2" data-toggle="tab" role="tab">
                        Image Slider </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_3" data-toggle="tab" role="tab">
                        Product Features </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_4" data-toggle="tab" role="tab">
                        Product Color </a>
                </li>


                <li class="btn btn-light ">
                    <a href="#tab_default_5" data-toggle="tab" role="tab">
                        Product Size </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_6" data-toggle="tab" role="tab">
                        Product Rate </a>
                </li>

            </ul>
            <div class="tab-content test ">

                @include('product.addSlider')

                <div class="tab-pane" id="tab_default_3">
                    <!-- Add FEATURES  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addfeatures"> Add
                                        FEATURES </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Feature Name</th>
                                                    <th scope="col">Feature Text</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($features as $feature)
                                                    <tr>
                                                        <td>{{ $feature->key_name }}</td>
                                                        <td>{{ $feature->value_text }}</td>



                                                        <td>

                                                            <a href="#" class="btn btn-info d-inline-block editimgslider"
                                                                data-toggle="modal"
                                                                data-target="#addfeatures{{ $feature->id }}"
                                                                data-id="">edit</a>

                                                            <a href="#"
                                                                onclick="destroy('this Feature','{{ $feature->id }}')"
                                                                class="btn d-inline-block btn-danger">delete</a>
                                                            <form id="delete_{{ $feature->id }}"
                                                                action="{{ route('deleteFeature') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf

                                                                <input type="hidden" name="feature_id"
                                                                    value="{{ $feature->id }}">

                                                                <button type="submit" value=""></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <!----- ---------------Add Feature ----------->


                                                    <div class="modal fade" id="addfeatures{{ $feature->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="addfeatures">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <button type="button" class="modal-close"
                                                                    data-dismiss="modal" aria-label="Close">X

                                                                </button>
                                                                <h3>New Feature </h3>
                                                                <div class="modal-body">


                                                                    <div class="ms-auth-container row no-gutters">
                                                                        <div class="col-12 p-3">
                                                                            <form action="{{ route('updateFeature') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="feature_id"
                                                                                    value="{{ $feature->id }}">
                                                                                <input type="hidden" name="product_id"
                                                                                    value="{{ $row->id }}">
                                                                                <div class="ms-auth-container row">



                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>Name</label>
                                                                                            <div class="input-group">
                                                                                                <input type="text"
                                                                                                    name="key_name"
                                                                                                    value="{{ $feature->key_name }}">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>Value</label>
                                                                                            <div class="input-group">
                                                                                                <input type="text"
                                                                                                    name="value_text"
                                                                                                    value="{{ $feature->value_text }}">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div
                                                                                    class="input-group d-flex justify-content-end text-center">


                                                                                    <input type="button" value="Cancel"
                                                                                        class="btn btn-dark mx-2"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <input type="submit" value="Add"
                                                                                        class="btn btn-success ">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End FEATURES -->
                </div>




  <!-- color -->
                <div class="tab-pane" id="tab_default_4">
                    <!-- Add Color     -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addcolor"> Add Color
                                    </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($colors as $color)
                                                    <tr>

                                                        <td>{{ $color->color->name ?? '' }}</td>



                                                        <td>

                                                            <a href="#" class="btn btn-info d-inline-block editimgslider"
                                                                data-toggle="modal"
                                                                data-target="#addcolor{{ $color->id }}"
                                                                data-id="">edit</a>

                                                            <a href="#"
                                                                onclick="destroy('this color','{{ $color->id }}')"
                                                                class="btn d-inline-block btn-danger">delete</a>
                                                            <form id="delete_{{ $color->id }}"
                                                                action="{{ route('deleteProductColor') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf

                                                                <input type="hidden" name="product_color_id"
                                                                    value="{{ $color->id }}">

                                                                <button type="submit" value=""></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <!----- ---------------Add Color ----------->


                                                    <div class="modal fade" id="addcolor{{ $color->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="addcolor">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <button type="button" class="modal-close"
                                                                    data-dismiss="modal" aria-label="Close">X

                                                                </button>
                                                                <h3>Edit Color </h3>
                                                                <div class="modal-body">


                                                                    <div class="ms-auth-container row no-gutters">
                                                                        <div class="col-12 p-3">
                                                                            <form action="{{ route('updateProductColor') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="product_color_id"
                                                                                    value="{{ $color->id }}">
                                                                                <input type="hidden" name="product_id"
                                                                                    value="{{ $row->id }}">
                                                                                <div class="ms-auth-container row">



                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>{{ __('color') }}</label>
                                                                                            <div class="input-group">

                                                                                                <select name="color_id"
                                                                                                    class="form-control"
                                                                                                    id="">
                                                                                                    @foreach ($mainColors as $type)
                                                                                                        <option
                                                                                                            value="{{ $type->id }}"
                                                                                                            {{ $type->id == $color->color_id ? 'selected' : '' }}>
                                                                                                            {{ $type->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div
                                                                                    class="input-group d-flex justify-content-end text-center">


                                                                                    <input type="button" value="Cancel"
                                                                                        class="btn btn-dark mx-2"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <input type="submit" value="Add"
                                                                                        class="btn btn-success ">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Size -->



                <!-- Size -->
                <div class="tab-pane" id="tab_default_5">
                    <!-- Add Color     -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addsize"> Add Size
                                    </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sizes as $size)
                                                    <tr>

                                                        <td>{{ $size->size->name ?? '' }}</td>



                                                        <td>

                                                            <a href="#" class="btn btn-info d-inline-block editimgslider"
                                                                data-toggle="modal"
                                                                data-target="#addsize{{ $size->id }}"
                                                                data-id="">edit</a>

                                                            <a href="#"
                                                                onclick="destroy('this size','{{ $size->id }}')"
                                                                class="btn d-inline-block btn-danger">delete</a>
                                                            <form id="delete_{{ $size->id }}"
                                                                action="{{ route('deleteProductSize') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf

                                                                <input type="hidden" name="product_size_id"
                                                                    value="{{ $size->id }}">

                                                                <button type="submit" value=""></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <!----- ---------------Add Color ----------->


                                                    <div class="modal fade" id="addsize{{ $size->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="addsize">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <button type="button" class="modal-close"
                                                                    data-dismiss="modal" aria-label="Close">X

                                                                </button>
                                                                <h3>Edit Color </h3>
                                                                <div class="modal-body">


                                                                    <div class="ms-auth-container row no-gutters">
                                                                        <div class="col-12 p-3">
                                                                            <form action="{{ route('updateProductSize') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="product_size_id"
                                                                                    value="{{ $size->id }}">
                                                                                <input type="hidden" name="product_id"
                                                                                    value="{{ $row->id }}">
                                                                                <div class="ms-auth-container row">



                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>{{ __('Size') }}</label>
                                                                                            <div class="input-group">

                                                                                                <select name="size_id"
                                                                                                    class="form-control"
                                                                                                    id="">
                                                                                                    @foreach ($mainSizes as $type)
                                                                                                        <option
                                                                                                            value="{{ $type->id }}"
                                                                                                            {{ $type->id == $size->size_id ? 'selected' : '' }}>
                                                                                                            {{ $type->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div
                                                                                    class="input-group d-flex justify-content-end text-center">


                                                                                    <input type="button" value="Cancel"
                                                                                        class="btn btn-dark mx-2"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <input type="submit" value="Add"
                                                                                        class="btn btn-success ">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Size -->



                <div class="tab-pane" id="tab_default_6">
                    <!-- Slow Rate     -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">

                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col"> Rate</th>
                                                    <th scope="col"> Comment</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rates as $rate)
                                                    <tr>

                                                        <td>{{ $rate->user->name ?? '' }}</td>
                                                        <td>
                                                            @foreach (range(1, 5) as $i)

                                                                @if ($rate->rate_no >= $i)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @endif


                                                            @endforeach
                                                        </td>
                                                        <td>{{ $rate->comment ?? '' }}</td>

                                                        <td></td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Rate -->







            </div>



        </div>
    </div>
    </div>



    <hr>

    </div>
    </div>
    <!----- ---------------Add Feature ----------->


    <div class="modal fade" id="addfeatures" tabindex="-1" role="dialog" aria-labelledby="addfeatures">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>New Feature </h3>
                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="{{ route('storeFeature') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                <div class="ms-auth-container row">



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-group">
                                                <input type="text" name="key_name">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Value</label>
                                            <div class="input-group">
                                                <input type="text" name="value_text">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="input-group d-flex justify-content-end text-center">


                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End -->

    <!----- ---------------Add Color ----------->


    <div class="modal fade" id="addcolor" tabindex="-1" role="dialog" aria-labelledby="addcolor">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>Edit Color </h3>
                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="{{ route('storeProductColor') }}" method="POST">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                <div class="ms-auth-container row">



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Color') }}</label>
                                            <div class="input-group">

                                                <select name="color_id" class="form-control" id="">
                                                    @foreach ($mainColors as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="input-group d-flex justify-content-end text-center">


                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End -->


    <!----- ---------------Add Size ----------->


    <div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="addsize">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>Add Size </h3>
                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="{{ route('storeProductSize') }}" method="POST">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                <div class="ms-auth-container row">



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Size') }}</label>
                                            <div class="input-group">

                                                <select name="size_id" class="form-control" id="">
                                                    @foreach ($mainSizes as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="input-group d-flex justify-content-end text-center">


                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End -->



@endsection
