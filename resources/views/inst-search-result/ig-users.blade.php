@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Search results. Users</h1>
        </div>
        <div class="col-md-6">
            <form method="POST"
                  action="{{ route('ig-users.set-get-full-data-task', $searchResult->id) }}"
                  style="display:inline">
                @csrf
                <x-adminlte-button type="{{$isFullIgUsersDataTaskCreated ? 'button' : 'submit'}}"
                                   class="btn btn-primary float-right btn-sm {{$isFullIgUsersDataTaskCreated ? 'disabled' : ''}}"
                                   label="Get full data"
                                   title="{{$isFullIgUsersDataTaskCreated ? 'Task to get full details already created' : 'Add a task to recieve full details'}}"
                                   theme="primary"
                />
            </form>
        </div>
    </div>
@stop
@php
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = ['#', 'UserName', 'IsVerified', 'FullName', 'Biography', 'Followers', 'Following', 'IsBusiness', 'IsProfessional', 'CategoryName', 'Pk', 'Latest Reel', 'Avatar', 'Action'];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" type="submit" label="Back" theme="primary" icon="fas fa-arrow-circle-left"/>
                    <a href="{{ route('go-through-search-profiles-in-browser', $searchResult->id) }}">
                        <button class="btn btn-x btn-default text-purple shadow mt-n3" title="Go through the profiles in the browser">
                            <i class="fab fa-lg fa-fw fa-chrome fa-spin"></i>
                        </button>
                    </a>
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="https://www.instagram.com/{{$user->username}}" target="_blank">
                                        {{ $user->username }}
                                    </a>
                                </td>
                                <td>{{ $user->is_verified }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->profileInfo?->biography }}</td>
                                <td>{{ $user->profileInfo?->edge_followed_by['count'] }}</td>
                                <td>{{ $user->profileInfo?->edge_follow['count'] }}</td>
                                <td>{{ $user->profileInfo?->is_business_account ? 'true' : 'false' }}</td>
                                <td>{{ $user->profileInfo?->is_professional_account ? 'true' : 'false' }}</td>
                                <td>{{ $user->profileInfo?->category_name }}</td>
                                <td>{{ $user->pk }}</td>
                                <td>{{ $user->latest_reel_media }}</td>
                                <td>
                                    <img src="{{ asset("uploads/profiles/images/$user->username" . ".jpg") }}"
                                         alt="{{ $user->username }}"
                                         width="100px">
                                </td>
                                <td class="text-center">
                                    <nobr>
                                        <form method="POST"
                                              action="{{ route('ig-user.set-get-followers-task-for-search', $user->id) }}"
                                              style="display:inline">
                                            @csrf
                                            <x-adminlte-button type="submit" class="btn-flat btn-sm {{$user->isGetFollowersTaskCreated ? 'disabled' : ''}}" label="GetFlws"
                                                               theme="primary" icon="fas fa-arrow-circle-down"/>
                                        </form>

                                        <a href="{{ route('ig-users.show-followers', $user->id) }}">
                                            <x-adminlte-button class="btn-flat btn-sm" label="ShowFlws" theme="info"
                                                               icon="fas fa-eye"/>
                                        </a>

                                        <form method="POST"
                                              action="{{ route('ig-user.delete', $user->id) }}"
                                              style="display:inline" class="has-confirm"
                                              data-message="Delete this record?">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $users->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        document.getElementById('backButton').addEventListener('click', function() {
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
</style>
