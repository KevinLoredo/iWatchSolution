<?php

class ControlSesion {

    public static function Iniciar_Sesion($idUsuario, $nombreUsuario) {
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
    }

    public static function Cerrar_Sesion() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['idUsuario'])) {
            unset($_SESSION['idUsuario']);
        }

        if (isset($_SESSION['nombreUsuario'])) {
            unset($_SESSION['nombreUsuario']);
        }

        session_destroy();
    }

    public static function Sesion_Iniciada() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['idUsuario']) && isset($_SESSION['nombreUsuario'])) {
            return true;
        } else {
            return false;
        }
    }

}
