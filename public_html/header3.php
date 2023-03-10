<?php
    include 'employee.php';
	include 'dbh.php';

    //Check if the session variables are empty, if so, initialize them to an empty string -->    
    if(empty($_SESSION['VID'])){ $_SESSION['VID'] = ""; }
    if(empty($_SESSION['VYD'])){ $_SESSION['VYD'] = ""; }
    if(empty($_SESSION['FN'])){ $_SESSION['FN'] = ""; }
    if(empty($_SESSION['LN'])){ $_SESSION['LN'] = ""; }

    // Checking if the values of 'FN' and 'LN' are not equal, if yes then setting 'FN' to the value of 'LN'
    if(  $_SESSION['FN'] != $_SESSION['LN']){ $_SESSION['FN'] = $_SESSION['LN']; }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">

    <!-- Setting the title of the document -->
    <title>Cortes Hernandez CPA</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<header class="header d-flex justify-content-center">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-7">
                <div class="header-content">
                    <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>

                    <!-- Greeting the user -->
                    <h1><br/><br/>Saludos <?php echo $_SESSION['FN']; ?> </h1><br/>
    
                    <!-- Requesting for the input -->
                    <h2 class="white-header">Ingrese ID</h2>
                    <h2 class="white-header">o nombre del cliente:</h2><br/>

                    <!-- Form to search for clients by ID or name -->
                    <form method = "POST">
                    <input type="text" name="searchdd" required minlength = "3" list = "ID" 
                    value = "<?php echo $_SESSION['VID']; ?>">

                    <!-- Data list to show the ID and name of clients -->
                    <datalist id = "ID">
                    <?php

                        //Query the database to retrieve the client information
                        $sql = "SELECT * FROM `demograficos`";
                        $select = $conn ->query($sql);

                         // Loop through the rows of the demograficos table
                        while($row = $select-> fetch_assoc() )
                        {
                            ?>
                                 
                            <!-- Create an option element with the ID from the demograficos table as the value -->
                            <option value ="<?php $row['ID'] ?>"></option>
                            <option value="<?php echo $row["ID"];?>">
                            <?php 

                                //Display the ID and name from the demograficos table
                                echo $row["ID"];
                                echo " ";
                                echo $row["Nombre"];
                            ?>
                            </option>
                            <?php   
                        }
                    ?>
                    </datalist>

                    <!-- Create hidden input elements with the same value as the $_SESSION['VYD'] variable -->
                    <input type="hidden" name="searchdc" placeholder="Ejemplo: AAA" 
                    value = "<?php echo $_SESSION['VYD']; ?>" /> 

                    <input type="hidden" name="searchdi" placeholder="Ejemplo: AAA" 
                    value = "<?php echo $_SESSION['VYD']; ?>" /> 

                    <input type="hidden" name="searchda" placeholder="Ejemplo: AAA"
                    value = "<?php echo $_SESSION['VYD']; ?>" />

                    <input type="hidden" name="searchpm" placeholder="Ejemplo: AAA"
                    value = "<?php echo $_SESSION['VYD']; ?>" />  
                        
                    <input type="hidden" name="searchcf" placeholder="Ejemplo: AAA"
                    value = "<?php echo $_SESSION['VYD']; ?>" /> 
                        
                    <!-- Create a navigation bar with links to different search pages -->
                    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
                    <div class="container">
                    <a class="navbar-brand" href="index2.php"><strong class="text-primary">
                    <img src="CH.png" class="ch-logo"></a>
                        
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
                         <!-- Create buttons to search different types of data in the navigation bar-->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name = "submit-search" onClick="window.location.reload()" 
                                formaction = "searchdd.php">Demogr??ficos</button>
                            </li>

                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name="submit-search" 
                                formaction="searchdcx.php">Contributivos</button>
                            </li>
                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name = "submit-search" 
                                formaction = "searchdix.php">Identificaci??n</button>   
                            </li>
                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name = "submit-search" 
                                formaction = "searchda.php">Administrativos</button>  
                            </li>
                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name = "submit-search"
                                formaction = "searchpm.php">M??todo de Pago</button>      
                            </li>
                            <li class="nav-item">
                                <button type="submit" class="custom-submit-search" name = "submit-search"
                                formaction = "searchcf.php">Confidencial</button>   
                            </li>
                            
                            <!-- Dropdown menu for account and session management -->
                            <li class="nav-item">
                                <label for="type" ></label>
                                <select onchange="window.location = this.options[this.selectedIndex].value;">
                                    <option value="index.php" >Mi Cuenta</option>
                                    <option value="index.php" >Cerrar Sesi??n</option>
                                    <option value="updateemployee.php"  >Modificar Usuario</option>
                                    <option value="deleteemployee.php"  >Eliminar Usuario</option>
                                </select>
                            </li>
                        </ul>
                   
                    </div>
                    
                </form>
                </div>
                </nav>
            </div>

   