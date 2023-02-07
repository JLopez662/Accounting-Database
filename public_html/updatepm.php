<?php
    include 'header4.php';

    $result2 = mysqli_query($conn,"SELECT * FROM pago WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $employee = $_SESSION['FN'];

    if(count($_POST)>0) 
    {
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

            $sql9 = "UPDATE pago SET MID =  '$employee'  WHERE id ='" . $_POST['ID'] . "' ";

            mysqli_query($conn, $sql5);

            mysqli_query($conn, $sql9);

            ?>

            <script type = "text/javascript"> alert("Cliente ha sido modificado exitosamente");</script>

            <?php 
    }
    $result = mysqli_query($conn,"SELECT * FROM pago WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="move-down">Modificar Métodos de Pago</h1>

                <form name="frmUser" method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <div style="padding-bottom:5px;"></div>
                    <table>

                    <tr>
                        <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
                        <td><h3 class="white-header"> ID: <?php echo $row['ID']; ?> </h3><br></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Primera Cuenta de Banco:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BankClient"  maxlength= "64" class="txtField" value="<?php echo $row['BankClient' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Cuenta de Banco:</h5></td>
                        <td><input type="text" name="Banco"  maxlength= "12" class="txtField" value="<?php echo $row['Banco' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Ruta del Banco:</h5></td>
                        <td><input type="text" name="NumRuta" class="txtField" maxlength= "12" value="<?php echo $row['NumRuta']; ?>"></td>
                    </tr>

                    <tr>
                        <th><h5 class="white-header">Nombre del Banco: </h5></th>
                        <td>
                        <input type="text" name="NameBank" list = "NameBank" value="<?php echo $row['NameBank']; ?>">
                        <datalist id = "NameBank" value ="<?php $ids['NameBank'] ?>">
                            <?php
                                $sqldd = "SELECT * FROM `pago`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['NameBank'] ?>"><?php  echo $ids["NameBank"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr>
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

                    <tr>
                        <td><h5 class="white-header">Nombre del Cliente en la Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BankClientS"  maxlength= "64" class="txtField" value="<?php echo $row['BankClientS' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Cuenta de Banco:</h5></td>
                        <td><input type="text" name="BancoS"  maxlength= "12" class="txtField" value="<?php echo $row['BancoS' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Ruta del Banco:</h5></td>
                        <td><input type="text" name="NumRutaS" class="txtField" maxlength= "12" value="<?php echo $row['NumRutaS']; ?>"></td>
                    </tr>

                    <tr>
                        <th><h5 class="white-header">Nombre del Banco: </h5></th>
                        <td>
                        <input type="text" name="NameBankS" list = "NameBankS" value="<?php echo $row['NameBankS']; ?>">
                        <datalist id = "NameBankS" value ="<?php $ids['NameBankS'] ?>">
                            <?php
                                $sqldd = "SELECT * FROM `pago`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['NameBankS'] ?>"><?php  echo $ids["NameBankS"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr>
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

                    <tr>
                        <th><h3 class="orange-header">Primera Tarjeta de Crédito:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Nombre en Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="NameCard"  maxlength= "64" class="txtField" value="<?php echo $row['NameCard' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="Tarjeta"  maxlength= "16" class="txtField" value="<?php echo $row['Tarjeta' ]; ?>"></td>
                    </tr>

                    <tr>
                        <th><h5 class="white-header">Tipo de Tarjeta de Crédito: </h5></th>
                        <td>
                        <input type="text" name="TipoTarjeta" list = "TipoTarjeta" value="<?php echo $row['TipoTarjeta']; ?>">
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

                    <tr>
                        <td><h5 class="white-header">CVV:</h5></td>
                        <td><input type="text" name="CVV" class="txtField" maxlength= "3" value="<?php echo $row['CVV']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Fecha de Expiración:</h5></td>
                        <td><input type="date" name="Expiracion" class="txtField" maxlength= "10" value="<?php echo $row['Expiracion']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Dirección Postal en Tarjeta:</h5></td>
                        <td><input type="text" name="PostalBank" class="txtField"  maxlength= "64" value="<?php echo $row['PostalBank']; ?>"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Segunda Tarjeta de Crédito:</h3></th>   
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Nombre en Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="NameCardS"  maxlength= "64" class="txtField" value="<?php echo $row['NameCardS' ]; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Número de Tarjeta de Crédito:</h5></td>
                        <td><input type="text" name="TarjetaS"  maxlength= "16" class="txtField" value="<?php echo $row['TarjetaS' ]; ?>"></td>
                    </tr>

                    <tr>
                        &nbsp
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

                    <tr>
                        <td><h5 class="white-header">CVV:</h5></td>
                        <td><input type="text" name="CVVS" class="txtField" maxlength= "3" value="<?php echo $row['CVVS']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Fecha de Expiración:</h5></td>
                        <td><input type="date" name="ExpiracionS" class="txtField"  maxlength= "10" value="<?php echo $row['ExpiracionS']; ?>"></td>
                    </tr>

                    <tr>
                        <td><h5 class="white-header">Dirección Postal en Tarjeta:</h5></td>
                        <td><input type="text" name="PostalBankS" class="txtField"  maxlength= "64" value="<?php echo $row['PostalBankS']; ?>"></td>
                    </tr>
                </table>

                <tr>
                    <td><button type="submit" name ="submit" value="Submit" class="buttom">Guardar</a></button></td>
                </tr>
            </div>
        </div>
</body>
</html>
