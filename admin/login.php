<?php
include_once '../config/connection.config.php';
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <style>
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    div {
      margin: auto;
      width: 30%;
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    @media (max-width: 500px) {
      div {
        width: 80%;
      }
    }
  </style>

</head>

<body>
  <br>
  <br>
  <div>

    <form action="" method="POST">
      <h2 style="text-align: center;">Sign In</h2>
      <input type="text" placeholder="Email Address" name="email" required=""> <br><br>
      <input type="password" placeholder="Enter Password" name="password" required=""> <br><br>
      <input type="submit" value="Login" name="submit">

      <br>
    </form>

  </div>


  <?php


    if(isset($_POST['submit']))
    {
        $a = 0;
        $sql = "SELECT * FROM `admin` WHERE `email`='$_POST[email]' && `password`='$_POST[password]';";

        $result = $conn->query($sql);

        $a = mysqli_num_rows($result);

        if($a==0)
        {
            ?>
  <script type="text/javascript">
    alert("Email & Password Doesn't match!!!");
  </script>
  <?php
        }
        else
        {
            $fetchResult = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $fetchResult['email'];
            header('location:index.php');
        }

    }

?>


</body>

</html>