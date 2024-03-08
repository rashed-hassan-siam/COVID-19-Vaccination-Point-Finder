<?php
session_start();

include_once '../config/connection.config.php';

if(!isset($_SESSION['email'])) { ?>
<script>
    location.replace('login.php');
</script>
<!-- header('location: login.php'); -->
<?php }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <title>Admin Panel</title>

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
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $center = $_POST['center'];
        $vaccine = ucfirst($_POST['vaccine']);
        if ($center == '0' || $vaccine == '0') { ?>
    <script>
        alert('Invalid input');
        location.replace('#');
    </script>
    <?php    } else {
        $update = mysqli_query($conn, "UPDATE vaccines SET vaccine='$vaccine' WHERE value='$center'");
        if ($update) { ?>
    <script>
        alert('Vaccine updated successfully');
        location.replace('#');
    </script>
    <?php    }
    }
    }
    ?>
    <div class="container_main">
        <div class="row">

            <!-- <div class="column" style="text-align:center; font-size:30px;">Update Current Vaccine</div> -->
            <div class="title short">Update Current Vaccine</div>
            <div class="column" style="float: right;">
                <a class="centerbtn" href="logout.php"><input class="btn_style centerbtn red" type="submit"
                        value="Logout" /></a>
            </div>

        </div>
        <div id="info_container" class="padded">
            <div>
                <form action="#" method="POST">
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM vaccines");
                    ?>
                    <select id="inicio" class="elongated" name="center">
                        <option value="0">Select Vaccination Point</option>
                        <?php
                        if (mysqli_num_rows($select)) {
                            while ($result = mysqli_fetch_assoc($select)) { ?>
                        <option value="<?php echo $result['value']; ?>"><?php echo $result['center']; ?></option>
                        <?php    }
                        }
                        ?>
                    </select><br>
                    <select id="final" class="elongated" name="vaccine">
                        <option value="0">Select Current Vaccine</option>
                        <option value="sinopharm">Sinopharm</option>
                        <option value="moderna">Moderna</option>
                        <option value="pfizer">Pfizer</option>
                        <option value="janssen">Janssen</option>
                        <option value="sinovac">Sinovac</option>
                    </select><br>
                    <input class="btn_style centerbtn" type="submit" value="Update" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>