<?php

    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM confidencial WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            $sql5 = "UPDATE confidencial SET ID='" . $_POST['ID'] . "', UserSuri='" . $_POST['UserSuri'] . "',
            PassSuri='" . $_POST['PassSuri'] . "', UserEftps='" . $_POST['UserEftps'] . "', PIN='" . $_POST['PIN'] . "' ,
            PassEftps='" . $_POST['PassEftps'] . "', UserCFSE='" . $_POST['UserCFSE'] . "',
            PassCFSE='" . $_POST['PassCFSE'] . "', UserDept='" . $_POST['UserDept'] . "', PassDept='" . $_POST['PassDept'] . "',
            UserCofim='" . $_POST['UserCofim'] . "', PassCofim='" . $_POST['PassCofim'] . "',
            UserMunicipio='" . $_POST['UserMunicipio'] . "', PassMunicipio='" . $_POST['PassMunicipio'] . "'
            WHERE ID='" . $_POST['ID'] . "' ";

            $sql9 = "UPDATE confidencial SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            $message = "Record Modified Successfully";
    }
    $result = mysqli_query($conn,"SELECT * FROM confidencial WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data Confidencial</h1>

                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <div style="padding-bottom:5px;"></div>
                    <table>

                    <tr>
                        <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                        <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales en SURI:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="UserSuri"  maxlength= "64" class="txtField" value="<?php echo $row['UserSuri' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña en Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="PassSuri"  maxlength= "64" class="txtField" value="<?php echo $row['PassSuri' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales EFTPS:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Usuario EFTPS: </h5></td>
                        <td><input type="text" name="UserEftps"  maxlength= "11" class="txtField" value="<?php echo $row['UserEftps' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">PIN EFTPS:</h5></td>
                        <td><input type="text" name="PIN"  maxlength= "25" class="txtField" value="<?php echo $row['PIN' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña EFTPS:</h5></td>
                        <td><input type="text" name="PassEftps"  maxlength= "64" class="txtField" value="<?php echo $row['PassEftps' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales CFSE:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Usuario CFSE:</h5></td>
                        <td><input type="text" name="UserCFSE"  maxlength= "64" class="txtField" value="<?php echo $row['UserCFSE' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña CFSE:</h5></td>
                        <td><input type="text" name="PassCFSE"  maxlength= "64" class="txtField" value="<?php echo $row['PassCFSE' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales para el Departamento del Trabajo:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Usuario Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="UserDept"  maxlength= "64" class="txtField" value="<?php echo $row['UserDept' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña Departamento del Trabajo:</h5></td>
                        <td><input type="text" name="PassDept"  maxlength= "64" class="txtField" value="<?php echo $row['PassDept' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Cofim:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Usuario Cofim:</h5></td>
                        <td><input type="text" name="UserCofim"  maxlength= "64" class="txtField" value="<?php echo $row['UserCofim' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña Cofim:</h5></td>
                        <td><input type="text" name="PassCofim"  maxlength= "64" class="txtField" value="<?php echo $row['PassCofim' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales CofiMunicipiom:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Usuario Municipio:</h5></td>
                        <td><input type="text" name="UserMunicipio"  maxlength= "64" class="txtField" value="<?php echo $row['UserMunicipio' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Contraseña Municipio:</h5></td>
                        <td><input type="text" name="PassMunicipio"  maxlength= "64" class="txtField" value="<?php echo $row['PassMunicipio' ]; ?>"></td>
                    </tr>
                </table>

                <tr>
                    <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>
