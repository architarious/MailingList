<?php
	//connect to database
	$dbc = mysqli_connect('localhost', 'root', '', 'mailing_list')
		or die('error connecting to database');

	//retrieve info from form, 
	if(isset($_POST['email'])){ $email = $_POST['email'];} else die('Error retrieving info from form');

	//define query actions 
	$query = "DELETE FROM email_list WHERE email ='$email'";

	//query database
	mysqli_query($dbc, $query)
		or die('error querying database');

	echo 'Customer removed: ' . $email;

	//close connections
	mysqli_close($dbc);
?>