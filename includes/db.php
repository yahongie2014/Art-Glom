<?php  
	$conn = mysql_connect('localhost', 'root', '1210');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("artglom", $conn);
?>

