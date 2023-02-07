<?php include 'header9.php'; ?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
                <h1 class="spacer">Complete la información del nuevo cliente:</h1>
                <h2 class="white-header"><br>Data Confidencial</h2>
                        
                <form action = "signuptest4.php" method="POST">
                
                <table>
                    <tr>
                        <th><h3 class="orange-header">Credenciales en SURI:</h3></th>   
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Usuario en SURI: </h4></th>
                        <td><input type ="text" name = "UserSuri"  required minlength = "1" maxlength= "150" placeholder="Usuario SURI"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">Contraseña en SURI: </h4></th>
                        <td><input type ="text" name = "PassSuri" required minlength = "1"  maxlength= "150" placeholder="Contraseña SURI"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales EFTPS:</h3></th>   
                    </tr>
                
                    <tr>
                        <th><h4 class="white-header">EFTPS (EIN o SSN): </h4></th>
                        <td><input type ="text" name = "UserEftps" maxlength= "11" placeholder="Usuario EFTPS"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">EFTPS PIN : </h4></th>
                        <td><input type ="text" name = "PIN"  maxlength= "64" placeholder="PIN"></td>
                    </tr>

                    <tr>
                        <th><h4 class="white-header">EFTPS Internet Password: </h4></th>
                        <td><input type ="text" name = "PassEftps"  maxlength= "64" placeholder="Contraseña EFTPS"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales CFSE:</h3></th>   
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Usuario CFSE: </h4></th>
                        <td><input type ="text" name = "UserCFSE"  maxlength= "64" placeholder="Usuario CFSE"></td>
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Contraseña CFSE: </h4></th>
                        <td><input type ="text" name = "PassCFSE"  maxlength= "64" placeholder="Contraseña CFSE"></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales en Departamento del Trabajo:</h3></th>   
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Usuario en Departamento del Trabajo: </h4></th>
                        <td><input type ="text" name = "UserDept"  maxlength= "64" placeholder="Usuario Dept Trabajo"></td>
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Contraseña en Departamento del Trabajo: </h4></th>
                        <td><input type ="text" name = "PassDept"  maxlength= "64" placeholder="Contraseña Dept "></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Cofim:</h3></th>   
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Usuario Cofim: </h4></th>
                        <td><input type ="text" name = "UserCofim"  maxlength= "64" placeholder="UserCofim"></td>
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Contraseña Cofim: </h4></th>
                        <td><input type ="text" name = "PassCofim"  maxlength= "64" placeholder="PassCofim "></td>
                    </tr>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Municipio:</h3></th>   
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Usuario Municipio: </h4></th>
                        <td><input type ="text" name = "UserMunicipio"  maxlength= "64" placeholder="UserMunicipio"></td>
                    </tr>

                    <tr>
                        <th><h4 style="color:white">Contraseña Municipio: </h4></th>
                        <td><input type ="text" name = "PassMunicipio"  maxlength= "64" placeholder="PassMunicipio "></td>
                    </tr>

                </table>

                <table>
                    <tr>
                        
                        <td>
                            <br><button type = "submit" name = "submit" onclick = "notify()"> Finalizar </button>
                        </td>
                    </tr>
                </table>
            </form>

            <script>
                    function notify(){ alert("Creando nuevo cliente.\nSi fue creado exitosamente, regresarás a la página principal.") }
                </script>

            </div>  
        </div>
    </div>
</div>    

</body>
</html>
