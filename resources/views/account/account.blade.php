@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My account</div>
                    @include('partials.errors')
                    @include('partials.success')
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{ url('account/edit-profile') }}">Edit profile</a></li>
                            <li><a href="{{ url('account/change-password') }}">Change password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection