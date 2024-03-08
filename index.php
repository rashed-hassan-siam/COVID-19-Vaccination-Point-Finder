<?php
include_once 'config/connection.config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <title>COVID-19 Vaccination Point Finder</title>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.sound.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet" />
    <!-- <script type="text/javascript" src="../js/sketch.js"></script>
    <script type="text/javascript" src="../js/node.js"></script>
    <script type="text/javascript" src="../js/graph.js"></script>
    <script type="text/javascript" src="../js/js.js"></script> -->
</head>

<body>
    <div class="container_main">
        <div class="title">COVID-19<br>Vaccination Point Finder</div>
        <div id="info_container">
            <div>
                <div class="adminquery">
                    <a class="centerbtn" href="finder.php"><input class="btn_style centerbtn" type="submit"
                            value="Go to Finder" /></a>
                    <br><br><br>
                    <h5 class="title shorten">Are you an admin?</h5>
                    <a class="centerbtn" href="admin/index.php"><input class="btn_style centerbtn" type="submit"
                            value="Update Vaccine" /></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>