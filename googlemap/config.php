
<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_passwd = '538123';
	$db_name = 'test';
	$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);
	if($conn) 
		echo "DB connection   ";
	else
		echo "DB connection failed"; 

	$result=mysqli_query($conn,"select address from dept where name=0");

	$row=mysqli_fetch_assoc($result);
	echo $row["address"];
	
?>