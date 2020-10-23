<?php
include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';
include_once 'Php/Redireccion.inc.php';
include_once 'PhpUser/RepositorioUsuario.inc.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion :: Redirigir(RS);
}

Conexion :: AbrirConexion();
$TotalUsuariosArray = RepositorioUsuario :: ObtNumUsuarios(Conexion::ObtConexion());
Conexion :: CerrarConexion();
?>

<html lang="es">
    <head>
        <title>Registrado Correctamente</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="Css/bootstrap.css">
        <link rel="stylesheet" href="Css/EstRegistro.css">
        <link rel="stylesheet" href="Css/Style.css">
    </head>

    <?php
    include_once 'Plantillas/DocNavbar.inc.php';
    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span><i class="far fa-check-circle"></i> Registro Correcto</span>
                    </div>
                    <div class="panel-body text-center">
                        <p><b>¡</b>Gracias Por Registrarte <b><?php echo $nombre ?>!</b></p>
                        <p><a href="<?php echo RUTA_LOGIN ?>">---Iniciar Sesion---</a><br>Para Comenzar A Usar Su Cuenta.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</body>
</html>