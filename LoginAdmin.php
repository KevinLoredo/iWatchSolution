<?php
include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';
include_once 'Php/Redireccion.inc.php';
include_once 'Php/ControlSesion.inc.php';
include_once 'PhpUser/RepositorioUsuario.inc.php';
include_once 'PhpAdmin/ValidadorLoginAdmin.inc.php';
include_once 'PhpAdmin/RepositorioAdmin.inc.php';

if (ControlSesion::Sesion_Iniciada()) {
    Redireccion::Redirigir(RUTA_LISTA_NOTAS);
}

if (isset($_POST['submit'])) {
    Conexion :: AbrirConexion();

    $validador = new ValidadorLoginAdmin($_POST['nombre'], $_POST['clave'], Conexion :: ObtConexion());

    if ($validador->ObtError() === '' && !is_null($validador->ObtAdmin())) {
        ControlSesion::Iniciar_Sesion(
                $validador -> ObtAdmin() -> Obtid(),
                $validador -> ObtAdmin() -> ObtUsuario());
        Redireccion::Redirigir(RUTA_LISTA_NOTAS);
    } else {
        echo "Inicio Sesion Fallo";
    }
    Conexion :: CerrarConexion();
}

Conexion :: AbrirConexion();
$TotalUsuariosArray = RepositorioUsuario :: ObtNumUsuarios(Conexion::ObtConexion());
Conexion :: CerrarConexion();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login Admin</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="Css/bootstrap.css">
        <link rel="stylesheet" href="Css/EstLogin.css">
        <link rel="stylesheet" href="Css/Style.css">
    </head>

    <?php
    include_once 'Plantillas/DocNavbarAdmin.inc.php';
    ?>

    <form class="formulario" method="POST" action="<?php echo RUTA_LOGIN; ?>">
        <h1>Login Admin</h1>
        <br>
        <div class="contenedor">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="nombre" id="nombre" placeholder="Admin"
                        <?php
                        if (isset($_POST['submit']) && isset($_POST['nombre']) && !empty($_POST['nombre'])) {
                            echo 'value="' . $_POST['nombre'] . '"';
                        }
                        ?> required autofocus>
                        <br>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password"  name="clave" id="clave" placeholder="Password" required>
                    </div>
                    <br>
                    <?php
                    if (isset($_POST['submit'])) {
                        $validador->MostrarError();
                    }
                    ?>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" class="button" name="submit">LOGIN</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
        </div>
    </form>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</body>
</html>