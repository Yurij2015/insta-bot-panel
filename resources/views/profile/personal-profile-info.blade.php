@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Personal Prifile data</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Show profile - {{ $personalProfileData->username }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>UserName</th>
                            <td>{!! $personalProfileData->username !!}</td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Profile Password</th>
                            <td class="text-uppercase">{!! $personalProfileData->password !!}</td>
                        </tr>
                        <tr>
                            <th>Cookie</th>
                            <td>{!! $personalProfileData->cookie !!}</td>
                        </tr>
                        <tr>
                            <th>Token</th>
                            <td>{{ $personalProfileData->token }}</td>
                        </tr>
                        <tr>
                            <th>FbDtsg</th>
                            <td>{{ $personalProfileData->fb_dtsg }}</td>
                        </tr>
                        <tr>
                            <th>UserAgent</th>
                            <td colspan="2">{{ $personalProfileData->user_agent }}</td>
                        </tr>
                        <tr>
                            <th>Proxy</th>
                            <td colspan="2">{{ $personalProfileData->proxy->proxy }}
                                : {{ $personalProfileData->proxy->port }}</td>
                        </tr>
                        <tr>
                            <th>Proxy Auth</th>
                            <td colspan="2">{{ $personalProfileData->proxy->login }}
                                : {{ $personalProfileData->proxy->password }}</td>
                        </tr>
                        <tr>
                            <th>Raw Data</th>
                            <td colspan="2">
                                {!! $personalProfileData->raw_data!!}
                            </td>
                        </tr>
                        <tr>
                            <th>Profile Img</th>
                            <td colspan="2">
                                <img src="{{ asset("uploads/profiles/images/$personalProfileData->username" . ".jpg") }}">
                            </td>
                        </tr>
                        <tr>
                            <th>Biography</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->biography !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Followers</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->edge_followed_by['count'] !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Following</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->edge_follow['count'] !!}
                            </td>
                        </tr>
                        <tr>
                            <th>FullName</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->full_name !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Is Business Account</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->is_business_account !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Is Professional Account</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->is_professional_account !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Category</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->category_name !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Is Private</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->is_private !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="no-wrap-th">Is Verified</th>
                            <td colspan="2">
                                {!! $personalProfileData->profileData?->is_verified !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button onclick="goBack()" class="btn btn-xl btn-default text-danger mx-1 shadow"
                                        title="Back to list of accounts">
                                    <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                                </button>
                            </td>
                            <td></td>
                        </tr>
                    </table>
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

        function goBack() {
            window.history.back();
        }

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
    .no-wrap-th {
        white-space: nowrap;
    }
</style>
