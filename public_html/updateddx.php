<style>

body
{
    
    background:
        /* top, transparent black, faked with gradient */ 
        linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        
        /* bottom, image */
        url('bloo.jpg' );
        background-size: 100% 100%;
        background-attachment: fixed;
    
}


</style>

<?php
    #include 'header5.php';
    include 'header4.php';


    if(isset($_POST['submit']))
	{
        $ssn = mysqli_real_escape_string($conn,$_POST['SSN']);
        
        $naics = mysqli_real_escape_string($conn,$_POST['NAICS']);
    }

    /*
    $result4 = mysqli_query($conn,"SELECT * FROM demograficos WHERE SSN = '$ssn' ");
    $row4= mysqli_fetch_array($result4);
	$ssnx = $row4['SSN'];

	$result3 = mysqli_query($conn,"SELECT * FROM demograficos WHERE NAICS = '$naics' ");
    $row3= mysqli_fetch_array($result3);
	$naicsx = $row3['NAICS'];
    */


    $result2 = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $ssny = $row2['SSN'];

    $employee = $_SESSION['FN'];

    echo "ssny = ";

    echo $ssny;

    echo " ";


    

    if(count($_POST)>0) 
    {
            
            #echo $_POST['SSN'];

            if($ssny != $_POST['SSN'])
            {
                echo '<script type = "text/javascript">
                history.back()
                </script>' ;
            }

            /*
            if($naics == $naicsx)
            {
                echo '<script type = "text/javascript"> 
                history.back()
                </script>' ;
            }
            */

            if($ssn != $_POST['SSN'])
            {
                $sql1 = "INSERT INTO Individuo (SSN) VALUES ('" . $_POST['SSN'] . "')";
            }
            
            if($naics != $_POST['NAICS'])
            {
                $sql2 = "INSERT INTO Industria (NAICS) VALUES ('" . $_POST['NAICS'] . "')";
            }
            
            #$sql3 = "UPDATE Individuo SET SSN='" . $_POST['SSN'] . "'  ";

            #$sql4 = "UPDATE Industria SET NAICS='" . $_POST['NAICS'] . "'  ";

            $sql3 = "UPDATE demograficos SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "', Dir='" . $_POST['Dir'] . "', Tipo='" . $_POST['Tipo'] . "', Patronal='" . $_POST['Patronal'] . "' ,
            SSN='" . $_POST['SSN'] . "',
            Incorporacion='" . $_POST['Incorporacion'] . "' , Operaciones='" . $_POST['Operaciones'] . "' ,
            NAICS='" . $_POST['NAICS'] . "' ,  Contacto='" . $_POST['Contacto'] . "' ,  Telefono='" . $_POST['Telefono'] . "' ,
            Celular='" . $_POST['Celular'] . "' , DirFisica='" . $_POST['DirFisica'] . "', DirPostal='" . $_POST['DirPostal'] . "',
            Email='" . $_POST['Email'] . "', Email2='" . $_POST['Email2'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sqlA = "UPDATE administrativo SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sqlC = "UPDATE contributivos SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sqlO = "UPDATE confidencial SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sqlI = "UPDATE identificacion SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sqlP = "UPDATE pago SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
            NombreComercial='" . $_POST['NombreComercial'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            

            $sql4 = "UPDATE demograficos SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";


            
            
            if($_POST['NAICS'] != $naics)
            {
                $sql5 = "DELETE FROM Industria WHERE NAICS=' $naics' ";
            }


            if($_POST['SSN'] != $ssn )
            {
                $sql6 = "DELETE FROM Individuo WHERE SSN = '$ssn' ";
            }

            


            if($ssn != $_POST['SSN'])
            {
                mysqli_query($conn, $sql1);
            }

            if($naics != $_POST['NAICS'])
            {
                mysqli_query($conn, $sql2);
            }

            #mysqli_query($conn, $sql7);

            mysqli_query($conn, $sql3);

            mysqli_query($conn, $sql4);

            if($naics != $_POST['NAICS'])
            {
                mysqli_query($conn, $sql5);
            }

            mysqli_query($conn, $sqlA);

            mysqli_query($conn, $sqlC);

            mysqli_query($conn, $sqlO);

            mysqli_query($conn, $sqlI);

            mysqli_query($conn, $sqlP);

            #mysqli_query($conn, $sql9);

            
            if($ssn != $_POST['SSN'])
            {
                mysqli_query($conn, $sql6);
            }

           

            /*
            if($ssn != $_POST['SSN'])
            {
                mysqli_query($conn, $sql7);
            }
            */


            $message = "Record Modified Successfully";

    }

    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);

    #print_R($row);

