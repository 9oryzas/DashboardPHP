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
        $hash_password =hash("sha256",$password);
    
        $sql = "INSERT INTO users (username,password) VALUES ('$username', '$hash_password')";
    
        try{

            if($db->query($sql)){
                $pesan_masuk="Daftar berhasil silahkan masuk";    
            }else{
                $pesan_masuk="Daftar gagal, silahkan coba lagi";    
            }
        }catch(mysqli_sql_exception $e){
            $pesan_masuk="Nama Sudah Digunakan,gunakan nama yg lain";    
        }
        $db ->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register PHP</title>
    <style>
        body{
            background-color: #0A4D68;
            color: white;
            font-family: poppins;
            text-align: center;
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

<h1>Register</h1>
<h5><?= $pesan_masuk ?></h5>

<form action="register.php" method="post">
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