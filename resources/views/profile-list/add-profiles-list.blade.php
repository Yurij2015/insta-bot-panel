@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Profiles List Add Form</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profiles List Add Form</h3>
        </div>
        <form method="post" action="{{ route('add-profiles-list') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" placeholder="Title" label="Title"
                                  value="{{ old('name') }}"/>
                <x-adminlte-input name="description" placeholder="Descriptions" label="Description"
                                  value="{{ old('description') }}"/>
                <x-adminlte-select name="ig_username" label="Profile">
                    <option value="">Select profile</option>
                    @foreach($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->username }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-textarea rows="20" name="profiles_list" placeholder="Profiles List" label="Profiles List"
                                     value="{{ old('profiles_list') }}"/>
                <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="primary" icon="fas fa-search"/>
            </div>
        </form>
@endsection
