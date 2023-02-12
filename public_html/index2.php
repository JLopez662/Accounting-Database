<!DOCTYPE html>
<html lang="en">

<?php include 'header3.php';?>

<?php

    // Check if the submit-search button is clicked
    if(isset($_POST['submit-search']))
    {  
        // Escaping any malicious inputs from the user
        $User = mysqli_real_escape_string($conn,$_POST['User']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);
  
        // Storing the search result page URL in a variable
        $url = 'searchdd.php';

                
        // Searching the empleados table for the given username and password
        $sql="SELECT * FROM empleados WHERE User LIKE '$User' AND Pass LIKE '$Pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

                
        // If the search result is exactly 1, redirect the user to the search result page
        if($count==1)
        {
            echo '<script> window.location.href = "searchdd.php";</script>';
        }
                
        // If the search result is not exactly 1, redirect the user back to the index page and display an error message
        else
        {
            echo '<script>
            window.location.href = "index.php";
            alert("Login failed. Invalid username or password")
            </script>';
        }
    }

?>

<!-- Create Client button -->
<button type="submit"  name = "submit-search"><a href="ingreso.php">Crear Cliente</a></button>
 
<!-- Logo -->
<p><img src="LogoCH.gif" class="logo-ch"></p>

<!-- Reload function -->
<script>
        
    // Reload the page if the session variables VAD and VYD are different
    //If the Session doesn't correspond to the current User.
    function Reloadd()
    {
        <?php 
            if($_SESSION['VAD'] != $_SESSION['VYD'])
            {
                ?>
                location.reload();
                <?php 
            }
        ?>
    }
Reloadd();
</script>

</body>
</html>

