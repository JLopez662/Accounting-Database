<?php
    include 'header4.php';

    // Fetch the data from the "pago" table where the "ID" is equal to the 'ID' value from the URL parameters
    $result2 = mysqli_query($conn,"SELECT * FROM pago WHERE ID='" . $_GET['ID'] . "'");
    
    // Store the fetched data in a variable $row2 as an array
    $row2= mysqli_fetch_array($result2);

    // Store the value of 'FN' key from the session in a variable '$employee'
    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
            // Update the data in the "pago" table based on the POST request data
            $sql5 = "UPDATE pago SET ID='" . $_POST['ID'] . "', 
            BankClient='" . $_POST['BankClient'] . "',Banco='" . $_POST['Banco'] . "', NumRuta='" . $_POST['NumRuta'] . "', 
            NameBank='" . $_POST['NameBank'] . "' , TipoCuenta='" . $_POST['TipoCuenta'] . "', 
            BankClientS='" . $_POST['BankClientS'] . "',BancoS='" . $_POST['BancoS'] . "', NumRutaS='" . $_POST['NumRutaS'] . "', 
            NameBankS='" . $_POST['NameBankS'] . "' ,TipoCuentaS='" . $_POST['TipoCuentaS'] . "', 
            NameCard='" . $_POST['NameCard'] . "',Tarjeta='" . $_POST['Tarjeta'] . "', TipoTarjeta='" . $_POST['TipoTarjeta'] . "', CVV='" . $_POST['CVV'] . "' ,
            Expiracion='" . $_POST['Expiracion'] . "', PostalBank='" . $_POST['PostalBank'] . "',
            NameCardS='" . $_POST['NameCardS'] . "',
            TarjetaS='" . $_POST['TarjetaS'] . "', TipoTarjetaS='" . $_POST['TipoTarjetaS'] . "', CVVS='" . $_POST['CVVS'] . "', 
            ExpiracionS='" . $_POST['ExpiracionS'] . "', PostalBankS='" . $_POST['PostalBankS'] . "' 
            WHERE ID='" . $_POST['ID'] . "' ";

                
            // Update the data in the "employee" column based on the POST request data
            $sql9 = "UPDATE pago SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            //execute the queries
            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

           //Display an alert message to the user upon successful update
            $message = "Record Modified Successfully";
            
    }
    // Execute a SELECT query on the "pago" table to retrieve data where the "ID" column matches the "ID" value from the GET parameter
    $result = mysqli_query($conn,"SELECT * FROM pago WHERE ID='" . $_GET['ID'] . "'");

    // Fetch a single row from the result of the above query as an associative array
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Métodos de Pago</h1>

                <!-- This form is used to update the payment method of this client -->
                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <div style="padding-bottom:5px;"></div>
                    <table>

                    <tr><!-- Displays client's ID -->
                        <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                        <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Primera Cuenta de Banco:</h3></th>   
                    </tr>

                    <tr><!-- Bank client name input row -->
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BankClient"  maxlength= "64" class="txtField" value="<?php echo $row['BankClient' ]; ?>"></td>
                    </tr>

                    <tr><!-- Bank account number input row -->
                        <td><h5 class="white-header">Número de Cuenta de Banco:</h5></td>
                        <td><input type="text" name="Banco"  maxlength= "12" class="txtField" value="<?php echo $row['Banco' ]; ?>"></td>
                    </tr>

                    <tr><!-- Bank routing number input row -->
                        <td><h5 class="white-header">Número de Ruta del Banco:</h5></td>
                        <td><input type="text" name="NumRuta" class="txtField" maxlength= "12" value="<?php echo $row['NumRuta']; ?>"></td>
                    </tr>

                    <tr><!-- Bank name input row with datalist options from database -->
                        <th><h5 class="white-header">Nombre del Banco: </h5></th>
                        <td>

                        <!-- The following datalist provides options for the bank name input -->
                        <input type="text" name="NameBank" list = "NameBank" value="<?php echo $row['NameBank']; ?>">
                        <datalist id = "NameBank" value ="<?php $ids['NameBank'] ?>">
                            <?php
                                // SQL query to retrieve data from the pago table
                                $sqldd = "SELECT * FROM `pago`";

                                // Executing the query and storing the result in the $select variable
                                $select = $conn ->query($sqldd);

                                // Fetching the data from the result set one row at a time
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?><!-- Outputting an option for the datalist with the retrieved bank name -->
                                    <option value ="<?php $ids['NameBank'] ?>"><?php  echo $ids["NameBank"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr><!-- Type of Bank account input row -->
                        <th><h5 class="white-header"> Tipo de Cuenta de Banco: </h5> </th>
                        <label for="TipoCuenta"></label>
                        <td><select name="TipoCuenta" id="TipoCuenta"  value="<?php echo $row['NameBank']; ?>">
                            <option value="<?php echo $row['TipoCuenta'] ?>">Seleccionado: <?php echo $row['TipoCuenta']; ?></option>
                            <option value="">N/A</option>
                            <option value="Cheque Comercial">Cheque Comercial</option>
                            <option value="Cheque Personal">Cheque Personal</option>
                            <option value="Ahorro Comercial">Ahorro Comercial</option>
                            <option value="Ahorro Personal">Ahorro Personal</option>
                        </select></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Segunda  Cuenta de Banco:</h3></th>   
                    </tr>

                    <tr><!-- Second Bank client name input row -->
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BankClientS"  maxlength= "64" class="txtField" value="<?php echo $row['BankClientS' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second Bank account number input row -->
                        <td><h5 class="white-header">Número de Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BancoS"  maxlength= "12" class="txtField" value="<?php echo $row['BancoS' ]; ?>"></td>
                    </tr>

                    <tr><!-- Second Bank routing number input row -->
                        <td><h5 class="white-header">Número de Ruta del Banco:</h5></td>
                        <td><input type="text" name="NumRutaS" class="txtField" maxlength= "12" value="<?php echo $row['NumRutaS']; ?>"></td>
                    </tr>

                    <tr><!-- Second Bank name input row with datalist options from database -->
                        <th><h5 class="white-header">Nombre del Banco: </h5></th>
                        <td>
                        <input type="text" name="NameBankS" list = "NameBankS" value="<?php echo $row['NameBankS']; ?>">
                        
                        <!-- The following datalist provides options for the second bank name input -->
                        <datalist id = "NameBankS" value ="<?php $ids['NameBankS'] ?>">
                            <?php
                                // SQL query to retrieve data from the pago table
                                $sqldd = "SELECT * FROM `pago`";

                                 // Executing the query and storing the result in the $select variable
                                $select = $conn ->query($sqldd);

                                // Fetching the data from the result set one row at a time
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?><!-- Outputting an option for the datalist with the retrieved bank name -->
                                    <option value ="<?php $ids['NameBankS'] ?>"><?php  echo $ids["NameBankS"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr><!-- Type of Second Bank account input row -->
                        <th><h5 class="white-header"> Tipo de Cuenta de Banco: </h5> </th>
                        <label for="TipoCuentaS"></label>
                        <td><select name="TipoCuentaS" id="TipoCuentaS">
                            <option value="<?php echo $row['TipoCuentaS'] ?>">Seleccionado: <?php echo $row['TipoCuentaS']; ?></option>
                            <option value="">N/A</option>
                            <option value="Cheque Comercial">Cheque Comercial</option>
                            <option value="Cheque Personal">Cheque Personal</option>
                            <option value="Ahorro Comercial">Ahorro Comercial</option>
                            <option value="Ahorro Personal">Ahorro Personal</option>
                        </select></td>
                    </tr>

                    <tr><!-- Input field for the name on the credit card -->
                        <th><h3 class="orange-header">Primera Tarjeta de Crédito:</h3></th>   
                    </tr>

                    <tr><!-- Input field for the credit card number -->
                        <td><h5 class="white-header">Nombre en Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="NameCard"  maxlength= "64" class="txtField" value="<?php echo $row['NameCard' ]; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the type of credit card -->
                        <td><h5 class="white-header">Número de Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="Tarjeta"  maxlength= "16" class="txtField" value="<?php echo $row['Tarjeta' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h5 class="white-header">Tipo de Tarjeta de Crédito: </h5></th>
                        <td>
                        <input type="text" name="TipoTarjeta" list = "TipoTarjeta" value="<?php echo $row['TipoTarjeta']; ?>">

                        <!-- Data list of types of credit cards available, populated from the 'pago' table in the database -->
                        <datalist id = "TipoTarjeta" value ="<?php $ids['TipoTarjeta'] ?>">
                            <?php
                                $sqldd = "SELECT * FROM `pago`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['TipoTarjeta'] ?>">
                                    <?php  echo $ids["TipoTarjeta"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr><!-- Input field for the CVV number -->
                        <td><h5 class="white-header">CVV:</h5></td>
                        <td><input type="text" name="CVV" class="txtField" maxlength= "3" value="<?php echo $row['CVV']; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the expiration date of the credit card -->
                        <td><h5 class="white-header">Fecha de Expiración:</h5></td>
                        <td><input type="date" name="Expiracion" class="txtField" maxlength= "10" value="<?php echo $row['Expiracion']; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the postal address associated with the credit card -->
                        <td><h5 class="white-header">Dirección Postal en Tarjeta:</h5></td>
                        <td><input type="text" name="PostalBank" class="txtField"  maxlength= "64" value="<?php echo $row['PostalBank']; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Segunda Tarjeta de Crédito:</h3></th>   
                    </tr>

                    <tr><!-- Input field for the name on the second credit card -->
                        <td><h5 class="white-header">Nombre en Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="NameCardS"  maxlength= "64" class="txtField" value="<?php echo $row['NameCardS' ]; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the number of the second credit card -->
                        <td><h5 class="white-header">Número de Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="TarjetaS"  maxlength= "16" class="txtField" value="<?php echo $row['TarjetaS' ]; ?>"></td>
                    </tr>

                    <tr>
                        <!-- Input field for the type of the second credit card -->
                        <th><h5 class="white-header">Tipo de Tarjeta de Crédito: </h5></th>
                        <td>
                        <input type="text" name="TipoTarjetaS" list = "TipoTarjetaS" value="<?php echo $row['TipoTarjetaS']; ?>">
                        <datalist id = "TipoTarjeta" value ="<?php $ids['TipoTarjetaS'] ?>">
                            <?PHP
                                $sqldd = "SELECT * FROM `pago`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['TipoTarjetaS'] ?>">
                                    <?php  echo $ids["TipoTarjetaS"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr><!-- Input field for the CVV of the second credit card -->
                        <td><h5 class="white-header">CVV:</h5></td>
                        <td><input type="text" name="CVVS" class="txtField" maxlength= "3" value="<?php echo $row['CVVS']; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the expiration date of the second credit card -->
                        <td><h5 class="white-header">Fecha de Expiración:</h5></td>
                        <td><input type="date" name="ExpiracionS" class="txtField"  maxlength= "10" value="<?php echo $row['ExpiracionS']; ?>"></td>
                    </tr>

                    <tr><!-- Input field for the postal address associated with the second credit card -->
                        <td><h5 class="white-header">Dirección Postal en Tarjeta:</h5></td>
                        <td><input type="text" name="PostalBankS" class="txtField"  maxlength= "64" value="<?php echo $row['PostalBankS']; ?>"></td>
                    </tr>
                </table>

                <tr><!-- Save the modified info-->
                    <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>
