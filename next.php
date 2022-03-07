<?php

	include "sconn.php";
	if(isset($_POST["submit"]))
	{
		$name=$_POST["a"];
		$age=$_POST["b"];
		$pass=$_POST["c"];
	
		$sql="insert into data values('$name',$age,'$pass')";
    	$s= mysqli_query($conn,$sql);
		if($s)
		{
			
			echo "Insrted";

		}
		else
		{
       
			echo mysqli_error($conn);	
		}

	}

	$sql="select * from data";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result))
	{
 		echo '<table border="1"><tr><th>Name</th>
			<th>Age</th>
			<th>password</th></tr>';
	}
	while($row=mysqli_fetch_assoc($result))
	{
	echo '<tr><td>'.$row["name"].'</td><td>'.$row["age"].'</td><td>'.$row["password"].'</td></tr>';
	}
?>

		

