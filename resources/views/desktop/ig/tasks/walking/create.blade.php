@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Walking Task Create</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">Walking Task Create</h3>
        </div>
        <div class="card-body">
            <form class="form" method="get" action="{{ route('walking-tasks.create') }}">
                <div class="row" style="line-height: 60px">
                    <div class="col-md-8">
                        <div class="form-group-sm form-inline">
                            <label for="no_cyrillic">Exclude cyrillic </label>
                            <input type="checkbox" name="no_cyrillic" id="no_cyrillic"
                                   class="mr-2 ml-1" {{ request()->no_cyrillic ? 'checked' : '' }}>

                            <label for="business_profiles">Business profiles </label>
                            <input type="checkbox" name="business_profiles" id="business_profiles"
                                   class="mr-2 ml-1" {{ request()->business_profiles ? 'checked' : '' }}>

                            <label for="professional_profiles">Professional profiles </label>
                            <input type="checkbox" name="professional_profiles" id="professional_profiles"
                                   class="mr-2 ml-1" {{ request()->professional_profiles ? 'checked' : '' }}>

                            <label for="private_profiles">Private profiles </label>
                            <input type="checkbox" name="private_profiles" id="private_profiles"
                                   class="mr-2 ml-1" {{ request()->private_profiles ? 'checked' : '' }}>
                            <label for="count_of_profiles">Count of profiles </label>
                            <input type="text" name="count_of_profiles" id="count_of_profiles"
                                   class="form-control mr-2 ml-2 mt-1" value="{{ request()->count_of_profiles  }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-flat" style="width: 100%" type="submit">
                            <i class="fas fa-filter"></i>
                            Get filtered profiles
                        </button>
                    </div>
                </div>
            </form>
            <form method="post" action="{{ route('walking-tasks.store') }}">
                @csrf
                <div class="card-body">
                    <x-adminlte-select name="working_profile_id" label="Profile">
                        <option value="">Select profile</option>
                        @foreach($working_profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->username }}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-textarea rows="{{ count($profiles)/11 }}" name="profiles_list"
                                         placeholder="Profiles List" label="Profiles List" readonly>
                        {{ $profiles }}
                    </x-adminlte-textarea>
                    <x-adminlte-select name="status" label="Status">
                        <option value="">Select status</option>
                        @foreach(['pending', 'running', 'completed'] as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input name="lower_delay_limit" placeholder="Lower delay limit" label="Lower delay limit"
                                      value="{{ old('lower_delay_limit') ?? 10000 }}"/>
                    <x-adminlte-input name="upper_delay_limit" placeholder="Upper delay limit" label="Upper delay limit"
                                      value="{{ old('lower_delay_limit') ?? 30000  }}"/>
                    <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="primary"
                                       icon="fas fa fa-save"/>
                </div>
            </form>
        </div>
@endsection
