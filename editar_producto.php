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
                        <small>Editar Producto</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    
                    class Edicion_Producto
                    {
                        public function editar_producto ($idProducto)
                        {
                        include('conexion.php');
                         
                        $sql2="SELECT * FROM productos_nefi WHERE idProducto = '$idProducto' ";
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
                                                    echo "<label>Nombre Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Categoria Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Descripcion Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidProducto= stripslashes($row["idProducto"]);
                            $dbNombreProducto= stripslashes($row["Nombre_Producto"]);
                            $dbidCategoria= stripslashes($row["Categoria_Producto"]);
                            $dbDescripcion=stripslashes($row["Descripcion_Producto"]);

                            $sqlj="SELECT * FROM categorias_nefi WHERE idCategoria = '$dbidCategoria' ";
                            if(!$resultj = $db->query($sqlj))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultj -> fetch_assoc())
                            {
                                
                                $dbidCategoria= stripslashes($row["idCategoria"]);
                                $dbNombre_categoria= stripslashes($row["Nombre_Categoria"]);
                            }
                        }
                                                
                                                //   Inicio del formulario  //
                                                echo "<form name='form1' method='POST' action='clase_editar_producto.php'>";
                                                echo "<div class='clearfix'></div>";
                                                 echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidProducto' name='id_producto' readonly>";
                                                echo "</div>";
                                                echo "<br>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<input type='text' class='form-control' value='$dbNombreProducto' name='nombre_producto' required>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<select name='categoria_producto' class='form-control' required style='text-align: center;'>";
                                                        echo "<option value='$dbidCategoria'>--$dbNombre_categoria--</option>";
                                                        include('conexion.php');
                                                        $sqlnefi="SELECT * FROM categorias_nefi";
                                                        if(!$resultnefi = $db->query($sqlnefi))
                                                        {
                                                            die('NO conecta [' . $db->error .']');  
                                                        }
                                                        while($row = $resultnefi->fetch_assoc())
                                                        {
                                                            $dbidcategoria=stripslashes($row["idCategoria"]);
                                                            $dbnombrecategoria= stripslashes($row["Nombre_Categoria"]);
                                                            echo "<option style='text-align:center;' value =$dbidcategoria>$dbnombrecategoria</option>";
                                                        }
                                                    echo "</select>"; 
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<input type='text' class='form-control' value='$dbDescripcion' name='descripcion_producto' required>";
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "<div class='form-group col-lg-3'>";                                                   
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
                    $hola=new Edicion_Producto();
                    $hola->editar_producto(@$_POST["idProducto"]);
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
