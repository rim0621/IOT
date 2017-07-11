
<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_passwd = '***';
	$db_name = 'test';
	$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);
	if($conn) 
		echo "DB connection   ";
	else
		echo "DB connection failed"; 

	$result=mysqli_query($conn,"select address from dept");


	while ($row = mysqli_fetch_array($result)) { 
    $out[]=$row["address"];
}
	 print_r ($out);

?>