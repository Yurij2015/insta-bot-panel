@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Products (Subscription Packages) List</h1>
        </div>
    </div>
@stop
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4">
                    <x-adminlte-card title="{{$product->name}}" theme="primary" theme-mode="outline"
                                     class="elevation-3" body-class="bg-primary" header-class="bg-light"
                                     footer-class="bg-primary border-top rounded border-light"
                                     icon="fab fa-lg fa-product-hunt">
                        @foreach($product->prices as $price)
                            <p>{{ $price->unit_amount / 100 . " " .  strtoupper($price->currency)  }}</p>
                        @endforeach
                        <p>{{ $product->description }}</p>
                        <x-slot name="footerSlot">
                            @foreach($product->prices as $price)
                                <a href="{{ route('subscription-checkout', ['price' => $price->stripe_price_id, 'product'=> $product->id]) }}"
                                   class="btn btn-dark">Buy
                                    Subscription</a>
                            @endforeach
                        </x-slot>
                    </x-adminlte-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection
