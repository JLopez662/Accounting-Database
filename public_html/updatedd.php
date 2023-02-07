<?php
    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID ='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
        $sql3 = "UPDATE demograficos SET ID='" . $_POST['ID'] . "', Nombre='" . $_POST['Nombre'] . "',
        NombreComercial='" . $_POST['NombreComercial'] . "', Dir='" . $_POST['Dir'] . "', Tipo='" . $_POST['Tipo'] . "', Patronal='" . $_POST['Patronal'] . "' ,
        SSN='" . $_POST['SSN'] . "', Incorporacion='" . $_POST['Incorporacion'] . "' , Operaciones='" . $_POST['Operaciones'] . "' ,
        Industria='" . $_POST['Industria'] . "' , NAICS='" . $_POST['NAICS'] . "' , Descripcion='" . $_POST['Descripcion'] . "' , 
        Contacto='" . $_POST['Contacto'] . "' ,  Telefono='" . $_POST['Telefono'] . "' ,
        Celular='" . $_POST['Celular'] . "' , DirFisica='" . $_POST['DirFisica'] . "', DirPostal='" . $_POST['DirPostal'] . "',
        Email='" . $_POST['Email'] . "', Email2='" . $_POST['Email2'] . "'  WHERE ID='" . $_POST['ID'] . "' ";

        $sql4 = "UPDATE demograficos SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

        mysqli_query($conn, $sql3);

        mysqli_query($conn, $sql4);

        ?>

        <script type = "text/javascript"> alert("Cliente ha sido modificado exitosamente"); </script>
                
        <?php  
    }

    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Data Demográfica</h1>

    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?></div>
        <div style="padding-bottom:5px;"></div>
            <table>
                <tr>
                    <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                    <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Nombre Legal:</h5></td>
                    <td><input type="text" name="Nombre" maxlength= "64" class="txtField" value="<?php echo $row['Nombre' ]; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Nombre Comercial:</h5></td>
                    <td><input type="text" name="NombreComercial" maxlength= "64" class="txtField" value="<?php echo $row['NombreComercial' ]; ?>"></td>
                </tr>

                <tr>
                    <th> <h5 class="white-header"> File Room: </h5> </th>
                    <td><input type ="text" name = "Dir" maxlength= "250" value="<?php echo $row['Dir' ]; ?>"></td>
                </tr>

                <tr>
                    <th><h5 class="white-header"> Tipo de Negocio: </h5> </th>
                    <label for="type" ></label>
                    <td><select name="Tipo" id="type">
                        <option value="<?php echo $row['Tipo'] ?>">Seleccionado: <?php echo $row['Tipo']; ?></option>
                        <option value="">N/A</option>
                        <option value="LLC">LLC</option>
                        <option value="Corporación">Corporación</option>
                        <option value="Individuo">Individuo</option>
                        <option value="Sociedad">Sociedad</option>
                            <option value="Sin Fines de Lucro">Sin Fines de Lucro</option>
                    </select></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Número de Cuenta Patronal Federal (EIN):</h5></td>
                    <td><input type="text" name="Patronal" class="txtField"  
                    pattern = "[0-9]{2}-[0-9]{7}"  maxlength= "10" value="<?php echo $row['Patronal']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Número de Seguro Social:</h5></td>
                    <td><input type="text" name="SSN" class="txtField" maxlength= "11" 
                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}" value="<?php echo $row['SSN']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Fecha de Incorporación:</h5></td>
                    <td><input type="date" name="Incorporacion" class="txtField" value="<?php echo $row['Incorporacion']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Fecha de Comienzo de Operaciones:</h5></td>
                    <td><input type="date" name="Operaciones" class="txtField" value="<?php echo $row['Operaciones']; ?>"></td>
                </tr>

                <tr>
                    <th><h5 class="white-header">Tipo de Industria: </h5></th>
                    <td>
                        <input type="text" name="Industria" list = "Industria" value="<?php echo $row['Industria']; ?>">
                        <datalist id = "Industria">
                            <?php
                                $sqldd = "SELECT * FROM `demograficos`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['Industria'] ?>">
                                    <?php echo $ids["Industria"];?></option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                    </td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Código NAICS:</h5></td>
                    <td><input type="text" name="NAICS" class="txtField" maxlength= "6" value="<?php echo $row['NAICS']; ?>"></td>
                </tr>

                <tr>
                    <th><h4 class="white-header">Descripción del Código NAICS: </h4></th>
                    <td><input type ="text" name = "Descripcion"  maxlength= "250" 
                    placeholder="Descripcion" value="<?php echo $row['Descripcion']; ?>"></td>
                </tr>

                <tr>
                    <th><h3 class="orange-header">Información del Contacto:</h3></th>
                </tr>

                <tr>
                    <td><h5 class="white-header">Nombre del Contacto:</h5></td>
                    <td><input type="text" name="Contacto" maxlength= "64" class="txtField" value="<?php echo $row['Contacto']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Teléfono Primario:</h5></td>
                    <td><input type="tel" name="Telefono"  maxlength= "12" class="txtField" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000" value="<?php echo $row['Telefono']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Teléfono Celular:</h5></td>
                    <td><input type="tel" name="Celular"  maxlength= "12" class="txtField" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000" value="<?php echo $row['Celular']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Direccion Física:</h5></td>
                    <td><input type="text" name="DirFisica" maxlength= "150" class="txtField" value="<?php echo $row['DirFisica']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Direccion Postal:</h5></td>
                    <td><input type="text" name="DirPostal" maxlength= "150" class="txtField" value="<?php echo $row['DirPostal']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Correo Electrónico Primario (Email):</h5></td>
                    <td><input type="email" name="Email"  maxlength= "64" class="txtField" value="<?php echo $row['Email']; ?>"></td>
                </tr>

                <tr>
                    <td><h5 class="white-header">Correo Electrónico Secundario (Email):</h5></td>
                    <td><input type="email" name="Email2"  maxlength= "64" class="txtField" value="<?php echo $row['Email2']; ?>"></td>
                </tr>
            </table>
                   
            <tr>
                <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
            </tr>
        </div>
    </div>
</body>
</html>
