<?php
session_start();
$con = mysqli_connect("localhost","root","","dbaprioriv2");

if(isset($_POST['submit']))
{
$username = $_POST['username'];
   $nama = $_POST['nama'];
   $password = $_POST['password'];
   $level = $_POST['level'];

    $query = "INSERT INTO users (username,nama,level) VALUES ('$username', '$nama', '$password', '$level')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: index.php?msg=New record created successfully");
   } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>