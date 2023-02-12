<?php
    include 'header4.php';

    // query to select all data from the "demograficos" table for the specified ID from the GET request
    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID='" . $_GET['ID'] . "'");
    
    // fetch the data from the result of the above query as an array
    $row= mysqli_fetch_array($result);

    // query to select all data from the "identificacion" table for the specified ID from the GET request
    $result2 = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    
    // fetch the data from the result of the above query as an array
    $row2= mysqli_fetch_array($result2);

    //store the name, ID, NAICS and SSN from the data fetched from the "demograficos" table in variables
    $name = $row['Nombre'];
    $idx = $row['ID'];
    $naics = $row['NAICS'];
    $ssn = $row['SSN'];

?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
  
                <!-- display a prompt to confirm removal of the client with the specified name -->
                <h2 class="white-header">Seguro que necesitas remover a <?php echo $name; ?> ? </h2>
                <br/>

                 <!-- display the ID of the client to be removed -->
                <h2 >Su ID es: <?php echo $idx; ?> </h2>
                <br>
                
                 <!-- ask the user to confirm the removal by entering the ID of the client -->
                <h2 class="white-header"> Confirme el ID del cliente para remover: </h2>

                <body>
                    <tr>
                        <td>
                             <!-- form to accept the confirmation of the removal -->
                            <form action = "" method="POST">

                            <!-- input field for the ID of the client -->
                            <input type ="text" name = "Identifier" required minlength = "3" placeholder= "***" />
                       
                            <!-- submit button to initiate the removal -->
                            <input type = "submit" name = "delete" value="Remover Cliente" />
                            </form>
                        </td> 
                    </tr>
                   
                </body>
                
                <?php

                    // check if the form has been submitted
                    if(isset($_POST['delete']))
                    {
                        // escape the entered ID for security
                        $id =  mysqli_real_escape_string($conn,$_POST['Identifier']);

                         // check if the entered ID matches the ID of the client to be removed
                        if($id != $idx)
                        {
                             // display an error message if the IDs do not match
                            echo '<script type = "text/javascript"> alert("Debe usar el ID correcto para confirmar!") </script>';
                        }
                        else
                        {     
                            // Delete query for the confidential table
                            $query1 = "DELETE FROM confidencial WHERE ID = '$id' ";

                            // Delete query for the payment table
                            $query2 = "DELETE FROM pago WHERE ID = '$id' ";

                            // Delete query for the identification table
                            $query3 = "DELETE FROM identificacion WHERE ID = '$id' ";

                            // Delete query for the contributive table
                            $query4 = "DELETE FROM contributivos WHERE ID = '$id' ";

                            // Delete query for the administrative table
                            $query5 = "DELETE FROM administrativo WHERE ID = '$id' ";

                             // Delete query for the demographic table
                            $query6 = "DELETE FROM demograficos WHERE ID = '$id' ";

                            // Delete query for the registration table
                            $query9 = "DELETE FROM registro WHERE ID = '$id' ";

                            //Execute each corresponding query
                            $query_run1 = mysqli_query($conn, $query1);

                            $query_run2 = mysqli_query($conn, $query2);

                            $query_run3 = mysqli_query($conn, $query3);
                    
                            $query_run4 = mysqli_query($conn, $query4);
                    
                            $query_run5 = mysqli_query($conn, $query5);
                    
                            $query_run6 = mysqli_query($conn, $query6);
                    
                            $query_run9 = mysqli_query($conn, $query9);

                            // Check if the client was successfully deleted
                            if($query_run9)
                            {
                                // Show success alert and redirect to index2.php with "delete=success" parameter
                                ?>

                                <script type = "text/javascript"> 
                                alert("Cliente ha sido removido exitosamente");
                                window.location.replace("index2.php?delete=success"); 
                                </script>

                                <?php
                            }
                            // Show error alert
                            else{ echo '<script type = "text/javascript"> alert("No se pudo remover al cliente") </script>' ; }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
