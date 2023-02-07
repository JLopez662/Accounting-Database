<?php
    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM empleados WHERE EID='" . $_SESSION['EMID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $_SESSION['LN'] = $row2['FirstName'];

    if(count($_POST)>0) 
    {
            
        $sql = "UPDATE empleados SET EID='" . $_POST['EID'] . "', FirstName='" . $_POST['FirstName'] . "',
        LastName='" . $_POST['LastName'] . "', User='" . $_POST['User'] . "', Pass='" . $_POST['Pass'] . "' 
        WHERE EID='" . $_POST['EID'] . "' ";

        $_SESSION['LN'] = $row2['FirstName'];

        mysqli_query($conn, $sql);

        $empid = $_SESSION['EMID'];
        $sql =" SELECT * FROM empleados WHERE EID = '$empid'";
        $result3 = mysqli_query($conn, $sql);
        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result3);

        $_SESSION['LN'] = $row3['FirstName'];

        ?>
            <script type = "text/javascript"> 
                alert("Usuario ha sido modificado exitosamente");
                window.location.replace("index2.php"); 
            </script>
        <?php 
    }

    $result = mysqli_query($conn,"SELECT * FROM empleados WHERE EID='" . $_SESSION['EMID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>
    <h2>Modificar su Perfil</h2>

    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        
        <table>
            <tr>
                <input type="hidden" name="EID" class="txtField" value="<?php echo $row['EID']; ?>">
                <td><h3 class = "white-headersecond"> ID de Empleado: <?php echo $row['EID']; ?> </h3><br></td>
            </tr>
        </table>

        <table>
            <tr>
                <th><h4 class="white-headersecond">Nombre:</h4></th>
                <td><input type="text" name="FirstName"  maxlength= "64" class="txtField" value="<?php echo $row['FirstName' ]; ?>"></td>
            </tr>

            <tr>
                <th><h4 class="white-headersecond">Apellidos:</h4></th>
                <td><input type="text" name="LastName" class="txtField"  maxlength= "64"  value="<?php echo $row['LastName']; ?>"></td>
            </tr>

            <tr>
                <th><h4 class="white-headersecond">Usuario:</h4></th>
                <td><input type="text" name="User" class="txtField" maxlength= "64" value="<?php echo $row['User']; ?>"></td>
            </tr>

            <tr>
                <th><h4 class="white-headersecond">Contraseña:</h4></th>
                <td><input type="text" name="Pass" class="txtField"  maxlength= "25" value="<?php echo $row['Pass']; ?>"></td>
            </tr>
            
        </table>

        <br><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button>

    </form>
    </div>  
</div>
    
</body>
</html>
