<?php 
    include "service/database.php";
    session_start();

    $pesan_masuk="";    

    if(isset($_SESSION["is_login"])){
        header("location:dashboard.php"); 
    }

    if (isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];  

        $hash_password=hash("sha256",$password);

        $sql = "SELECT * FROM users where username= '$username' and password='$hash_password'";

        $result = $db->query($sql);

        if ($result -> num_rows > 0){
            $data = $result -> fetch_assoc();
            $_SESSION ["username"]= $data["username"];
            $_SESSION ["is_login"]= true;

            
            header("location:dashboard.php");
        }else{
            $pesan_masuk="data tidak ditemukan"; 
        }
        $db ->close();
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP</title>
    <style>
        body{
            background-color: #0A4D68;
            color: white;
            font-family: poppins;
            text-align: center;
            h4{
                color: red;
            }
        }
        input{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        form{
            border: 1px solid white;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php include "layout/header.html"?>

<h1>Login</h1>

<h4><?= $pesan_masuk ?></h4>

<form action="login.php" method="post">
    <label for="nama">Nama :</label>
    <input type="username" name="username" id="nama" placeholder="Username" required>
    <br>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password" placeholder="password" required>
    <br>
    <button type="submit" name="login" >Login</button>
</form>

<?php include "layout/footer.html"?>


</body>
</html>