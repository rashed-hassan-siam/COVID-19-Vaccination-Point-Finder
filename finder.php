<?php
include_once 'config/connection.config.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <title>COVID-19 Vaccination Point Finder</title>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.sound.min.js">
  </script>
  <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet" />
  <script type="text/javascript" src="js/sketch.js"></script>
  <script type="text/javascript" src="js/node.js"></script>
  <script type="text/javascript" src="js/graph.js"></script>
  <script type="text/javascript" src="js/js.js"></script>
</head>

<body>
  <div class="container_main">
    <!-- <div class="title">COVID-19 Vaccination Point Finder</div> -->
    <div id="info_container">
      <div>
        <select id="inicio">
          <option value="0">Select your location</option>
          <option value="1">Rupatoli</option>
          <option value="2">Nathullabad</option>
          <option value="3">Sadar Road</option>
          <option value="4">Notun Bazar</option>
          <option value="5">Choumatha</option>
        </select>
        <br>
        <select id="final">
          <option value="0">Select Vaccination Point(Vaccine)</option>
          <?php
          $select = mysqli_query($conn, "SELECT * FROM vaccines");  
          if (mysqli_num_rows($select)) {
            while ($result = mysqli_fetch_assoc($select)) { ?>
          <option value="<?php echo $result['value']; ?>"><?php echo $result['center']; ?>
            (<?php echo $result['vaccine']; ?>)</option>
          <?php  }
          }      
          ?>
        </select>
        <!-- <br> -->
        <input class="btn_style leftbtn" type="submit" id="submit_bfs" value="Get Direction" />
        <!-- <input class="btn_style leftbtn" type="submit" id="submit_dfs" value="Get Directions (DFS)" /> -->
      </div>
    </div>
    <div id="map"></div>
    <div id="calc">

      <div id="city_match"></div>
      <br />
      <div id="directions-panel"></div>
      <!-- <br /> -->
      <!-- <div id="total"></div> -->
    </div>
    <!-- <div id="iteration"></div>
    <div id="nodes"></div> -->
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API&callback=initMap">
    </script>
  </div>
</body>

</html>
