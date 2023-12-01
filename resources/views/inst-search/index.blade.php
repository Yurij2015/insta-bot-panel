@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Search</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Search form</h3>
        </div>
        <form method="post" action="{{ route('handle-search') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="key_word" placeholder="Key Word" label="Key Word"
                                  value="{{ old('key_word') }}"/>
                <x-adminlte-select name="profile_id" label="Profile">
                    <option value="">Select profile</option>
                    @foreach($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->username }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-button class="btn-flat" type="submit" label="Search" theme="primary" icon="fas fa-search"/>
            </div>
        </form>
@endsection
