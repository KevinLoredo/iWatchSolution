<?php
include_once 'Php/Conexion.inc.php';
include_once 'PhpUser/RepositorioNotas.inc.php';
include_once 'PhpUser/Notas.inc.php';

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
        
    </form>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</body>
</html>