<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table >
            <form action="" method="post">
                <tr>
                    <th>consumer no.:</th>
                    <td><select name="cno">
                    <?php
                        include "connect.php";
                        $q="select cno from creg";
                        $result=mysqli_query($conn,$q);
                        if(mysqli_num_rows($result))
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo'<option value='.$row["cno"].'>'.$row["cno"].'</option>';
                            }
                        }
                    ?>
                    </select></td>
                </tr>
                <tr>
                    <th>month:</th>
                    <td><select name="month">
                    <option value="January">JANUARY</option>
                    <option value="February">FEBRUARY</option>
                    <option value="March">MARCH</option>
                    <option value="April">APRIL</option>
                    <option value="May">MAY</option>
                    <option value="June">JUNE</option>
                    <option value="July">JULY</option>
                    <option value="August">AUGUST</option>
                    <option value="September">SEPTEMBER</option>
                    <option value="October">OCTOBER</option>
                    <option value="November">NOVEMBER</option>
                    <option value="December">DECEMBER</option>
                    </select></td>
                </tr>
                <TR>
                    <TH>bill amount:</TH>
                    <td><input type="text" name="amount"></td>
                </TR>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="serach"></td>
                </tr>
            </form>
        </table>
</body>
</html>
<?php
    include "connect.php";
    if(isset($_POST["submit"]))
    {
        $cno=$_POST["cno"];
        $month=$_POST["month"];
        $amount=$_POST["amount"];
        $sql="insert into bill values($cno,'$month','$amount','pending')";
        if(mysqli_query($conn,$sql))
        {
            echo '<script>alert("successfully registered");</script>';
        }

    }
?>