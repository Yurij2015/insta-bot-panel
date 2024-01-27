@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Settings</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right btn-sm" href="{{ route('settings-create') }}">Add setting</a>
        </div>
    </div>
@stop

@php
    $btnDelete = '<button class="btn btn-sm btn-x btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-sm btn-x btn-default text-teal mx-2 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $btnEdit = '<button class="btn btn-sm btn-x btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = [
        ['label' => '#', 'title' => 'ID'],
        ['label' => 'profiles for work', 'title' => 'profiles_for_work'],
        ['label' => 'start cron task time', 'title' => 'start_cron_task_time'],
        ['label' => 'task status', 'title' => 'task_status'],
        ['label' => 'current task', 'title' => 'current_task'],
        ['label' => 'current profile', 'title' => 'current_profile'],
        ['label' => 'task types for profiles', 'title' => 'task_types_for_profiles'],
        ['label' => 'settings status', 'title' => 'settings_status'],
        ['label' => 'host for browser work', 'title' => 'host_for_browser_work'],
        ['label' => 'Lower limit task', 'title' => 'Lower limit task'],
        ['label' => 'Upper limit task', 'title' => 'Upper limit task'],
        ['label' => 'Lower limit profile activity', 'title' => 'Lower limit profile activity'],
        ['label' => 'upper limit profile activity', 'title' => 'lower_limit_processed_profiles'],
        ['label' => 'lower limit processed profiles', 'title' => 'lower_limit_processed_profiles'],
        ['label' => 'upper limit processed profiles', 'title' => 'upper_limit_processed_profiles'],
        ['label' => 'lower limit operations number', 'title' => 'lower_limit_operations_number'],
        ['label' => 'upper limit operations number', 'title' => 'upper_limit_operations_number'],
        ['label' => 'lower limit followers', 'title' => 'lower_limit_followers'],
        ['label' => 'upper limit followers', 'title' => 'upper_limit_followers'],
        ['label' => 'lower limit followings', 'title' => 'lower_limit_followings'],
        ['label' => 'upper limit followings', 'title' => 'upper_limit_followings'],
        ['label' => 'lower limit likes', 'title' => 'lower_limit_likes'],
        ['label' => 'upper limit likes', 'title' => 'upper_limit_likes'],
        ['label' => 'lower limit unfollows', 'title' => 'lower_limit_unfollows'],
        ['label' => 'upper limit unfollows', 'title' => 'upper_limit_unfollows'],
        ['label' => 'lower limit comments', 'title' => 'lower_limit_comments'],
        ['label' => 'upper limit comments', 'title' => 'upper_limit_comments'],
        ['label' => 'lower limit likes for profile', 'title' => 'lower_limit_likes_for_profile'],
        ['label' => 'upper limit likes for profile', 'title' => 'upper_limit_likes_for_profile'],
        ['label' => 'lower limit unfollows for profile', 'title' => 'lower_limit_unfollows_for_profile'],
        ['label' => 'upper limit unfollows for profile', 'title' => 'upper_limit_unfollows_for_profile'],
        ['label' => 'lower limit comments for profile', 'title' => 'lower_limit_comments_for_profile'],
        ['label' => 'upper limit comments for profile', 'title' => 'upper_limit_comments_for_profile'],
        ['label' => 'lower limit follows for profile', 'title' => 'lower_limit_follows_for_profile'],
        ['label' => 'upper limit follows for profile', 'title' => 'upper_limit_follows_for_profile'],
        ['label' => 'lower limit followings for profile', 'title' => 'lower_limit_followings_for_profile'],
        ['label' => 'upper limit followings for profile', 'title' => 'upper_limit_followings_for_profile'],
        ['label' => 'lower limit parsed_accs for profile', 'title' => 'lower_limit_parsed_accs_for_profile'],
        ['label' => 'upper limit parsed_accs for profile', 'title' => 'upper_limit_parsed_accs_for_profile'],
        ['label' => 'Action', 'title' => 'Action'],
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
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config" title="settings">
                        @foreach($settingsList as $listItem)
                            <tr>
                                <td>{{ $listItem->id }}</td>
                                <td>
                                    @foreach($listItem->profiles_for_work as $profile)
                                        <span>{{ $profile }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $listItem->start_cron_task_time }}</td>
                                <td>{{ $listItem->task_status ? 'active' : 'no active' }}</td>
                                <td class="nowrap-text">{{ $listItem->current_task }}</td>
                                <td>{{ $listItem->current_profile }}</td>
                                <td>
                                    @foreach($listItem->task_types_for_profiles as $type)
                                        <div class="nowrap-text">{{ $type }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $listItem->settings_status ? 'active' : 'no active' }}</td>
                                <td>{{ $listItem->host_for_browser_work }}</td>
                                <td>{{ $listItem->lower_limit_task }}</td>
                                <td>{{ $listItem->upper_limit_task }}</td>
                                <td>{{ $listItem->lower_limit_profile_activity }}</td>
                                <td>{{ $listItem->upper_limit_profile_activity }}</td>
                                <td>{{ $listItem->lower_limit_processed_profiles }}</td>
                                <td>{{ $listItem->upper_limit_processed_profiles }}</td>
                                <td>{{ $listItem->lower_limit_operations_number }}</td>
                                <td>{{ $listItem->upper_limit_operations_number }}</td>
                                <td>{{ $listItem->lower_limit_followers }}</td>
                                <td>{{ $listItem->upper_limit_followers }}</td>
                                <td>{{ $listItem->lower_limit_followings }}</td>
                                <td>{{ $listItem->upper_limit_followings }}</td>
                                <td>{{ $listItem->lower_limit_likes }}</td>
                                <td>{{ $listItem->upper_limit_likes }}</td>
                                <td>{{ $listItem->lower_limit_unfollows }}</td>
                                <td>{{ $listItem->upper_limit_unfollows }}</td>
                                <td>{{ $listItem->lower_limit_comments }}</td>
                                <td>{{ $listItem->upper_limit_comments }}</td>
                                <td>{{ $listItem->lower_limit_likes_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_likes_for_profile }}</td>
                                <td>{{ $listItem->lower_limit_unfollows_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_unfollows_for_profile }}</td>
                                <td>{{ $listItem->lower_limit_comments_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_comments_for_profile }}</td>
                                <td>{{ $listItem->lower_limit_follows_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_follows_for_profile }}</td>
                                <td>{{ $listItem->lower_limit_followings_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_followings_for_profile }}</td>
                                <td>{{ $listItem->lower_limit_parsed_accs_for_profile }}</td>
                                <td>{{ $listItem->upper_limit_parsed_accs_for_profile }}</td>
                                <td class="text-center">
                                    <div>
                                        <span class="white-space-nowrap">
                                            <a href="{{ route('settings-item-edit', $listItem->id) }}">{!! $btnEdit !!}</a>
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
                    {{ $settingsList->links('vendor.pagination.bootstrap-5') }}
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
@section('css')
    <style>
        .text-center {
            text-align: center;
        }

        .white-space-nowrap {
            white-space: nowrap;
        }

        .word-wrap {
            word-break: break-all;
            white-space: normal;
        }

        th {
            white-space: nowrap;
            text-align: center;
            text-transform: capitalize;
        }

        th::first-letter {
            /*text-transform: uppercase;*/
        }

        .nowrap-text{
            white-space: nowrap;
        }

    </style>
@stop

