@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">
  <link href = "css/main.css" rel="stylesheet">

<div class="container" id="top-row">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <img src="uploads/avatars/{{ $user->avatar }}" style = "width:100px; 
                                                                        height:100px; 
                                                                        float:left; 
                                                                        border-radius:50%; 
                                                                        margin-right:25px;">
                <div class ="profile_section">                                                            
                    <h2 style="padding-bottom:10px">{{ $user->name }}'s Profile</h2>
                    <br>
                        <form enctype="multipart/form-data" action="profile" method="POST">
                        <br>
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary" value="Change">
                           
                        </form>
                        <br>
                </div>        
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
            <table class="table">
                 <tbody>
                   <tr>
                     <td>Name: </td>
                     <td><b>{{ Auth::user()->name }}</b></td>
                   </tr>
                   <tr>
                     <td>Email: </td>
                     <td><b>{{ Auth::user()->email }}</b></td>
                   </tr>
                   <tr>
                      <td>Member Since: </td>
                      <td><b>{{ Auth::user()->created_at }}</b></td>
                   </tr>
                   <tr>
                     <td>Favourite Song: </td>
                     <td></td>
                   </tr>
                 </tbody>
               </table>  
            </div>
      
        </div>
    </div>
      
    </div>
</div>
@endsection
