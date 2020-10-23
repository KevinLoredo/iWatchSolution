<?php
include_once 'Php/Config.inc.php';
include_once 'Php/ControlSesion.inc.php';
?>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Este Boton Despliega La Barra De Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                if (ControlSesion::sesion_iniciada()) {
                    ?>
                    <li><a class="navbar-brand" href="#">iWatchSolution</a></li>
                    <?php
                } else {
                    ?>
                    <a class="navbar-brand" href="<?php echo RT ?>">iWatchSolution</a>
                    <?php
                }
                ?>                
            </div>
            <div id="navbar"class="navbar-collapse collapse">
                <ul class="nav navbar-nav">                    
                    <?php
                    if (ControlSesion::sesion_iniciada()) {
                        ?>
                        <li><a href="#"><i class="fas fa-clipboard-list"></i> Listas Notas</a></li>
                        <li><a href="#"><i class="fas fa-sticky-user"></i></i> Ver Usuarios</a></li>
                        <?php
                    } else {
                        ?>
                        
                        <?php
                    }
                    ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (ControlSesion::sesion_iniciada()) {
                        ?>
                        <li><a href="#"><i class="fas fa-user"></i>
                                <?php echo ' ' . $_SESSION['nombreUsuario']; ?>
                            </a></li>
                        <li><a href="<?php echo RUTA_LOGOUT; ?>">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión
                            </a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="#"><i class="fas fa-user iconuser"></i> <?php echo $TotalUsuariosArray; ?></a></li>
                        <li><a href=" <?php echo RUTA_LOGIN ?>"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a></li>
                        <li><a href="<?php echo RUTA_REGISTRO ?>"><i class="fas fa-user-plus"></i> Registrar</a></li>
                            <?php
                        }
                        ?>                    
                </ul>
            </div>
        </div>
    </nav>