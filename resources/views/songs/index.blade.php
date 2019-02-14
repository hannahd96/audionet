
@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Exo|Julius+Sans+One|Questrial|Varela" rel="stylesheet">
  <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }

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

    function myFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
          /* loops through tables contents */
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }

    function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function sortTableOldest() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[4];
      y = rows[i + 1].getElementsByTagName("TD")[4];
      //check if the two rows should switch place:
      if (Number(x.innerHTML) > Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>

</head>    

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

<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" id="hamburger" alt = "hamburger_icon" width="40px" height="40px" >
</span>

<div id="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="chunky_header">Discover</h2>
                    <p class="description">
                        Explore the AudioNet music library to discover new songs, artists, albums and much more. 
                        With hundreds of songs to choose from, AudioNet offers a wide range of various music styles
                        and genres.
                    </p>
                    <!-- SEARCHBAR -->
                      <div class="search-container">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search songs.." 
                         title="Type in a name" autocomplete="off" name = "search">

                         <button onclick="sortTable()" class="btn btn-warning" id="sort_btn" style="float:right; margin-right:15px;">A-Z</button>
                         <button onclick="sortTableOldest()" class="btn btn-success" id="sort_btn" style="float:right; margin-right:15px;">Oldest to Newest</button>

                      </div>
                    <!-- start of results -->
                    <div class="results">

                    <div class="panel-body">
                          @if (count($songs) === 0)
                              <p>There are no songs!</p>
                          @else
                              <table class="table table-striped table-dark" id="myTable">
                                  <thead style="background-color:black;
                                  font-weight: bold;">
                                      <th>Title</th>
                                      <th>Artist</th>
                                      <th>Album</th>
                                      <th>Genre</th>
                                      <th>Year</th>
                                      <th>Listen</th>
                                  </thead>
                                  
                                  <tbody>
                              @foreach ($songs as $song)
                                      <tr>
                                          <td>{{ $song->title }}</td>
                                          <td>{{ $song->artist }}</td>
                                          <td>{{ $song->album }}</td>
                                          <td>{{ $song->genre }}</td>
                                          <td>{{ $song->year }}</td>
                                          <td>
                                            <audio controls style="width:100px; height:18px;">
                                              <source src="{{ $song->song_link }}" type="audio/mpeg">
                                            </audio>
                                          </td>
                                      </tr>
                              @endforeach
                                  </tbody>
                              </table>
                          @endif
                      </div>

                    </div>
                    <!-- end of results -->
            </div>
        </div>
    </div>
</div>
<div id="scroll_top_auto" style="float:right; text-align:right;">
        <p id="back-top">
            <a href="#top"><span style="font-size:40px;">^</span></a>
        </p>
    </div>
@endsection