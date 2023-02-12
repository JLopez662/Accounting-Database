<?php
	include 'employee.php';
	include 'dbh.php';

	// check if the submit button is pressed
	if(isset($_POST['submit']))
	{
		// escape special characters and save the data into variables
		$bankclient = mysqli_real_escape_string($conn,$_POST['BankClient']);
		$banco = mysqli_real_escape_string($conn,$_POST['Banco']);
		$numruta = mysqli_real_escape_string($conn, $_POST['NumRuta']);
		$namebank = mysqli_real_escape_string($conn,$_POST['NameBank']);
		$tipocuenta = mysqli_real_escape_string($conn,$_POST['TipoCuenta']);

		$bankclients = mysqli_real_escape_string($conn,$_POST['BankClientS']);
		$bancos = mysqli_real_escape_string($conn,$_POST['BancoS']);
		$numrutas = mysqli_real_escape_string($conn, $_POST['NumRutaS']);
		$namebanks = mysqli_real_escape_string($conn,$_POST['NameBankS']);
		$tipocuentas = mysqli_real_escape_string($conn,$_POST['TipoCuentaS']);

		$namecard =  mysqli_real_escape_string($conn, $_POST['NameCard']);
		$tarjeta = mysqli_real_escape_string($conn, $_POST['Tarjeta']);
		$tipotarjeta = mysqli_real_escape_string($conn,$_POST['TipoTarjeta']);
		$cvv =  mysqli_real_escape_string($conn,$_POST['CVV']);
		$expiracion =  mysqli_real_escape_string($conn,$_POST['Expiracion']);
		$postalbank =  mysqli_real_escape_string($conn,$_POST['PostalBank']);

		$namecards =  mysqli_real_escape_string($conn, $_POST['NameCardS']);
		$tarjetas = mysqli_real_escape_string($conn, $_POST['TarjetaS']);
		$tipotarjetas = mysqli_real_escape_string($conn,$_POST['TipoTarjetaS']);
		$cvvs =  mysqli_real_escape_string($conn,$_POST['CVVS']);
		$expiracions =  mysqli_real_escape_string($conn,$_POST['ExpiracionS']);
		$postalbanks =  mysqli_real_escape_string($conn,$_POST['PostalBankS']);
		$tid = $_SESSION['TID'];
		$cid = $_SESSION['FN'];
		$mid = "";
		$name = $_SESSION['NL'];
		$comercial = $_SESSION['NC'];
	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

	// insert data into the "pago" table
    $sqlA = "INSERT INTO pago (ID, Nombre, NombreComercial, BankClient, Banco, NumRuta, NameBank, TipoCuenta,
	BankClientS, BancoS, NumRutaS, NameBankS, TipoCuentaS,
	NameCard, Tarjeta, TipoTarjeta, CVV, Expiracion,PostalBank,
	NameCardS, TarjetaS, TipoTarjetaS, CVVS, ExpiracionS,PostalBankS,
	CID, MID ) 
	VALUES ('$tid', '$name', '$comercial', '$bankclient', '$banco', '$numruta', '$namebank', '$tipocuenta',
	'$bankclients', '$bancos', '$numrutas', '$namebanks', '$tipocuentas',
	'$namecard', '$tarjeta', '$tipotarjeta', '$cvv', '$expiracion','$postalbank',
	'$namecards', '$tarjetas', '$tipotarjetas', '$cvvs', '$expiracions','$postalbanks',
	'$cid', '$mid');";

	// execute the SQL statements
	mysqli_query($conn, $sqlA);

	// redirect to the "ingreso3.php" page with a success message
	header("Location: ingreso4.php?signup=success");


	