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
                        <small>Registrar Categoria</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Llene los campos";
                                        echo "<hr>";
                                            echo "<strong></strong>";
                                        echo "</h2>";
                                            echo "<div class='row'>";
                                                echo "<div class='form-group col-lg-0'>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-8'>";
                                                    echo "<label>Nombre Categoria</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                                //   Inicio del formulario  //
                                                echo "<form name='form1' method='POST' action='clase_registrar_categoria.php'>";
                                                echo "<div class='clearfix'></div>";
                                                echo "<br>";
                                                echo "<div class='form-group col-lg-8'>";
                                                    echo "<input type='text' class='form-control' value='' name='nombre_categoria' required>";
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "<div class='form-group col-lg-4'>";                                                   
                                                    echo "<button type='submit' class='form-control btn btn-success'>Registrar</button>";                                                    
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "</form>";
                                                //   Fin del formulario  //
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
</body>
</html>
