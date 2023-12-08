@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>List of profiles</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right" href="{{ route('profiles.create') }}">Add profile</a>
        </div>
    </div>
@stop
@php
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
        $btnWebProfileInfo = '<button class="btn btn-xs btn-default text-info mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-info"></i>
                </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = ['#', 'Avatar', 'UserName', 'Password', 'PhoneNumber', 'Token', 'UserAgent', 'IsRegistered', 'Status' , 'Actions'];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($profiles->items() as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset("uploads/profiles/images/$row->username" . ".jpg") }}" alt="{{ $row->username }}"
                                         width="100px">
                                </td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->password }}</td>
                                <td>{{ $row->phone_number }}</td>
                                <td>{{ $row->token }}</td>
                                <td>{{ $row->user_agent }}</td>
                                <td>{{ $row->is_registered ? 'true' : 'false' }}</td>
                                <td>{{ $row->status }}</td>
                                <td class="text-center">
                                    <nobr>
                                        <a href="{{ route('profiles.show', $row->id) }}">{!! $btnDetails !!}</a>
                                        <a href="{{ route('personal-profile-info', $row->id) }}">{!! $btnWebProfileInfo !!}</a>
                                        <a href="{{ route('profiles.edit', $row->id) }}">{!! $btnEdit !!}</a>
                                        <form method="POST" action="{{ route('profiles.destroy', $row->id) }}"
                                              style="display:inline" class="has-confirm"
                                              data-message="Delete this account?">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}<i/>
                                        </form>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
{{--                    {{ $profiles->links('vendor.pagination.bootstrap-5') }}--}}
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
