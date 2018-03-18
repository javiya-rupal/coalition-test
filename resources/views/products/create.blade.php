@extends('layouts.master')
 
@section('title', 'Manage Products')

@section('content')
    @if(Session::has('message'))
    <div class="alert alert-success ">
        <strong>Success!</strong> Procuct Added Successfully.
    </div>
    @endif
<div class="well">
 
    {!! Form::open([ "id"=>"addProduct", 'class' => 'form-horizontal', "method" =>"post"]) !!}
 
    <fieldset>
 
        <legend>Product Details</legend>
 
        <div class="form-group">
            {!! Form::label('product-name', 'Product Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('product_name', $value = null, ['class' => 'form-control', 'placeholder' => 'product_name','id'=>'product_name']) !!}
            </div>
        </div>
 
        <div class="form-group">
            {!! Form::label('product-quantity-in-stock', 'Quantity in Stock:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::input('number','quantity_in_stock', $value = null, ['class' => 'form-control', 'placeholder' => 'quantity_in_stock','id'=>'quantity_in_stock']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('product-price-per-item', 'Price per Item:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::input('number','product_price', $value = null, ['class' => 'form-control', 'placeholder' => 'product_price','id'=>'product_price']) !!}
            </div>
        </div>
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::button('Submit', ['id' => "productSubmit", 'class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}

    @include("products.list", ['products' => $products,'total_sum'=>$total_sum])
</div>
@endsection