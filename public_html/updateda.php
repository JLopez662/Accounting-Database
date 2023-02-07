<?php
    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM contributivos WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {

            $sql5 = "UPDATE administrativo SET ID='" . $_POST['ID'] . "', Contrato='" . $_POST['Contrato'] . "',
            Facturacion='" . $_POST['Facturacion'] . "', FacturacionBase='" . $_POST['FacturacionBase'] . "', IVU='" . $_POST['IVU'] . "' ,
            Staff='" . $_POST['Staff'] . "', StaffDate='" . $_POST['StaffDate'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

            $sql9 = "UPDATE administrativo SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            ?>

            <script type = "text/javascript"> alert("Cliente ha sido modificado exitosamente");</script>

            <?php 
    }
    $result = mysqli_query($conn,"SELECT * FROM administrativo WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);

?>

<div class="container">
    <h1 class="move-down">Modificar Data Administrativa</h1>

    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom:5px;"></div>
            <table>
                <tr>
                    <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                    <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Fecha de Contratación:</h5></td>
                    <td><input type="date" name="Contrato" class="txtField" maxlength= "12" value="<?php echo $row['Contrato']; ?>"></td>
                 </tr>

                <th><h5 class="white-header"> Tipo de Facturación: </h5> </th>
                <label for="bill" ></label>
                <td><select name="Facturacion" id="bill">
                    <option value="<?php echo $row['Facturacion'] ?>">Seleccionado: <?php echo $row['Facturacion']; ?></option>
                    <option value="">N/A</option>
                    <option value="Iguala">Iguala</option>
                    <option value="Por Hora">Por Hora</option>
                    <option value="Mixto">Mixto</option>
                </select></td>

                <tr>
                    <td><h5 class="white-header">Facturación Base:</h5></td>
                    <td><input type="text" name="FacturacionBase" class="txtField" value="<?php echo $row['FacturacionBase']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Facturación de IVU:</h5></td>
                    <td><input type="text" name="IVU" class="txtField" maxlength= "12"  value="<?php echo $row['IVU']; ?>"></td>
                </tr>

                <tr>
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

                    <tr>
                        <td><h5 class="white-header">Staff A Cargo Desde:</h5></td>
                        <td><input type="date" name="StaffDate" class="txtField" value="<?php echo $row['StaffDate']; ?>"></td>
                    </tr>
                    
                    </table>
                    <br>

                    <tr>
                        <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                    </tr>
                </div>
            </div>
</body>
</html>
