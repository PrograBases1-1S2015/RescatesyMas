<?php
//Agregar archivos de configuracion y funciones

//Al presionar el boton de login
if (isset($_POST['entrar']))
{ 
// Todas las validaciones necesarias antes de entrar
         header("Location: index2.php");

}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amor Animal | Loggin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background: black">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Amor Animal</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="registroUsuario.php">Registro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logginUsuario.php">Entrar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Nosotros</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <section class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Entrar</h2>
                    <h3 class="section-subheading text-muted">!Salvemos los animales¡</h3>
                </div>
            </div>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <legend>Loggin</legend>
                <table style="float: left;">
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nombre Usuario:</label>
                        <input id="campo1" name="nomusuario" type="text" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Contraseña:</label>
                        <input id="campo2" name="contraseña" type="password" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                </table>
                   <div style="clear: both;"></div>
                   <input id="campo3" name="entrar" type="submit" value="Entrar" />       
        </form>




    </section>
    
 
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>




    
</body>

</html>