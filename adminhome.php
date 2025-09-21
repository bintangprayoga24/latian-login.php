<?php
session_start();
if(isset($_SESSION["login"])){
  if($_SESSION["login"]=="user"){
    header("location:userhome.php");
  }  
} else {
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="text-align: center;">
<h1>INI HALAMAN ADMIN </h1>
<h3>Selamat datang , admin</h3>

<a href="logout.php">logout<</a>
</body>
</html>