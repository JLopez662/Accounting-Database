<?php 
    include 'header4.php';
    
    if(empty($_SESSION['VYD'])){ $_SESSION['VYD'] = ""; }        

    $_SESSION['VAD'] = $_SESSION['VID'];

    if(isset($_POST['submit-search']))
    {
        $searchdd = mysqli_real_escape_string($conn, $_POST['searchdd']);
        $sql = "SELECT * FROM demograficos WHERE `ID` LIKE '%$searchdd%' 
        OR `Nombre` LIKE '%$searchdd%' OR `NombreComercial` LIKE '%$searchdd%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        ?>
        <table>
        <?php    
            if($queryResult > 0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                        <tr class="white-header"><h1 class="move-down"></h1>
                            <td><h3 class="white-header">ID del Cliente: </h3></td>
                            <td><h3><?php echo $row['ID']; ?> </h3></td>
                        </tr>
                    
                    <?php 
                        if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                         
                        else{ $_SESSION['VID'] = ""; }

                        $session = $_SESSION['VID'];
                        $_SESSION['VYD'] = $session;
                    ?>

                    <form action = "searchdd.php" method="POST">
                        <input type="text" name="searchdd" required minlength = "3" list = "ID"
                        value = "<?php echo $_SESSION['VID']; ?>">
                        <datalist id = "ID">
                        <?php
                            $sqldd = "SELECT * FROM `demograficos`";
                            $select = $conn ->query($sqldd);
                            while($ids = $select-> fetch_assoc() )
                            {
                                ?>
                                <option value ="<?php $ids['ID'] ?>"></option>
                                <option value="<?php echo $ids["ID"];?>">
                                <?php 
                                    echo $ids["ID"];
                                    echo " ";
                                    echo $ids["Nombre"];
                                    echo " ";
                                    echo $ids["NombreComercial"];
                                ?>
                                </option>

                                <?php   
                            }
                        ?>
                        </datalist>
                        <button type="submit" name = "submit-search">Buscar</button><br/> 
                    </form>

                    <?php
                        if($queryResult > 1){ echo "Se ha encontrado ".$queryResult." resultados"; }
    
                        if($queryResult == 1 ){ echo "<br> <h2>Se ha encontrado ".$queryResult." resultado</h2> <br>"; }   
                    ?>
        
                    <?php
                        if($row['Nombre']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Nombre Legal: </h3></td> 
                                    <td><h3 class="white-header" ><?php echo $row['Nombre']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['NombreComercial']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Nombre Comercial: </h3></td>
                                    <td><h3><?php echo $row['NombreComercial']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Tipo']!= "" || $row['Patronal']!= "" || $row['SSN']!= "" ||
                        $row['Incorporacion']!= "0000-00-00" || $row['Operaciones']!= "0000-00-00" || $row['Industria']!= "" ||
                        $row['NAICS']!= "0" || $row['Descripcion']!= "" )
                        {
                            ?>
                                <tr>
                                    <th><h3 class="orange-header">Data Demográfica:</h3></th>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Tipo']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Tipo de Negocio: </h3></td>
                                    <td><h3><?php echo $row['Tipo']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Patronal']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3>Número de Cuenta Patronal Federal (EIN): </h3></td>
                                    <td><h3><?php echo $row['Patronal']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['SSN']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Número de Seguro Social: </h3></td>
                                    <td><h3><?php echo $row['SSN']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Incorporacion']!= "0000-00-00")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Fecha de Incorporación: </h3></td>
                                    <td><h3><?php echo $row['Incorporacion']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Operaciones']!= "0000-00-00")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Fecha de Comienzo de Operaciones: </h3></td>
                                    <td><h3><?php echo $row['Operaciones']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Industria']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Tipo de Industria: </h3></td>
                                    <td><h3><?php echo $row['Industria']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>
                    
                    <?php
                        if($row['NAICS']!= "0")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Código NAICS: </h3></td>
                                    <td><h3><?php echo $row['NAICS']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Descripcion']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Descripción del Código NAICS: </h3></td>
                                    <td><h3><?php echo $row['Descripcion']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Contacto']!= "" || $row['Telefono']!= "" || $row['Celular']!= "" ||
                        $row['DirFisica']!= "" || $row['DirPostal']!= "" || $row['Email']!= "" ||
                        $row['Email2']!= "")
                        {
                            ?>
                                <tr>
                                    <th><h3 class="orange-header">Información del Contacto:</h3></th>
                                </tr>
                            <?php
                        }
                    ?>
                             
                    <?php
                        if($row['Contacto']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Contacto: </h3></td>
                                    <td><h3><?php echo $row['Contacto']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Telefono']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Teléfono Primario: </h3></td>
                                    <td><h3><?php echo $row['Telefono']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Celular']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Teléfono Celular: </h3></td>
                                    <td><h3><?php echo $row['Celular']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['DirFisica']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Dirección Física: </h3></td>
                                    <td><h3><?php echo $row['DirFisica']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['DirPostal']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Dirección Postal: </h3></td>
                                    <td><h3><?php echo $row['DirPostal']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Email']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Correo Electrónico Primario: </h3></td>
                                    <td><h3><?php echo $row['Email']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    <?php
                        if($row['Email2']!= "")
                        {
                            ?>
                                <tr class="white-header">
                                    <td><h3> Correo Electrónico Secundario: </h3></td>
                                    <td><h3><?php echo $row['Email2']; ?> </h3></td>
                                </tr>
                            <?php
                        }
                    ?>

                    </table><br/>

                    <table>
                        <tr>
                            <td><button type="submit" name = "modify" > 
                            <a href="updatedd.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
                            <td><button type="submit" name = "fileroom" >
                            <a href="fileroom.php?ID=<?php echo $_SESSION['VID']; ?>" target= "_blank">File Room</a></button></td>
                        </tr>
                    </table></br>

                    <?php 

                    if($_SESSION['FN'] == "Sonia" || $_SESSION['FN'] == "Victor" )
                    {
                        ?>
                        <table>
                            <tr >
                                <td><h3 class = "white-header">Creado por: </h3></td>
                                <td><h3 class = "white-header"><?php echo $row['CID']; ?> </h3></td>
                            </tr>
        
                            <tr>
                                <td><h3 class = "white-header">Modificado por: </h3></td>
                                <td><h3 class = "white-header"><?php echo $row['MID']; ?> </h3></td>
                            </tr>
                        </table>
                        
                        
                        <br><button type="submit" name = "delete-search" > <a href="delete.php?ID=<?php echo $row["ID"]; ?>">
                        Remover cliente</a></button>
                        <?php
                    }
                }  
            ?>
            
            <?php
            }
            else
            {
                ?>
                    <h2 class = "white-header">Ingrese ID</h2>
                    <h2 class = "white-header">o nombre del cliente:</h2>
                    <form action = "searchdd.php" method="POST">
                        <input type="text" name="searchdd" required minlength = "3" list = "ID"
                        value = "<?php echo $_SESSION['VID']; ?>">
                        <datalist id = "ID">
                        <?php
                            $sqldd = "SELECT * FROM `demograficos`";
                            $select = $conn ->query($sqldd);
                            while($ids = $select-> fetch_assoc() )
                            {
                                ?>
                                <option value ="<?php $ids['ID'] ?>"></option>
                                <option value="<?php echo $ids["ID"];?>">
                                <?php 
                                    echo $ids["ID"];
                                    echo " ";
                                    echo $ids["Nombre"];
                                    echo " ";
                                    echo $ids["NombreComercial"];
                                ?>
                                </option>
                                
                                <?php   
                            }
                        ?>
                        </datalist>
                        <button type="submit" name = "submit-search">Buscar</button>  
                    </form>
                   
                    <?php echo "<h2><br>No existe ningún cliente con ese ID</h2>"; ?>
                        
                    <button type="submit" name = "submit-search"><a href="ingreso.php">Crear Cliente</a></button>
                    
                    <?php
                }
            }
            else
            {
                ?>
                
                <h2 class = "white-header">Ingrese ID</h2>
                <h2 class = "white-header">o nombre del cliente:</h2>
                <form action = "searchdd.php" method="POST">
                    <input type="text" name="searchdd" required minlength = "3" list = "ID"
                    value = "<?php echo $_SESSION['VID']; ?>">
                    <datalist id = "ID">
                    <?php
                        $sqldd = "SELECT * FROM `demograficos`";
                        $select = $conn ->query($sqldd);
                        while($ids = $select-> fetch_assoc() )
                        {
                            ?>
                            <option value ="<?php $ids['ID'] ?>"></option>
                            <option value="<?php echo $ids["ID"];?>">
                            <?php 
                                echo $ids["ID"];
                                echo " ";
                                echo $ids["Nombre"];
                                echo " ";
                                echo $ids["NombreComercial"];
                            ?>
                            </option>

                            <?php   
                        }
                    ?>
                    </datalist>
                    <button type="submit" name = "submit-search">Buscar</button>
                </form>

                <button type="submit"  name = "submit-search"><a href="ingreso.php">Crear Cliente </a> </button>

            <?php
            }
        ?>

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

<div style="padding-bottom:5px;"></div>
</body>
</html>