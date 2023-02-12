

<?php /*$path = "C:\\Example\ExampleOne";*/?>

<?php 


 include 'dbh.php';
 include 'header4.php';

    // Check if the 'VYD' session is empty, if so, set it to an empty string
    if(empty($_SESSION['VYD']))
    {
        $_SESSION['VYD'] = "";
    }

    // Set the 'VAD' session to the 'VID' session
    $_SESSION['VAD'] = $_SESSION['VID'];

    // Store the 'VAD' session in the $id variable
    $id = $_SESSION['VAD'];

    // Query the 'demograficos' table to retrieve data where the ID matches the stored $id
    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID LIKE '%$id%'");
    
    // Fetch an array of data from the query result
    $row= mysqli_fetch_array($result);

    // Store the directory (Dir) in the $url variable
    $url = $row['Dir'];

    // Start the URL using exec() function to open the directory
    exec('start "" "'.$url.'"');

//Close the window when finished opening the directory
echo "<script type=\"text/javascript\" charset=\"utf-8\">window.self.close()</script>";

?>

