<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Inicio</title>
<link rel="stylesheet" href="../Css/Style.css">

<link rel="stylesheet" href="Css/Nav.css" type="text/css" media="screen" />
<style type="text/css">
.letratexto {font-size: 22px}

</style>
</head>
<body>
<br />
<br />
<br />
<div id="Datos">
<div align="center">
</div>
    <div class="container">

        <div class="row">
            <div class="box" style="background-color: white;">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" >
                    <h2 class="brand-before">
                        <small>Editar Insumo</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    
                    class Edicion_Insumo
                    {
                        public function editar_insumo ($idInsumo)
                        {
                        include('conexion.php');
                         
                        $sql2="SELECT * FROM insumos_nefi WHERE idInsumo = '$idInsumo' ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Realice los cambios que desee";
                                        echo "<hr>";
                                            echo "<strong></strong>";
                                        echo "</h2>";
                                            echo "<div class='row'>";
                                                echo "<div class='form-group col-lg-0'>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Nombre Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<label>Medida Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Categoria Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidInsumo= stripslashes($row["idInsumo"]);
                            $dbNombreInsumo= stripslashes($row["Nombre_Insumo"]);
                            $dbidMedida= stripcslashes($row["Medida_Insumo"]);
                            $dbidCategoria= stripcslashes($row["Categoria_Insumo"]);

                            $sqlj="SELECT * FROM medidas_nefi WHERE idMedida = '$dbidMedida' ";
                            if(!$resultj = $db->query($sqlj))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultj -> fetch_assoc())
                            {
                                
                                $dbidMedida= stripslashes($row["idMedida"]);
                                $dbNombre_Medida= stripslashes($row["Nombre_Medida"]);
                            }

                            $sqlr="SELECT * FROM categorias_nefi WHERE idCategoria = '$dbidCategoria' ";
                            if(!$resultr = $db->query($sqlr))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultr -> fetch_assoc())
                            {
                                
                                $dbidCategoria= stripslashes($row["idCategoria"]);
                                $dbNombre_categoria= stripslashes($row["Nombre_Categoria"]);
                            }
                        }
                                                
                                                //   Inicio del formulario  //
                                                echo "<form name='form1' method='POST' action='clase_editar_insumo.php'>";
                                                echo "<div class='clearfix'></div>";
                                                 echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidInsumo' name='id_insumo' readonly>";
                                                echo "</div>";
                                                echo "<br>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<input type='text' class='form-control' value='$dbNombreInsumo' name='nombre_insumo' required>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<select name='medida_insumo' class='form-control' required style='text-align: center;'>";
                                                        echo "<option value='$dbidMedida'>--$dbNombre_Medida--</option>";
                                                        include('conexion.php');
                                                        $sqlnefi="SELECT * FROM medidas_nefi";
                                                        if(!$resultnefi = $db->query($sqlnefi))
                                                        {
                                                            die('NO conecta [' . $db->error .']');  
                                                        }
                                                        while($row = $resultnefi->fetch_assoc())
                                                        {
                                                            $dbidMedida=stripslashes($row["idMedida"]);
                                                            $dbnombremedida= stripslashes($row["Nombre_Medida"]);
                                                            echo "<option style='text-align:center;' value =$dbidMedida>$dbnombremedida</option>";
                                                        }
                                                    echo "</select>"; 
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<select name='categoria_insumo' class='form-control' required style='text-align: center;'>";
                                                        echo "<option value='$dbidCategoria'>--$dbNombre_categoria--</option>";
                                                        include('conexion.php');
                                                        $sqlroger="SELECT * FROM categorias_nefi";
                                                        if(!$resultroger = $db->query($sqlroger))
                                                        {
                                                            die('NO conecta [' . $db->error .']');  
                                                        }
                                                        while($row = $resultroger->fetch_assoc())
                                                        {
                                                            $dbidcategoria=stripslashes($row["idCategoria"]);
                                                            $dbnombrecategoria= stripslashes($row["Nombre_Categoria"]);
                                                            echo "<option style='text-align:center;' value =$dbidcategoria>$dbnombrecategoria</option>";
                                                        }
                                                    echo "</select>"; 
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "<div class='form-group col-lg-4'>";                                                   
                                                    echo "<button type='submit' class='form-control btn btn-success'>Realizar Cambios</button>";                                                    
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "</form>";
                                                //   Fin del formulario  //
                                                
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                               }
                    }
                    $hola=new Edicion_Insumo();
                    $hola->editar_insumo(@$_POST["idInsumo"]);
                    ?>
                        <!-- Aqui van las consultas a la base de datos  --> 
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; System (lo que sea)</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
