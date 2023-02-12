<?php
    // Start a new PHP session
    session_start();

    // Check if the login form has been submitted
    if(isset($_POST['submit-login']))
        {
            // Escaping user input to prevent SQL injection
            $User = mysqli_real_escape_string($conn, $_POST['User']);

            // SQL query to select the FirstName from the 'empleados' table where the User matches 
            //either '%User%' or the escaped user input
            $sql = "SELECT FirstName FROM empleados WHERE `User` LIKE '%User%'
            OR `User` LIKE '%$User%'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Get the number of rows returned by the query
            $queryResult = mysqli_num_rows($result);

            // Check if the query returned exactly one row
            if($queryResult == 1)
            {
                 // Fetch the FirstName from the result set
                while ($row = mysqli_fetch_assoc($result)) 
                { 
                    // Store the FirstName in the session
                    $FirstName = $row['FirstName']; 
                    $_SESSION['FN'] = $FirstName;
                } 
                
            }
            else
            // If the query did not return exactly one row, do nothing
            { echo ""; } 
        }
?>