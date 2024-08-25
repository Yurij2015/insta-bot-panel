@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Add Product (Subscription Package)</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Product Form</h3>
        </div>
        <form method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="card-body">
                <hr>
                <h4>Product Data</h4>
                <hr>
                <x-adminlte-input name="name" placeholder="Name" label="Name" value="{{ old('name') }}"/>
                <x-adminlte-input name="description" placeholder="Description" label="Description"/>
                <x-adminlte-input name="setup_fee" placeholder="Setup Fee" label="Setup Fee"
                                  value="{{ old('setup_fee') }}"/>
                <x-adminlte-select name="status" label="Status">
                    <option value="">Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </x-adminlte-select>
                <hr>
                <h4>Price Data</h4>
                <hr>
                <x-adminlte-input name="currency" placeholder="Currency" label="Currency"
                                  value="{{ old('currency') }}"/>
                <x-adminlte-input name="unit_amount" placeholder="Unit Amount" label="Unit Amount"
                                  value="{{ old('unit_amount') }}"/>
                <x-adminlte-select name="interval" label="Interval">
                    <option value="">Select interval</option>
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </x-adminlte-select>
                <x-adminlte-select name="status" label="Status">
                    <option value="">Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </x-adminlte-select>

                <x-adminlte-button class="btn-flat" type="submit" label="Save Product" theme="primary"
                                   icon="fas fa-save"/>
            </div>
        </form>
@endsection
