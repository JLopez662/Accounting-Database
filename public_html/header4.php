<?php
    ob_start();
    include 'employee.php';
	include 'dbh.php';

    if(empty($_SESSION['VID'])){ $_SESSION['VID'] = ""; }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Cortes Hernandez CPA</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
  <link rel="stylesheet" href="assets/css/style2.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<header class="header d-flex justify-content-center">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-7">
                <div class="header-content">
                    <h3 class="header-title"><strong class="text-primary"></strong><span></span></h3>

                    <form method = "POST">
                        <input type="hidden" name="searchdd" required minlength = "3" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" /> 
                              
                        <input type="hidden" name="searchdc" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" /> 

                        <input type="hidden" name="searchdi" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" /> 

                        <input type="hidden" name="searchda" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" /> 
                            
                        <input type="hidden" name="searchcf" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" /> 

                        <input type="hidden" name="searchcm" 
                        placeholder="Ejemplo: AAA" value = "<?php echo $_SESSION['VYD']; ?>" />
                        
                        <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
                        <div class="container">
                        
                        <a class="navbar-brand" href="index2.php"><strong class="text-primary">
                        <img src="CH.png" class="ch-logo"></a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <button type="submit" class="custom-submit-search" name = "submit-search" onClick="window.location.reload()" 
                                    formaction = "searchdd.php">Demográficos</button>
                                </li>

                                <li class="nav-item">
                                    <button type="submit" class="custom-submit-search" name="submit-search" 
                                    formaction="searchdcx.php">Contributivos</button>
                                </li>
                                <li class="nav-item">
                                    <button type="submit" class="custom-submit-search" name = "submit-search" 
                                    formaction = "searchdix.php">Identificación</button>   
                                </li>
                                <li class="nav-item">
                                        <button type="submit" class="custom-submit-search" name = "submit-search" 
                                        formaction = "searchda.php">Administrativos</button>  
                                </li>
                                <li class="nav-item">
                                    <button type="submit" class="custom-submit-search" name = "submit-search"
                                    formaction = "searchpm.php">Método de Pago</button>      
                                </li>
                                <li class="nav-item">
                                    <button type="submit" class="custom-submit-search" name = "submit-search"
                                    formaction = "searchcf.php">Confidencial</button>   
                                </li>
                                <li class="nav-item">
                                    <label for="type" ></label>
                                    <select onchange="window.location = this.options[this.selectedIndex].value;">
                                        <option value="index.php" >Mi Cuenta</option>
                                        <option value="index.php" >Cerrar Sesión</option>
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

   