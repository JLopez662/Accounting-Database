<?php
    // Include the header file
    include 'header4.php';

    // Query the empleados table to get the information of the employee with the EID equal to the value stored in the session variable EMID
    $result2 = mysqli_query($conn,"SELECT * FROM empleados WHERE EID='" . $_SESSION['EMID'] . "'");
    
    // Fetch the result row and store it in the $row2 variable
    $row2= mysqli_fetch_array($result2);

    // Store the FirstName value in the session variable LN
    $_SESSION['LN'] = $row2['FirstName'];

    if(count($_POST)>0) 
    {
        // Update the empleados table with the new information posted
        $sql = "UPDATE empleados SET EID='" . $_POST['EID'] . "', FirstName='" . $_POST['FirstName'] . "',
        LastName='" . $_POST['LastName'] . "', User='" . $_POST['User'] . "', Pass='" . $_POST['Pass'] . "' 
        WHERE EID='" . $_POST['EID'] . "' ";

        // Store the FirstName value in the session variable LN
        $_SESSION['LN'] = $row2['FirstName'];

        // Execute the SQL query
        mysqli_query($conn, $sql);

         // Store the employee ID in the $empid variable
        $empid = $_SESSION['EMID'];

         // Query the empleados table to get the information of the employee with the EID equal to $empid
        $sql =" SELECT * FROM empleados WHERE EID = '$empid'";
        $result3 = mysqli_query($conn, $sql);
        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result3);

        // Store the FirstName value in the session variable LN
        $_SESSION['LN'] = $row3['FirstName'];

        //Show notification that user's information has been modified with success.
        ?>
            <script type = "text/javascript"> 
                alert("Usuario ha sido modificado exitosamente");
                window.location.replace("index2.php"); 
            </script>
        <?php 
    }
    // Query the empleados table to get the information of the employee with the EID equal to the value stored in the session variable EMID
    $result = mysqli_query($conn,"SELECT * FROM empleados WHERE EID='" . $_SESSION['EMID'] . "'");
    
    // Fetch the result row and store it in the $row variable
    $row= mysqli_fetch_array($result);
?>

<!-- Display a form to update the employee information -->
<div class="container">
    <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>
    <h2>Modificar su Perfil</h2>

    <!-- Form to post the updated information -->
    <form name="frmUser" method="post" action="">

    <!-- Display a message if the variable "message" is set -->
    <div><?php if(isset($message)) { echo $message; } ?></div>
        
        <!-- Create a table to display the employee information -->
        <table>
            <tr>
                <!-- Display the employee ID -->
                <input type="hidden" name="EID" class="txtField" value="<?php echo $row['EID']; ?>">
                <td><h3 class = "white-headersecond"> ID de Empleado: <?php echo $row['EID']; ?> </h3><br></td>
            </tr>
        </table>

        <table>
            <tr>
                <!-- First name field -->
                <th><h4 class="white-headersecond">Nombre:</h4></th>
                <td><input type="text" name="FirstName"  maxlength= "64" class="txtField" value="<?php echo $row['FirstName' ]; ?>"></td>
            </tr>

            <tr>
                 <!-- Last name field -->
                <th><h4 class="white-headersecond">Apellidos:</h4></th>
                <td><input type="text" name="LastName" class="txtField"  maxlength= "64"  value="<?php echo $row['LastName']; ?>"></td>
            </tr>

            <tr>
                <!-- User name field -->
                <th><h4 class="white-headersecond">Usuario:</h4></th>
                <td><input type="text" name="User" class="txtField" maxlength= "64" value="<?php echo $row['User']; ?>"></td>
            </tr>

            <tr>
                <!-- Password field -->
                <th><h4 class="white-headersecond">Contraseña:</h4></th>
                <td><input type="text" name="Pass" class="txtField"  maxlength= "25" value="<?php echo $row['Pass']; ?>"></td>
            </tr>
            
        </table>

         <!-- Submit button for updated information-->
        <br><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button>

    </form>
    </div>  
</div>
    
</body>
</html>
