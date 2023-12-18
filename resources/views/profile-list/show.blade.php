@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <h1>List - {{ $profileList->name }}</h1>
            <h6>{{$profileList->description}}</h6>
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
    $heads = [
    ['label' => '#', 'title' => '#'],
    ['label' => 'UserName','title' => 'UserName'],
    ['label' => 'IsVerified','title' => 'IsVerified'],
    ['label' => 'FullName','title' => 'FullName'],
    ['label' => 'Biography','title' => 'Biography'],
    ['label' => 'Followers','title' => 'Followers'],
    ['label' => 'Following','title' => 'Following'],
    ['label' => 'IsBusiness','title' => 'IsBusiness'],
    ['label' => 'IsProfessional','title' => 'IsProfessional'],
    ['label' => 'CategoryName','title' => 'CategoryName'],
    ['label' => 'Pk','title' => 'Inst ID'],
    ['label' => 'Links','title' => 'Bio links'],
    ['label' => 'Avatar','title' => 'Avatar'],
    ['label' => 'Action','title' => 'Action']
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
                        @foreach($list as $listItem)
                            <tr>
                                <td>{{ $listItem->id }}</td>
                                <td>
                                    <a href="https://www.instagram.com/{{$listItem->username}}" target="_blank">
                                        {{ $listItem->username }}
                                    </a>
                                </td>
                                <td>{{ $listItem->is_verified }}</td>
                                <td>{{ $listItem->full_name }}</td>
                                <td>{{ $listItem->biography }}</td>
                                <td>{{ $listItem->edge_followed_by['count'] }}</td>
                                <td>{{ $listItem?->edge_follow['count'] }}</td>
                                <td>{{ $listItem?->is_business_account ? 'true' : 'false' }}</td>
                                <td>{{ $listItem?->is_professional_account ? 'true' : 'false' }}</td>
                                <td>{{ $listItem?->category_name }}</td>
                                <td>{{ $listItem->inst_id }}</td>
                                <td>
                                    @php
                                        foreach ($listItem?->bio_links as $bio_link) {
                                    @endphp
                                    <a href="{{ $bio_link['url'] }}" target="_blank">{{ $bio_link['url'] }}</a>
                                    @php
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <img src="{{ asset("uploads/profiles/images/$listItem->username" . ".jpg") }}"
                                         alt="{{ $listItem->username }}"
                                         width="100px">
                                </td>
                                <td class="text-center">
                                    <nobr>
                                        <form method="POST"
                                              action="{{ route('set-get-followers-task-for-list', $listItem->id) }}"
                                              style="display:inline">
                                            @csrf
                                            <x-adminlte-button type="{{ $listItem->isGetFollowersTaskCreated ? 'button' : 'submit' }}"
                                                               class="btn-flat btn-sm {{$listItem->isGetFollowersTaskCreated ? 'disabled' : ''}}"
                                                               label="GetFlws"
                                                               theme="primary" icon="fas fa-arrow-circle-down"/>
                                        </form>

                                        <a href="{{ route('profile-list.show-followers', $listItem->id) }}">
                                            <x-adminlte-button class="btn-flat btn-sm" label="ShowFlws" theme="info"
                                                               icon="fas fa-eye"/>
                                        </a>

                                        <form method="POST"
                                              action="{{ route('inst-search-result.delete', $listItem->id) }}"
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
                    {{ $list->links('vendor.pagination.bootstrap-5') }}
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
</style>
