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
                <a href="{{route('product.index')}}" class="btn btn-danger"> {{ __('back') }} </a>
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
                    <form action="{{route('product.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="ms-auth-container row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="newTitle" name="name" value="{{$row->name}}" class="form-control" placeholder=" name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Price') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="newTitle" name="price" value="{{$row->price}}" class="form-control" placeholder="price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Discount') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="newTitle" name="discount" value="{{$row->discount}}" class="form-control" placeholder="discount">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Brand') }}</label>
                                    <div class="input-group">

                                        <select name="brand_id" class="form-control" id="">
                                            @foreach($brands as $type)
                                            <option value="{{$type->id}}" {{ $type->id == $row->brand_id ? 'selected' : '' }}>{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Category') }}</label>
                                    <div class="input-group">

                                        <select name="category_id" class="form-control" id="">

                                            @foreach($categories as $type)
                                            <option value="{{$type->id}}" {{ $type->id == $row->category_id ? 'selected' : '' }}>{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Shop') }}</label>
                                    <div class="input-group">

                                        <select name="shop_id" class="form-control" id="">
                                            @foreach($shops as $type)
                                            <option value="{{$type->id}}" {{ $type->id == $row->shop_id ? 'selected' : '' }}>{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('desc') }}</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description">{{$row->description}}</textarea>

                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="input-group">
                                        <label>{{ __('Status') }}
                                            <input type="checkbox" id="newTitle" name="status" value="1" class="form-control" @if($row->status==1) checked @endif
                                            placeholder="color name">
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="input-group d-flex justify-content-end text-center">
                            <a href="{{route('product.index')}}" class="btn btn-dark mx-2"> Cancel</a>

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
                <a href="#tab_default_6" data-toggle="tab" role="tab">
                    Product Size </a>
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
                                <button class="btn btn-dark" data-toggle="modal" data-target="#addfeatures"> Add FEATURES </button>
                            </div>
                            <div class="ms-panel-body">

                                <div class="table-responsive">
                                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col">Feature Name</th>
                                                <th scope="col">Feature Text</th>
                                                <th scope="col">Active</th>
                                                <th scope="col"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Made in china</td>
                                                <td>china</td>
                                                <td><i class="fas fa-check" style="color: green;"></i></td>


                                                <td>

                                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addfeatures">edit</a>
                                                    <a href="#" onclick="delette('this FEATURES ');" class="btn d-inline-block btn-danger">delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End FEATURES -->
            </div>




            <!-- order -->
            <div class="tab-pane" id="tab_default_4">
                <!-- Add OFFERS     -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="ms-panel">
                            <div class="ms-panel-header d-flex justify-content-between">
                                <button class="btn btn-dark" data-toggle="modal" data-target="#addOffer"> Add OFFERS </button>
                            </div>
                            <div class="ms-panel-body">

                                <div class="table-responsive">
                                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col">Offer text</th>
                                                <th scope="col">Offer order </th>
                                                <th scope="col">Off quantity</th>
                                                <th scope="col">Discount Percentage %</th>

                                                <th scope="col"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>100 EGP off per 1000 qty</td>
                                                <td>20</td>
                                                <td>100</td>
                                                <td>12</td>



                                                <td>

                                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addOffer">edit</a>
                                                    <a href="#" onclick="delette('this Offer ');" class="btn d-inline-block btn-danger">delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End RELATED PRODUCTS -->
            <!-- Review -->
            <div class="tab-pane" id="tab_default_5">
                <h3 style="margin-bottom: 20px;color: green;border-bottom: 1px solid #CCC;"> Product Reviews</h3>
                <div class="col-md-12">
                    <div class="product-reviews" id="reviews">









                    </div>
                </div>
            </div>
            <!-- end Review -->
        </div>



    </div>
</div>
</div>



<hr>

</div>
</div>


@endsection