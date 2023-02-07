<?php
    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            $sql5 = "UPDATE identificacion SET ID='" . $_POST['ID'] . "', Accionista='" . $_POST['Accionista'] . "',
            SSNA='" . $_POST['SSNA'] . "', Cargo='" . $_POST['Cargo'] . "', LicConducir='" . $_POST['LicConducir'] . "', Nacimiento='" . $_POST['Nacimiento'] . "' 
            WHERE ID='" . $_POST['ID'] . "' ";

            $sql9 = "UPDATE identificacion SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            ?>

            <script type = "text/javascript"> alert("Cliente ha sido modificado exitosamente");
                    
            </script>

            <?php 
    }
    $result = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data de Identificación</h1>

                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                        <div style="padding-bottom:5px;"></div>
                        <table>
                            <tr>
                                <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                                <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                            </tr>

                            <tr>
                                <td><h5 class="white-header">Nombre del Dueño o Accionista:</h5></td>
                                <td><input type="text" name="Accionista"  maxlength= "64" class="txtField" value="<?php echo $row['Accionista' ]; ?>"></td>                            
                            </tr>

                            <tr>
                                <td><h5 class="white-header">Seguro Social del Dueño o Accionista:</h5></td>
                                <td><input type="text" name="SSNA" class="txtField"  maxlength= "11" attern="[0-9]{3}-[0-9]{2}-[0-9]{4}" value="<?php echo $row['SSNA']; ?>"></td>
                            </tr>

                            <tr>
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

                            <tr>
                                <td><h5 class="white-header">Número de Licencia de Conducir:</h5></td>
                                <td><input type="text" name="LicConducir" class="txtField" maxlength= "17" value="<?php echo $row['LicConducir']; ?>"></td>                            
                            </tr>

                            <tr>
                                <td><h5 class="white-header">Fecha de Nacimiento:</h5></td>
                                <td><input type="date" name="Nacimiento" class="txtField"  maxlength= "9" value="<?php echo $row['Nacimiento']; ?>"></td>
                            </tr>
                        </table>

                        <tr>
                            <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                        </tr>
                    </div>
                </div>
</body>
</html>
