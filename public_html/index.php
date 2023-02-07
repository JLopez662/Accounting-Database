<!DOCTYPE html>
<html lang="en">

<?php
    include 'header2.php';
    session_start();
?>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-7">
                    <div class="header-content">
                        <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>
                        <h1>Base de Datos - Clientes</h1>
                        <div class="container">
                            <div class="form-input">
                            <form name = "form" action = "index.php" method= "POST">
                                
                                    <input type="text" id="User" name="User" placeholder="Usuario" 
                                    class="form-input-one" required minlength="1"/>
                                    <input type="password" id = "Pass" name="Pass" placeholder="Contraseña" 
                                    class="form-input-one" required minlength="1"/>
                                    <button type="submit" class="login-button" value = "Login" 
                                    name = "submit-login">Acceder</button>
                            </form>
                            </div>

                            <button type="submit" name = "submit-search"> 
                            <a href="newemployee.php">Crear Usuario</a></button>
                            <img src="LogoCH.gif" class="logo-image">   
                            </div>  
                         </div>
                    </div>
                </div>
            </div>
        </div>

            
<?php
    if(isset($_POST['submit-login']))
    {
        $User = mysqli_real_escape_string($conn,$_POST['User']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);
        $sql =" SELECT * FROM empleados WHERE User = '$User' AND Pass = '$Pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==1)
        {
            $_SESSION['EMID'] = $row['EID'];
            $_SESSION['LN'] = $row['FirstName'];
            
            echo '<script>window.location.href = "index2.php";</script>';
        }

        else
        {
            echo '<script>
            window.location.href = "index.php";
            alert("Credenciales Invalidas en el campo de Usuario o Contraseña!")
            </script>';
        }
    }
?>               

</body>
</html>
