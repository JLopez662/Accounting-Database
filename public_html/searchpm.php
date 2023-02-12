<?php 
    include 'header4.php';

    //Function to keep track of time, which will
    //be used to verify if a card date has expired
    $d=strtotime("today");

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
                ?> <!-- Start a table row and display a header with the customer ID -->
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

                <!-- Create a search form for payment method section-->
                <form action = "searchpm.php" method="POST">
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
    $sql = "SELECT * FROM pago WHERE `ID` LIKE '%$searchdd%' 
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

            <?php // If the BankClient, Banco, NumRuta, NameBank or TipoCuenta fields are not empty, display a header "Cuenta de Banco"
            if($row['BankClient']!= "" || $row['Banco']!= "" || $row['NumRuta']!= "0" ||
            $row['NameBank']!= "" || $row['TipoCuenta']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Cuenta de Banco:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php    // If the BankClient field is not empty, display a row with the name and value of the field
            if($row['BankClient']!= "")
            {
                ?>
                    <tr class="white-header"> <!--Display Name of Client from the Bank-->
                        <td><h3>Nombre del Cliente en la Cuenta de Banco: </h3></td>
                        <td><h3><?php echo $row['BankClient']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php  // If the Banco field is not empty, display a row with the name and value of the field
            if($row['Banco']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Number of Bank Account-->
                        <td><h3>Número de Cuenta de Banco:</h3></td>
                        <td><h3><?php echo $row['Banco']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php   // If the BankClient field is not empty, display a row with the name and value of the field
            if($row['NumRuta']!= "0")
            {
                ?>
                    <tr class="white-header"><!--Display Route Number-->
                        <td><h3>Número de Ruta del Banco: </h3></td>
                        <td><h3><?php echo $row['NumRuta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>
            
            <?php // If the NameBank field is not empty, display a row with the name and value of the field
            if($row['NameBank']!= "")
            {
                ?>
                    <tr class="white-header"> <!--Display Name of Bank-->
                        <td><h3> Nombre del Banco: </h3></td>
                        <td><h3><?php echo $row['NameBank']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the TipoCuenta field is not empty, display a row with the name and value of the field
            if($row['TipoCuenta']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display Type of Account-->
                        <td><h3> Tipo de Cuenta de Banco: </h3></td>
                        <td><h3> <?php echo $row['TipoCuenta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>


            <?php // If the BankClientS, BancoS, NumRutaS, NameBaNameBankSnk or TipoCuentaS fields are not empty, display a header "Cuenta de Banco"
            if($row['BankClientS']!= "" || $row['BancoS']!= "" || $row['NumRutaS']!= "0" ||
            $row['NameBankS']!= "" || $row['TipoCuentaS']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Segunda Cuenta de Banco:</h3></th>
                    </tr>
                <?php
            }
            ?>


            <?php // If the BankClientS field is not empty, display a row with the name and value of the field
            if($row['BankClientS']!= "")
            {
                ?>

                <tr class="white-header"> <!--Display Second Bank client name-->
                    <td><h3>Nombre del Cliente en la Cuenta de Banco: </h3></td>
                    <td><h3><?php echo $row['BankClientS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php // If the BancoS field is not empty, display a row with the name and value of the field
            if($row['BancoS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display Second Bank account number-->
                    <td><h3>Número de Cuenta de Banco:</h3></td>
                    <td><h3><?php echo $row['BancoS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php // If the NumRutaS field is not empty, display a row with the name and value of the field
            if($row['NumRutaS']!= "0")
            {
                ?>

                <tr class="white-header"><!--Display Second Bank routing number-->
                    <td><h3>Número de Ruta del Banco: </h3></td>
                    <td><h3><?php echo $row['NumRutaS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php // If the NameBankS field is not empty, display a row with the name and value of the field
            if($row['NameBankS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display Second Bank name input-->
                    <td><h3> Nombre del Banco: </h3></td>
                    <td><h3><?php echo $row['NameBankS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>
            
            <?php // If the TipoCuentaS field is not empty, display a row with the name and value of the field
            if($row['TipoCuentaS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display Type of Second Bank account-->
                    <td><h3> Tipo de Cuenta de Banco: </h3></td>
                    <td><h3><?php echo $row['TipoCuentaS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>
            
            <?php  // If the NameCard, Tarjeta, TipoTarjeta, CVV, Expiracion or PostalBank fields are not empty, display a header "Cuenta de Banco"
            if($row['NameCard']!= "" || $row['Tarjeta']!= "0" || $row['TipoTarjeta']!= "" ||
            $row['CVV']!= "" || $row['Expiracion']!= "0000-00-00" || $row['PostalBank']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Tarjeta de Crédito:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php // If the NameCard field is not empty, display a row with the name and value of the field
            if($row['NameCard']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display name on the credit card-->
                        <td><h3>Nombre en Tarjeta de Crédito: </h3></td>
                        <td><h3><?php echo $row['NameCard']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the Tarjeta field is not empty, display a row with the name and value of the field
            if($row['Tarjeta']!= "0")
            {
                ?>
                    <tr class="white-header"><!--Display credit card number-->
                        <td><h3>Número de Tarjeta de Crédito:</h3></td>
                        <td><h3><?php echo $row['Tarjeta']; ?> </h3></td>
                    </tr>                         
                <?php
            }
            ?>

            <?php // If the TipoTarjeta field is not empty, display a row with the name and value of the field
            if($row['TipoTarjeta']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display type of credit card-->
                        <td><h3>Tipo de Tarjeta de Crédito: </h3></td>
                        <td><h3><?php echo $row['TipoTarjeta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the CVV field is not empty, display a row with the name and value of the field
            if($row['CVV']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display CVV number-->
                        <td><h3>CVV: </h3></td>
                        <td><h3><?php echo $row['CVV']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the Expiracion field is not empty, display a row with the name and value of the field
            if($row['Expiracion']!= "0000-00-00")
            {
                //If card is expired, notify it
                if( date("Y-m-d", $d) > $row['Expiracion'])
                {
                    echo '<script> alert("Tarjeta de Crédito ha sido expirada!")</script>';
                    
                    ?>
                    <tr class="white-header"><!--Display expiration date of the credit card-->
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3>Expirada! (<?php echo $row['Expiracion']; ?>)</h3></td>
                    <?php

                }
                else //just show the date of expiration
                {
                    ?>
                    <tr class="white-header"><!--Display expiration date of the credit card-->
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3><?php echo $row['Expiracion']; ?> </h3></td>
                    </tr>                      
                    <?php
                }
            }
            ?>

            <?php // If the PostalBank field is not empty, display a row with the name and value of the field
            if($row['PostalBank']!= "")
            {
                ?>
                    <tr class="white-header"><!--Display  postal address associated with the credit card-->
                        <td><h3>Dirección Postal en Tarjeta: </h3></td>
                        <td><h3 class = "white-header"><?php echo $row['PostalBank']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php // If the NameCardS, TarjetaS, TipoTarjetaS, CVVS, ExpiracionS or PostalBankS fields are not empty, display a header "Cuenta de Banco"
            if($row['NameCardS']!= "" || $row['TarjetaS']!= "0" || $row['TipoTarjetaS']!= "" ||
            $row['CVVS']!= "" || $row['ExpiracionS']!= "0000-00-00" || $row['PostalBankS']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Segunda Tarjeta de Crédito:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php // If the NameCardS field is not empty, display a row with the name and value of the field
            if($row['NameCardS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display name on the second credit card-->
                    <td><h3>Nombre en Tarjeta de Crédito: </h3></td>
                    <td><h3><?php echo $row['NameCardS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>

            <?php // If the TarjetaS field is not empty, display a row with the name and value of the field
            if($row['TarjetaS']!= "0")
            {
                ?>
                    <tr class="white-header"><!--Display number of the second credit card-->
                        <td><h3>Número de Tarjeta de Crédito:</h3></td>
                        <td><h3><?php echo $row['TarjetaS']; ?> </h3></td>
                    </tr>                           
                <?php
            }
            ?>

            <?php  // If the TipoTarjetaS field is not empty, display a row with the name and value of the field
            if($row['TipoTarjetaS']!= "")
            {
                ?>
                <tr class="white-header"><!--Display type of the second credit card-->
                    <td><h3>Tipo de Tarjeta de Crédito: </h3></td>
                    <td><h3 class = "white-header"><?php echo $row['TipoTarjetaS']; ?> </h3></td>
                </tr>                       
                <?php
            }
            ?>
           
           <?php  // If the CVVS field is not empty, display a row with the name and value of the field
            if($row['CVVS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display CVV of the second credit card-->
                    <td><h3>CVV: </h3></td>
                    <td><h3><?php echo $row['CVVS']; ?> </h3></td>
                </tr>                       

                <?php
            }
            ?>
            
            <?php  // If the ExpiracionS field is not empty, display a row with the name and value of the field
            if($row['ExpiracionS']!= "0000-00-00")
            {
                //If card is expired, notify it
                if( date("Y-m-d", $d) > $row['ExpiracionS'])
                {
                    echo '<script>alert("Tarjeta de Crédito ha sido expirada!")</script>';
                    
                    ?>
                    <tr class="white-header"><!--Display  expiration date of the second credit card-->
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3>Expirada! (<?php echo $row['ExpiracionS']; ?>)</h3></td>
                    <?php

                }
                else //just show the date of expiration
                {
                    ?>
                    <tr class="white-header"><!--Display  expiration date of the second credit card-->
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3><?php echo $row['ExpiracionS']; ?> </h3></td>
                    </tr>                      
                    <?php
                }
            }
            ?>

            <?php  // If the PostalBankS field is not empty, display a row with the name and value of the field
            if($row['PostalBankS']!= "")
            {
                ?>

                <tr class="white-header"><!--Display postal address associated with the second credit card-->
                    <td><h3>Dirección Postal en Tarjeta: </h3></td>
                    <td><h3><?php echo $row['PostalBankS']; ?> </h3></td>
                </tr>                     

                <?php
            }
            ?>
            
            </table><br/>

            <table>
                <tr><!-- The "Modificar" button takes the user to the "updatepm.php" page, with the client ID passed as a parameter-->
                    <td><button type="submit" name = "modify" > 
                    <a href="updatepm.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
                    
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
        ?> <!--In case the ID doesn't exist for the searched client
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