@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Walking Tasks</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary btn-flat float-right btn-sm" href="{{ route('walking-tasks.create') }}">Add
                task</a>
        </div>

    </div>
@stop
@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">Walking Tasks</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Profile</th>
                    <th>Profiles list</th>
                    <th>Status</th>
                    <th class="white-space-nowrap">Lower delay limit</th>
                    <th class="white-space-nowrap">Upper delay limit</th>
                    <th class="white-space-nowrap">Started at</th>
                    <th class="white-space-nowrap">Completed at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($walking_tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->profile->username }}</td>
                        <td>
                            @foreach(json_decode($task->profiles_list) as $profile)
                                <span class="badge badge-info">{{ $profile }}</span>
                            @endforeach
                        </td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->lower_delay_limit }}</td>
                        <td>{{ $task->upper_delay_limit }}</td>
                        <td>{{ $task->started_at }}</td>
                        <td>{{ $task->completed_at }}</td>
                        <td style="width: 100px">
                            @if($task->status === 'pending')
                                <a href="{{ route('walking-tasks.edit', $task->id) }}"
                                   class="btn btn-primary btn-flat btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{ route('walking-tasks.destroy', $task->id) }}"
                                      class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-flat btn-sm" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @endif
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<style>
    .white-space-nowrap {
        white-space: nowrap;
    }

</style>
