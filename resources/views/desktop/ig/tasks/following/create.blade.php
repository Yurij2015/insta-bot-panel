@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Following Task Create</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">Following Task Create</h3>
        </div>
        <div class="card-body">
            <form class="form" method="get" action="{{ route('following-tasks.create') }}">
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
            <form method="post" action="{{ route('following-tasks.store') }}">
                @csrf
                <div class="card-body">
                    <x-adminlte-select name="working_profile_id" label="Profile">
                        <option value="">Select profile</option>
                        @foreach($working_profiles as $profile)
                            <option value="{{ $profile->id }}" {{$profile->id === (int) old('working_profile_id') ? 'selected' : '' }}>
                                {{ $profile->username }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-textarea rows="{{ count($profiles)/11 }}" name="profiles_list"
                                         placeholder="Profiles List" label="Profiles List" readonly>
                        {{ $profiles }}
                    </x-adminlte-textarea>
                    <x-adminlte-select name="status" label="Status">
                        <option value="">Select status</option>
                        @foreach(['pending', 'running', 'completed'] as $status)
                            <option value="{{ $status }}" {{old('status') === $status ? 'selected' : ''}}>{{ $status }}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input name="lower_delay_limit" placeholder="Lower delay limit" label="Lower delay limit"
                                      value="{{ old('lower_delay_limit') ?? 10000 }}"/>
                    <x-adminlte-input name="upper_delay_limit" placeholder="Upper delay limit" label="Upper delay limit"
                                      value="{{ old('lower_delay_limit') ?? 30000  }}"/>
                    <x-adminlte-input name="count_of_screen_scroll" placeholder="Count of screen scroll"
                                      label="Count of screen scroll" value="{{ old('count_of_screen_scroll') ?? 3 }}"/>
                    <x-adminlte-input name="lower_limit_of_followers" placeholder="Lower limit of followers"
                                      label="Lower limit of followers"
                                      value="{{ old('lower_limit_of_followers') ?? 0 }}"/>
                    <x-adminlte-input name="upper_limit_of_followers" placeholder="Upper limit of followers"
                                      label="Upper limit of followers"
                                      value="{{ old('upper_limit_of_followers') ?? 0}}"/>
                    <x-adminlte-input name="lower_posts_limit" placeholder="Lower posts limit" label="Lower posts limit"
                                      value="{{ old('lower_posts_limit') ?? 0 }}"/>
                    <x-adminlte-input name="lower_stories_limit" placeholder="Lower stories limit"
                                      label="Lower stories limit"
                                      value="{{ old('lower_stories_limit') ?? 0 }}"/>
                    <x-adminlte-input name="category_name" placeholder="Category name" label="Category name"
                                      value="{{ old('category_name') }}"/>
                    <div class="col-md-12">
                        <label for="is_private">Is private</label>
                        <input name="is_private" placeholder="Is private" type="checkbox" id="is_private"/>
                        <label for="is_business">Is business</label>
                        <input name="is_business" placeholder="Is business" id="is_business" type="checkbox"/>
                        <label for="is_professional">Is professional</label>
                        <input name="is_professional" placeholder="Is professional" id="is_professional"
                               type="checkbox"/>
                        <label for="has_avatar">Has avatar</label>
                        <input name="has_avatar" placeholder="Has avatar" id="has_avatar" type="checkbox"/>
                        <label for="has_posts">Has posts</label>
                        <input name="has_posts" placeholder="Has posts" id="has_posts" type="checkbox"/>
                        <label for="has_stories">Has stories</label>
                        <input name="has_stories" placeholder="Has stories" id="has_stories" type="checkbox"/>
                        <label for="has_url">Has url</label>
                        <input name="has_url" placeholder="Has url" id="has_url" type="checkbox"/>
                        <label for="has_phone">Has phone</label>
                        <input name="has_phone" placeholder="Has phone" type="checkbox" id="has_phone"/>
                        <label for="has_business_category_name">Has business category name</label>
                        <input name="has_business_category_name" type="checkbox"
                               placeholder="Has business category name"
                               id="has_business_category_name"/>
                        <label for="has_category_name">Has category name</label>
                        <input name="has_category_name" placeholder="Has category name" type="checkbox"
                               id="has_category_name"/>
                        <label for="has_bio">Has bio</label>
                        <input name="has_bio" placeholder="Has bio" label="Has bio" type="checkbox" id="has_bio"/>
                    </div>
                    <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="primary"
                                       icon="fas fa fa-save"/>
                </div>
            </form>
        </div>
@endsection
