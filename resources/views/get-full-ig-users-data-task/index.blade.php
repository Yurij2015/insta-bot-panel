@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Tasks - Get Full IgUsers Data Tasks</h1>
        </div>
    </div>
@stop
@php
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-2 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = [
        ['label' => '#', 'title' => 'ID'],
        ['label' => 'Serch result ID', 'title' => 'Serch result ID'],
        ['label' => 'Personal Profile', 'title' => 'Personal Profile'],
        ['label' => 'Status', 'title' => 'Status'],
        ['label' => 'Task Status', 'title' => 'Task Status'],
        ['label' => 'Task Started', 'title' => 'Task Started Ad'],
        ['label' => 'Task Ended', 'title' => 'Task Ended Ad'],
        ];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" type="submit" label="Back"
                                       theme="primary" icon="fas fa-arrow-circle-left"/>
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($getFullIgUsersDataTasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->search_result_id }}</td>
                                <td>{{ $task->personalProfileUserName }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->task_status }}</td>
                                <td>{{ $task->task_started_at }}</td>
                                <td>{{ $task->task_stoped_at }}</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $getFullIgUsersDataTasks->links('vendor.pagination.bootstrap-5') }}
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
    </script>
@stop
<style>
    .text-center {
        text-align: center;
    }

    .countOfRors {
        color: red;
        font-weight: bold;
    }

</style>
