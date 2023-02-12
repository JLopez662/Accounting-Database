<?php 
    include 'header4.php';

    // Check if the `$_SESSION['VID']` variable is empty, if it is, set its value to an empty string
    if(empty($_SESSION['VID'])){$_SESSION['VID'] = ""; }

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
                        <td><h3 ><?php echo $row['ID']; ?> </h3></td>
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

                <!-- Create a search form for confidential data section-->
                <form action = "searchcf.php" method="POST">
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
                        ?><!--Display Legal Name-->
                            <tr class="white-header">
                                <td><h3> Nombre Legal: </h3></td> 
                                <td><h3><?php echo $row['Nombre']; ?> </h3></td>
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
                                <td><h3 class="white-header"><?php echo $row['NombreComercial']; ?> </h3></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        <?php 

        }

        ?>

        <?php
    }
}

// Check if the submit-search key is set in the $_POST array
if(isset($_POST['submit-search']))
{
    // Escape and store the search keyword
    $searchdd = mysqli_real_escape_string($conn, $_POST['searchdd']);

    // SQL query to search for records with the keyword in the ID, Nombre or NombreComercial fields
    $sql = "SELECT * FROM confidencial WHERE `ID` LIKE '%$searchdd%' 
    OR `Nombre` LIKE '%$searchdd%' OR `NombreComercial` LIKE '%$searchdd%'";
    
    // Execute the query and store the result
    $result = mysqli_query($conn, $sql);

    // Get the number of rows returned by the query
    $queryResult = mysqli_num_rows($result);

     // Start creating the table to display the results
    ?>
    <table>
    <?php

    // If there are any results
    if($queryResult > 0)
    {
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($result)) 
        {
            // Store the current row's ID in the session variable 'VID'
            if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                    
            // If the ID is empty, set the session variable to an empty string
            else{ $_SESSION['VID'] = "";  }
            
            // Set the session variable 'VYD' to the value of 'VID'
            $session = $_SESSION['VID'];
            $_SESSION['VYD'] = $session;

            ?>

            <?php // If the UserSuri field is not empty, display a row with the name and value of the field
            if($row['UserSuri']!= "")
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Credenciales SURI:</h3></th>
                    </tr>
            
                    <tr class="white-header"><!--Display User in SURI-->
                        <td><h3>Usuario en SURI: </h3></td>
                        <td><h3><?php echo $row['UserSuri']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>

            <?php // If the PassSuri field is not empty, display a row with the name and value of the field
            if($row['PassSuri']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Password in SURI-->
                        <td><h3>Contraseña en SURI: </h3></td>
                        <td><h3><?php echo $row['PassSuri']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>
            
            <?php // If the UserEftps field is not empty, display a row with the name and value of the field
            if($row['UserEftps']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales EFTPS:</h3></th>
                    </tr>

                    <tr class="white-header"><!--Display User in EFTPS-->
                        <td><h3>EFTPS (EIN o SSN): </h3></td>
                        <td><h3><?php echo $row['UserEftps']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php// If the PIN field is not empty, display a row with the name and value of the field
            if($row['PIN']!= "0")
            {
                ?>
                    <tr class="white-header"><!--Display EFTPS PIN-->
                        <td><h3> EFTPS PIN: </h3></td>
                        <td><h3><?php echo $row['PIN']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the PassEftps field is not empty, display a row with the name and value of the field
            if($row['PassEftps']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display EFTPS Internet Password-->
                    <td><h3> EFTPS Internet Password: </h3></td>
                    <td><h3><?php echo $row['PassEftps']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the UserCFSE field is not empty, display a row with the name and value of the field
            if($row['UserCFSE']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales CFSE:</h3></th>
                    </tr>
            
                    <tr class="white-header"><!--Display CFSE Username-->
                        <td><h3>Usuario CFSE: </h3></td>
                        <td><h3><?php echo $row['UserCFSE']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php  // If the PassCFSE field is not empty, display a row with the name and value of the field
            if($row['PassCFSE']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display CFSE Password-->
                        <td><h3> Contraseña CFSE: </h3></td>
                        <td><h3><?php echo $row['PassCFSE']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the UserDept field is not empty, display a row with the name and value of the field
            if($row['UserDept']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales para el Departamento del Trabajo:</h3></th>
                    </tr>

                    <tr class="white-header"><!--Display Department of Labor Username-->
                        <td><h3>Usuario en Departamento del Trabajo: </h3></td>
                        <td><h3><?php echo $row['UserDept']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the PassDept field is not empty, display a row with the name and value of the field
            if($row['PassDept']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Department of Labor Password-->
                        <td><h3> Contraseña en Departamento del Trabajo: </h3></td>
                        <td><h3><?php echo $row['PassDept']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php  // If the UserCofim field is not empty, display a row with the name and value of the field
            if($row['UserCofim']!= "")
            {
                ?>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Cofim:</h3></th>
                    </tr>

                    <tr class="white-header"><!--Display Cofim Username-->
                        <td><h3>Usuario Cofim: </h3></td>
                        <td><h3><?php echo $row['UserCofim']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the PassCofim field is not empty, display a row with the name and value of the field
            if($row['PassCofim']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Cofim Password-->
                        <td><h3> Contraseña Cofim: </h3></td>
                        <td><h3><?php echo $row['PassCofim']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the UserMunicipio field is not empty, display a row with the name and value of the field
            if($row['UserMunicipio']!= "")
            {
                ?>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Municipio:</h3></th>
                    </tr>

            
                    <tr class="white-header"><!--Display Municipality Username-->
                        <td><h3>Usuario Municipio: </h3></td>
                        <td><h3><?php echo $row['UserMunicipio']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>

            <?php // If the PassCofim field is not empty, display a row with the name and value of the field
            if($row['PassCofim']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Municipality Password-->
                        <td><h3> Contraseña Municipio: </h3></td>
                        <td><h3><?php echo $row['PassMunicipio']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            </table><br/>

            <table>
                <tr><!-- The "Modificar" button takes the user to the "updatepm.php" page, with the client ID passed as a parameter-->
                    <td><button type="submit" name = "modify" > 
                    <a href="updatecf.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
                    
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
                ?><!--In case the ID doesn't exist for the searched client
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