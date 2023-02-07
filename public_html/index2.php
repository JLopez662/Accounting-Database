<!DOCTYPE html>
<html lang="en">

<?php include 'header3.php';?>

<?php
    if(isset($_POST['submit-search']))
    {
        $User = mysqli_real_escape_string($conn,$_POST['User']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);
        $url = 'searchdd.php';
        $sql="SELECT * FROM empleados WHERE User LIKE '$User' AND Pass LIKE '$Pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==1)
        {
            echo '<script> window.location.href = "searchdd.php";</script>';
        }
        
        else
        {
            echo '<script>
            window.location.href = "index.php";
            alert("Login failed. Invalid username or password")
            </script>';
        }
    }

?>

<button type="submit"  name = "submit-search"><a href="ingreso.php">Crear Cliente</a></button>
 
<p><img src="LogoCH.gif" class="logo-ch"></p>

<script>
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

