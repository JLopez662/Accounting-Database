<?php
    include 'header4.php';

    // Fetch the data from the "identificacion" table where the "ID" is equal to the 'ID' value from the URL parameters
    $result2 = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    
    // Store the fetched data in a variable $row2 as an array
    $row2= mysqli_fetch_array($result2);

    // Store the value of 'FN' key from the session in a variable '$employee'
    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            // Update the data in the "identificacion" table based on the POST request data
            $sql5 = "UPDATE identificacion SET ID='" . $_POST['ID'] . "', Accionista='" . $_POST['Accionista'] . "',
            SSNA='" . $_POST['SSNA'] . "', Cargo='" . $_POST['Cargo'] . "', LicConducir='" . $_POST['LicConducir'] . "', Nacimiento='" . $_POST['Nacimiento'] . "' 
            WHERE ID='" . $_POST['ID'] . "' ";

           // Update the data in the "identificacion" column based on the POST request data
            $sql9 = "UPDATE identificacion SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            //execute the queries
            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            //Display an alert message to the user upon successful update
            $message = "Record Modified Successfully";
    }
    // Execute a SELECT query on the "identificacion" table to retrieve data where the "ID" column matches the "ID" value from the GET parameter
    $result = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    
    // Fetch a single row from the result of the above query as an associative array
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data de Identificación</h1>

                <!-- This form is used to update the identification data of this client -->
                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                        <div style="padding-bottom:5px;"></div>
                        <table>
                            <tr><!-- Displays client's ID -->
                                <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                                <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                            </tr>

                            <tr><!-- Table for the Name of the Owner or Share Holder -->
                                <td><h5 class="white-header">Nombre del Dueño o Accionista:</h5></td>
                                <td><input type="text" name="Accionista"  maxlength= "64" class="txtField" value="<?php echo $row['Accionista' ]; ?>"></td>                            
                            </tr>

                            <tr><!-- Table for the SSN of the Owner or Share Holder -->
                                <td><h5 class="white-header">Seguro Social del Dueño o Accionista:</h5></td>
                                <td><input type="text" name="SSNA" class="txtField"  maxlength= "11" attern="[0-9]{3}-[0-9]{2}-[0-9]{4}" value="<?php echo $row['SSNA']; ?>"></td>
                            </tr>

                            <tr><!-- Table for the Charge of the owner -->
                                <th><h5 class="white-header">Cargo: </h5></th>
                                <td>
                                <input type="text" name="Cargo" list = "Cargo"
                                value="<?php echo $row['Cargo']; ?>">
                                <datalist id = "Cargo">
                                    <?PHP
                                        $sqldd = "SELECT * FROM `identificacion`";
                                        $select = $conn ->query($sqldd);
                                        while($ids = $select-> fetch_assoc() )
                                        {
                                            ?>
                                            <option value ="<?php $ids['Cargo'] ?>">
                                            <?php  echo $ids["Cargo"]; ?> </option>
                                            <?php   
                                        }
                                            ?>
                                </datalist>
                                </td>
                            </tr>

                            <tr><!-- Table for the Driver's License -->
                                <td><h5 class="white-header">Número de Licencia de Conducir:</h5></td>
                                <td><input type="text" name="LicConducir" class="txtField" maxlength= "17" value="<?php echo $row['LicConducir']; ?>"></td>                            
                            </tr>

                            <tr><!-- Table for the DOB -->
                                <td><h5 class="white-header">Fecha de Nacimiento:</h5></td>
                                <td><input type="date" name="Nacimiento" class="txtField"  maxlength= "9" value="<?php echo $row['Nacimiento']; ?>"></td>
                            </tr>
                        </table>

                        <tr><!-- Save the modified info-->
                            <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                        </tr>
                    </div>
                </div>
</body>
</html>
