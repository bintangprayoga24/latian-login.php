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

if(!$conn)
{
    die("connection error"); 
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $username=$_POST["username"];
   $password=$_POST["password"]; 

   $result=mysqli_query($conn,"select * from login1 where username = '$username' and password = '$password'");

   $row=mysqli_fetch_array($result);

   if($row["usertype"]=="user") 
    {     
        $_SESSION["login"]=$row["usertype"];
        header("location:userhome.php"); 
    }
   elseif($row["usertype"]=="admin")
    {   
            $_SESSION["login"]=$row["usertype"];
            header("location:adminhome.php");  
    }
   else
    {
        echo "username or password incorrect";   
    }
}?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
 
<center>
<h1>Login Form</h1>
    <br><br><br>
    <div style="background-color: grey; width: 500px;">
    <br><br>


    <form action="#" method="POST">
        <div>
            <label>username</label>
            <input type="text" name="username" required>
        </div>
        <br><br>

        <div>
            <label>password</label>
            <input type="password" name="password" required>
        </div>
        <br><br>
        <div>
            <input type="submit" value="LOGIN">
            <a href="daftar.php">Daftar</a>
        </div>
    </form>

<br><br>
</div>
</center>

</body>
</html>