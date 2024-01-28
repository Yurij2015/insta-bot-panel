@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Edit settings item</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit settings item</h3>
        </div>
        <form method="post" action="{{ route('settings-item-update', $settinsItem->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <x-adminlte-input name="lower_limit_task" placeholder="Lower timeout limit for a task"
                                          value="{{ $settinsItem->lower_limit_task }}"
                                          label="Lower timeout limit for a task"
                                          type="number" igroup-size="sm" min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_task" placeholder="Upper timeout limit for a task"
                                          type="number"
                                          value="{{ $settinsItem->upper_limit_task  }}"
                                          label="Upper timeout limit for a task"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_profile_activity" type="number"
                                          placeholder="Lower timeout limit for profile"
                                          value="{{ $settinsItem->lower_limit_profile_activity  }}"
                                          label="Lower timeout limit for profile"
                                          igroup-size="sm" min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_profile_activity"
                                          placeholder="Upper timeout limit for profile"
                                          value="{{ $settinsItem->upper_limit_profile_activity }}"
                                          label="Upper timeout limit for profile"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_processed_profiles"
                                          placeholder="Lower timeout limit for profiles prcessing"
                                          value="{{ $settinsItem->lower_limit_processed_profiles  }}"
                                          label="Lower timeout limit for profiles processing" type="number"
                                          igroup-size="sm" min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_processed_profiles"
                                          placeholder="Upper timeout limit for profiles prcessing"
                                          value="{{ $settinsItem->upper_limit_processed_profiles }}"
                                          label="Upper timeout limit for profiles processing" type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_operations_number"
                                          placeholder="Lower timeout limit for operations number"
                                          label="Lower timeout limit for operations number"
                                          value="{{ $settinsItem->lower_limit_operations_number  }}"
                                          type="number"
                                          igroup-size="sm" min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_operations_number"
                                          label="Upper timeout limit for operations number"
                                          placeholder="Upper timeout limit for operations number"
                                          value="{{ $settinsItem->upper_limit_operations_number }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_followers" placeholder="Lower timeout limit for followers"
                                          label="Lower timeout limit for followers"
                                          value="{{ $settinsItem->lower_limit_followers }}"
                                          type="number" igroup-size="sm"
                                          min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_followers" placeholder="Upper timeout limit for followers"
                                          label="Upper timeout limit for followers"
                                          value="{{ $settinsItem->upper_limit_followers }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_followings" placeholder="Lower timeout limit for followings"
                                          label="Lower timeout limit for followings"
                                          value="{{ $settinsItem->lower_limit_followings  }}"
                                          type="number" igroup-size="sm"
                                          min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_followings" placeholder="upper_limit_followings"
                                          label="Upper timeout limit for followings"
                                          value="{{ $settinsItem->upper_limit_followings }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_likes" placeholder="Lower timeout limit for likes"
                                          label="Lower timeout limit for likes"
                                          value="{{ $settinsItem->lower_limit_likes  }}"
                                          type="number" igroup-size="sm"
                                          min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_likes" placeholder="Upper timeout limit for likes"
                                          label="Upper timeout limit for likes"
                                          value="{{ $settinsItem->upper_limit_likes }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-4">
                        <x-adminlte-input name="lower_limit_unfollows" placeholder="Lower timeout limit for unfollows"
                                          label="Lower timeout limit for unfollows"
                                          value="{{  $settinsItem->lower_limit_unfollows }}"
                                          type="number" igroup-size="sm"
                                          min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_unfollows" placeholder="Upper timeout limit for unfollows"
                                          label="Upper timeout limit for unfollows"
                                          value="{{ $settinsItem->upper_limit_unfollows }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_comments" placeholder="Lower limit for comments"
                                          label="Lower timeout limit for comments"
                                          value="{{ $settinsItem->lower_limit_comments  }}"
                                          type="number" igroup-size="sm"
                                          min=9000000 max=9999999>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_comments" placeholder="Upper timeout limit for comments"
                                          label="Upper timeout limit for comments"
                                          value="{{ $settinsItem->upper_limit_comments }}"
                                          type="number"
                                          igroup-size="sm" min=14000000 max=15000000>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_likes_for_profile"
                                          placeholder="Lower timeout limit for likes for profile"
                                          label="Lower timeout limit for likes for profile"
                                          value="{{ $settinsItem->lower_limit_likes_for_profile  }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_likes_for_profile"
                                          placeholder="Upper timeout limit for likes for profile"
                                          label="Upper timeout limit for likes for profile"
                                          value="{{ $settinsItem->upper_limit_likes_for_profile }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_likes_for_profile"
                                          placeholder="Lower likes limit for for profile"
                                          label="Lower likes limit for for profile"
                                          value="{{ $settinsItem->lower_limit_likes_for_profile  }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_likes_for_profile"
                                          placeholder="Upper likes limit for for profile"
                                          label="Upper likes limit for for profile"
                                          value="{{ $settinsItem->upper_limit_likes_for_profile }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_unfollows_for_profile"
                                          placeholder="Lower unfollows limit for profile"
                                          label="Lower unfollows limit for profile"
                                          value="{{ $settinsItem->lower_limit_unfollows_for_profile }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_unfollows_for_profile"
                                          placeholder="Upper unfollows limit for profile"
                                          label="Upper unfollows limit for profile"
                                          value="{{ $settinsItem->upper_limit_unfollows_for_profile }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_comments_for_profile"
                                          placeholder="Lower comments limit for profile"
                                          label="Lower comments limit for profile"
                                          value="{{ $settinsItem->lower_limit_comments_for_profile }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_comments_for_profile"
                                          placeholder="Upper comments limit for profile"
                                          label="Upper comments limit for profile"
                                          value="{{ $settinsItem->upper_limit_comments_for_profile  }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_follows_for_profile"
                                          placeholder="Lower follows limit for profile"
                                          label="Lower follows limit for profile"
                                          value="{{ $settinsItem->lower_limit_follows_for_profile  }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_follows_for_profile"
                                          placeholder="Upper follows limit for profile"
                                          label="Upper follows limit for profile"
                                          value="{{ $settinsItem->upper_limit_follows_for_profile }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-4">
                        <x-adminlte-input name="lower_limit_followings_for_profile"
                                          placeholder="Lower followings limit for profile"
                                          label="Lower followings limit for profile"
                                          value="{{ $settinsItem->lower_limit_followings_for_profile }}"
                                          type="number"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_followings_for_profile"
                                          placeholder="Upper followings limit for profile"
                                          label="Upper followings limit for profile"
                                          value="{{ $settinsItem->upper_limit_followings_for_profile }}" type="number"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="lower_limit_parsed_accs_for_profile" type="number"
                                          placeholder="Lower parsed accounts limit for profile"
                                          label="Lower parsed accounts limit for profile"
                                          value="{{ $settinsItem->lower_limit_parsed_accs_for_profile  }}"
                                          igroup-size="sm" min=1 max=19>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-greater-than"></i>
                                </div>
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-users"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="upper_limit_parsed_accs_for_profile" type="number"
                                          placeholder="Upper parsed accounts limit for profile"
                                          label="Upper parsed accounts limit for profile"
                                          value="{{ $settinsItem->upper_limit_parsed_accs_for_profile  }}"
                                          igroup-size="sm" min=20 max=100>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-less-than"></i>
                                </div>
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-users"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input name="host_for_browser_work" placeholder="Host for browser work"
                                          label="Host for browser work"
                                          value="{{ $settinsItem->host_for_browser_work  }}" igroup-size="sm"/>
                        <x-adminlte-select name="profiles_for_work[]" label="Profiles for work" multiple size="5">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-indigo">
                                    <i class="fas fa-sm fa-users"></i>
                                </div>
                            </x-slot>
                            @foreach($profiles as $profile)
                                <option
                                    value="{{ $profile->username }}" {{ in_array($profile->username, $settinsItem->profiles_for_work, true) ? 'selected' : '' }} >{{ $profile->username }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <x-adminlte-input name="start_cron_task_time" placeholder="Start cron task time"
                                          label="Start cron task time" type="time"
                                          value="{{ $settinsItem->start_cron_task_time }}" igroup-size="sm"/>
                        <x-adminlte-select name="task_status" label="Task status" igroup-size="sm">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sm fa-stream"></i>
                                </div>
                            </x-slot>
                            <option value="1" {{ (int)$settinsItem->task_status === 1 ? 'selected' : '' }}>active</option>
                            <option value="0" {{ (int)$settinsItem->task_status === 0 ? 'selected' : '' }}>no active</option>
                        </x-adminlte-select>
                        <x-adminlte-input name="current_task" placeholder="Current task" label="Current task"
                                          value="{{ $settinsItem->current_task }}" igroup-size="sm"/>
                        <x-adminlte-input name="current_profile" placeholder="Current profile" label="Current profile"
                                          value="{{ $settinsItem->current_profile }}" igroup-size="sm"/>
                        <x-adminlte-select name="task_types_for_profiles[]" label="Task types for profiles"
                                           label-class="text-info" multiple
                                           size="4">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sm fa-tasks"></i>
                                </div>
                            </x-slot>
                            <option value="walk" {{ in_array('walk', $settinsItem->task_types_for_profiles, true) ? 'selected' : '' }}>walk</option>
                            <option value="like" {{ in_array('like', $settinsItem->task_types_for_profiles, true) ? 'selected' : '' }}>like</option>
                            <option value="follow" {{ in_array('follow', $settinsItem->task_types_for_profiles, true) ? 'selected' : '' }}>follow</option>
                            <option value="unfollow" {{ in_array('unfollow', $settinsItem->task_types_for_profiles, true) ? 'selected' : '' }}>unfollow</option>
                            @foreach($parsersList as $parserType)
                                <option value="{{ $parserType }}" {{ in_array($parserType, $settinsItem->task_types_for_profiles, true) ? 'selected' : '' }}>{{ $parserType }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <x-adminlte-select name="settings_status" label="Settings status" igroup-size="sm">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sm fa-cogs"></i>
                                </div>
                            </x-slot>
                            <option value="1" {{ (int)$settinsItem->settings_status === 1 ? 'selected' : '' }}>active</option>
                            <option value="0" {{ (int)$settinsItem->settings_status === 0 ? 'selected' : '' }}>no active</option>
                        </x-adminlte-select>
                    </div>
                </div>
                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                   icon="fas fa-lg fa-save"/>
                <a href="{{ route('settings-index') }}">
                    <x-adminlte-button class="btn-flat" label="Back" theme="info" icon="fas fa-arrow-circle-left"/>
                </a>
            </div>
        </form>
@endsection
