<?php 
    include 'header4.php';
    
     // Check if the `$_SESSION['VID']` variable is empty, if it is, set its value to an empty string
    if(empty($_SESSION['VYD'])){ $_SESSION['VYD'] = ""; }        

    // Set the value of `$_SESSION['VAD']` to `$_SESSION['VID']`
    $_SESSION['VAD'] = $_SESSION['VID'];

    // Check if the `submit-search` value is set in the `$_POST` array
    if(isset($_POST['submit-search']))
    {
        // Escape the value of `$_POST['searchdd']` and store it in the `$searchdd` variable
        $searchdd = mysqli_real_escape_string($conn, $_POST['searchdd']);
        
        // Perform a query on the `demograficos` table where the `ID`, `Nombre`, or `NombreComercial` columns match the value of `$searchdd`
        $sql = "SELECT * FROM demograficos WHERE `ID` LIKE '%$searchdd%' 
        OR `Nombre` LIKE '%$searchdd%' OR `NombreComercial` LIKE '%$searchdd%'";
        $result = mysqli_query($conn, $sql);

        // Store the number of rows returned by the query in the `$queryResult` variable
        $queryResult = mysqli_num_rows($result);

        ?>
        <table>
        <?php    
            if($queryResult > 0)
            {
                // Loop through each row in the query result
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    ?><!-- Start a table row and display a header with the customer ID -->
                        <tr class="white-header"><h1 class="move-down"></h1>
                            <td><h3 class="white-header">ID del Cliente: </h3></td>
                            <td><h3><?php echo $row['ID']; ?> </h3></td>
                        </tr>
                    
                    <?php 
                        // Check if the `ID` column is not empty, if it's not, set the value of `$_SESSION['VID']` to the value of the `ID` column
                        if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                         
                        // If the `ID` column is empty, set the value of `$_SESSION['VID']` to an empty string
                        else{ $_SESSION['VID'] = ""; }

                        // Store the value of $_SESSION['VID'] in the variable $session
                        $session = $_SESSION['VID'];
                        $_SESSION['VYD'] = $session;
                    ?>

                    <!-- Create a search form for demographic data section-->
                    <form action = "searchdd.php" method="POST">
                        <input type="text" name="searchdd" required minlength = "3" list = "ID"
                        value = "<?php echo $_SESSION['VID']; ?>">
                        <!--Datalist to store search results as cached list -->
                        <datalist id = "ID">
                        <?php
                            // Fetch the data from the `demograficos` table
                            $sqldd = "SELECT * FROM `demograficos`";
                            $select = $conn ->query($sqldd);
                            while($ids = $select-> fetch_assoc() )
                            {
                                ?>
                                <option value ="<?php $ids['ID'] ?>"></option>
                                <option value="<?php echo $ids["ID"];?>">
                                <?php 
                                    //when searching for a client, this info will be suggested
                                    echo $ids["ID"];
                                    echo " ";
                                    echo $ids["Nombre"];
                                    echo " ";
                                    echo $ids["NombreComercial"];
                                ?>
                                </option>

                                <?php   
                            }
                        ?>
                        </datalist>
                        <button type="submit" name = "submit-search">Buscar</button><br/> 
                    </form>

                    <?php
                        //if the client exists, show results
                        if($queryResult > 1){ echo "Se ha encontrado ".$queryResult." resultados"; }
    
                        if($queryResult == 1 ){ echo "<br> <h2>Se ha encontrado ".$queryResult." resultado</h2> <br>"; }   
                    ?>
        
                    <?php// Check if the `Nombre` column is not empty
                        if($row['Nombre']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Legal Name-->
                                    <td><h3> Nombre Legal: </h3></td> 
                                    <td><h3 class="white-header" ><?php echo $row['Nombre']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `NombreComercial` column is not empty
                        if($row['NombreComercial']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Commercial Name-->
                                    <td><h3> Nombre Comercial: </h3></td>
                                    <td><h3><?php echo $row['NombreComercial']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php // If the BankClient, Tipo, Patronal, SSN, Incorporacion, Operaciones, Industria, NAICS or Descripcion fields are not empty, 
                          //display a header "Cuenta de Banco"
                        if($row['Tipo']!= "" || $row['Patronal']!= "" || $row['SSN']!= "" ||
                        $row['Incorporacion']!= "0000-00-00" || $row['Operaciones']!= "0000-00-00" || $row['Industria']!= "" ||
                        $row['NAICS']!= "0" || $row['Descripcion']!= "" )
                        {
                            ?>
                                <tr>
                                    <th><h3 class="orange-header">Data Demográfica:</h3></th>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Tipo` column is not empty
                        if($row['Tipo']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Legal Name--> 
                                    <td><h3> Tipo de Negocio: </h3></td>
                                    <td><h3><?php echo $row['Tipo']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Patronal` column is not empty
                        if($row['Patronal']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display EIN--> 
                                    <td><h3>Número de Cuenta Patronal Federal (EIN): </h3></td>
                                    <td><h3><?php echo $row['Patronal']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `SSN` column is not empty
                        if($row['SSN']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display SSN--> 
                                    <td><h3> Número de Seguro Social: </h3></td>
                                    <td><h3><?php echo $row['SSN']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Incorporacion` column is not empty
                        if($row['Incorporacion']!= "0000-00-00")
                        {
                            ?>
                                <tr class="white-header"><!--Display Date of Incorporation-->
                                    <td><h3> Fecha de Incorporación: </h3></td>
                                    <td><h3><?php echo $row['Incorporacion']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Operaciones` column is not empty
                        if($row['Operaciones']!= "0000-00-00")
                        {
                            ?>
                                <tr class="white-header"><!--Display Date of Operation's Start-->
                                    <td><h3> Fecha de Comienzo de Operaciones: </h3></td>
                                    <td><h3><?php echo $row['Operaciones']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Industria` column is not empty
                        if($row['Industria']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Type of Industry-->
                                    <td><h3> Tipo de Industria: </h3></td>
                                    <td><h3><?php echo $row['Industria']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>
                    
                    <?php// Check if the `NAICS` column is not empty
                        if($row['NAICS']!= "0")
                        {
                            ?>
                                <tr class="white-header"><!--Display NAICS-->
                                    <td><h3> Código NAICS: </h3></td>
                                    <td><h3><?php echo $row['NAICS']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Descripcion` column is not empty
                        if($row['Descripcion']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Description NAICS-->
                                    <td><h3> Descripción del Código NAICS: </h3></td>
                                    <td><h3><?php echo $row['Descripcion']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// If the Contacto, Telefono, Celular, DirFisica, DirPostal, Email, or Email2 fields are not empty, 
                          //display a header "Cuenta de Banco"
                        if($row['Contacto']!= "" || $row['Telefono']!= "" || $row['Celular']!= "" ||
                        $row['DirFisica']!= "" || $row['DirPostal']!= "" || $row['Email']!= "" ||
                        $row['Email2']!= "")
                        {
                            ?>
                                <tr>
                                    <th><h3 class="orange-header">Información del Contacto:</h3></th>
                                </tr>
                            <?php
                        }
                    ?>
                             
                    <?php// Check if the `Contacto` column is not empty
                        if($row['Contacto']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Contact-->
                                    <td><h3> Contacto: </h3></td>
                                    <td><h3><?php echo $row['Contacto']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Telefono` column is not empty
                        if($row['Telefono']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Primary Phone Number-->
                                    <td><h3> Teléfono Primario: </h3></td>
                                    <td><h3><?php echo $row['Telefono']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Celular` column is not empty
                        if($row['Celular']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Cellular Number-->
                                    <td><h3> Teléfono Celular: </h3></td>
                                    <td><h3><?php echo $row['Celular']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `DirFisica` column is not empty
                        if($row['DirFisica']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Physical Address-->
                                    <td><h3> Dirección Física: </h3></td>
                                    <td><h3><?php echo $row['DirFisica']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `DirPostal` column is not empty
                        if($row['DirPostal']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Postal Address-->
                                    <td><h3> Dirección Postal: </h3></td>
                                    <td><h3><?php echo $row['DirPostal']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Email` column is not empty
                        if($row['Email']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Primary Email-->
                                    <td><h3> Correo Electrónico Primario: </h3></td>
                                    <td><h3><?php echo $row['Email']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php// Check if the `Email2` column is not empty
                        if($row['Email2']!= "")
                        {
                            ?>
                                <tr class="white-header"><!--Display Secondary Email-->
                                    <td><h3> Correo Electrónico Secundario: </h3></td>
                                    <td><h3><?php echo $row['Email2']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    </table><br/>

                    <table>
                        <tr><!-- The "Modificar" button takes the user to the "updatepm.php" page, with the client ID passed as a parameter-->
                            <td><button type="submit" name = "modify" > 
                            <a href="updatedd.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>

                            <!-- The "File Room" button takes the user to the "fileroom.php" page, with the client ID passed as a parameter, and opens the page in a new tab. -->
                            <td><button type="submit" name = "fileroom" >
                            <a href="fileroom.php?ID=<?php echo $_SESSION['VID']; ?>" target= "_blank">File Room</a></button></td>
                        </tr>
                    </table></br>

                    <?php 

                    //If the administrator are logged in, they will have privileges of seeing 
                    //which user create or modified each customer's data.
                    if($_SESSION['FN'] == "Sonia" || $_SESSION['FN'] == "Victor" )
                    {
                        ?>
                        <table>
                            <tr >
                                <td><h3 class = "white-header">Creado por: </h3></td>
                                <td><h3 class = "white-header"><?php echo $row['CID']; ?> </h3></td>
                            </tr>
        
                            <tr>
                                <td><h3 class = "white-header">Modificado por: </h3></td>
                                <td><h3 class = "white-header"><?php echo $row['MID']; ?> </h3></td>
                            </tr>
                        </table>
                        
                        <!--Button that redirects user to the page where the customer's info can be deleted-->
                        <br><button type="submit" name = "delete-search" > <a href="delete.php?ID=<?php echo $row["ID"]; ?>">
                        Remover cliente</a></button>
                        <?php
                    }
                }  
            ?>
            
            <?php
            }
            else
            {
                ?>
                    <!--In case the ID doesn't exist for the searched client
                    display that customer doesn't exist -->
                    <h2 class = "white-header">Ingrese ID</h2>
                    <h2 class = "white-header">o nombre del cliente:</h2>
                    <form action = "searchdd.php" method="POST">
                        <input type="text" name="searchdd" required minlength = "3" list = "ID"
                        value = "<?php echo $_SESSION['VID']; ?>">
                        <datalist id = "ID">
                        <?php
                            $sqldd = "SELECT * FROM `demograficos`";
                            $select = $conn ->query($sqldd);
                            while($ids = $select-> fetch_assoc() )
                            {
                                ?>
                                <option value ="<?php $ids['ID'] ?>"></option>
                                <option value="<?php echo $ids["ID"];?>">
                                <?php 
                                    echo $ids["ID"];
                                    echo " ";
                                    echo $ids["Nombre"];
                                    echo " ";
                                    echo $ids["NombreComercial"];
                                ?>
                                </option>
                                
                                <?php   
                            }
                        ?>
                        </datalist>
                        <button type="submit" name = "submit-search">Buscar</button>  
                    </form>
                   
                    <?php echo "<h2><br>No existe ningún cliente con ese ID</h2>"; ?>
                        
                    <button type="submit" name = "submit-search"><a href="ingreso.php">Crear Cliente</a></button>
                    
                    <?php
                }
            }
            else
            {
                ?>
                <!-- If landing on search page without specifying search id, 
                just show search page with blank results-->
                <h2 class = "white-header">Ingrese ID</h2>
                <h2 class = "white-header">o nombre del cliente:</h2>
                <form action = "searchdd.php" method="POST">
                    <input type="text" name="searchdd" required minlength = "3" list = "ID"
                    value = "<?php echo $_SESSION['VID']; ?>">
                    <datalist id = "ID">
                    <?php
                        $sqldd = "SELECT * FROM `demograficos`";
                        $select = $conn ->query($sqldd);
                        while($ids = $select-> fetch_assoc() )
                        {
                            ?>
                            <option value ="<?php $ids['ID'] ?>"></option>
                            <option value="<?php echo $ids["ID"];?>">
                            <?php 
                                echo $ids["ID"];
                                echo " ";
                                echo $ids["Nombre"];
                                echo " ";
                                echo $ids["NombreComercial"];
                            ?>
                            </option>

                            <?php   
                        }
                    ?>
                    </datalist> <!-- Button to initiate the search -->
                    <button type="submit" name = "submit-search">Buscar</button>
                </form>
                
                 <!-- Button that allows users to create a new client, usually when the client is not found -->
                <button type="submit"  name = "submit-search"><a href="ingreso.php">Crear Cliente </a> </button>

            <?php
            }
        ?>

    <!-- Reload function in case the id in display is not the corresponding one -->
    <script>
        function Reloadd()
        {
            <?php 
            if($_SESSION['VAD'] != $_SESSION['VYD'])
            {
                ?>
                location.reload();
                <?php 
            }
            ?>
        }
        Reloadd();
    </script>

<div style="padding-bottom:5px;"></div>
</body>
</html>