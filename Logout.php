<?php

include_once 'Php/ControlSesion.inc.php';
include_once 'Php/Redireccion.inc.php';
include_once 'Php/Config.inc.php';

ControlSesion :: cerrar_sesion();
Redireccion :: redirigir(RT);