?>

<div class="container">
            <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>
                <h2 style="color: darkorange; width: 590px;"><br>Modificar Data Demográfica</h2>


                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <div style="padding-bottom:5px;"></div>

                    <table>

                    <tr>

                        <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                        <td><h3 style= "color: white"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white; width: 420px">Nombre Legal:</h5></td>
                        <td><input type="text" name="Nombre"  maxlength= "64" class="txtField" value="<?php echo $row['Nombre' ]; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Nombre Comercial:</h5></td>
                        <td><input type="text" name="NombreComercial"  maxlength= "64" class="txtField" value="<?php echo $row['NombreComercial' ]; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <th> <h4 style="color:white"> File Room: </h4> </th>
                        <td><input type ="text" name = "Dir"  maxlength= "250" value="<?php echo $row['Dir' ]; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Tipo de Cliente:</h5></td>
                        <td><input type="text" name="Tipo" class="txtField" maxlength= "64" value="<?php echo $row['Tipo']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Número de Cuenta Patronal Federal (EIN):</h5></td>
                        <td><input type="text" name="Patronal" class="txtField"  pattern = "[0-9]{2}-[0-9]{7}"  maxlength= "10" value="<?php echo $row['Patronal']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Número de Seguro Social:</h5></td>
                        <td><input type="text" name="SSN" class="txtField"  maxlength= "11" attern="[0-9]{3}-[0-9]{2}-[0-9]{4}" value="<?php echo $row['SSN']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Fecha de Incorporación:</h5></td>
                        <td><input type="date" name="Incorporacion" class="txtField"  value="<?php echo $row['Incorporacion']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Fecha de Comienzo de Operaciones:</h5></td>
                        <td><input type="date" name="Operaciones" class="txtField"  value="<?php echo $row['Operaciones']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Código NAICS:</h5></td>
                        <td><input type="text" name="NAICS" class="txtField" maxlength= "6" value="<?php echo $row['NAICS']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>

                        <td>
                            <br>
                            
                            <h3 style="color:white; width: 600px;"></h3>
                        </td>
                    </tr>

                    <tr>
                        <th><h3 style="color:darkorange; width: 600px;">Información del Contacto:</h3></th>
                        <td>
                            <br>
                            <h3>&nbsp </h3>
                        </td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Nombre del Contacto:</h5></td>
                        <td><input type="text" name="Contacto" maxlength= "64" class="txtField" value="<?php echo $row['Contacto']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Teléfono Primario:</h5></td>
                        <td><input type="tel" name="Telefono"  maxlength= "17" class="txtField" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000" value="<?php echo $row['Telefono']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Teléfono Celular:</h5></td>
                        <td><input type="tel" name="Celular"  maxlength= "17" class="txtField" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000" value="<?php echo $row['Celular']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Direccion Física:</h5></td>
                        <td><input type="text" name="DirFisica" maxlength= "150" class="txtField" value="<?php echo $row['DirFisica']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Direccion Postal:</h5></td>
                        <td><input type="text" name="DirPostal" maxlength= "150" class="txtField" value="<?php echo $row['DirPostal']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Correo Electrónico Primario (Email):</h5></td>
                        <td><input type="email" name="Email"  maxlength= "64" class="txtField" value="<?php echo $row['Email']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    <tr>
                        <td><h5 style = "color: white">Correo Electrónico Secundario (Email):</h5></td>
                        <td><input type="email" name="Email2"  maxlength= "64" class="txtField" value="<?php echo $row['Email2']; ?>"
                        style="height:50px; background-color: #39393b; color: white"></td>
                    </tr>

                    </table>
                    <br>

                    <tr>
                    <td><button type="submit" name ="submit" style="height:50px; background-color: #39393b; color: darkorange" value="Submit" class="buttom">Guardar</a></button></td>


    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>

    </body>
</html>
