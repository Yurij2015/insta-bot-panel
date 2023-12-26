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
                <x-adminlte-input name="email" placeholder="Email"
                                  value="{{ old('email') }}"/>
                <x-adminlte-input name="phone_number" placeholder="Phone Number"
                                  value="{{ old('phone_number') }}"/>
                <x-adminlte-input name="fullName" placeholder="FullName"
                                  value="{{ $randomFirstName }} {{$randomLastName}}"/>
                <x-adminlte-input name="username" placeholder="Username"
                                  value="{{ $randomUsername }}" class="text-bold"/>
                <x-adminlte-input name="password" placeholder="Password"
                                  value="{{ $generatedPassword }}" class="text-bold" />
                <x-adminlte-input name="cookie" placeholder="Cookie" value="{{ old('cookie') }}"/>
                <x-adminlte-input name="token" placeholder="Token" value="{{ old('token') }}"/>
                <x-adminlte-input name="fb_dtsg" placeholder="FbDtsg" value="{{ old('fb_dtsg') }}"/>
                <x-adminlte-select name="user_agent">
                    <option value="">Select user agent</option>
                    @foreach($userAgents as $userAgent)
                        <option value="{{ $userAgent->user_agent }}">{{ $userAgent->user_agent }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-select name="proxy">
                    <option value="">Select proxy</option>
                    @foreach($proxies as $proxy)
                        <option value="{{ $proxy->id }}">{{ $proxy->proxy }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-select name="is_registered">
                    <option value="">Select registered status</option>
                    <option value="1">Registered</option>
                    <option value="0">No Registered</option>
                </x-adminlte-select>
                <x-adminlte-select name="status">
                    <option value="">Select status</option>
                    <option value="active">active</option>
                    <option value="active_web">active_web</option>
                    <option value="pending">pending</option>
                    <option value="suspended">suspended</option>
                    <option value="stoped">stoped</option>
                </x-adminlte-select>
                <x-adminlte-textarea name="raw_data" placeholder="Raw Data" value="{{ old('raw_data') }}"/>
                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                   icon="fas fa-lg fa-save"/>
                <a href="{{ route('profiles.index') }}">
                    <x-adminlte-button class="btn-flat" label="Back" theme="info" icon="fas fa-arrow-circle-left"/>
                </a>
            </div>
        </form>
@endsection
