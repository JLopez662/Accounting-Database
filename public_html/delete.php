<?php
    include 'header4.php';

    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID='" . $_GET['ID'] . "'");
    $row= mysqli_fetch_array($result);

    $result2 = mysqli_query($conn,"SELECT * FROM identificacion WHERE ID='" . $_GET['ID'] . "'");
    $row2= mysqli_fetch_array($result2);

    $name = $row['Nombre'];
    $idx = $row['ID'];
    $naics = $row['NAICS'];
    $ssn = $row['SSN'];

?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">
  
                <h2 class="white-header">Seguro que necesitas remover a <?php echo $name; ?> ? </h2>
                <br/>
                <h2 >Su ID es: <?php echo $idx; ?> </h2>
                <br>
                <h2 class="white-header"> Confirme el ID del cliente para remover: </h2>

                <body>
                    <tr>
                        <td>
                            <form action = "" method="POST">
                            <input type ="text" name = "Identifier" required minlength = "3" placeholder= "***" />
                       
                            <input type = "submit" name = "delete" value="Remover Cliente" />
                            </form>
                        </td> 
                    </tr>
                   
                </body>
                
                <?php

                    if(isset($_POST['delete']))
                    {
                        $id =  mysqli_real_escape_string($conn,$_POST['Identifier']);

                        if($id != $idx)
                        {
                            echo '<script type = "text/javascript"> alert("Debe usar el ID correcto para confirmar!") </script>';
                        }
                        else
                        {
                            $query1 = "DELETE FROM confidencial WHERE ID = '$id' ";

                            $query2 = "DELETE FROM pago WHERE ID = '$id' ";

                            $query3 = "DELETE FROM identificacion WHERE ID = '$id' ";

                            $query4 = "DELETE FROM contributivos WHERE ID = '$id' ";

                            $query5 = "DELETE FROM administrativo WHERE ID = '$id' ";

                            $query6 = "DELETE FROM demograficos WHERE ID = '$id' ";

                            $query9 = "DELETE FROM registro WHERE ID = '$id' ";


                            $query_run1 = mysqli_query($conn, $query1);

                            $query_run2 = mysqli_query($conn, $query2);

                            $query_run3 = mysqli_query($conn, $query3);
                    
                            $query_run4 = mysqli_query($conn, $query4);
                    
                            $query_run5 = mysqli_query($conn, $query5);
                    
                            $query_run6 = mysqli_query($conn, $query6);
                    
                            $query_run9 = mysqli_query($conn, $query9);

                            if($query_run9)
                            {
                                ?>

                                <script type = "text/javascript"> 
                                alert("Cliente ha sido removido exitosamente");
                                window.location.replace("index2.php?delete=success"); 
                                </script>

                                <?php
                            }
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
