<?php

    session_start();

    if(isset($_POST['submit-login']))
        {
            $User = mysqli_real_escape_string($conn, $_POST['User']);
            $sql = "SELECT FirstName FROM empleados WHERE `User` LIKE '%User%'
            OR `User` LIKE '%$User%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if($queryResult == 1)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                { 
                    $FirstName = $row['FirstName']; 
                    $_SESSION['FN'] = $FirstName;
                } 
                
            }
            else
            { echo ""; } 
        }
?>