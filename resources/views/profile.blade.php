@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <img src="uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <hr>
            <h4 style="margin-top:30px;">Personal Details</h4>
                <ul class="personal_details">
                    <li id="detail">{{ Auth::user()->name }}</li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                    <li id="detail"></li>
                </ul>
        </div>
    </div>
</div>
@endsection
