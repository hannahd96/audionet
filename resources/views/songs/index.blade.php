@extends('layouts.app')

@section('content')
<head>
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- Function used for filter -->
    <script>
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
    
</head>
<div class="container" style="margin-top:150px;">
    <div class="row">
        <div class="col-md-12">
            <!-- Search bar: calls myFunction() from up above -->
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for songs.." 
                title="Type in a name" autocomplete="off" name = "search" style="margin-bottom:8px; text-align:left;">
                <p id="alert-message" class="alert collapse"></p>
                <!-- filters for contents of DB: doesn't work -->
                <div id="myBtnContainer" style="float:right; text-align:right;">
                  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                  <button class="btn"> Songs</button>
                  <button class="btn"> Artists</button>
                  <button class="btn"> Albums</button>
                </div>
            
                <div class="panel-heading"></div>
              
                <div class="panel-body table-responsive" id = "songs-container">
                 
                <div class="panel panel-default"> 
                        <!-- returns songs from DB -->
                        <router-view name="songsIndex"></router-view>
                    
                    
                        <router-view></router-view>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>

    /* filter buttons: dont' work */
    filterSelection("all")
    function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("filtertd");
      if (c == "all") c = "";
      for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
      }
    }

    function w3AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
      }
    }

    function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
          arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
      }
      element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
        
    </script>


@endsection
