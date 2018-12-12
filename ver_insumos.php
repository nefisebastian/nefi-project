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
                        <small>Insumos Registrados</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                    $sql2="SELECT * FROM insumos_nefi order by Nombre_Insumo asc ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    // Boton Registrar //
                                    echo "<div class='form-group col-lg-12'>";
                                        echo "<form name='form2' method='POST' action='registrar_insumos.php'>";
                                            echo "<button type='submit' class='form-control btn btn-success'>Añadir</button>";
                                        echo "</form>";
                                    echo "</div>";
                                    // Boton Registrar //
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Listado";
                                        echo "<hr>";
                                            echo "<strong></strong>";
                                        echo "</h2>";
                                            echo "<div class='row'>";
                                                echo "<div class='form-group col-lg-0'>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Nombre del Insumo </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<label>Medida del Insumo </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Categoria del Insumo </label>";
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
                                $dbNombre_Categoria= stripslashes($row["Nombre_Categoria"]);
                            }

                                                echo "<div class='clearfix'></div>";
                                                echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidInsumo' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombreInsumo'  readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Medida'  readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Categoria'  readonly>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form1' method='POST' action='editar_insumo.php'>";
                                                    echo "<input type='hidden' name='idInsumo' value='$dbidInsumo'>";
                                                    echo "<button type='submit' class='form-control btn btn-primary'>Actualizar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                // Boton borrar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form2' method='POST' action='clase_eliminar_insumo.php'>";
                                                    echo "<input type='hidden' name='idInsumo' value='$dbidInsumo'>";
                                                    echo "<button type='submit' class='form-control btn btn-danger'>Borrar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton borrar //
                        }
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                            
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })    </script>

</body>

</html>
