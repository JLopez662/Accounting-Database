<?php
    // include the header file
    include 'header4.php';

    // query the database to retrieve the data of the employee whose FirstName is stored in the session
    $result = mysqli_query($conn,"SELECT * FROM empleados WHERE FirstName='" . $_SESSION['FN'] . "'");
    $row= mysqli_fetch_array($result);
    
    // store the employee ID in a variable
    $eid = $row['EID'];
?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">

            <!-- display message for user to confirm if they want to delete their account -->
            <h2 class= "white-header"><?php echo $row['FirstName']; ?>, confirmarás la eliminación de su cuenta? </h2><br/>
            
            <!-- display the employee's ID -->
            <h2 >Su ID es: <?php echo $eid ?> </h2><br>
            <h2 class= "white-header"> Confirme su ID de empleado para remover su cuenta: </h2>
        </div>
    
    <body>
        <tr>
        <td><form action = "" method="POST">

            <!-- input field for the employee ID -->
            <input type ="text" name = "Identifier" required minlength = "3" maxlength= "4" placeholder= "***" /></td> 

             <!-- submit button to initiate the deletion -->
            <input type = "submit" name = "delete" value="Remover Cuenta" /> <br>
        </form>
        </tr>
            
    </body>

    <?php
        // check if the delete button is clicked
        if(isset($_POST['delete']))
            {
                // escape the user input to prevent SQL injection
                $id =  mysqli_real_escape_string($conn,$_POST['Identifier']);

                 // check if the input ID matches the employee's ID
                if($id != $eid)
                {
                    // if the IDs do not match, show an error message
                    // redirect the user back to the delete page
                    ?>
                        <script type = "text/javascript"> 
                        alert("Debe confirmar con su ID correspondiente");
                        window.location.replace("deleteemployee.php?"); 
                        </script> ;
                    <?php
                }
                else
                {
                    // if the IDs match, delete the employee's account from the database
                    $query1 = "DELETE FROM empleados WHERE EID = '$eid' ";
                    $query_run1 = mysqli_query($conn, $query1);
                }

                // check if the deletion was successful
                if($query_run1)
                {
                     // if successful, show a success message and redirect the user to the main page
                    ?>
                    <script type = "text/javascript"> 
                    alert("Se ha removido la cuenta de empleado exitosamente");
                    window.location.replace("index.php?delete=success"); 
                    </script> ;
                    <?php
                }
                    
                //In case of failure from deletion, notify the user about the issue
                else{ echo '<script type = "text/javascript"> alert("No se pudo remover al cliente") </script>' ; }       
            }
    ?>

    </body>
    </div>
</div>  
</html>
