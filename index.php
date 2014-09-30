<?php
  session_start();
  include('header.php');
?>
  <div class="off-canvas-wrap">
    <div class="inner-wrap">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="#">Community events prototype</a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>

        <section class="top-bar-section">
          <ul class="right">
            <li class="active">
              <a class="right-off-canvas-toggle" >Menu</a>
            </li>
          </ul>
        </section>
      </nav>
      
      <aside class="right-off-canvas-menu" style="background-color:#dfdfdf;">
          <div class="row">
            <div class="large-12 columns">
              <?php
                if (isset($_SESSION['admin'])) {
              ?>

              
                      <h4><a href="admin.php">Admin</a></h4>
                      <h4><a href="logout.php">Log out</a></h4>
                      <h3>Use</h3>
                      <u>Desktop</u>
                      <p>Right-click to add a location.</p>
                      <u>Mobile</u>
                      <p>Tap and hold to add a location.</p>
                      <p><i>Map will be updated daily by editors.</i></p>
                

              <?php
                } else {
              ?>

                
                      <h4><a href="#" data-reveal-id="myModal2">Login</a></h4>
                      <h4><a href="wtf">Register</a></h4>
                      <h3>Use</h3>
                      <u>Desktop</u>
                      <p>Right-click to add a location.</p>
                      <u>Mobile</u>
                      <p>Tap and hold to add a location.</p>
                      <p><i>Map will be updated daily by editors.</i></p>
                    

              <?php 
                }
              ?>
            </div>
          </div>
      </aside>

     

      <div class="row" style="height:100vh;">
        <div class="" id="map">
        </div>
      </div>
      <div id="myModal" class="reveal-modal" data-reveal>
        <h2>Success!</h2>
        <p>Your submission has been recorded and saved.</p>
  	  <p><a href="#" onclick="location.reload();">Refresh map</a></p>
        <a class="close-reveal-modal">&#215;</a>
      </div>

      <div id="myModal2" class="reveal-modal" data-reveal>
        <form class="row" id="inputform" enctype="multipart/form-data" class="well">
          <h4>Login first please</h4>
            <label><strong>Username:</strong><input type="text" id="username" name="username" placeholder="DB Username" /></label>
            <label><strong>Password:</strong><input type="password" id="password" name="password" placeholder="DB Password" /></label>
          <div class="row">
            <div class="left columns small-1"><button type="button" class="btn tiny" onclick="loginUser()">Submit</button></div>
          </div>
        </form>
      </div>

      <div id="successModal" class="reveal-modal" data-reveal>
          <h2>Success!</h2>
          <p>You have been logged in.</p>
          <p><a href="#" onclick="location.reload();">Refresh map</a></p>
          <a class="close-reveal-modal">&#215;</a>
      </div>
      <!-- Map time -->
      <script type="text/javascript">
        var map = new L.Map('map').setView([45.557945, -94.163240],14);

        // Define the different layers and default layer
        var defaultLayer = L.tileLayer('http://{s}.tiles.mapbox.com/v3/nps.map-lj6szvbq/{z}/{x}/{y}.png', {maxZoom:18}).addTo(map);

        var baseLayers = {
              'Default Mapbox': L.tileLayer('http://{s}.tiles.mapbox.com/v3/nps.map-lj6szvbq/{z}/{x}/{y}.png'),
              'MapQuest Aerial': L.tileLayer.provider('MapQuestOpen.Aerial'),
              'MapQuest OSM': L.tileLayer.provider('MapQuestOpen.OSM'),
              // 'Stamen Watercolor': L.tileLayer.provider('Stamen.Watercolor')
            };

        var overlayLayers = {
              'OpenWeatherMap PressureContour': L.tileLayer.provider('OpenWeatherMap.PressureContour'),
              'OpenWeatherMap Wind': L.tileLayer.provider('OpenWeatherMap.Wind'),
              'OpenWeatherMap Temperature': L.tileLayer.provider('OpenWeatherMap.Temperature'),
              'OpenWeatherMap Snow': L.tileLayer.provider('OpenWeatherMap.Snow')
            };

        var layerControl = new L.control.layers(baseLayers, overlayLayers, {collapsed: true, position:'topleft'}).addTo(map);
        
        var popup = L.popup();

        <?php
          if (isset($_SESSION['admin'])) {
        ?>

          function onMapClick(e) {

              var form = '<form class="row" id="inputform" enctype="multipart/form-data" class="well" style="width:300px;">'+
                          '<label><strong>Event:</strong> <i>event name</i></label>'+
                          '<input type="text" class="small-3 columns" placeholder="Required" id="name" name="name" />'+
                          '<label><strong>Description:</strong></label>'+
                          '<input type="text" class="small-3 columns" placeholder="Optional" id="description" name="description" />'+
                          '<label><strong>Date:</strong> </label>'+
                          '<input id="eventCalendar" type="text"/>'+
                          '<input style="display: none;" type="text" id="lat" name="lat" value="'+ e.latlng.lat.toFixed(6)+'" />'+
                          '<input style="display: none;" type="text" id="lng" name="lng" value="'+ e.latlng.lng.toFixed(6)+'" /><br><br>'+
                          '<div class="row">'+
                            '<div class="small-6 columns center"><button type="button" class="btn small" onclick="insertUser()">Submit</button></div>'+
                          '</div>'+
                          '</form>'

            popup
              .setLatLng(e.latlng)
              .setContent(form)
              .openOn(map);

            var marker = new L.marker(e.latlng).addTo(map);

          }

        <?php
          } else {
        ?>
          function onMapClick(e) {

            // var form = '<form class="row" id="inputform" enctype="multipart/form-data" class="well">'+
            //           '<h4>Login first please</h4>'+
            //           '<label><strong>Username:</strong><input type="text" id="username" name="username" placeholder="DB Username" /></label>'+
            //           '<label><strong>Password:</strong><input type="password" id="password" name="password" placeholder="DB Password" /></label>'+
            //           '<div class="row">'+
            //             '<div class="small-6 small-push-2 columns center"><button type="button" class="btn tiny round" onclick="loginUser()">Submit</button></div>'+
            //           '</div>'+
            //           '</form>';

            $('#myModal2').foundation('reveal', 'open');

            
          }

        <?php 
          }
        ?>

        map.on('contextmenu', onMapClick);
        // start pulling in markers from json

        var markers = L.markerClusterGroup();

        var markerList = [];

        for (var i = 0; i < myItems.length; i++) {
          var a = myItems[i];
          var name = a[2]
          var description = a[3];
          var marker = L.marker(L.latLng(a[0], a[1]), { description: description });
          marker.bindPopup(
            "Submitter: "+name+
            "<br>"+
            "Description: "+description);
          markerList.push(marker);
        }

        markers.addLayers(markerList);
        map.addLayer(markers);


        // Logged in submission
        function loginUser() {
          $("loading-mask").show();
          $("loading").show();
          var username = $("#username").val();
          var password = $("#password").val();
          if (username.length == 0) {
            alert("Username is required!");
            return false;
          }
          if (password.length == 0) {
            alert("Password is required!");
            return false;
          }
          var dataString = 'username='+ username + '&password=' + password;
          //console.log
          $.ajax({
            type: "POST",
            url: "log.php",
            data: dataString,
            success: function() {
              $('#successModal').foundation('reveal', 'open');
            }
          });
          return false;
        }

        // Form submission

        function insertUser() {
          $("#loading-mask").show();
          $("#loading").show();
          var name = $("#name").val();
          var email = $("#email").val();
          var description = $("#description").val();
          var lat = $("#lat").val();
          var lng = $("#lng").val();
          if (name.length == 0) {
            alert("Name is required!");
            return false;
          }
          if (email.length == 0) {
            alert("Email is required!");
            return false;
          }
          var dataString = 'name='+ name + '&email=' + email + '&description=' + description + '&lat=' + lat + '&lng=' + lng;
          //console.log(dataString);
          $.ajax({
            type: "POST",
            url: "insert.php",
            data: dataString,
            success: function() {
              $('#myModal').foundation('reveal', 'open');
            }
          });
          return false;

        }
      </script>
    </div>
  </div>  
<?php
  include('footer.php');
?>