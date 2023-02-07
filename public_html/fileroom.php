

<?php /*$path = "C:\\Example\ExampleOne";*/?>

<?php 


 include 'dbh.php';
 include 'header4.php';

    if(empty($_SESSION['VYD']))
    {
        $_SESSION['VYD'] = "";
    }

    $_SESSION['VAD'] = $_SESSION['VID'];
    $id = $_SESSION['VAD'];

    $result = mysqli_query($conn,"SELECT * FROM demograficos WHERE ID LIKE '%$id%'");
    $row= mysqli_fetch_array($result);

    $url = $row['Dir'];

    exec('start "" "'.$url.'"');

echo "<script type=\"text/javascript\" charset=\"utf-8\">window.self.close()</script>";

?>

