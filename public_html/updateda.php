<?php
    include 'header4.php';

     // Fetch the data from the "administrativo" table where the "ID" is equal to the 'ID' value from the URL parameters
    $result2 = mysqli_query($conn,"SELECT * FROM administrativo WHERE ID='" . $_GET['ID'] . "'");
    
    // Store the fetched data in a variable $row2 as an array
    $row2= mysqli_fetch_array($result2);

    // Store the value of 'FN' key from the session in a variable '$employee'
    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            // Update the data in the "administrativo" table based on the POST request data
            $sql5 = "UPDATE administrativo SET ID='" . $_POST['ID'] . "', Contrato='" . $_POST['Contrato'] . "',
            Facturacion='" . $_POST['Facturacion'] . "', FacturacionBase='" . $_POST['FacturacionBase'] . "', IVU='" . $_POST['IVU'] . "' ,
            Staff='" . $_POST['Staff'] . "', StaffDate='" . $_POST['StaffDate'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

             // Update the data in the "employee" column based on the POST request data
            $sql9 = "UPDATE administrativo SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

             //execute the queries
            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            //Display an alert message to the user upon successful update
            $message = "Record Modified Successfully";
    }
    // Execute a SELECT query on the "administrativo" table to retrieve data where the "ID" column matches the "ID" value from the GET parameter
    $result = mysqli_query($conn,"SELECT * FROM administrativo WHERE ID='" . $_GET['ID'] . "'");
    
    // Fetch a single row from the result of the above query as an associative array
    $row= mysqli_fetch_array($result);

?>

<div class="container">
    <h1 class="move-down">Modificar Data Administrativa</h1>

    <!-- This form is used to update the administrative data of this client -->
    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom:5px;"></div>
            <table>
                <tr><!-- Displays client's ID -->
                    <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                    <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                </tr>

                <tr><!-- Table for the Contract Date -->
                    <td><h5 class="white-header">Fecha de Contratación:</h5></td>
                    <td><input type="date" name="Contrato" class="txtField" maxlength= "12" value="<?php echo $row['Contrato']; ?>"></td>
                 </tr>

                 <!-- Table for the Type of Billing -->
                <th><h5 class="white-header"> Tipo de Facturación: </h5> </th>
                <label for="bill" ></label>
                <td><select name="Facturacion" id="bill">
                    <option value="<?php echo $row['Facturacion'] ?>">Seleccionado: <?php echo $row['Facturacion']; ?></option>
                    <option value="">N/A</option>
                    <option value="Iguala">Iguala</option>
                    <option value="Por Hora">Por Hora</option>
                    <option value="Mixto">Mixto</option>
                </select></td>

                <tr><!-- Table for the Base Bill -->
                    <td><h5 class="white-header">Facturación Base:</h5></td>
                    <td><input type="text" name="FacturacionBase" class="txtField" value="<?php echo $row['FacturacionBase']; ?>"></td>
                </tr>

                <tr><!-- Table for the Tax Bill -->
                    <td><h5 class="white-header">Facturación de IVU:</h5></td>
                    <td><input type="text" name="IVU" class="txtField" maxlength= "12"  value="<?php echo $row['IVU']; ?>"></td>
                </tr>

                <tr><!-- Table for the Staff in Charge -->
                    <th><h5 class="white-header">Staff a Cargo: </h5></th>
                    <td>
                    <input type="text" name="Staff" list = "EID" value="<?php echo $row['Staff']; ?>" maxlength= "4";></td>
                        <datalist id = "EID">
                            <?php
                                $sqldd = "SELECT * FROM `empleados`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                ?>
                                <option value ="<?php $ids['EID'] ?>"></option>
                                <option value="<?php echo $ids["EID"];?>">
                                <?php 
                                    echo $ids["EID"];
                                    echo " ";
                                    echo $ids["FirstName"];
                                    echo " ";
                                    echo $ids["LastName"];
                                ?>
                                </option>
                            <?php 
                                    }
                                ?>
                            </datalist>
                        </td>
                    </tr>

                    <tr><!-- Table for the Date of start for the staff in charge -->
                        <td><h5 class="white-header">Staff A Cargo Desde:</h5></td>
                        <td><input type="date" name="StaffDate" class="txtField" value="<?php echo $row['StaffDate']; ?>"></td>
                    </tr>
                    
                    </table>
                    <br>

                    <tr><!-- Move on to the next page -->
                        <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                    </tr>
                </div>
            </div>
</body>
</html>
