@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Profile followers - {{$profileInfo->username}}</h1>
        </div>
    </div>
@stop
@php
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = ['#', 'UserName', 'Userid', 'FullName', 'Private', 'Verified', 'Latest Reel'];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($profileFollowers as $follower)
                            <tr>
                                <td>{{ $follower->id }}</td>
                                <td>
                                    <a href="https://www.instagram.com/{{$follower->username}}" target="_blank">
                                        {{ $follower->username }}
                                    </a>
                                </td>
                                <td>{{ $follower->pk }}</td>
                                <td>{{ $follower->full_name }}</td>
                                <td>{{ $follower->is_private ? 'true' : 'false' }}</td>
                                <td>{{ $follower->is_verified ? 'true' : 'false' }}</td>
                                <td>{{ $follower->latest_reel_media }}</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $profileFollowers->links('vendor.pagination.bootstrap-5') }}
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
