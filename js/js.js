// Start GOOGLE MAP
function initMap() {
  // CALL SERVICE
  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
  // DRAW INITIAL MAP CENTERED ON INDICATED POINT AND ZOOM
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: { lat: 22.701123636900682, lng: 90.35344453394895 },
    mapTypeId: google.maps.MapTypeId.HYBRID,
    mapTypeControl: false,
  });
  directionsDisplay.setMap(map);
  // EXECUTE FUNCTION BY CLICKING SUBMIT BUTTON
  document.getElementById("submit_bfs").addEventListener("click", function () {
    // EXECUTE FUNCTION THAT LOADS ROUTE, SERVICES ARE SENT AS PARAMETERS
    var inicioE = document.getElementById("inicio").value;
    var finalE = document.getElementById("final").value;
    if (
      inicioE != 1 &&
      inicioE != 2 &&
      inicioE != 3 &&
      inicioE != 4 &&
      inicioE != 5 &&
      finalE != 6 &&
      finalE != 7 &&
      finalE != 8 &&
      finalE != 9 &&
      finalE != 10
    ) {
      alert("Could not be reached");
    } else {
      if (inicioE != finalE) {
        var path = bfs(inicioE, finalE);
        console.time("Run function BFS");
        calculateAndDisplayRoute(
          directionsService,
          directionsDisplay,
          inicioE,
          finalE,
          path
        );
        console.timeEnd("Run function BFS");
        document.getElementById("iteration").innerHTML = " ";
      } else {
        alert("You are already in the area!");
      }
    }
  });
  document.getElementById("submit_dfs").addEventListener("click", function () {
    // EXECUTE FUNCTION THAT LOADS ROUTE, SERVICES ARE SENT AS PARAMETERS
    var inicioE = document.getElementById("inicio").value;
    var finalE = document.getElementById("final").value;
    if (
      inicioE != 1 &&
      inicioE != 2 &&
      inicioE != 3 &&
      inicioE != 4 &&
      inicioE != 5 &&
      finalE != 6 &&
      finalE != 7 &&
      finalE != 8 &&
      finalE != 9 &&
      finalE != 10
    ) {
      alert("Could not be reached");
    } else {
      if (inicioE != finalE) {
        var path = dfs(inicioE, finalE);
        console.time("Run function DFS");
        calculateAndDisplayRoute(
          directionsService,
          directionsDisplay,
          inicioE,
          finalE,
          path
        );
        console.timeEnd("Run function DFS");
        document.getElementById("iteration").innerHTML = " ";
      } else {
        alert("You are already in the area!");
      }
    }
  });
}

function calculateAndDisplayRoute(
  directionsService,
  directionsDisplay,
  inicio,
  final,
  path
) {
  // CREATE ARRANGEMENT WITH WAYPOINT (INTERMEDIATE POINTS BETWEEN START AND END OF ROUTE)
  var waypts = [];
  var cont = 0;
  for (var i2 = path.length - 2; i2 >= 1; i2--) {
    var n = path[i2];
    cont = cont + n.edgeCost;
    waypts.push({
      location: { lat: n.lat, lng: n.lng },
      stopover: true,
    });
  }
  var items = [
    [0, 0], //blank
    [22.67016458683337, 90.34844287079471, "Rupatoli"], //Rupatoli
    [22.714519081827728, 90.34860202569887, "Nathullabad"], //Nathullabad
    [22.700716362050905, 90.3698318730559, "Sadar Road"], //Sadar Road
    [22.711683645077287, 90.36093949686234, "Notun Bazar"], //Notun Bazar
    [22.70210408979856, 90.35298867966159, "Choumatha"], //Choumatha
    [
      22.686618951005087,
      90.36137003733413,
      "Sher E Bangla Medical College Hospital",
    ], //Sherebangla
    [22.70844178258688, 90.37042750947853, "Sadar Hospital"], //Sadar Hospital
    [22.695318345342805, 90.36492628151635, "Police Line Hospital"], //Police Line Hospital
    [22.713838704316654, 90.36145179681186, "Nogor Matrishodon"], //Nogor Matrishodon
    [22.69856854253188, 90.3690593968621, "Barishal Zilla School"], //Barishal Zilla School
  ];
  var selector = document.getElementById("inicio");
  var value = selector[selector.selectedIndex].text;

  // TRAVEL MODE: CAN BE CHANGED ACCORDING TO GOOGLE OPTIONS
  directionsService.route(
    {
      origin: { lat: items[inicio][0], lng: items[inicio][1] },
      destination: { lat: items[final][0], lng: items[final][1] },
      travelMode: "DRIVING",
    },
    function (response, status) {
      var result = 0;
      if (status === "OK") {
        // DRAW THE ROUTE ON THE MAP
        directionsDisplay.setDirections(response);
        // SPECIFY ROUTES IN YELLOW BOX
        var route = response.routes[0];
        var summaryPanel = document.getElementById("directions-panel");
        summaryPanel.innerHTML = "";
        for (var i2 = path.length - 2; i2 >= 1; i2--) {
          var n = path[i2];
          cont = cont + n.edgeCost;
          waypts.push({
            location: { lat: n.lat, lng: n.lng },
            stopover: true,
          });
        }
        // For each route, display summary information.
        document.getElementById("city_match").innerHTML = "Route";
        var n = path[route.legs.length];
        summaryPanel.innerHTML +=
          '<div class="style_item"><div class="route_indication" id="city' +
          route.legs.length +
          '">' +
          "Your Current Location&nbsp(A)&nbsp&nbsp&nbsp&nbsp" +
          // items[n.number][2] +
          '</div><div id="position' +
          route.legs.length +
          '"></div></div>';
        for (var i = route.legs.length - 1; i >= 0; i--) {
          var n = path[i];
          summaryPanel.innerHTML +=
            '<div class="style_item"><div class="route_indication" id="city' +
            i +
            '">' +
            items[n.number][2] +
            "&nbsp(B)" +
            '</div><div id="position' +
            i +
            '"></div></div>';
        }
        var datoC = route.legs.length - 1;
        var datoC2 = route.legs.length - 1;
        for (var i = 0; i < route.legs.length; i++) {
          result += parseFloat(route.legs[i].distance.text);
          document.getElementById("position" + datoC--).innerHTML =
            route.legs[i].distance.text;
        }
      } else {
        window.alert("Directions request failed due to " + status);
      }
      document.getElementById("total").innerHTML =
        "Total distance :" + result + " km";
    }
  );
}
