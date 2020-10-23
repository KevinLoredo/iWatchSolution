<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($nombre, $clave, $conexion) {
        $this->error = "";

        if (!$this->Variable_Iniciada($nombre) || !$this->Variable_Iniciada($clave)) {
            $this->usuario = null;
            $this->error = "Debes Introducir Tu Username & Password";
        } else {
            $this->usuario = RepositorioUsuario::ObtLogUsuario($conexion, $nombre);

            if (is_null($this->usuario) || !password_verify($clave, $this->usuario->ObtPassword())) {
                $this->error = "Datos Incorrectos";
            }
        }
    }

    private function Variable_Iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function ObtUsuario() {
        return $this->usuario;
    }

    public function ObtError() {
        return $this->error;
    }

    public function MostrarError() {
        if ($this->error !== '') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "<br></div>";
        }
    }

}
