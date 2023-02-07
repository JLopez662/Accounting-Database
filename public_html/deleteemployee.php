<?php
    include 'header4.php';

    $result = mysqli_query($conn,"SELECT * FROM empleados WHERE FirstName='" . $_SESSION['FN'] . "'");
    $row= mysqli_fetch_array($result);
    $eid = $row['EID'];
?>

<div class="container">
    <div class="row h-50 align-items-center">
        <div class="col-md-7">
            <div class="header-content">

            <h2 class= "white-header"><?php echo $row['FirstName']; ?>, confirmarás la eliminación de su cuenta? </h2><br/>
            <h2 >Su ID es: <?php echo $eid ?> </h2><br>
            <h2 class= "white-header"> Confirme su ID de empleado para remover su cuenta: </h2>
        </div>
    
    <body>
        <tr>
        <td><form action = "" method="POST">
            <input type ="text" name = "Identifier" required minlength = "3" maxlength= "4" placeholder= "***" /></td> 
            <input type = "submit" name = "delete" value="Remover Cliente" /> <br>
        </form>
        </tr>
            
    </body>

    <?php
        if(isset($_POST['delete']))
            {
                $id =  mysqli_real_escape_string($conn,$_POST['Identifier']);

                if($id != $eid)
                {
                    ?>
                        <script type = "text/javascript"> 
                        alert("Debe confirmar con su ID correspondiente");
                        window.location.replace("deleteemployee.php?"); 
                        </script> ;
                    <?php
                }
                else
                {
                    $query1 = "DELETE FROM empleados WHERE EID = '$eid' ";
                    $query_run1 = mysqli_query($conn, $query1);
                }

                if($query_run1)
                {
                    ?>

                    <script type = "text/javascript"> 
                    alert("Se ha removido la cuenta de empleado exitosamente");
                    window.location.replace("index.php?delete=success"); 
                    </script> ;

                    <?php
                }
                    
                else{ echo '<script type = "text/javascript"> alert("No se pudo remover al cliente") </script>' ; }       
            }
    ?>

    </body>
    </div>
</div>  
</html>
