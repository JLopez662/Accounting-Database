<?php

    include 'header4.php';

    // Fetch the data from the "confidencial" table where the "ID" is equal to the 'ID' value from the URL parameters
    $result2 = mysqli_query($conn,"SELECT * FROM confidencial WHERE ID='" . $_GET['ID'] . "'");
    
    // Store the fetched data in a variable $row2 as an array
    $row2= mysqli_fetch_array($result2);

    // Store the value of 'FN' key from the session in a variable '$employee'
    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            // Update the data in the "confidencial" table based on the POST request data
            $sql5 = "UPDATE confidencial SET ID='" . $_POST['ID'] . "', UserSuri='" . $_POST['UserSuri'] . "',
            PassSuri='" . $_POST['PassSuri'] . "', UserEftps='" . $_POST['UserEftps'] . "', PIN='" . $_POST['PIN'] . "' ,
            PassEftps='" . $_POST['PassEftps'] . "', UserCFSE='" . $_POST['UserCFSE'] . "',
            PassCFSE='" . $_POST['PassCFSE'] . "', UserDept='" . $_POST['UserDept'] . "', PassDept='" . $_POST['PassDept'] . "',
            UserCofim='" . $_POST['UserCofim'] . "', PassCofim='" . $_POST['PassCofim'] . "',
            UserMunicipio='" . $_POST['UserMunicipio'] . "', PassMunicipio='" . $_POST['PassMunicipio'] . "'
            WHERE ID='" . $_POST['ID'] . "' ";

            // Update the data in the "employee" column based on the POST request data
            $sql9 = "UPDATE confidencial SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            //execute the queries
            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            //Display an alert message to the user upon successful update
            $message = "Record Modified Successfully";
    }
     // Execute a SELECT query on the "confidencial" table to retrieve data where the "ID" column matches the "ID" value from the GET parameter
    $result = mysqli_query($conn,"SELECT * FROM confidencial WHERE ID='" . $_GET['ID'] . "'");
    
    // Fetch a single row from the result of the above query as an associative array
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data Confidencial</h1>

                <!-- This form is used to update the confidential data of this client -->
                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <div style="padding-bottom:5px;"></div>
                    <table>

                    <tr><!-- Displays client's ID -->
                        <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                        <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales en SURI:</h3></th>   
                    </tr>

                    <tr><!-- The first set of credentials - User in SURI -->
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="UserSuri"  maxlength= "64" class="txtField" value="<?php echo $row['UserSuri' ]; ?>"></td>
                    </tr>

                    <tr>Z<!-- The second set of credentials - Password in SURI -->
                        <td><h5 class="white-header">Contraseña en Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="PassSuri"  maxlength= "64" class="txtField" value="<?php echo $row['PassSuri' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales EFTPS:</h3></th>   
                    </tr>

                    <tr><!-- The first set of credentials - User in EFTPS -->
                        <td><h5 class="white-header">Usuario EFTPS: </h5></td>
                        <td><input type="text" name="UserEftps"  maxlength= "11" class="txtField" value="<?php echo $row['UserEftps' ]; ?>"></td>
                    </tr>

                    <tr><!-- The second set of credentials - EFTPS PIN -->
                        <td><h5 class="white-header">PIN EFTPS:</h5></td>
                        <td><input type="text" name="PIN"  maxlength= "25" class="txtField" value="<?php echo $row['PIN' ]; ?>"></td>
                    </tr>

                    <tr><!-- The third set of credentials - EFTPS Internet Password -->
                        <td><h5 class="white-header">Contraseña EFTPS:</h5></td>
                        <td><input type="text" name="PassEftps"  maxlength= "64" class="txtField" value="<?php echo $row['PassEftps' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales CFSE:</h3></th>   
                    </tr>

                    <tr><!-- First row of the CFSE with the username label and input field -->
                        <td><h5 class="white-header">Usuario CFSE:</h5></td>
                        <td><input type="text" name="UserCFSE"  maxlength= "64" class="txtField" value="<?php echo $row['UserCFSE' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second row of the CFSE with the password label and input field -->
                        <td><h5 class="white-header">Contraseña CFSE:</h5></td>
                        <td><input type="text" name="PassCFSE"  maxlength= "64" class="txtField" value="<?php echo $row['PassCFSE' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales para el Departamento del Trabajo:</h3></th>   
                    </tr>

                    <tr><!-- First row of the Department of Labor with the username label and input field -->
                        <td><h5 class="white-header">Usuario Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="UserDept"  maxlength= "64" class="txtField" value="<?php echo $row['UserDept' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second row of the Department of Labor with the password label and input field -->
                        <td><h5 class="white-header">Contraseña Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="PassDept"  maxlength= "64" class="txtField" value="<?php echo $row['PassDept' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Cofim:</h3></th>   
                    </tr>

                    <tr><!-- First row of Cofim with the username label and input field -->
                        <td><h5 class="white-header">Usuario Cofim:</h5></td>
                        <td><input type="text" name="UserCofim"  maxlength= "64" class="txtField" value="<?php echo $row['UserCofim' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second row of Cofim with the password label and input field -->
                        <td><h5 class="white-header">Contraseña Cofim:</h5></td>
                        <td><input type="text" name="PassCofim"  maxlength= "64" class="txtField" value="<?php echo $row['PassCofim' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales CofiMunicipiom:</h3></th>   
                    </tr>

                    <tr><!-- First row of Municipality with the username label and input field -->
                        <td><h5 class="white-header">Usuario Municipio:</h5></td>
                        <td><input type="text" name="UserMunicipio"  maxlength= "64" class="txtField" value="<?php echo $row['UserMunicipio' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second row of Municipality with the password label and input field -->
                        <td><h5 class="white-header">Contraseña Municipio:</h5></td>
                        <td><input type="text" name="PassMunicipio"  maxlength= "64" class="txtField" value="<?php echo $row['PassMunicipio' ]; ?>"></td>
                    </tr>
                </table>

                <tr><!-- Save the modified info-->
                    <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>
