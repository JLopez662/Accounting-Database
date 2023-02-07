<style>

body{
 background:
        /* top, transparent black, faked with gradient */ 
        linear-gradient(
          rgba(0, 0, 0, 0.6), 
          rgba(0, 0, 0, 0.6)
        ),
        /* bottom, image */
        url('bgo.jpg');
        background-size: 100% 100%;
        background-attachment: fixed;
    }

</style>

<?php
    include 'header8.php';
?>
        <div class="container">
            <div class="row h-50 align-items-center">
                <div class="col-md-7">
                    <div class="header-content">

<h2>Someter información del nuevo cliente: </h2>

<form action = "signup.php" method="POST">
    <table >

        <tr>
            <th><h3>&nbsp </h3></th>
            <td>
                <br>
                
                <h3 style="color:white">Data Demográfica:</h3>
            </td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Código de Identificación: </h4> </th>
            <td><input type ="text" name = "ID" required minlength = "3" maxlength= "4" placeholder="ID"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Nombre &nbspLegal: </h4> </th>
            <td><input type ="text" name = "Nombre"  maxlength= "64" placeholder="Nombre"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Nombre Comercial: </h4> </th>
            <td><input type ="text" name = "NombreComercial"  maxlength= "64" placeholder="Nombre"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Tipo de Cliente: </h4> </th>
            <td><input type ="text" name = "Tipo" maxlength= "64" placeholder="Tipo"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white"> Número de Cuenta Patronal Federal (EIN): </h4> </th>
            <td><input type ="text" name = "Patronal" maxlength= "9" placeholder="Patronal"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white"> Número de Seguro Social: </h4></th>
            <td><input type ="text" name = "SSN"  maxlength= "9"placeholder="SSN"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Incorporación: </h4></th>
            <td><input type ="date" name = "Incorporacion"  placeholder="Incorporacion"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Comienzo de Operaciones: </h4></th>
            <td><input type ="date" name = "Operaciones" placeholder="Nacimiento"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Código NAICS: </h4></th>
            <td><input type ="text" name = "NAICS"  maxlength= "6" placeholder="NAICS"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Nombre del Contacto: </h4></th>
            <td><input type ="text" name = "Contacto"  maxlength= "64" placeholder="Contacto"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Teléfono Primario: </h4></th>
            <td><input type ="tel" name = "Telefono"  maxlength= "17" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Teléfono Celular: </h4></th>
            <td><input type ="tel" name = "Celular"  maxlength= "17" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="787-000-0000"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Dirección Física: </h4></th>
            <td><input type ="text" name = "DirFisica"  maxlength= "150" placeholder="Direccion"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Dirección Postal: </h4></th>
            <td><input type ="text" name = "DirPostal"  maxlength= "150" placeholder="Direccion"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Correo Electrónico Primario (Email): </h4></th>
            <td><input type ="email" name = "Email"  maxlength= "64" placeholder="Email"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Correo Electrónico Secundario (Email): </h4></th>
            <td><input type ="email" name = "Email2"  maxlength= "64" placeholder="Email"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            <th><h3>&nbsp </h3></th>
            <td>
                <br>
                <h3 style="color:white">Data Contributiva: </h3>
            </td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white"> Número de Cuenta Patronal Estatal: </h4> </th>
            <td><input type ="text" name = "Estatal"  maxlength= "9" placeholder="Estatal"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white"> Número de Póliza CFSE: </h4></th>
            <td><input type ="text" name = "Poliza"  maxlength= "12" placeholder="Poliza"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">  Número de Registro de Comerciante: </h4></th>
            <td><input type ="text" name = "RegComerciante"  maxlength= "11" placeholder="RegComerciante"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Vencimiento del Registro Comerciante: </h4></th>
            <td><input type ="date" name = "Vencimiento"  placeholder="Vencimiento"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Número de Cuenta de Seguro Choferil: </h4></th>
            <td><input type ="text" name = "Choferil"  maxlength= "10" placeholder="Choferil"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Número de Departamento de Estado: </h4></th>
            <td><input type ="text" name = "DeptEstado"  maxlength= "9" placeholder="DeptEstado"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            <th><h3>&nbsp </h3></th>
            <td>
                <br>
                
                <h3 style="color:white">Data de Identificación: </h3>
            </td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Nombre del Dueño o Accionista: </h4> </th>
            <td><input type ="text" name = "Accionista" maxlength= "25" placeholder="Accionista"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Cargo del Cliente: </h4> </th>
            <td><input type ="text" name = "Cargo" maxlength= "25" placeholder="Cargo"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th> <h4 style="color:white"> Número de Licencia de Conducir: </h4> </th>
            <td><input type ="text" name = "LicConducir"  maxlength= "8" placeholder="LicConducir"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Nacimiento: </h4></th>
            <td><input type ="date" name = "Nacimiento"
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            <th><h3>&nbsp </h3></th>
            <td>
                <br>
                
                <h3 style="color:white">Data Administrativa: </h3>
            </td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Contratación: </h4></th>
            <td><input type ="date" name = "Contrato" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Tipo de Facturación: </h4></th>
            <td><input type ="text" name = "Facturacion"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Facturacion Base: </h4></th>
            <td><input type ="text" name = "FacturacionBase"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Facturacion de IVU: </h4></th>
            <td><input type ="text" name = "IVU" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Staff A Cargo: </h4></th>
            <td><input type ="text" name = "Staff" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Staff A Cargo Desde: </h4></th>
            <td><input type ="date" name = "StaffDate" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            <th><h3>&nbsp </h3></th>
            <td>
                <br>
                <h3 style="color:white">Data Confidencial: </h3>
            </td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Nombre en Cuenta Bancaria: </h4></th>
            <td><input type ="text" name = "BankClient" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Cuenta Bancaria: </h4></th>
            <td><input type ="text" name = "Banco" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Número de Ruta: </h4></th>
            <td><input type ="text" name = "NumRuta"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Nombre del Banco: </h4></th>
            <td><input type ="text" name = "NameBank"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Tipo de Cuenta: </h4></th>
            <td><input type ="text" name = "TipoCuenta"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Nombre en Tarjeta: </h4></th>
            <td><input type ="text" name = "NameCard" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Tarjeta de Créditos: </h4></th>
            <td><input type ="text" name = "Tarjeta" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Tipo de Tarjeta: </h4></th>
            <td><input type ="text" name = "TipoTarjeta" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">CVS: </h4></th>
            <td><input type ="text" name = "CVS" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Fecha de Expiración: </h4></th>
            <td><input type ="date" name = "Expiracion" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Dirección Postal en Tarjeta: </h4></th>
            <td><input type ="text" name = "PostalBank" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Usuario en SURI: </h4></th>
            <td><input type ="text" name = "UserSuri" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Contraseña en SURI: </h4></th>
            <td><input type ="text" name = "PassSuri" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Usuario EFTPS: </h4></th>
            <td><input type ="text" name = "UserEftps" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Contraseña EFTPS: </h4></th>
            <td><input type ="text" name = "PassEftps" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Número PIN: </h4></th>
            <td><input type ="text" name = "PIN" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Usuario CFSE: </h4></th>
            <td><input type ="text" name = "UserCFSE"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Contraseña CFSE: </h4></th>
            <td><input type ="text" name = "PassCFSE" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Usuario Departamento Hacienda: </h4></th>
            <td><input type ="text" name = "UserDept" 
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>

        <tr>
            &nbsp
            <th><h4 style="color:white">Contraseña Departamento Hacienda: </h4></th>
            <td><input type ="text" name = "PassDept"  
            style="height:50px; background-color: #39393b; color: white"></td>
        </tr>



        </table>

        <table>

        <tr>
            
            <td>
                <br><br>
                
                <button type = "submit" name = "submit" 
                style="height:50px; background-color: #39393b; color: orange" 
                onclick = "notify()"> Someter Nuevo Cliente </button>
                <br><br>
            </td>
        </tr>
        </table>

    
</form>

<script>
    
    





    function notify()
    {
        alert("Creando nuevo cliente.\nSi fue creado exitosamente, regresarás a la página principal.")
    }
</script>


                    </div>  
                </div>
            </div>
   
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>

</body>

</html>
