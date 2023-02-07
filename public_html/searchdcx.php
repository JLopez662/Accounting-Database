<?php 
    include 'header4.php';
    $d=strtotime("today");
    
    if(empty($_SESSION['VID'])){$_SESSION['VID'] = ""; }
    
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
                            <td><h3 class="white-header"><?php echo $row['ID']; ?> </h3></td>
                        </tr>

                    <?php 
                        if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                        
                        else{ $_SESSION['VID'] = ""; }

                        $session = $_SESSION['VID'];
                        $_SESSION['VYD'] = $session;

                        #$sql = "SELECT * FROM `demograficos`";
                        #$all_ids = mysqli_query($conn,$sql);
                    ?>

                    <form action = "searchdcx.php" method="POST">
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
                                    <td><h3><?php echo $row['Nombre']; ?> </h3></td>
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
                                    <td><h3 class="white-header"><?php echo $row['NombreComercial']; ?> </h3></td>
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
            </table>

        <?php 

        }

        ?>

        <?php

        }
    }
   
    if(isset($_POST['submit-search']))
    {
        $searchd = mysqli_real_escape_string($conn, $_POST['searchdd']);
        $sql = "SELECT * FROM contributivos WHERE `ID` LIKE '%$searchdd%' 
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
                if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }

                else{ $_SESSION['VID'] = ""; }
                
                $session = $_SESSION['VID'];
                $_SESSION['VYD'] = $session;

                ?>

                <?php
                    if($row['Estatal']!= "" || $row['Poliza']!= "" || $row['RegComerciante']!= "" ||
                    $row['Vencimiento']!= "0000-00-00" || $row['Choferil']!= "" || $row['DeptEstado']!= "" )
                    {
                        ?>
                            <tr>
                                <th><h3 class="orange-header">Data Contributiva:</h3></th>
                            </tr>
                        <?php
                    }
                ?>

                <?php
                if($row['Estatal']!= "")
                    {
                        ?>
                            <tr class="white-header">
                                <td><h3>Número de Cuenta Patronal Estatal: </h3></td>
                                <td><h3><?php echo $row['Estatal']; ?> </h3></td>
                            </tr>
                        <?php
                    }
                ?>

                <?php
                if($row['Poliza']!= "")
                {
                    ?>
                        <tr class="white-header">
                        <td><h3>Número de Póliza CFSE: </h3></td>
                        <td><h3><?php echo $row['Poliza']; ?> </h3></td>
                        </tr>
                    <?php
                }
                ?>

                <?php
                if($row['RegComerciante']!= "")
                {
                    ?>
                        <tr class="white-header">
                        <td><h3>Número de Registro de Comerciante: </h3></td>
                        <td><h3><?php echo $row['RegComerciante']; ?> </h3></td>
                        </tr>
                    <?php
                }
                ?>

                <?php
                    
                    if($row['Vencimiento']!= "0000-00-00")
                    {
                        if( date("Y-m-d", $d) > $row['Vencimiento'])
                        {
                            echo '<script>alert("Tarjeta de Crédito ha sido expirada!")</script>';

                            ?>
                            <tr class="white-header">
                            <td><h3> Fecha de Vencimiento del Registro de Comerciante: </h3></td>
                            <td><h3 class = "orange-header">Expirada! (<?php echo $row['Vencimiento']; ?>)</h3></td>
                            </tr>
                            <?php
                        }
                        else
                        {
                            ?>
                            <tr class="white-header">
                            <td><h3> Fecha de Vencimiento del Registro de Comerciante: </h3></td>
                            <td><h3 class="white-header"><?php echo $row['Vencimiento']; ?> </h3></td>
                            </tr>                      
                            <?php
                        }
                    }
                ?>

                <?php
                if($row['Choferil']!= "")
                {
                    ?>
                        <tr class="white-header">
                        <td><h3>Número de Cuenta de Seguro Choferil: </h3></td>
                        <td><h3><?php echo $row['Choferil']; ?> </h3></td>
                        </tr>
                    <?php
                }
                ?>
                
                <?php
                if($row['DeptEstado']!= "")
                {
                    ?>
                        <tr class="white-header">
                        <td><h3>Número de Cuenta del Departamento de Estado: </h3></td>
                        <td><h3 class="white-header"><?php echo $row['DeptEstado']; ?> </h3></td>
                        </tr>
                    <?php
                }
                ?>
                </table><br/>

                <table>
                    <tr>
                        <td><button type="submit" name = "modify" > 
                        <a href="updatedc.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
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