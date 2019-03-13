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


</script>

<div class="container" id="top-row">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-bottom:15px;">
                <h2 class="chunky_header">Events Near You</h2>
                  Explore the selection of events happening near you. Use the arrows to navigate between events.
            </div>
        </div>
        <div class="row justify-content-center">
            <div w-type="event-discovery" w-tmapikey="sGGjahl4Tb1oMn6IPywOyifpp1z2HOHo" w-googleapikey="AIzaSyAXa-2TaLraEJWf3WNgdcmwLDLwl54zvno" 
                w-keyword="" w-theme="simple" w-colorscheme="light" w-width="729" w-height="400" w-size="25" w-border="0" w-borderradius="4" 
                w-postalcode="" w-radius="25" w-period="week" w-layout="horizontal" w-attractionid="" w-promoterid="" w-venueid="" w-affiliateid=""
                w-segmentid="" w-proportion="custom" w-titlelink="off" w-sorting="groupByName" w-id="id_a7bhp" w-countrycode="IE" w-source="" w-city=""
                w-latlong="">
            </div>

        <!-- Ticketmaster API Link -->
        <script src="https://ticketmaster-api-staging.github.io/products-and-docs/widgets/event-discovery/1.0.0/lib/main-widget.js"></script>
</div>
</div>
@endsection
