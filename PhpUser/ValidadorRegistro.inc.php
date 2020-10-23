<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro {

    private $Aviso_Inicio;
    private $Aviso_Cierre;
    
    private $email;
    private $nombre;
    private $direccion;
    private $ciudad;
    private $telefono;
    private $clave;
    
    private $Error_Nombre;
    private $Error_Email;
    private $Error_Clave1;
    private $Error_Clave2;
    private $Error_Direccion;
    private $Error_Ciudad;
    private $Error_Telefono;

    public function __construct($nombre, $email, $clave1, $clave2, $direccion, $ciudad, $telefono, $conexion) {
        $this->Aviso_Inicio = "<br><br><div class='alert alert-danger' role='alert'>";
        $this->Aviso_Cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->direccion = "";
        $this->ciudad = "";
        $this->telefono = "";
        $this->clave = "";

        $this->Error_Nombre = $this->Validar_Nombre($conexion, $nombre);
        $this->Error_Email = $this->Validar_Email($conexion, $email);
        $this->Error_Clave1 = $this->Validar_Clave1($clave1);
        $this->Error_Clave2 = $this->Validar_Clave2($clave1, $clave2);
        $this->Error_Direccion = $this->Validar_Direccion($direccion);
        $this->Error_Ciudad = $this->Validar_Ciudad($ciudad);
        $this->Error_Telefono = $this->Validar_Telefono($conexion, $telefono);

        if ($this->Error_Clave1 === "" && $this->Error_Clave2 === "") {
            $this->clave = $clave1;
        }
    }

    private function Variable_Iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function Validar_Nombre($conexion, $nombre) {
        if (!$this->Variable_Iniciada($nombre)) {
            return "Debes Escribir Un Nombre De Usuario";
        } else {
            $this->nombre = $nombre;
        }

        if (strlen($nombre) <= 6) {
            return "El Nombre De Usuario Debe Ser Mas Largo Que 6 Caracteres.";
        }

        if (strlen($nombre) >= 15) {
            return "El Nombre De Usuario No Puede Ocupar Mas De 15 Caracteres.";
        }

        if (RepositorioUsuario :: Nombre_Existe($conexion, $nombre)) {
            return "Este Nombre De Usuario Ya Esta En Uso. Por Favor, Prueba Con Otro Nombre. O <a href='#'>Intente Recuperar Su Contraseña</a>";
        }

        return "";
    }

    private function Validar_Email($conexion, $email) {
        if (!$this->Variable_Iniciada($email)) {
            return "Debes Escribir Un Correo Electronico.";
        } else {
            $this->email = $email;
        }

        if (RepositorioUsuario :: Email_Existe($conexion, $email)) {
            return "Este Correo Electronico Ya Existe. Por Favor, Introduzca El Suyo.";
        }

        return "";
    }

    private function Validar_Clave1($clave1) {
        if (!$this->Variable_Iniciada($clave1)) {
            return "Debes Escribir Una Contraseña.";
        }

        return "";
    }

    private function Validar_Clave2($clave1, $clave2) {
        if (!$this->Variable_Iniciada($clave1)) {
            return "Primero Tienes Que LLenar La Contraseña.";
        }

        if (!$this->Variable_Iniciada($clave2)) {
            return "Debes Repetir Tu Contraseña.";
        }

        if ($clave1 !== $clave2) {
            return "Deben Ser Iguales Ambas Contraseñas.";
        }

        return "";
    }

    private function Validar_Direccion($direccion) {
        if (!$this->Variable_Iniciada($direccion)) {
            return "Debes Escribir Una Direccion.";
        } else {
            $this->direccion = $direccion;
        }

        return "";
    }

    private function Validar_Ciudad($ciudad) {
        if (!$this->Variable_Iniciada($ciudad)) {
            return "Debes Escribir Una Ciudad.";
        } else {
            $this->ciudad = $ciudad;
        }

        return "";
    }

    private function Validar_Telefono($conexion, $telefono) {
        if (!$this->Variable_Iniciada($telefono)) {
            return "Debes Escribir Un Numero De Telefono.";
        } else {
            $this->telefono = $telefono;
        }

        if (strlen($telefono) < 10) {
            return "Te Faltan Numeros.";
        }

        if (strlen($telefono) > 10) {
            return "Escribiste Numeros De Más.";
        }

        if (RepositorioUsuario :: Telefono_Existe($conexion, $telefono)) {
            return "Este Nombre De Usuario Ya Esta En Uso. Por Favor, Prueba Con Otro Nombre.";
        }

        return "";
    }

    public function ObtNombre() {
        return $this->nombre;
    }

    public function ObtEmail() {
        return $this->email;
    }

    public function ObtClave() {
        return $this->clave;
    }

    public function ObtClave1() {
        return $this->clave1;
    }

    public function ObtClave2() {
        return $this->clave2;
    }

    public function ObtDireccion() {
        return $this->direccion;
    }

    public function ObtCiudad() {
        return $this->ciudad;
    }

    public function ObtTelefono() {
        return $this->telefono;
    }

    public function ObtErrorNombre() {
        return $this->Error_Nombre;
    }

    public function ObtErrorEmail() {
        return $this->Error_Email;
    }

    public function ObtErrorClave1() {
        return $this->Error_Clave1;
    }

    public function ObtErrorClave2() {
        return $this->Error_Clave2;
    }

    public function ObtErrorDireccion() {
        return $this->Error_Direccion;
    }

    public function ObtErrorCiudad() {
        return $this->Error_Ciudad;
    }

    public function ObtErrorTelefono() {
        return $this->Error_Telefono;
    }

    public function Mostrar_Nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function Mostrar_Email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function Mostrar_Direccion() {
        if ($this->direccion !== "") {
            echo 'value="' . $this->direccion . '"';
        }
    }

    public function Mostrar_Ciudad() {
        if ($this->ciudad !== "") {
            echo 'value="' . $this->ciudad . '"';
        }
    }

    public function Mostrar_Telefono() {
        if ($this->telefono !== "") {
            echo 'value="' . $this->telefono . '"';
        }
    }

    public function MostrarErrorNombre() {
        if ($this->Error_Nombre !== "") {
            echo $this->Aviso_Inicio . $this->Error_Nombre . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorEmail() {
        if ($this->Error_Email !== "") {
            echo $this->Aviso_Inicio . $this->Error_Email . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorClave1() {
        if ($this->Error_Clave1 !== "") {
            echo $this->Aviso_Inicio . $this->Error_Clave1 . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorClave2() {
        if ($this->Error_Clave2 !== "") {
            echo $this->Aviso_Inicio . $this->Error_Clave2 . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorDireccion() {
        if ($this->Error_Direccion !== "") {
            echo $this->Aviso_Inicio . $this->Error_Direccion . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorCiudad() {
        if ($this->Error_Ciudad !== "") {
            echo $this->Aviso_Inicio . $this->Error_Ciudad . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorTelefono() {
        if ($this->Error_Telefono !== "") {
            echo $this->Aviso_Inicio . $this->Error_Telefono . $this->Aviso_Cierre;
        }
    }

    public function RegistroValido() {
        if ($this->Error_Nombre === "" &&
                $this->Error_Email === "" &&
                $this->Error_Clave1 === "" &&
                $this->Error_Clave2 === "" &&
                $this->Error_Direccion === "" &&
                $this->Error_Ciudad === "" &&
                $this->Error_Telefono === "") {
            return true;
        } else {
            return false;
        }
    }

}
