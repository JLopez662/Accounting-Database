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
                        <td><h3 ><?php echo $row['ID']; ?> </h3></td>
                    </tr>

                <?php 
                if( $row['ID'] != "" ){ $_SESSION['VID'] = $row['ID']; }
                
                else{ $_SESSION['VID'] = ""; }

                $session = $_SESSION['VID'];
                $_SESSION['VYD'] = $session;

                ?>  

                <form action = "searchpm.php" method="POST">
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
    $sql = "SELECT * FROM pago WHERE `ID` LIKE '%$searchdd%' 
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
            if($row['BankClient']!= "" || $row['Banco']!= "" || $row['NumRuta']!= "0" ||
            $row['NameBank']!= "" || $row['TipoCuenta']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Cuenta de Banco:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['BankClient']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Nombre del Cliente en la Cuenta de Banco: </h3></td>
                        <td><h3><?php echo $row['BankClient']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['Banco']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Número de Cuenta de Banco:</h3></td>
                        <td><h3><?php echo $row['Banco']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['NumRuta']!= "0")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Número de Ruta del Banco: </h3></td>
                        <td><h3><?php echo $row['NumRuta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>
            
            <?php
            if($row['NameBank']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Nombre del Banco: </h3></td>
                        <td><h3><?php echo $row['NameBank']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['TipoCuenta']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3> Tipo de Cuenta de Banco: </h3></td>
                        <td><h3> <?php echo $row['TipoCuenta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>


            <?php
            if($row['BankClientS']!= "" || $row['BancoS']!= "" || $row['NumRutaS']!= "0" ||
            $row['NameBankS']!= "" || $row['TipoCuentaS']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Segunda Cuenta de Banco:</h3></th>
                    </tr>
                <?php
            }
            ?>


            <?php
            if($row['BankClientS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3>Nombre del Cliente en la Cuenta de Banco: </h3></td>
                    <td><h3><?php echo $row['BankClientS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php
            if($row['BancoS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3>Número de Cuenta de Banco:</h3></td>
                    <td><h3><?php echo $row['BancoS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php
            if($row['NumRutaS']!= "0")
            {
                ?>

                <tr class="white-header">
                    <td><h3>Número de Ruta del Banco: </h3></td>
                    <td><h3><?php echo $row['NumRutaS']; ?> </h3></td>
                </tr>

                <?php
            }
            ?>
            
            <?php
            if($row['NameBankS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3> Nombre del Banco: </h3></td>
                    <td><h3><?php echo $row['NameBankS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>
            
            <?php
            if($row['TipoCuentaS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3> Tipo de Cuenta de Banco: </h3></td>
                    <td><h3><?php echo $row['TipoCuentaS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>
            
            <?php
            if($row['NameCard']!= "" || $row['Tarjeta']!= "0" || $row['TipoTarjeta']!= "" ||
            $row['CVV']!= "" || $row['Expiracion']!= "0000-00-00" || $row['PostalBank']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Tarjeta de Crédito:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['NameCard']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Nombre en Tarjeta de Crédito: </h3></td>
                        <td><h3><?php echo $row['NameCard']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['Tarjeta']!= "0")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Número de Tarjeta de Crédito:</h3></td>
                        <td><h3><?php echo $row['Tarjeta']; ?> </h3></td>
                    </tr>                         
                <?php
            }
            ?>

            <?php
            if($row['TipoTarjeta']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Tipo de Tarjeta de Crédito: </h3></td>
                        <td><h3><?php echo $row['TipoTarjeta']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['CVV']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>CVV: </h3></td>
                        <td><h3><?php echo $row['CVV']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
                
            if($row['Expiracion']!= "0000-00-00")
            {
                if( date("Y-m-d", $d) > $row['Expiracion'])
                {
                    echo '<script> alert("Tarjeta de Crédito ha sido expirada!")</script>';
                    
                    ?>
                    <tr class="white-header">
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3>Expirada! (<?php echo $row['Expiracion']; ?>)</h3></td>
                    <?php

                }
                else
                {
                    ?>
                    <tr class="white-header">
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3><?php echo $row['Expiracion']; ?> </h3></td>
                    </tr>                      
                    <?php
                }
            }
            ?>

            <?php
            if($row['PostalBank']!= "")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Dirección Postal en Tarjeta: </h3></td>
                        <td><h3 class = "white-header"><?php echo $row['PostalBank']; ?> </h3></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['NameCardS']!= "" || $row['TarjetaS']!= "0" || $row['TipoTarjetaS']!= "" ||
            $row['CVVS']!= "" || $row['ExpiracionS']!= "0000-00-00" || $row['PostalBankS']!= "" )
            {
                ?>
                     <tr>
                        <th><h3 class="orange-header">Segunda Tarjeta de Crédito:</h3></th>
                    </tr>
                <?php
            }
            ?>

            <?php
            if($row['NameCardS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3>Nombre en Tarjeta de Crédito: </h3></td>
                    <td><h3><?php echo $row['NameCardS']; ?> </h3></td>
                </tr>                           

                <?php
            }
            ?>

            <?php
            if($row['TarjetaS']!= "0")
            {
                ?>
                    <tr class="white-header">
                        <td><h3>Número de Tarjeta de Crédito:</h3></td>
                        <td><h3><?php echo $row['TarjetaS']; ?> </h3></td>
                    </tr>                           
                <?php
            }
            ?>

            <?php
            if($row['TipoTarjetaS']!= "")
            {
                ?>
                <tr class="white-header">
                    <td><h3>Tipo de Tarjeta de Crédito: </h3></td>
                    <td><h3 class = "white-header"><?php echo $row['TipoTarjetaS']; ?> </h3></td>
                </tr>                       
                <?php
            }
            ?>
           
           <?php
            if($row['CVVS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3>CVV: </h3></td>
                    <td><h3><?php echo $row['CVVS']; ?> </h3></td>
                </tr>                       

                <?php
            }
            ?>
            
            <?php
                
            if($row['ExpiracionS']!= "0000-00-00")
            {
                if( date("Y-m-d", $d) > $row['ExpiracionS'])
                {
                    echo '<script>alert("Tarjeta de Crédito ha sido expirada!")</script>';
                    
                    ?>
                    <tr class="white-header">
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3>Expirada! (<?php echo $row['ExpiracionS']; ?>)</h3></td>
                    <?php

                }
                else
                {
                    ?>
                    <tr class="white-header">
                        <td><h3> Fecha de Expiración: </h3></td>
                        <td><h3><?php echo $row['ExpiracionS']; ?> </h3></td>
                    </tr>                      
                    <?php
                }
            }
            ?>

            <?php
            if($row['PostalBankS']!= "")
            {
                ?>

                <tr class="white-header">
                    <td><h3>Dirección Postal en Tarjeta: </h3></td>
                    <td><h3><?php echo $row['PostalBankS']; ?> </h3></td>
                </tr>                     

                <?php
            }
            ?>
            
            </table><br/>

            <table>
                <tr>
                    <td><button type="submit" name = "modify" > 
                    <a href="updatepm.php?ID=<?php echo $_SESSION['VID']; ?>" >Modificar</a></button></td>
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