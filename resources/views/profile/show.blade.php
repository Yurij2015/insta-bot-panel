@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Prifile data</h1>
        </div>
        <div class="col-md-6">
            {{--            @if($account->status)--}}
            {{--                <a class="btn btn-success float-right ml-1" href="{{ route('account-info', $account->id) }}">--}}
            {{--                    Account info--}}
            {{--                </a>--}}
            {{--            @endif--}}
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
                    <h3 class="card-title">Show profile - {{ $profile->username }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>UserName</th>
                            <td>{!! $profile->username !!}</td>
                        </tr>
                        <tr>
                            <th>Profile Password</th>
                            <td class="text-uppercase">{!! $profile->password !!}</td>
                        </tr>
                        <tr>
                            <th>Cookie</th>
                            <td>{!! $profile->cookie !!}</td>
                        </tr>
                        <tr>
                            <th>Token</th>
                            <td>{{ $profile->token }}</td>
                        </tr>
                        <tr>
                            <th>FbDtsg</th>
                            <td>{{ $profile->fb_dtsg }}</td>
                        </tr>
                        <tr>
                            <th>UserAgent</th>
                            <td colspan="2">{{ $profile->user_agent }}</td>
                        </tr>
                        <tr>
                            <th>Proxy</th>
                            <td colspan="2">{{ $profile->proxy->proxy }} : {{ $profile->proxy->port }}</td>
                        </tr>
                        <tr>
                            <th>Proxy Auth</th>
                            <td colspan="2">{{ $profile->proxy->login }} : {{ $profile->proxy->password }}</td>
                        </tr>
                        <tr>
                            <th>Raw Data</th>
                            <td colspan="2">
                                {!! $profile->raw_data!!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('profiles.index') }}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                            title="Back to list of accounts">
                                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <nobr>
                                    <a href="{{ route('profiles.edit', $profile->id) }}">{!! $btnEdit !!}</a>
                                    <a href="{{ route('personal-profile-info', $profile->id) }}">{!! $btnWebProfileInfo !!}</a>
                                    <form method="POST" action="{{ route('profiles.destroy', $profile->id) }}"
                                          style="display:inline" class="has-confirm"
                                          data-message="Delete this profile?">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}<i/>
                                    </form>
                                </nobr>
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
