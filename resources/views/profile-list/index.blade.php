@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Profile lists</h1>
        </div>
    </div>
@stop
@php
    $btnDelete = '<button class="btn btn-x btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-x btn-default text-teal mx-2 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $btnEdit = '<button class="btn btn-x btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = [
        ['label' => '#', 'title' => 'ID'],
        ['label' => 'Name', 'title' => 'Name'],
        ['label' => 'Description', 'title' => 'Despctiption', 'width' => 20],
        ['label' => 'Profile To Work', 'title' => 'Profile To Work'],
        ['label' => 'Profiles List', 'title' => 'Profiles List'],
        ['label' => 'Action', 'title' => 'Action']
        ];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-default-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" type="submit" label="Back"
                                       theme="primary" icon="fas fa-arrow-circle-left"/>
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($profilesList as $listItem)
                            <tr>
                                <td>{{ $listItem->id }}</td>
                                <td>{{ $listItem->name }}</td>
                                <td class="word-wrap">{{ $listItem->description }}</td>
                                <td>{{ $listItem->personal_profile_to_work }}</td>
                                <td class="word-wrap">{{ $listItem->profiles_list }}</td>
                                <td class="text-center">
                                    <span class="white-space-nowrap">
                                        <form method="POST"
                                              action="{{ route('ig-user.set-get-followers-task-for-search', $listItem->id) }}"
                                              style="display:inline">
                                            @csrf
                                            <x-adminlte-button type="{{$listItem?->task_created ? 'button' : 'submit'}}"
                                                               class="btn-flat btn-sm {{$listItem?->task_created ? 'disabled' : ''}}"
                                                               label="GetData"
                                                               theme="primary" icon="fas fa-arrow-circle-down"/>
                                        </form>
                                        <a href="{{ route('show-list-item-profiles', $listItem->id) }}">
                                            <x-adminlte-button class="btn-flat btn-sm" label="ShowData" theme="info"
                                                               icon="fas fa-eye"/>
                                        </a>
                                    </span>
                                    <div class="mt-3">
                                        <span class="white-space-nowrap">
                                            <a href="{{ route('edit-profiles-list', $listItem->id) }}">{!! $btnEdit !!}</a>
                                            <form method="POST"
                                                  action="{{ route('profile-lists.delete', $listItem->id) }}"
                                                  style="display:inline" class="has-confirm"
                                                  data-message="Delete this record?">
                                                @csrf
                                                @method('DELETE')
                                                {!! $btnDelete !!}
                                            </form>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $profilesList->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        document.getElementById('backButton').addEventListener('click', function () {
            window.history.back();
        });
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

    .word-wrap {
        word-break: break-all; /* To break and wrap long words */
        white-space: normal; /* To ensure whitespace is handled normally */
    }

    .white-space-nowrap {
        white-space: nowrap;
    }

</style>
