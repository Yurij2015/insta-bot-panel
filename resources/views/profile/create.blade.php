@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Add profile</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add profile form</h3>
        </div>
        <form method="post" action="{{ route('profiles.store') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="username" placeholder="Username"
                                  value="{{ old('username') }}"/>
                <x-adminlte-input name="password" placeholder="Password"
                                  value="{{ old('password') }}"/>
                <x-adminlte-input name="cookie" placeholder="Cookie" value="{{ old('cookie') }}"/>
                <x-adminlte-input name="token" placeholder="Token" value="{{ old('token') }}"/>
                <x-adminlte-input name="fb_dtsg" placeholder="FbDtsg" value="{{ old('fb_dtsg') }}"/>
                <x-adminlte-input name="user_agent" placeholder="UserAgent"
                                  value="{{ old('user_agent') }}"/>
                <x-adminlte-input name="proxy" placeholder="Proxy" value="{{ old('proxy') }}"/>
                <x-adminlte-input name="port" placeholder="Proxy port" value="{{ old('port') }}"/>
                <x-adminlte-input name="login" placeholder="Proxy login"
                                  value="{{ old('login') }}"/>
                <x-adminlte-input name="proxy_password" placeholder="Proxy password"
                                  value="{{ old('proxy_password') }}"/>
                <x-adminlte-textarea name="raw_data" placeholder="Raw Data" value="{{ old('raw_data') }}"/>
                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                   icon="fas fa-lg fa-save"/>
                <a href="{{ route('profiles.index') }}">
                    <x-adminlte-button class="btn-flat" label="Back" theme="info" icon="fas fa-arrow-circle-left"/>
                </a>
            </div>
        </form>
@endsection
