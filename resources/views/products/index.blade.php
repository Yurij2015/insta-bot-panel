@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Products (Subscripton Packages)</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right btn-sm" href="{{ route('products.create') }}">Add product
                (package)</a>
        </div>
    </div>
@stop
@php
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $heads = ['#',  'Stripe Id', 'Name', 'Description', 'SetUp Fee', 'Status', 'Stripe Status', 'Actions'];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->stripe_product_id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->setup_fee}}</td>
                                <td>{{ $product->status ? 'active' : 'no active' }}</td>
                                <td>{{ $product->stripe_status ? 'active' : 'no active' }}</td>
                                <td class="text-center">
                                    <nobr>
                                        <a href="{{ route('products.show', $product->id) }}">{!! $btnDetails !!}</a>
                                        <a href="{{ route('products.edit', $product->id) }}">{!! $btnEdit !!}</a>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $products->links('vendor.pagination.bootstrap-5') }}
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
        window.onload = function () {
            let documentHeight = Math.max(
                document.body.scrollHeight, document.documentElement.scrollHeight,
                document.body.offsetHeight, document.documentElement.offsetHeight,
                document.body.clientHeight, document.documentElement.clientHeight
            );

            let elements = document.getElementsByClassName('elevation-4');

            for (let i = 0; i < elements.length; i++) {
                elements[i].style.height = documentHeight + 'px';
            }
        }
    </script>
@stop
<style>
    .text-center {
        text-align: center;
    }
</style>
