@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Following Tasks</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-info btn-flat float-right btn-sm" href="{{ route('following-tasks.create') }}">Add
                task</a>
        </div>

    </div>
@stop
@section('content')
    @php
        $colors = [
            '#90EE90', '#98FB98', '#8FBC8F', '#00FF7F', '#7FFF00', '#7CFC00', '#ADFF2F', '#32CD32', '#9ACD32', '#00FA9A',
             '#66CDAA', '#7FFFD4', '#20B2AA', '#3CB371', '#2E8B57', '#8FBC8B', '#90EE90', '#98FB98', '#00FF7F', '#7FFF00'
             ];
        $colorIndex = 0;
    @endphp
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Walking Tasks</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered  table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Profile</th>
                    <th>Profiles list</th>
                    <th>Status</th>
                    <th class="white-space-nowrap">Lower delay limit</th>
                    <th class="white-space-nowrap">Upper delay limit</th>
                    <th class="white-space-nowrap">Count of screen scroll</th>
                    <th class="white-space-nowrap">Lower limit of followers</th>
                    <th class="white-space-nowrap">Upper limit of followers</th>
                    <th class="white-space-nowrap">Is private</th>
                    <th class="white-space-nowrap">Is business</th>
                    <th class="white-space-nowrap">Is professional</th>
                    <th class="white-space-nowrap">Has avatar</th>
                    <th class="white-space-nowrap">Has posts</th>
                    <th class="white-space-nowrap">Has stories</th>
                    <th class="white-space-nowrap">Has url</th>
                    <th class="white-space-nowrap">Has phone</th>
                    <th class="white-space-nowrap">Has business category name</th>
                    <th class="white-space-nowrap">Has category name</th>
                    <th class="white-space-nowrap">Category name</th>
                    <th class="white-space-nowrap">Has bio</th>
                    <th class="white-space-nowrap">Lower posts limit</th>
                    <th class="white-space-nowrap">Lower stories limit</th>
                    <th class="white-space-nowrap">Started at</th>
                    <th class="white-space-nowrap">Completed at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($following_tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->profile->username }}</td>
                        <td style="display: flex; flex-wrap: wrap; width: 400px; gap: 1px">
                            @foreach(json_decode($task->profiles_list, false, 512, JSON_THROW_ON_ERROR) as $profile)
                                <div
                                    style="background-color: {{ $colors[$colorIndex % count($colors)] }}; flex: 1; padding: 1px 3px; text-align: center; font-weight: 600">
                                    {{ $profile }}
                                </div>
                                @php $colorIndex++; @endphp
                            @endforeach
                        </td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->lower_delay_limit }}</td>
                        <td>{{ $task->upper_delay_limit }}</td>
                        <td>{{ $task->count_of_screen_scroll }}</td>
                        <td>{{ $task->lower_limit_of_followers }}</td>
                        <td>{{ $task->upper_limit_of_followers }}</td>
                        <td>{{ $task->is_private }}</td>
                        <td>{{ $task->is_business }}</td>
                        <td>{{ $task->is_professional }}</td>
                        <td>{{ $task->has_avatar }}</td>
                        <td>{{ $task->has_posts }}</td>
                        <td>{{ $task->has_stories }}</td>
                        <td>{{ $task->has_url }}</td>
                        <td>{{ $task->has_phone }}</td>
                        <td>{{ $task->has_business_category_name }}</td>
                        <td>{{ $task->has_category_name }}</td>
                        <td>{{ $task->category_name }}</td>
                        <td>{{ $task->has_bio }}</td>
                        <td>{{ $task->lower_posts_limit }}</td>
                        <td>{{ $task->lower_stories_limit }}</td>
                        <td>{{ $task->started_at }}</td>
                        <td>{{ $task->completed_at }}</td>
                        <td>
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
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
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
    .white-space-nowrap {
        white-space: nowrap;
    }
</style>
