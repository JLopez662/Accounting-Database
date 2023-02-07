<?php 
    include 'header4.php';
    
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
                        <td><h3 ><?php echo $row['ID']; ?> </h3></td>
                    </tr>

                <?php 
                if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                
                else{ $_SESSION['VID'] = ""; }

                $session = $_SESSION['VID'];
                $_SESSION['VYD'] = $session;

                ?>      

                <form action = "searchcf.php" method="POST">
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
            </table>
        <?php 

        }

        ?>

        <?php
    }
}

if(isset($_POST['submit-search']))
{
    $searchdd = mysqli_real_escape_string($conn, $_POST['searchdd']);
    $sql = "SELECT * FROM confidencial WHERE `ID` LIKE '%$searchdd%' 
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
                    
            else{ $_SESSION['VID'] = "";  }
            
            $session = $_SESSION['VID'];
            $_SESSION['VYD'] = $session;

            ?>

            <?php
            if($row['UserSuri']!= "")
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Credenciales SURI:</h3></th>
                    </tr>
            
                    <tr class="white-header">
                        <td><h3>Usuario en SURI: </h3></td>
                        <td><h3><?php echo $row['UserSuri']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>

            <?php
            if($row['PassSuri']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Contraseña en SURI: </h3></td>
                        <td><h3><?php echo $row['PassSuri']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>
            
            <?php
            if($row['UserEftps']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales EFTPS:</h3></th>
                    </tr>

                    <tr class="white-header">
                        <td><h3>EFTPS (EIN o SSN): </h3></td>
                        <td><h3><?php echo $row['UserEftps']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['PIN']!= "0")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> EFTPS PIN: </h3></td>
                        <td><h3><?php echo $row['PIN']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['PassEftps']!= "")
            {
                ?>
                    <tr class="white-header">
                    <td><h3> EFTPS Internet Password: </h3></td>
                    <td><h3><?php echo $row['PassEftps']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['UserCFSE']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales CFSE:</h3></th>
                    </tr>
            
                    <tr class="white-header">
                        <td><h3>Usuario CFSE: </h3></td>
                        <td><h3><?php echo $row['UserCFSE']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['PassCFSE']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Contraseña CFSE: </h3></td>
                        <td><h3><?php echo $row['PassCFSE']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['UserDept']!= "")
            {
                ?>
                    <tr>
                        <th><h3 class="orange-header">Credenciales para el Departamento del Trabajo:</h3></th>
                    </tr>

                    <tr class="white-header">
                        <td><h3>Usuario en Departamento del Trabajo: </h3></td>
                        <td><h3><?php echo $row['UserDept']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['PassDept']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Contraseña en Departamento del Trabajo: </h3></td>
                        <td><h3><?php echo $row['PassDept']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['UserCofim']!= "")
            {
                ?>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Cofim:</h3></th>
                    </tr>

                    <tr class="white-header">
                        <td><h3>Usuario Cofim: </h3></td>
                        <td><h3><?php echo $row['UserCofim']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['PassCofim']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Contraseña Cofim: </h3></td>
                        <td><h3><?php echo $row['PassCofim']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['UserMunicipio']!= "")
            {
                ?>

                    <tr>
                        <th><h3 class="orange-header">Credenciales Municipio:</h3></th>
                    </tr>

            
                    <tr class="white-header">
                        <td><h3>Usuario Municipio: </h3></td>
                        <td><h3><?php echo $row['UserMunicipio']; ?> </h3></td>
                    </tr>

                <?php
            }
            ?>

            <?php
            if($row['PassCofim']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Contraseña Municipio: </h3></td>
                        <td><h3><?php echo $row['PassMunicipio']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            </table><br/>

            <table>
                <tr>
                    <td><button type="submit" name = "modify" > 
                    <a href="updatecf.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
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