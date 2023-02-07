<?php include 'header2.php'; ?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
                <h1 class="move-down">Complete su información</h1>
                <h1>para crear su cuenta</h2>
                        
                <form action = "signupemployee.php" method="POST">
                    <table >
                        <tr>
                            <th> <h4 class="white-header">ID (Iniciales):</h4> </th>
                            <td><input type ="text" name = "EID" required minlength = "3" 
                             maxlength= "4" placeholder="***"></td>
                        </tr>
                    
                        <tr>
                            <th> <h4 class="white-header"> Nombre: </h4> </th>
                            <td><input type ="text" name = "FirstName" required minlength = "1" 
                            maxlength= "64"></td>
                        </tr>

                        <tr>
                            <th> <h4 class="white-header"> Apellidos: </h4> </th>
                            <td><input type ="text" name = "LastName" maxlength= "64"></td>
                        </tr>

                        <tr>
                            <th><h4 class="white-header">Usuario (Email): </h4></th>
                            <td><input type ="email" name = "User" required minlength = "7" 
                            maxlength= "64"></td>
                        </tr>

                        <tr>
                            <th><h4 class="white-header"> Contraseña: </h4></th>
                            <td><input type ="password" name = "Pass" required minlength = "5" 
                            maxlength= "64"placeholder="***********"></td>
                        </tr>
                    </table>

                    <table>
                        <tr>   
                            <td>
                                <button type = "submit" name = "submit" class="custom-button" 
                                onclick = "notify()"> Crear Cuenta </button>
                            </td>
                        </tr>
                    </table>
                </form>

            <script> function notify(){ 
                alert("Su cuenta de empleado ha sido creada exitosamente.") 
            } 
            </script>

            </div>  
        </div>
    </div>
</body>
</html>
