<?php
	include 'employee.php';
	include 'dbh.php';
	
	if(isset($_POST['submit']))
	{
		
        $id =  mysqli_real_escape_string($conn,$_POST['ID']);
        $name = mysqli_real_escape_string($conn,$_POST['Nombre']);
		$_SESSION['NL'] = $name;
		$comercial = mysqli_real_escape_string($conn,$_POST['NombreComercial']);
		$_SESSION['NC'] = $comercial;
		$dir = mysqli_real_escape_string($conn,$_POST['Dir']);
		$type = mysqli_real_escape_string($conn, $_POST['Tipo']);
		$patronal = mysqli_real_escape_string($conn,$_POST['Patronal']);
		$ssn = mysqli_real_escape_string($conn,$_POST['SSN']);
		$inc =  mysqli_real_escape_string($conn, $_POST['Incorporacion']);
		$ops = mysqli_real_escape_string($conn, $_POST['Operaciones']);
		$industria = mysqli_real_escape_string($conn,$_POST['Industria']);
		$naics = mysqli_real_escape_string($conn,$_POST['NAICS']);
		$descripcion = mysqli_real_escape_string($conn,$_POST['Descripcion']);
		$contact =  mysqli_real_escape_string($conn,$_POST['Contacto']);
		$phone =  mysqli_real_escape_string($conn,$_POST['Telefono']);
		$cel =  mysqli_real_escape_string($conn,$_POST['Celular']);
		$dirfisica = mysqli_real_escape_string($conn,$_POST['DirFisica']);
		$dirpostal = mysqli_real_escape_string($conn,$_POST['DirPostal']);
		$email =  mysqli_real_escape_string($conn,$_POST['Email']);
		$email2 =  mysqli_real_escape_string($conn,$_POST['Email2']);
		$cid = $_SESSION['FN'];
		$mid = "";
		
	}

	$result = mysqli_query($conn,"SELECT * FROM registro WHERE ID = '$id' ");
    $row= mysqli_fetch_array($result);

	if($row['ID']!= "")
	{
		if($row['ID']== $id)
		{
			?>
			'<script type = "text/javascript"> 
			alert("Codigo de Identificación <?php echo "$id" ?> ya fue asignado a otro cliente");
			history.back()
			</script>' ;
			<?php
		}
	}

	mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

	$_SESSION['TID'] = $id;

    $sql1 = "INSERT INTO registro (ID) VALUES ('$id');";

    $sql4 = "INSERT INTO 
	demograficos (ID, Nombre, NombreComercial, Dir, Tipo, Patronal, SSN, Incorporacion, Operaciones, Industria, NAICS, Descripcion, Contacto, Telefono, Celular,DirFisica, 
	DirPostal, Email, Email2, CID, MID) 
	VALUES ('$id', '$name', '$comercial', '$dir', '$type', '$patronal','$ssn', '$inc', '$ops', '$industria', '$naics', '$descripcion', '$contact', '$phone', '$cel', '$dirfisica', '$dirpostal','$email', '$email2', '$cid', '$mid');";

	mysqli_query($conn, $sql1);
	mysqli_query($conn, $sql4);


	header("Location: ingreso2.php?signup=success");
