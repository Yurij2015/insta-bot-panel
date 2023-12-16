@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Search results</h1>
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
        ['label' => 'IgId', 'title' => 'Instagram ID'],
        ['label' => 'IgUserName', 'title' => 'Instagram UserName'],
        ['label' => 'KeyWord', 'title' => 'Key Word'],
        ['label' => 'Hashtags', 'title' => 'Hashtags'],
        ['label' => 'Places', 'title' => 'Places'],
        ['label' => 'IgUsers', 'title' => 'Instagram Users'],
        ['label' => 'GetUsers Status', 'title' => 'Get Full IgUsers Task Status', 'width' => 15],
        ['label' => 'Action', 'title' => 'Action']
        ];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" type="submit" label="Back" theme="primary" icon="fas fa-arrow-circle-left"/>
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($searchResults as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->ig_id }}</td>
                                <td>{{ $result->ig_username }}</td>
                                <td>{{ $result->key_word }}</td>
                                <td>
                                    <a href="{{ route('ig-hashtags', $result->id) }}">{!! $btnDetails !!}</a>
                                    <span class="countOfRors">
                                    ({{ $result->numberOfHashtags }})
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('ig-places', $result->id) }}">{!! $btnDetails !!}</a>
                                    <span class="countOfRors">
                                    ({{ $result->numberOfPlaces}})
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('ig-users', $result->id) }}">{!! $btnDetails !!}</a>
                                    <span class="countOfRors">
                                    ({{ $result->numberOfUsers }})
                                    </span>
                                </td>
                                <td>
                                    {{ $result->fullIgUsersDataTaskCreated?->status }}
                                    {{$result->fullIgUsersDataTaskCreated ? '|' : ''}}
                                    {{ $result->fullIgUsersDataTaskCreated?->task_status }}

                                </td>
                                <td class="text-center">
                                    <nobr>
                                        <form method="POST"
                                              action="{{ route('inst-search-result.delete', $result->id) }}"
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
                    {{ $searchResults->links('vendor.pagination.bootstrap-5') }}
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
