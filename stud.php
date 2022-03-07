<?php
    include "connect.php";
    $flag=0;
    if(isset($_POST["submit"]))
    {
        $name=$_POST["name"];
        $age=$_POST["age"];
        $gender=$_POST["gender"];
        $edu=$_POST["edu"];
        $uname=$_POST["uname"];
        $pswd=$_POST["pswd"];
        $sq="select uname from stud";
        $sql="insert into stud values('$name',$age,'$gender','$edu','$uname','$pswd')";
        $result=mysqli_query($conn,$sq);
        if(mysqli_num_rows($result))
        {
           while($row=mysqli_fetch_assoc($result))
           {
               if($row["uname"]==$uname)
                    $flag=1;
           }
        }
        if($flag==0)
        {
            if(mysqli_query($conn,$sql))
            {
                echo '<script>alert("successfully registered");</script>';
            }
        }
        else{
            echo '<script>alert("username already exists");</script>';
        }
    }
?>
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
        <h1>REGISTRATION</h1>
        <table border="1">
            <tr>
            <th>NAME:</th>
            <td><input type="text" name="name"></input></td>
            </tr>
            <tr>
            <th>AGE:</th>
            <td><input type="number" name="age"></input></td>
            </tr>
            <tr>
            <th>GENDER:</th>
            <td><input type="text" name="gender"></input></td>
            </tr>
            <tr>
            <th>EDUCATION:</th>
            <td><input type="text" name="edu"></input></td>
            </tr>
            <tr>
            <th>USERNAME:</th>
            <td><input type="text" name="uname"></input></td>
            </tr>
            <tr>
            <th>PASSWORD:</th>
            <td><input type="password" name="pswd"></input></td>
            </tr>
            <tr>
            <th></th>
            <td><input type="submit" name="submit"></input></td>
            </tr>
        </table>
    </form>
</body>
</html>