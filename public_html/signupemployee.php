<?php

	//include the dbh.php file to connect to the database
	include 'dbh.php';

	//check if the submit button was pressed
	if(isset($_POST['submit']))
	{
			
		//escape special characters from the input data to prevent SQL injection
        $eid =  mysqli_real_escape_string($conn,$_POST['EID']);
		$first =  mysqli_real_escape_string($conn,$_POST['FirstName']);
		$last = mysqli_real_escape_string($conn,$_POST['LastName']);
		$user = mysqli_real_escape_string($conn,$_POST['User']);
		$pass = mysqli_real_escape_string($conn, $_POST['Pass']);

	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

		
	//prepare the INSERT statement to insert the data into the empleados table
    $sql = "INSERT INTO empleados (EID, FirstName, LastName, User, Pass) VALUES ('$eid', '$first', '$last', '$user', '$pass');";

	//execute the query
	mysqli_query($conn, $sql);

	//redirect the user to the index.php page with the query parameter "signup=success"
	header("Location: index.php?signup=success");