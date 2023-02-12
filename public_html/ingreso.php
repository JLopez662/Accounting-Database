<?php include 'header9.php'; ?>
   
<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
                
                <!-- Form to fill up customer's new info -->
                <h1 class="spacer">Complete la información del nuevo cliente:</h1>
                        
                <form action = "signuptest.php" method="POST">
                
                <table >
                    <tr><!-- Table row for customer ID -->
                        <th><h4 class="white-header"> Código de Identificación: </h4> </th>
                        <td><input type ="text" name = "ID" required minlength = "3" maxlength= "4" placeholder="ID"></td>
                    </tr>

                    <tr> <!-- Table row for legal name -->
                        <th><h4 class="white-header"> Nombre &nbspLegal: </h4> </th>
                        <td><input type ="text" name = "Nombre" required minlength = "1" maxlength= "64" placeholder="Nombre Legal"></td>
                    </tr>

                    <tr><!-- Table row for commercial name -->
                        <th><h4 class="white-header"> Nombre Comercial: </h4> </th>
                        <td><input type ="text" name = "NombreComercial"  maxlength= "64" placeholder="Nombre Comercial"></td>
                    </tr>

                    <tr><!-- Table row for file room -->
                        <th><h4 class="white-header"> File Room: </h4> </th>
                        <td><input type ="text" name = "Dir"  maxlength= "250" placeholder="URL"></td>
                    </tr>

                    <tr> <!-- Table row for demographic data header -->
                        <th><h3 class="orange-header">Data Demográfica:</h3></th>
                    </tr>

                    <tr><!-- Table row for business type -->
                        <th><h4 class="white-header"> Tipo de Negocio: </h4> </th>
                        <label for="type" ></label>
                        <td><select name="Tipo" id="type" >
                            <option value="">N/A</option>
                            <option value="LLC">LLC</option>
                            <option value="Corporación">Corporación</option>
                            <option value="Individuo">Individuo</option>
                            <option value="Sociedad">Sociedad</option>
                            <option value="Sin Fines de Lucro">Sin Fines de Lucro</option>
                        </select></td>
                    </tr>

                    <tr><!-- Table row for federal employer identification number -->
                        <th><h4 class="white-header"> Número de Cuenta Patronal Federal (EIN): </h4> </th>
                        <td><input type ="text" name = "Patronal" maxlength= "10" placeholder="EIN"></td>
                    </tr>

                    <tr><!-- Table row for entering Social Security Number -->
                        <th><h4 class="white-header"> Número de Seguro Social: </h4></th>
                        <td><input type ="text" name = "SSN"  maxlength= "11"placeholder="SSN"></td>
                    </tr>

                    <tr><!-- Table row for entering Incorporation Date -->
                        <th><h4 class="white-header">Fecha de Incorporación: </h4></th>
                        <td><input type ="date" name = "Incorporacion" required minlength = "10" value="0001-01-01" placeholder="Incorporacion"></td>
                    </tr>

                    <tr><!-- Table row for entering Start of Operations Date -->
                        <th><h4 class="white-header">Fecha de Comienzo de Operaciones: </h4></th>
                        <td><input type ="date" name = "Operaciones" required minlength = "10" value="0001-01-01" placeholder="Incorporacion"></td>
                    </tr>
                    
                    <tr><!-- Table row for entering Industry Type -->
                        <th><h4 class="white-header">Tipo de Industria: </h4></th>
                        <td>
                            <input type="text" name="Industria" list = "Industria">
                             <!-- PHP code to dynamically populate the datalist options from the "demograficos" table -->
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

                    <tr> <!-- Table row for entering NAICS code -->
                        <th><h4 class="white-header">Código NAICS: </h4></th>
                        <td><input type ="text" name = "NAICS"  maxlength= "6" placeholder="NAICS"></td>
                    </tr>

                    <tr><!-- Table row for entering NAICS code description -->
                        <th><h4 class="white-header">Descripción del Código NAICS: </h4></th>
                        <td><input type ="text" name = "Descripcion"  maxlength= "250" placeholder="Descripcion"></td>
                    </tr>

                    <tr><!-- Table row for heading of contact information section -->
                        <th><h3 class="orange-header">Información del Contacto:</h3></th>
                    </tr>
                
                    <tr><!-- Table row for entering contact name -->
                        <th><h4 class="white-header">Nombre del Contacto: </h4></th>
                        <td><input type ="text" name = "Contacto"  maxlength= "64" placeholder="Contacto"></td>
                    </tr>

                    <tr><!-- Table row for entering primary phone number -->
                        <th><h4 class="white-header">Teléfono Primario: </h4></th>
                        <td><input type ="tel" name = "Telefono"  maxlength= "12" placeholder="787-000-0000"></td>
                    </tr>

                    <tr><!-- Table row for entering cell phone number -->
                        <th><h4 class="white-header">Teléfono Celular: </h4></th>
                        <td><input type ="tel" name = "Celular"  maxlength= "12" placeholder="787-000-0000"></td>
                    </tr>

                    <tr><!-- Table row for entering physical address -->
                        <th><h4 class="white-header">Dirección Física: </h4></th>
                        <td><input type ="text" name = "DirFisica"  maxlength= "150" placeholder="Direccion"></td>
                    </tr>
                    
                    <tr><!-- Table row for entering postal address -->
                        <th><h4 class="white-header">Dirección Postal: </h4></th>
                        <td><input type ="text" name = "DirPostal"  maxlength= "150" placeholder="Direccion"></td>
                    </tr>

                    <tr> <!-- Define a table row for the primary email address -->
                        <th><h4 class="white-header">Correo Electrónico Primario (Email): </h4></th>
                        <td><input type ="email" name = "Email"  maxlength= "64" placeholder="Email"></td>
                    </tr>

                    <tr> <!-- Define a table row for the secondary email address -->
                        <th><h4 class="white-header">Correo Electrónico Secundario (Email): </h4></th>
                        <td><input type ="email" name = "Email2"  maxlength= "64" placeholder="Email"></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td><!-- Define a table data cell that contains a submit button -->
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
