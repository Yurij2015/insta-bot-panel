@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <h1>Saved IG USERS. Search and filter</h1>
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
    '#',
    'UserName',
    'FullName',
    'Biography',
    "Biolinks",
    "FB Biolink",
    "Biz address",
    'Biz contact method',
    'Biz category name',
    'Category enum',
    'External url',
    'Followers',
    'Following',
    'IsBusiness',
    'IsProfessional',
    'IsPrivate',
    'CategoryName',
    'InstId',
    'Highlight Reel count',
    'Latest Reel',
    'Action'
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

                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" label="Back"
                                               theme="primary" icon="fas fa-arrow-circle-left"/>
                        </div>
                        <div class="col-md-6">
                            <form class="form" method="get" action="{{ route('ig-users-search-and-filter') }}">
                                <div class="form-group-sm">
                                    <label for="no_cyrillic">Exclude cyrillic </label>
                                    <input type="checkbox" name="no_cyrillic" id="no_cyrillic"
                                           class="mr-2" {{ request()->no_cyrillic ? 'checked' : '' }}>

                                    <label for="business_profiles">Business profiles </label>
                                    <input type="checkbox" name="business_profiles" id="business_profiles"
                                           class="mr-2" {{ request()->business_profiles ? 'checked' : '' }}>

                                    <label for="professional_profiles">Professional profiles </label>
                                    <input type="checkbox" name="professional_profiles" id="professional_profiles"
                                           class="mr-2" {{ request()->professional_profiles ? 'checked' : '' }}>

                                    <label for="private_profiles">Private profiles </label>
                                    <input type="checkbox" name="private_profiles" id="private_profiles"
                                           class="mr-2" {{ request()->private_profiles ? 'checked' : '' }}>
                                </div>
                                <x-adminlte-button class="btn-flat btn-sm mb-3" label="Filter" type="submit"
                                                   theme="warning" icon="fas fa-filter"/>
                            </form>
                        </div>
                    </div>

                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($profiles as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>
                                    <a href="https://www.instagram.com/{{$profile->username}}" target="_blank">
                                        {{ $profile->username }}
                                    </a>
                                </td>
                                <td>{{ $profile->full_name }}</td>
                                <td class="nowrap-text">{{ $profile->biography }}</td>
                                <td>
                                    @php
                                        foreach ($profile?->bio_links as $bio_link) {
                                    @endphp
                                    <a href="{{ $bio_link['url'] }}" target="_blank"
                                       class="{{ !$bio_link['url'] ? 'no-active-link' : '' }} nowrap-text">
                                        {{ $bio_link['title'] }}
                                    </a>
                                    <br>
                                    @php
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @if(is_array($profile->fb_profile_biolink))
                                        <a href="{{ $profile->fb_profile_biolink['url'] }}"
                                           target="_blank"><span class="nowrap-text">
                                                {{ $profile->fb_profile_biolink['name'] }}
                                            </span>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($profile->business_address_json)
                                        @php
                                            $businessAddress = json_decode($profile->business_address_json, false, 512, JSON_THROW_ON_ERROR);
                                        @endphp
                                        @if($businessAddress->city_name)
                                            <p class="m-0 nowrap-text">City Name - {{ $businessAddress->city_name }}</p>
                                        @endif
                                        @if($businessAddress->city_id)
                                            <p class="m-0 nowrap-text">Cidy Id - {{ $businessAddress->city_id }}</p>
                                        @endif
                                        @if($businessAddress->street_address)
                                            <p class="m-0 nowrap-text">Street Address
                                                - {{ $businessAddress->street_address }}</p>
                                        @endif
                                        @if($businessAddress->zip_code)
                                            <p class="m-0 nowrap-text">Zip cod - {{ $businessAddress->zip_code }}</p>
                                        @endif
                                        @if($businessAddress->latitude)
                                            <p class="m-0 nowrap-text">Latitude - {{ $businessAddress->latitude }}</p>
                                        @endif
                                        @if($businessAddress->longitude)
                                            <p class="m-0 nowrap-text">Longitude - {{ $businessAddress->longitude }}</p>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ $profile->business_contact_method }}
                                </td>
                                <td>
                                    {{ $profile->business_category_name }}
                                </td>
                                <td>
                                    {{ $profile->category_enum }}
                                </td>
                                <td>
                                    <a href="{{ $profile->external_url }}" target="_blank">
                                        {{ $profile->external_url }}
                                    </a>
                                </td>
                                <td>{{ $profile->edge_followed_by['count'] }}</td>
                                <td>{{ $profile->edge_follow['count'] }}</td>
                                <td>{{ $profile->is_business_account ? 'true' : 'false' }}</td>
                                <td>{{ $profile->is_professional_account ? 'true' : 'false' }}</td>
                                <td>{{ $profile->is_private ? 'true' : 'false' }}</td>
                                <td>{{ $profile->category_name }}</td>
                                <td>{{ $profile->inst_id }}</td>
                                <td>{{ $profile->highlight_reel_count ?: '-' }}</td>
                                <td>{{ $profile->latest_reel_media }}</td>
                                <td class="text-center">
                                    <nobr>
                                        <form method="POST"
                                              action="{{ route('ig-user.delete', $profile->id) }}"
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
                    {{ $profiles->links('vendor.pagination.bootstrap-5') }}
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

    th {
        white-space: nowrap;
        text-align: center;
        text-transform: capitalize;
    }

    .nowrap-text {
        white-space: nowrap;
    }

    .no-active-link {
        pointer-events: none;
        color: black;
    }
</style>
