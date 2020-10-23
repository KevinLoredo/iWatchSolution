<?php
include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';
include_once 'Php/Redireccion.inc.php';
include_once 'PhpUser/Notas.inc.php';
include_once 'PhpUser/RepositorioNotas.inc.php';
include_once 'PhpUser/ValidadorNotas.inc.php';

if (isset($_POST['submit'])) {

    Conexion :: AbrirConexion();
    $validador = new ValidadorNotas(
            $_POST['guiaenvio'], $_POST['nombre'], $_POST['direccion'], $_POST['ciudad'], $_POST['telefono'], $_POST['modelo'], $_POST['imei'], $_POST['password'], $_POST['observaciones'], Conexion :: ObtConexion());

    if ($validador->NotasValido()) {
        $notas = new Notas('', '', $validador->ObtGuiaEnvio(), $validador->ObtNombre(), $validador->ObtTelefono(), $validador->ObtModelo(), $validador->ObtIMEI(), $validador->ObtPassword(), $validador->ObtObservaciones(), '');

        $Notas_Insertado = RepositorioNotas :: Insertar_Notas(Conexion :: ObtConexion(), $notas);

        if ($Notas_Insertado) {
            //Redigir Menu De Notas
            Redireccion::Redirigir(RUTA_LISTA_NOTAS);
        }
    }
    Conexion :: CerrarConexion();
}

Conexion :: AbrirConexion();
$TotalNotasArray = RepositorioNotas :: ObtNumNotas(Conexion::ObtConexion()) + 1;
Conexion :: CerrarConexion();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sistema iWatchSolution</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="Css/bootstrap.css">
        <link rel="stylesheet" href="Css/EstSistema.css">
        <link rel="stylesheet" href="Css/Style.css">
    </head>

    <?php
    include_once 'Plantillas/DocNavbar.inc.php';
    ?>


    <form class="formulario" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <?php
        if (isset($_POST['submit'])) {
            include_once 'Plantillas/NotasValido.inc.php';
        } else {
            include_once 'Plantillas/NotasVacio.inc.php';
        }
        ?>
    </form>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</body>
</html>