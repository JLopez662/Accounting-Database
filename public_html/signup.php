<?php
	include 'dbh.php';
	include 'employee.php';

	if(isset($_POST['submit']))
	{

		$id =  mysqli_real_escape_string($conn,$_POST['ID']);
		$name = mysqli_real_escape_string($conn,$_POST['Nombre']);
		$comercial = mysqli_real_escape_string($conn,$_POST['NombreComercial']);
		$type = mysqli_real_escape_string($conn, $_POST['Tipo']);
		$patronal = mysqli_real_escape_string($conn,$_POST['Patronal']);
		$ssn = mysqli_real_escape_string($conn,$_POST['SSN']);
		$inc =  mysqli_real_escape_string($conn, $_POST['Incorporacion']);
		$ops = mysqli_real_escape_string($conn, $_POST['Operaciones']);
		$birth = mysqli_real_escape_string($conn,$_POST['Nacimiento']);
		$naics = mysqli_real_escape_string($conn,$_POST['NAICS']);
		$contact =  mysqli_real_escape_string($conn,$_POST['Contacto']);
		$phone =  mysqli_real_escape_string($conn,$_POST['Telefono']);
		$cel =  mysqli_real_escape_string($conn,$_POST['Celular']);
		$dirfisica = mysqli_real_escape_string($conn,$_POST['DirFisica']);
		$dirpostal = mysqli_real_escape_string($conn,$_POST['DirPostal']);
		$email =  mysqli_real_escape_string($conn,$_POST['Email']);
		$email2 =  mysqli_real_escape_string($conn,$_POST['Email2']);

		#$ein =  mysqli_real_escape_string($conn,$_POST['EIN']);
		$estatal =  mysqli_real_escape_string($conn,$_POST['Estatal']);
		$poliza =  mysqli_real_escape_string($conn,$_POST['Poliza']);
		$regcomercio =  mysqli_real_escape_string($conn,$_POST['RegComerciante']);
		$vencimiento =  mysqli_real_escape_string($conn,$_POST['Vencimiento']);
		$choferil =  mysqli_real_escape_string($conn,$_POST['Choferil']);
		$deptEstado =  mysqli_real_escape_string($conn,$_POST['DeptEstado']);

		$owner = mysqli_real_escape_string($conn,$_POST['Accionista']);
		$cargo =  mysqli_real_escape_string($conn,$_POST['Cargo']);
		$licconducir = mysqli_real_escape_string($conn,$_POST['LicConducir']);
		#$dirfisica = mysqli_real_escape_string($conn, $_POST['DirFisica']);
		#$dirpostal = mysqli_real_escape_string($conn,$_POST['DirPostal']);
		$employee = $_SESSION['FN'];

		$contract = mysqli_real_escape_string($conn,$_POST['Contrato']);
		$factura = mysqli_real_escape_string($conn,$_POST['Facturacion']);
		$staff = mysqli_real_escape_string($conn,$_POST['Staff']);
		$staffDate = mysqli_real_escape_string($conn,$_POST['StaffDate']);

		$bank = mysqli_real_escape_string($conn,$_POST['Banco']);
		$card = mysqli_real_escape_string($conn,$_POST['Tarjeta']);
		$other = mysqli_real_escape_string($conn,$_POST['Otros']);

	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

	$sql1 = "INSERT INTO Individuo (SSN) VALUES ('$ssn');";
	$sql2 = "INSERT INTO Industria (NAICS) VALUES ('$naics');"; 
	$sql3 = "INSERT INTO Registro (ID) VALUES ('$id');";

	$sql4 = "INSERT INTO Contributivos (Patronal, Estatal, Poliza, RegComerciante, Vencimiento, Choferil, DeptEstado, eid) VALUES ('$patronal', '$estatal', '$poliza', '$regcomercio', '$vencimiento', '$choferil', '$deptEstado', '$employee');";

	$sql5 = "INSERT INTO Sociedad (SSN, Patronal, Estatal, Poliza, RegComerciante, Vencimiento, Choferil, DeptEstado) VALUES ('$ssn', '$patronal', '$estatal', '$poliza', '$regcomercio', '$vencimiento', '$choferil', '$deptEstado');";

	$sql6 = "INSERT INTO Identificacion (Cargo, LicConducir, DirFisica, DirPostal) VALUES ('$cargo','$licconducir','$dirfisica','$dirpostal');";

	$sql7 = "INSERT INTO Individual (SSN, Cargo, LicConducir, DirFisica, DirPostal) VALUES ('$ssn', '$cargo','$licconducir','$dirfisica','$dirpostal');";

	$sql8 = "INSERT INTO Demograficos (ID, Nombre, Tipo, Incorporacion, Nacimiento, NAICS, Contacto, Telefono, Email) VALUES ('$id', '$name', '$type', '$inc','$birth', '$naics', '$contact', '$phone', '$email');";

	$sql9 = "INSERT INTO datosclientes (ID, Nombre, NombreComercial, Tipo, Patronal, SSN, Incorporacion, Operaciones, Nacimiento, NAICS, Contacto, Telefono, Celular, 
	Email, Email2, Estatal, Poliza, RegComerciante, Vencimiento, Choferil, DeptEstado, Accionista, Cargo, LicConducir, eid, DirFisica, DirPostal,
	Contrato, Facturacion, Staff, StaffDate, Banco, Tarjeta, Otros) 
	VALUES ('$id', '$name', '$comercial', '$type', '$patronal', '$ssn', '$inc', '$ops', '$birth', '$naics', '$contact', '$phone', '$cel', 
	'$email', '$email2', '$estatal', '$poliza', '$regcomercio', '$vencimiento', '$choferil', '$deptEstado','$cargo', '$owner',
	'$licconducir', '$employee', '$dirfisica','$dirpostal', '$contract', '$factura', '$staff', '$staffDate', '$bank', '$card', '$other' );";


	mysqli_query($conn, $sql1);
	mysqli_query($conn, $sql2);
	mysqli_query($conn, $sql3);
	mysqli_query($conn, $sql4);
	mysqli_query($conn, $sql5);
	mysqli_query($conn, $sql6);
	mysqli_query($conn, $sql7);
	mysqli_query($conn, $sql8);
	mysqli_query($conn, $sql9);

	header("Location: index2.php?signup=success");