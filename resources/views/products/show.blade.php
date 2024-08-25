@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Product Data</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right ml-1" href="{{ route('products.edit', $product->id) }}">
                Edit product
            </a>
        </div>
    </div>
@stop
@php
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $noValidStatus = '<span class="text-danger text-bold text-uppercase">no valid</span>';
    $validStatus = '<span class="text-success text-bold text-uppercase">valid</span>';
    $btnWebProfileInfo = '<button class="btn btn-xs btn-default text-info mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-info"></i>
                </button>';
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Show product - {{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Stripe product Id</th>
                            <td>{{$product->stripe_product_id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$product->description }}</td>
                        </tr>
                        <tr>
                            <th>SetUp Fee</th>
                            <td>{{ $product->setup_fee }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $product->status ? 'active' : 'not active' }}</td>
                        </tr>
                        <tr>
                            <th>Stripe Status</th>
                            <td>{{ $product->stripe_status ? 'active' : 'not active' }}</td>
                        </tr>
                        @if($productPrices->isNotEmpty())
                            <tr>
                                <th>Price</th>
                                <td>
                                    <table class="table table-bordered">
                                        <th>Id</th>
                                        <th>Stripe price Id</th>
                                        <th>Currency</th>
                                        <th>Unit Amount</th>
                                        <th>Status</th>
                                        <th>Stripe Status</th>
                                        @foreach($productPrices as $productPrice)
                                            <tr>
                                                <td>
                                                    {{ $productPrice?->id }}
                                                </td>
                                                <td>
                                                    {{ $productPrice?->stripe_price_id }}
                                                </td>
                                                <td>
                                                    {{ $productPrice?->currency }}
                                                </td>
                                                <td>
                                                    {{ $productPrice?->unit_amount }}
                                                </td>
                                                <td>
                                                    {{ $productPrice?->status ? 'active' : 'not active' }}
                                                </td>
                                                <td>
                                                    {{ $productPrice?->stripe_status ? 'active' : 'not active' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>
                                <a href="{{ route('products.index') }}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                            title="Back to list of products">
                                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        $("form.has-confirm").submit(function (e) {
            const $message = $(this).data('message');
            if (!confirm($message)) {
                e.preventDefault();
            }
        });
    </script>
@stop
