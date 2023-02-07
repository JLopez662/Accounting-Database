<?php
    include 'header4.php';

    
    $result2 = mysqli_query($conn,"SELECT * FROM contributivos WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            $sql5 = "UPDATE contributivos SET ID='" . $_POST['ID'] . "', Estatal='" . $_POST['Estatal'] . "',
            Poliza='" . $_POST['Poliza'] . "', RegComerciante='" . $_POST['RegComerciante'] . "', Vencimiento='" . $_POST['Vencimiento'] . "' ,
            Choferil='" . $_POST['Choferil'] . "', DeptEstado='" . $_POST['DeptEstado'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sql9 = "UPDATE contributivos SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            ?>

            <script type = "text/javascript"> alert("Cliente ha sido modificado exitosamente");</script>
                    
            <?php 
    }
    $result = mysqli_query($conn,"SELECT * FROM contributivos WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data Contributiva</h1>

    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom:5px;"></div>
            <table>
                <tr>
                    <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                    <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Cuenta Patronal Estatal:</h5></td>
                        <td><input type="text" name="Estatal"  maxlength= "10" class="txtField" value="<?php echo $row['Estatal' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Póliza CFSE:</h5></td>
                        <td><input type="text" name="Poliza"  maxlength= "10" class="txtField" value="<?php echo $row['Poliza' ]; ?>"></td>                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Registro de Comerciante:</h5></td>
                        <td><input type="text" name="RegComerciante" class="txtField" maxlength= "12" pattern="[0-9]{7}-[0-9]{4}" value="<?php echo $row['RegComerciante']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Fecha de Vencimiento del Registro de Comerciante:</h5></td>
                        <td><input type="date" name="Vencimiento" class="txtField"  maxlength= "9" value="<?php echo $row['Vencimiento']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Cuenta de Seguro Choferil:</h5></td>
                        <td><input type="text" name="Choferil" class="txtField"  maxlength= "14" value="<?php echo $row['Choferil']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Cuenta del Departamento de Estado:</h5></td>
                        <td><input type="text" name="DeptEstado" class="txtField"  maxlength= "6" value="<?php echo $row['DeptEstado']; ?>"></td>
                    </tr>
                </table>

                <tr>
                    <td><button type="submit" name ="submit"value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>