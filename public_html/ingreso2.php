<?php

// Start a new session
session_start();
include 'header9.php';
?>
    <div class="container">
        <div class="row h-50 align-items-center">
            <div class="col-md-7">
                <div class="header-content">
                <!-- Form to fill up the Contributive data for the new customer -->
                <h1 class="spacer">Complete la información del nuevo cliente:</h1>
                    
                <form action = "signuptest2.php" method="POST">

                <table >
                    <tr>
                        <th><h3 class="orange-header">Data Contributiva:</h3></th>   
                    </tr>

                    <tr><!-- Table for the Patronal State Account Number -->
                        <th><h4 class="white-header"> Número de Cuenta Patronal Estatal: </h4> </th>
                        <td><input type ="text" name = "Estatal"  maxlength= "10"></td>
                    </tr>

                    <tr><!-- Table for the CFSE Policy Number -->
                        <th><h4 class="white-header"> Número de Póliza CFSE: </h4></th>
                        <td><input type ="text" name = "Poliza"  maxlength= "10" placeholder="Número Poliza"></td>
                    </tr>

                    <tr><!-- Table for the Merchant Registration Number -->
                        <th><h4 class="white-header">  Número de Registro de Comerciante: </h4></th>
                        <td><input type ="text" name = "RegComerciante"  maxlength= "12" placeholder=" Registro de Comerciante"></td>
                    </tr>

                    <tr><!-- Table for the Expiration Date of Merchant Registration -->
                        <th><h4 class="white-header">Fecha de Vencimiento del Registro Comerciante: </h4></th>
                        <td><input type ="date" name = "Vencimiento" required minlength = "10" value="0001-01-01" placeholder="Vencimiento"></td>
                    </tr>

                    <tr><!-- Table for the Driver's Insurance Account Number -->
                        <th><h4 class="white-header">Número de Cuenta de Seguro Choferil: </h4></th>
                        <td><input type ="text" name = "Choferil"  maxlength= "14" placeholder="Seguro Choferil"></td>
                    </tr>

                    <tr><!-- Table for the State Department Number -->
                        <th><h4 class="white-header">Número de Departamento de Estado: </h4></th>
                        <td><input type ="text" name = "DeptEstado"  maxlength= "6" placeholder="Departamento Estado"></td>
                    </tr>
                        
                    <tr>
                        <th><h3 class="orange-header">Data de Identificación:</h3></th>
                    </tr>

                    <tr><!-- Table for the Name of the Owner or Share Holder -->
                        <th><h4 class="white-header"> Nombre del Dueño o Accionista: </h4> </th>
                        <td><input type ="text" name = "Accionista" maxlength= "64" placeholder="Dueño / Accionista"></td>
                    </tr>

                    <tr><!-- Table for the SSN of the Owner or Share Holder -->
                        <th><h4 class="white-header"> Seguro Social del Dueño o Accionista: </h4> </th>
                        <td><input type ="text" name = "SSNA" maxlength= "11" placeholder="SSNA"></td>
                    </tr>
                    
                    <tr><!-- Table for the Charge of the owner -->
                        <th><h4 class="white-header"> Cargo: </h4> </th>
                        <td><input type ="text" name = "Cargo" maxlength= "25" placeholder="Cargo"></td>
                    </tr>

                    <tr><!-- Table for the Driver's License -->
                        <th> <h4 class="white-header"> Número de Licencia de Conducir: </h4> </th>
                        <td><input type ="text" name = "LicConducir"  maxlength= "17" placeholder="Licencia de Conducir"></td>
                    </tr>

                    <tr><!-- Table for the DOB -->
                        <th><h4 class="white-header">Fecha de Nacimiento: </h4></th>
                        <td><input type ="date" required minlength = "10" value="0001-01-01" name = "Nacimiento"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Data Administrativa:</h3></th>
                    </tr>

                    <tr><!-- Table for the Contract Date -->
                        <th><h4 class="white-header">Fecha de Contratación: </h4></th>
                        <td><input type ="date" required minlength = "10" value="0001-01-01" name = "Contrato"></td>
                    </tr>

                    <tr><!-- Table for the Type of Billing -->
                        <th><h4 class="white-header"> Tipo de Facturación: </h4> </th>
                        <label for="bill" ></label>
                        <td><select name="Facturacion" id="bill" >
                            <option value="">N/A</option>
                            <option value="Iguala">Iguala</option>
                            <option value="Por Hora">Por Hora</option>
                            <option value="Mixto">Mixto</option>
                        </select></td>
                    </tr>

                    <tr><!-- Table for the Base Bill -->
                        <th><h4 class="white-header">Facturación Base: </h4></th>
                        <td><input type ="text" name = "FacturacionBase" placeholder="Facturación Base"></td>
                    </tr>

                    <tr><!-- Table for the Tax Bill -->
                        <th><h4 class="white-header">Facturación de IVU: </h4></th>
                        <td><input type ="text" name = "IVU" placeholder="IVU"></td>
                    </tr>

                    <tr><!-- Table for the Staff in Charge -->
                        <th><h4 class="white-header">Staff a Cargo: </h4></th>
                        <td>
                            <input type="text" name="Staff" list = "EID" maxlength= "4">  
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

                    <tr><!-- Table for the Date of start for the staff in charge -->
                        <th><h4 class="white-header">Staff a Cargo Desde: </h4></th>
                        <td><input type ="date" required minlength = "10" value="0001-01-01" name = "StaffDate" ></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td><!-- Move on to the next page -->
                            <br><button type = "submit" name = "submit"> Siguiente </button>
                        </td>
                    </tr>
                </table>  
                </form>
            </div>  
        </div>
    </div>
</div>    

</body>
</html>
