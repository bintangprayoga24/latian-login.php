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
<body>
<h1>INI HALAMAN ADMIN </h1>
<a href="logout.php">logout<</a>
</body>
</html>