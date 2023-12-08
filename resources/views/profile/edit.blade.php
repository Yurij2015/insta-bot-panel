@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Edit profile</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add profile form</h3>
        </div>
        <form method="post" action="{{ route('profiles.update', $profile->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <x-adminlte-input name="email" placeholder="Email"
                                  value="{{ $profile->email }}"/>
                <x-adminlte-input name="phone_number" placeholder="Phone Number"
                                  value="{{ $profile->phone_number }}"/>
                <x-adminlte-input name="fullName" placeholder="FullName"
                                  value="{{ $profile->fullName }}"/>
                <x-adminlte-input name="username" placeholder="Username"
                                  value="{{ $profile->username }}" class="text-bold"/>
                <x-adminlte-input name="password" placeholder="Password"
                                  value="{{ $profile->password }}" class="text-bold"/>
{{--                <x-adminlte-input name="cookie" placeholder="Cookie" value="{{ $profile->cookie }}"/>--}}
                <x-adminlte-input name="token" placeholder="Token" value="{{ $profile->token }}"/>
                <x-adminlte-input name="fb_dtsg" placeholder="FbDtsg" value="{{ $profile->fb_dtsg }}"/>
                <x-adminlte-select name="user_agent">
                    @foreach($userAgents as $userAgent)
                        <option value="{{ $userAgent->user_agent }}" {{ $userAgent->user_agent === $profile->user_agent ? 'selected' : '' }}>{{ $userAgent->user_agent }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-select name="proxy">
                    @foreach($proxies as $proxy)
                        <option value="{{ $proxy->id }}" {{ $proxy->id === $profile->proxy_id ? 'selected' : '' }}>{{ $proxy->proxy }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-select name="is_registered">
                    <option value="1" {{ (int)$profile->is_registered === 1 ? 'selected' : '' }}>Registered</option>
                    <option value="0" {{ (int)$profile->is_registered === 0 ? 'selected' : '' }}>No Registered</option>
                </x-adminlte-select>
                <x-adminlte-select name="status">
                    <option value="active" {{ $profile->status === 'active' ? 'selected' : '' }}>active</option>
                    <option value="active_web" {{ $profile->status === 'active_web' ? 'selected' : '' }}>active_web</option>
                    <option value="pending" {{ $profile->status === 'pending' ? 'selected' : '' }}>pending</option>
                    <option value="suspended" {{ $profile->status === 'suspended' ? 'selected' : '' }}>suspended</option>
                    <option value="stoped" {{ $profile->status === 'stoped' ? 'selected' : '' }}>stoped</option>
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
