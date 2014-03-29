<?php
	$from ="coletrainwvu@gmail.com";


	
	if(isset($_POST['subject'])){ $subject = $_POST['subject'] or die('No value in Subject field'); }
	if(isset($_POST['text'])){ $text = $_POST['text'] or die('No value in Message/text field'); }


	$dbc = mysqli_connect('localhost', 'root', '', 'mailing_list')
		or die('Error connecting to MySQL server.');

	$query = "SELECT * FROM email_list";
	$result = mysqli_query ($dbc, $query)
		or die('Error querying database');

	while($row = mysqli_fetch_array($result)){
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$msg = "Dear $first_name $last_name, \n $text";

		$to = $row['email'];

		mail($to, $subject, $msg, 'From:' . $from);

		echo 'Email sent to:' . $to . '<br/>';
	}

	mysqli_close($dbc);

?>