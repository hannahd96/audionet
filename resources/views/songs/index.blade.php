
@extends('layouts.app')

@section('content')
<head>
  <!--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"> -->
  <link href = "css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }

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
  </script>

  <style>
      
  .topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
  </style>

</head>    

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/about') }}">About</a>
  <a href="{{ url('/discover') }}">Discover</a>
  <a href="#">Events Near You</a>
  <a href="{{ url('/yourMusic') }}">Your Music</a>
</div>

<span onclick="openNav()">
    <img src="images/hamburger_menu_icon.png" alt = "hamburger_icon" width="40px" height="40px" style="margin-left:20px;">
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
                      </div>
                    
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
                                  </thead>
                                  <tbody>
                              @foreach ($songs as $song)
                                      <tr>
                                          <td>{{ $song->title }}</td>
                                          <td>{{ $song->artist }}</td>
                                          <td>{{ $song->album }}</td>
                                          <td>{{ $song->genre }}</td>
                                          <td>{{ $song->year }}</td>
                                      </tr>
                              @endforeach
                                  </tbody>
                              </table>
                          @endif
                      </div>
            </div>
        </div>
    </div>
</div>
@endsection