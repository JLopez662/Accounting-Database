<?php
	include 'dbh.php';

	if(isset($_POST['submit']))
	{
        $eid =  mysqli_real_escape_string($conn,$_POST['EID']);
		$first =  mysqli_real_escape_string($conn,$_POST['FirstName']);
		$last = mysqli_real_escape_string($conn,$_POST['LastName']);
		$user = mysqli_real_escape_string($conn,$_POST['User']);
		$pass = mysqli_real_escape_string($conn, $_POST['Pass']);

	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

    $sql = "INSERT INTO empleados (EID, FirstName, LastName, User, Pass) VALUES ('$eid', '$first', '$last', '$user', '$pass');";


	mysqli_query($conn, $sql);


	header("Location: index.php?signup=success");