<?php 
    
    session_start();
    if (isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header("location:register.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{
            background-color: #332941;
            color: #F8E559;
            font-family: poppins;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("layout/header.html"); ?>
 
    <h1>Selamat datang di Dashboard </h1>
    <h1>~ <?=  $_SESSION["username"]?> ~</h1>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout" >logout</button>
    </form>
    
    <?php include("layout/footer.html"); ?>
</body>
</html>