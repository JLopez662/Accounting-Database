<!DOCTYPE html>
<html lang="en">

<?php
    // Include the header file
    include 'header2.php';
    // Start the session
    session_start();
?>
    <!-- header section -->
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-7">
                    <div class="header-content">
                        <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>
                        
                        <!-- Title -->
                        <h1>Base de Datos - Clientes</h1>
                        <div class="container">
                            <div class="form-input">
                            
                            <!-- Form to get user inputs -->
                            <form name = "form" action = "index.php" method= "POST">

                                    <!-- User input field for login -->
                                    <input type="text" id="User" name="User" placeholder="Usuario" 
                                    class="form-input-one" required minlength="1"/>
                                    
                                    <!-- Password input field for login -->
                                    <input type="password" id = "Pass" name="Pass" placeholder="Contraseña" 
                                    class="form-input-one" required minlength="1"/>
                                    
                                    <!-- Submit button for login -->
                                    <button type="submit" class="login-button" value = "Login" 
                                    name = "submit-login">Acceder</button>
                            </form>
                            </div>

                            <!-- Link to create a new user -->
                            <button type="submit" name = "submit-search"> 
                            <a href="newemployee.php">Crear Usuario</a></button>

                            <!-- Logo -->
                            <img src="LogoCH.gif" class="logo-image">   
                            </div>  
                         </div>
                    </div>
                </div>
            </div>
        </div>
            
<?php
    // Check if submit-login button is clicked
    if(isset($_POST['submit-login']))
    {
        // Escape input strings to prevent SQL injection
        $User = mysqli_real_escape_string($conn,$_POST['User']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);

        // SQL query to select the user
        $sql =" SELECT * FROM empleados WHERE User = '$User' AND Pass = '$Pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // Check if user exists
        if($count==1)
        {
            // Set the user session
            $_SESSION['EMID'] = $row['EID'];
            $_SESSION['LN'] = $row['FirstName'];

             // Redirect to index2.php
            echo '<script>window.location.href = "index2.php";</script>';
        }

        else
        {
            //Notify incorrect credentials on user or password field
            echo '<script>
            window.location.href = "index.php";
            alert("Credenciales Invalidas en el campo de Usuario o Contraseña!")
            </script>';
        }
    }
?>               

</body>
</html>