<?php
    include 'header4.php';

    // Fetch the data from the "contributivos" table where the "ID" is equal to the 'ID' value from the URL parameters
    $result2 = mysqli_query($conn,"SELECT * FROM contributivos WHERE ID='" . $_GET['ID'] . "'");
    
    // Store the fetched data in a variable $row2 as an array
    $row2= mysqli_fetch_array($result2);

    // Store the value of 'FN' key from the session in a variable '$employee'
    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            // Update the data in the "contributivos" table based on the POST request data
            $sql5 = "UPDATE contributivos SET ID='" . $_POST['ID'] . "', Estatal='" . $_POST['Estatal'] . "',
            Poliza='" . $_POST['Poliza'] . "', RegComerciante='" . $_POST['RegComerciante'] . "', Vencimiento='" . $_POST['Vencimiento'] . "' ,
            Choferil='" . $_POST['Choferil'] . "', DeptEstado='" . $_POST['DeptEstado'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

           // Update the data in the "employee" column based on the POST request data
            $sql9 = "UPDATE contributivos SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            //execute the queries
            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            //Display an alert message to the user upon successful update
            $message = "Record Modified Successfully";
    }
    // Execute a SELECT query on the "contributivos" table to retrieve data where the "ID" column matches the "ID" value from the GET parameter
    $result = mysqli_query($conn,"SELECT * FROM contributivos WHERE ID='" . $_GET['ID'] . "'");
    
    // Fetch a single row from the result of the above query as an associative array
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data Contributiva</h1>

    <!-- This form is used to update the contributive data of this client -->
    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom:5px;"></div>
            <table>
                <tr><!-- Displays client's ID -->
                    <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                    <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                </tr>

                    <tr><!-- Table for the Patronal State Account Number -->
                        <td><h5 class="white-header">Número de Cuenta Patronal Estatal:</h5></td>
                        <td><input type="text" name="Estatal"  maxlength= "10" class="txtField" value="<?php echo $row['Estatal' ]; ?>"></td>
                    </tr>

                    <tr><!-- Table for the CFSE Policy Number -->
                        <td><h5 class="white-header">Número de Póliza CFSE:</h5></td>
                        <td><input type="text" name="Poliza"  maxlength= "10" class="txtField" value="<?php echo $row['Poliza' ]; ?>"></td>                    </tr>

                    <tr><!-- Table for the Merchant Registration Number -->
                        <td><h5 class="white-header">Número de Registro de Comerciante:</h5></td>
                        <td><input type="text" name="RegComerciante" class="txtField" maxlength= "12" pattern="[0-9]{7}-[0-9]{4}" value="<?php echo $row['RegComerciante']; ?>"></td>
                    </tr>

                    <tr><!-- Table for the Expiration Date of Merchant Registration -->
                        <td><h5 class="white-header">Fecha de Vencimiento del Registro de Comerciante:</h5></td>
                        <td><input type="date" name="Vencimiento" class="txtField"  maxlength= "9" value="<?php echo $row['Vencimiento']; ?>"></td>
                    </tr>

                    <tr><!-- Table for the Driver's Insurance Account Number -->
                        <td><h5 class="white-header">Número de Cuenta de Seguro Choferil:</h5></td>
                        <td><input type="text" name="Choferil" class="txtField"  maxlength= "14" value="<?php echo $row['Choferil']; ?>"></td>
                    </tr>

                    <tr><!-- Table for the State Department Number -->
                        <td><h5 class="white-header">Número de Cuenta del Departamento de Estado:</h5></td>
                        <td><input type="text" name="DeptEstado" class="txtField"  maxlength= "6" value="<?php echo $row['DeptEstado']; ?>"></td>
                    </tr>
                </table>

                <tr><!-- Save the modified info-->
                    <td><button type="submit" name ="submit"value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>