<?php
    $conn=mysqli_connect("localhost","root","","sample");
    if(!$conn)
    {
      die("connection failed".mysqli_connect_error());
    }
?>