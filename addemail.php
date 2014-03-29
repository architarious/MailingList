<?php
	
	//Creating database connection for basic localhost setup
	$dbc = mysqli_connect('localhost', 'root', '', 'mailing_list') 
		or die('Error connecting to MySQL Server');

	//declair variables and pull them from the addemail.html form
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];

	//query for inputing form data into table
	$query = "INSERT INTO email_list(first_name, last_name, email)" .
		"VALUES ('$first_name', '$last_name', '$email')";

	//connect and run query
	mysqli_query($dbc, $query)
		or die('Error querying database');

	echo 'You are on the list';

	//close connection
	mysqli_close($dbc);

?>