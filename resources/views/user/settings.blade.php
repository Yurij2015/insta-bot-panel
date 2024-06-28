@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Token Generator</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Generate Token</h3>
        </div>
        <div class="card-body">
            <p>
                When you generate a token on this page, it is a unique string that serves as your identification for
                the system. This token is used to authenticate your requests when you interact with our API.
                Once generated, this token should be included in the header of your API requests. Specifically, it
                should be included in the `Authorization` header as a Bearer token.
                For example, if your generated token is `abcd1234`, you would include it in your API requests like
                so: `Authorization: Bearer abcd1234`.
            </p>
            <p> Please note that this token is sensitive information. It should be kept secure and not shared with
                anyone. If you believe your token has been compromised, you should generate a new one immediately.
                Remember, this token is your key to making authenticated requests to our system. Treat it with the
                same level of security as you would with your password.
            </p>
            <div class="row" style="line-height: 40px">
                <div class="col-md-2">
                    <a href="{{ route("generate-token") }}" class="btn btn-primary btn-flat" style="width: 100%"><i class="fas fa-key"></i>
                        Generate token</a>
                </div>
                <div class="col-md-10">
                    <p class="text-danger font-weight-bold">{{ $token ?? 'no token generated yet' }}</p>
                </div>
            </div>
        </div>
@endsection
