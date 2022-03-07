<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        consumer no.<input type="text" name="cno">
        consumer name .<input type="text" name="cname">
        address<input type="text" name="address">
        phone no.<input type="text" name="phn"> 
        <input type="submit" name="submit">
    </form>
    
</body>
</html>
<?php
    include "connect.php";
    if(isset($_POST["submit"]))
    {
        $cno=$_POST["cno"];
        $cname=$_POST["cname"];
        $address=$_POST["address"];
        $phn=$_POST["phn"];
        $sql="insert into creg values($cno,'$cname','$address',$phn)";
        if(mysqli_query($conn,$sql))
        {
            echo '<script>alert("successfully registered");</script>';
        }

    }
?>