<?php
	include 'employee.php';
	include 'dbh.php';

	if(isset($_POST['submit']))
	{
		$usersuri = mysqli_real_escape_string($conn,$_POST['UserSuri']);
		$passsuri = mysqli_real_escape_string($conn,$_POST['PassSuri']);

		$usereftps =  mysqli_real_escape_string($conn,$_POST['UserEftps']);
		$passeftps =  mysqli_real_escape_string($conn,$_POST['PassEftps']);
		$pin =  mysqli_real_escape_string($conn,$_POST['PIN']);

        $usercfse = mysqli_real_escape_string($conn,$_POST['UserCFSE']);
		$passcfse = mysqli_real_escape_string($conn,$_POST['PassCFSE']);

		$userdept =  mysqli_real_escape_string($conn,$_POST['UserDept']);
		$passdept =  mysqli_real_escape_string($conn,$_POST['PassDept']);

		$usercofim =  mysqli_real_escape_string($conn,$_POST['UserCofim']);
		$passcofim =  mysqli_real_escape_string($conn,$_POST['PassCofim']);

		$usermunicipio =  mysqli_real_escape_string($conn,$_POST['UserMunicipio']);
		$passmunicipio =  mysqli_real_escape_string($conn,$_POST['PassMunicipio']);

        $tid = $_SESSION['TID'];
		$cid = $_SESSION['FN'];
		$mid = "";
		$name = $_SESSION['NL'];
		$comercial = $_SESSION['NC'];
	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

    $sql11 = "INSERT INTO confidencial (ID, Nombre, NombreComercial, UserSuri, PassSuri, UserEftps, 
    PassEftps, PIN, UserCFSE, PassCFSE, UserDept, PassDept, UserCofim, PassCofim, UserMunicipio, PassMunicipio, CID, MID ) 
	VALUES ('$tid', '$name', '$comercial',
    '$usersuri', '$passsuri', '$usereftps', '$passeftps', '$pin',
    '$usercfse', '$passcfse', '$userdept', '$passdept',
	'$usercofim', '$passcofim', '$usermunicipio', '$passmunicipio',
	'$cid', '$mid');";

	mysqli_query($conn, $sql11);

	header("Location: index2.php?signup=success");


	