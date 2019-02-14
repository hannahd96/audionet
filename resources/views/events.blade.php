@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">

  <script>
  $(document).ready(function(){

// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

});
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function openCloseDiv() {
  var x = document.getElementById("comment_section");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>




</head>    
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="main">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/home') }}">Home</a>
  <a href="{{ url('/about') }}">About</a>
  <a href="{{ url('/songs') }}">Discover</a>
  <a href="{{ url('/events') }}">Events Near You</a>
  <a href="{{ url('/yourMusic') }}">Your Music</a>

<br><br><br>
<hr>

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>


<!-- Use any element to open the sidenav -->
<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" id = "hamburger" alt = "hamburger_icon">
</span>
<div class="container">
    
<h1 class="chunky-header">Events Near You</h1>
  <div class="row justify-content-center">
    Explore the selection of events happening near you. Use the arrows to navigate between events.
  </div><br>
    <div class="row justify-content-center">
    
        <div w-type="event-discovery" w-tmapikey="sGGjahl4Tb1oMn6IPywOyifpp1z2HOHo" w-googleapikey="AIzaSyAXa-2TaLraEJWf3WNgdcmwLDLwl54zvno" 
            w-keyword="" w-theme="simple" w-colorscheme="light" w-width="800" w-height="400" w-size="25" w-border="0" w-borderradius="4" 
            w-postalcode="" w-radius="25" w-period="week" w-layout="horizontal" w-attractionid="" w-promoterid="" w-venueid="" w-affiliateid=""
            w-segmentid="" w-proportion="custom" w-titlelink="off" w-sorting="groupByName" w-id="id_a7bhp" w-countrycode="IE" w-source="" w-city=""
            w-latlong="">
        </div>

        <!-- Ticketmaster API Link -->
        <script src="https://ticketmaster-api-staging.github.io/products-and-docs/widgets/event-discovery/1.0.0/lib/main-widget.js"></script>
</div>
</div>
@endsection
