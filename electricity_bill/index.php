<html>
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
                    <td></td>
                    <td><input type="submit" name="search" value="serach"></td>
                </tr>
            </form>
        </table>
        <br>
        <div style="float:right">
            <table>
                <caption>LOGIN</caption>
                <form action="home.php" method="post">
                    <tr>
                        <th>Username:</th>
                        <td><input type="text" name="uname"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="pswd"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit"></td>
                    </tr>
                </form>
            </table>
        </div>
        <br>
        <?php
            include "connect.php";
            if(isset($_POST["search"]))
            {
                echo '<table border="1"> 
                <tr>
                    <th>consumer no</th>
                    <th>consumer name</th>
                    <th>month</th>
                    <th>amount</th>
                    <th></th>
                </tr>
                <tr>';
                $cno=$_POST["cno"];
                $sql="select creg.cno,creg.cname,bill.month,bill.amount from bill join creg on creg.cno=bill.cno  where bill.cno=$cno ";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result))
                {
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo '
                    <td>'.$row["cno"].'</td>
                    <td>'.$row["cname"].'</td>
                    <td>'.$row["month"].'</td>
                    <td>'.$row["amount"].'</td>
                    <th><input type="submit" value="pay" name="pay"> </th>';
                    }
                }
                echo '</tr>
                </table>';
            }
            if(isset($_POST["pay"]))
            {
                $cno=$_POST["cno"];
                $sql="delete from bill where cno=123 ";
                if(mysqli_query($conn,$sql))
                {
                    echo '<script>alert("payment successfull");</script>';
                }
                else{
                    echo mysqli_error( $conn);
                }
            }
        ?>  
    </body>
</html>

           
