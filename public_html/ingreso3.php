<?php include 'header9.php'; ?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
                <h1 class="spacer">Complete la información del nuevo cliente:</h1>
                <h2 class="white-header"><br>Métodos de Pagos:</h2>
                        
                <form action = "signuptest3.php" method="POST">
                
                <table>
                    <tr>
                        <th><h3 class="orange-header">Primera Cuenta de Banco:</h3></th>   
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Nombre del Cliente en la Cuenta de Banco: </h4> </th>
                        <td><input type ="text" name = "BankClient" maxlength= "64" placeholder="Cliente del Banco"></td>
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Número de Cuenta de Banco: </h4> </th>
                        <td><input type ="text" name = "Banco"  maxlength= "12" placeholder="Cuenta de Banco"></td>
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Número de Ruta del Banco: </h4> </th>
                        <td><input type ="text" name = "NumRuta"  maxlength= "12" placeholder="Número de Ruta"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Nombre del Banco: </h4></th>
                        <td>
                            <input type="text" name="NameBank" list = "NameBank">
                            <datalist id = "NameBank">
                                <?php
                                    $sqldd = "SELECT * FROM `pago`";
                                    $select = $conn ->query($sqldd);
                                    while($ids = $select-> fetch_assoc() )
                                    {
                                        ?>
                                        <option value ="<?php $ids['NameBank'] ?>">
                                        <?php  echo $ids["NameBank"]; ?> </option>
                                        <?php   
                                    }
                                ?>
                            </datalist>
                        </td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header"> Tipo de Cuenta de Banco: </h4></th>
                        <label for="accounts" ></label>
                        <td><select name="TipoCuenta" id="accounts">
                            <option value="">N/A</option>
                            <option value="Cheque Comercial">Cheque Comercial</option>
                            <option value="Cheque Personal">Cheque Personal</option>
                            <option value="Ahorro Comercial">Ahorro Comercial</option>
                            <option value="Ahorro Personal">Ahorro Personal</option>
                        </select></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Segunda Cuenta de Banco:</h3></th>   
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Nombre del Cliente en la Cuenta de Banco: </h4> </th>
                        <td><input type ="text" name = "BankClientS" maxlength= "64" placeholder="Cliente del Banco"></td>
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Número de Cuenta de Banco: </h4> </th>
                        <td><input type ="text" name = "BancoS"  maxlength= "12" placeholder="Cuenta de Banco" 
                        ></td>
                    </tr>

                    <tr>
                        <th> <h4 class="white-header"> Número de Ruta del Banco: </h4> </th>
                        <td><input type ="text" name = "NumRutaS"  maxlength= "12" placeholder="Número de Ruta" ></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Nombre del Banco: </h4></th>
                        <td>
                        <input type="text" name="NameBankS" list = "NameBankS">
                        
                        <datalist id = "NameBankS">
                            <?php
                                $sqldd = "SELECT * FROM `pago`";
                                $select = $conn ->query($sqldd);
                                while($ids = $select-> fetch_assoc() )
                                {
                                    ?>
                                    <option value ="<?php $ids['NameBankS'] ?>">
                                    <?php  echo $ids["NameBankS"]; ?> </option>
                                    <?php   
                                }
                            ?>
                        </datalist>
                        </td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header"> Tipo de Cuenta de Banco: </h4> </th>
                        <label for="accounts" ></label>
                        <td><select name="TipoCuentaS" id="accounts">
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
                        <th><h4 class="white-header">Nombre en Tarjeta de Crédito: </h4></th>
                        <td><input type ="text" name = "NameCard"  maxlength= "64"placeholder="Nombre del Cliente"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Número de Tarjeta de Crédito: </h4></th>
                        <td><input type ="text" name = "Tarjeta" maxlength= "16" placeholder="Número Tarjeta Crédito"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Tipo de Tarjeta de Crédito: </h4></th>
                        <td>
                            <input type="text" name="TipoTarjeta" list = "TipoTarjeta">
                            <datalist id = "TipoTarjeta">
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
                        <th><h4 class="white-header">CVV: </h4></th>
                        <td><input type ="text" name = "CVV"  maxlength= "3" placeholder="CVV"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Fecha de Expiración: </h4></th>
                        <td><input type="date" required minlength = "10" value="0001-01-01" name = "Expiracion"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Dirección Postal en Tarjeta: </h4></th>
                        <td><input type ="text" name = "PostalBank"  maxlength= "64" placeholder="Dirección Postal Tarjeta"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Segunda Tarjeta de Crédito:</h3></th>   
                    </tr>


                    <tr>
                        <th><h4 class="white-header"> Nombre en Tarjeta de Crédito: </h4></th>
                        <td><input type ="text" name = "NameCardS"  maxlength= "64" placeholder="Nombre del Cliente"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Número de Tarjeta de Crédito: </h4></th>
                        <td><input type ="text" name = "TarjetaS"  maxlength= "16" placeholder="Número Tarjeta Crédito" maxlength= "16"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Tipo de Tarjeta de Crédito: </h4></th>
                        <td>
                            <input type="text" name="TipoTarjetaS" list = "TipoTarjetaS">
                            <datalist id = "TipoTarjetaS">
                                <?php
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
                        <th><h4 class="white-header">CVV: </h4></th>
                        <td><input type ="text" name = "CVVS" maxlength= "3" placeholder="CVV"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Fecha de Expiración: </h4></th>
                        <td><input type="date" required minlength = "10" value="0001-01-01"value="0001-01-01" name= "ExpiracionS" ></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Dirección Postal en Tarjeta: </h4></th>
                        <td><input type ="text" name = "PostalBankS"  maxlength= "64" placeholder="Dirección Postal Tarjeta"></td>
                    </tr>

                </table>

                <table>
                    <tr>
                        <td>
                            <br><button type = "submit" name = "submit"> Siguiente </button>
                        </td>
                    </tr>
                </table> 
            </form>
        </div>  
    </div>
</div>
   
</body>
</html>
