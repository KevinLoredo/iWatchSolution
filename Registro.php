<?php
include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';
include_once 'Php/Redireccion.inc.php';
include_once 'PhpUser/Usuario.inc.php';
include_once 'PhpUser/RepositorioUsuario.inc.php';
include_once 'PhpUser/ValidadorRegistro.inc.php';

if (isset($_POST['submit'])) {
    
    Conexion :: AbrirConexion();
    $validador = new ValidadorRegistro(
            $_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], $_POST['direccion'], $_POST['ciudad'], $_POST['telefono'], Conexion :: ObtConexion());

    if ($validador->RegistroValido()) {
        $usuario = new Usuario('',
                $validador->ObtEmail(),
                $validador->ObtNombre(),
                password_hash($validador->ObtClave(), PASSWORD_DEFAULT),
                $validador->ObtDireccion(),
                $validador->ObtCiudad(),
                $validador->ObtTelefono(), '');
        
        $Usuario_Insertado = RepositorioUsuario :: Insertar_Usuarios(Conexion :: ObtConexion(), $usuario);

        if ($Usuario_Insertado) {
            //Redigir Login
            Redireccion::Redirigir(RUTA_REGISTRO_CORRECTO . '?nombre=' . $usuario->ObtUsuario());
        }
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
        <title>Registrarse</title>

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

    <form class="formulario" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<?php
if (isset($_POST['submit'])) {
    include_once 'Plantillas/RegValido.inc.php';
} else {
    include_once 'Plantillas/RegVacio.inc.php';
}
?>
    </form>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</body>
</html>