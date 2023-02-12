<?php include 'header2.php'; ?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
                <!--Description of the purpose of this section-->
                <h1 class="move-down">Complete su información</h1>
                <h1>para crear su cuenta</h2>
                        
                <!-- This code sets up a form for creating an employee account, with the action "signupemployee.php" and the method "POST". -->
                <form action = "signupemployee.php" method="POST">
                    <table >
                        
                         <!-- Sets up a table row for entering the employee ID, with a header of "ID (Iniciales):". -->
                        <tr>
                            <th> <h4 class="white-header">ID (Iniciales):</h4> </th>
                            <td><input type ="text" name = "EID" required minlength = "3" 
                             maxlength= "4" placeholder="***"></td>
                        </tr>
                        
                        <!-- Sets up a table row for entering the employee first name, with a header of "Nombre:". -->
                        <tr>
                            <th> <h4 class="white-header"> Nombre: </h4> </th>
                            <td><input type ="text" name = "FirstName" required minlength = "1" 
                            maxlength= "64"></td>
                        </tr>
                    
                        <!-- Sets up a table row for entering the employee last name, with a header of "Apellidos:". -->
                        <tr>
                            <th> <h4 class="white-header"> Apellidos: </h4> </th>
                            <td><input type ="text" name = "LastName" maxlength= "64"></td>
                        </tr>
                    
                        <!-- Sets up a table row for entering the employee email (user), with a header of "Usuario (Email):". -->
                        <tr>
                            <th><h4 class="white-header">Usuario (Email): </h4></th>
                            <td><input type ="email" name = "User" required minlength = "7" 
                            maxlength= "64"></td>
                        </tr>
                   
                        <!-- Sets up a table row for entering the employee password, with a header of "Contraseña:". -->
                        <tr>
                            <th><h4 class="white-header"> Contraseña: </h4></th>
                            <td><input type ="password" name = "Pass" required minlength = "5" 
                            maxlength= "64"placeholder="***********"></td>
                        </tr>
                    </table>

                    <!-- Confirms new employee's account, with a label of "Crear Cuenta" -->
                    <table>
                        <tr>   
                            <td>
                                <button type = "submit" name = "submit" class="custom-button" 
                                onclick = "notify()"> Crear Cuenta </button>
                            </td>
                        </tr>
                    </table>
                </form>

            <!-- Quick notification of succesful new employee account-->
            <script> function notify(){ 
                alert("Su cuenta de empleado ha sido creada exitosamente.") 
            } 
            </script>

            </div>  
        </div>
    </div>
</body>
</html>
