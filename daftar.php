<?php
session_start();

if(isset($_SESSION["login"])){
    if($_SESSION["login"]=="user"){
        header("location:userhome.php");
    }
    
    if($_SESSION["login"]=="admin"){
        header("location:adminhome.php");
    }
 }

$host="localhost";
$user="root";
$password="";
$db="user";

$conn=mysqli_connect($host,$user,$password,$db);

if(!$conn){
    die("connection error"); 
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    // cek apakah username sudah ada
    $check = mysqli_query($conn,"SELECT * FROM login1 WHERE username='$username'");
    if(mysqli_num_rows($check) > 0){
        echo "<p style='color:red;'>⚠️ Username sudah digunakan!</p>";
    }else{
        $query = "INSERT INTO login1 (username, password, usertype) VALUES ('$username','$password','$usertype')";
        if(mysqli_query($conn,$query)){
            echo "<p style='color:green;'>✅ Registrasi berhasil, silakan <a href='login.php'>Login</a></p>";
        }else{
            echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
</head>
<body>
<center>
    <h1>Form Pendaftaran</h1>
    <div style="background-color: grey; width: 500px; padding: 20px;">
        <form action="" method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <br>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <br>
            <div>
                <label>Level</label>
                <select name="usertype" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <br>
            <div>
                <input type="submit" value="Daftar">
                <a href="login.php">Kembali ke Login</a>
            </div>
        </form>
    </div>
</center>
</body>
</html>
