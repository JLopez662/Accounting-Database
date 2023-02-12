<?php
	include 'employee.php';
	include 'dbh.php';
	
	// check if the submit button is pressed
	if(isset($_POST['submit']))
	{		
		// escape special characters and save the data into variables
		$estatal = mysqli_real_escape_string($conn,$_POST['Estatal']);
		$poliza = mysqli_real_escape_string($conn,$_POST['Poliza']);
		$regcomerciante = mysqli_real_escape_string($conn, $_POST['RegComerciante']);
		$vencimiento = mysqli_real_escape_string($conn,$_POST['Vencimiento']);
		$choferil = mysqli_real_escape_string($conn,$_POST['Choferil']);
		$deptestado =  mysqli_real_escape_string($conn, $_POST['DeptEstado']);

		$accionista = mysqli_real_escape_string($conn, $_POST['Accionista']);
		$ssna = mysqli_real_escape_string($conn, $_POST['SSNA']);
		$cargo = mysqli_real_escape_string($conn,$_POST['Cargo']);
		$licconducir =  mysqli_real_escape_string($conn,$_POST['LicConducir']);
		$nacimiento =  mysqli_real_escape_string($conn,$_POST['Nacimiento']);

		$contrato =  mysqli_real_escape_string($conn,$_POST['Contrato']);
		$facturacion = mysqli_real_escape_string($conn,$_POST['Facturacion']);
		$facturacionbase = mysqli_real_escape_string($conn,$_POST['FacturacionBase']);
		$ivu =  mysqli_real_escape_string($conn,$_POST['IVU']);
		$staff =  mysqli_real_escape_string($conn,$_POST['Staff']);
		$staffdate =  mysqli_real_escape_string($conn,$_POST['StaffDate']);
		$tid = $_SESSION['TID'];
		$cid = $_SESSION['FN'];
		$mid = "";
		$name = $_SESSION['NL'];
		$comercial = $_SESSION['NC'];

	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

	// insert data into the "contributivos" table
    $sql5 = "INSERT INTO contributivos (ID, Nombre, NombreComercial, Estatal, Poliza, RegComerciante, Vencimiento, Choferil, 
    DeptEstado, CID, MID) 
	VALUES ('$tid', '$name', '$comercial', '$estatal', '$poliza', '$regcomerciante', '$vencimiento', '$choferil',
     '$deptestado', '$cid', '$mid');";

	// insert data into the "identificacion" table
    $sql7 = "INSERT INTO identificacion (ID, Nombre, NombreComercial, Accionista, SSNA, Cargo, LicConducir, Nacimiento, CID, MID ) 
    VALUES ('$tid', '$name', '$comercial', '$accionista', '$ssna', '$cargo', '$licconducir', '$nacimiento', '$cid', '$mid');";

	// insert data into the "administrativo" table
    $sql8 = "INSERT INTO administrativo (ID, Nombre, NombreComercial, Contrato, Facturacion, FacturacionBase, 
	IVU, Staff, StaffDate, CID, MID) 
    VALUES ('$tid', '$name', '$comercial', '$contrato', '$facturacion', '$facturacionbase', '$ivu', '$staff', 
	'$staffdate','$cid', '$mid');";

	// execute the SQL statements
	mysqli_query($conn, $sql5);;
    mysqli_query($conn, $sql7);
    mysqli_query($conn, $sql8);

	// redirect to the "ingreso3.php" page with a success message
	header("Location: ingreso3.php?signup=success");


	