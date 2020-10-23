<?php

include_once 'RepositorioNotas.inc.php';

class ValidadorNotas {

    private $Aviso_Inicio;
    private $Aviso_Cierre;
    
    private $nombre;
    private $telefono;
    private $modelo;
    private $IMEI;
    
    private $Error_Nombre;
    private $Error_Telefono;
    private $Error_Modelo;
    private $Error_IMEI;

    public function __construct($nombre, $telefono, $modelo, $IMEI, $conexion) {
        $this->Aviso_Inicio = "<br><br><div class='alert alert-danger' role='alert'>";
        $this->Aviso_Cierre = "</div>";

        $this->nombre = "";
        $this->telefono = "";
        $this->modelo = "";
        $this->IMEI = "";

        $this->Error_Nombre = $this->Validar_Nombre($conexion, $nombre);
        $this->Error_Telefono = $this->Validar_Telefono($conexion, $telefono);
        $this->Error_Modelo = $this->Validar_Modelo($conexion, $modelo);
        $this->Error_IMEI = $this->Validar_IMEI($conexion, $IMEI);
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
            return "Debes Escribir El Nombre De Del Cliente";
        } else {
            $this->nombre = $nombre;
        }
        return "";
    }

    private function Validar_Telefono($conexion, $telefono){
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
        return "";
    }

    private function Validar_Modelo($modelo) {
        if (!$this->Variable_Iniciada($modelo)) {
            return "Debes Poner El Modelo Del Reloj.";
        }
        return "";
    }

    private function Validar_IMEI($conexion, $imei) {
        if (!$this->Variable_Iniciada($imei)) {
            return "Debes Escribir Un Numero De IMEI.";
        } else {
            $this->IMEI = $imei;
        }

        if (strlen($imei) < 16) {
            return "Te Faltan Numeros De IMEI.";
        }

        if (strlen($imei) > 16) {
            return "Escribiste Numeros De Más.";
        }
        return "";
    }

    public function ObtNombre() {
        return $this->nombre;
    }

    public function ObtTelefono() {
        return $this->telefono;
    }

    public function ObtModelo() {
        return $this->modelo;
    }

    public function ObtIMEI() {
        return $this->IMEI;
    }

    public function ObtErrorNombre() {
        return $this->Error_Nombre;
    }
    
    public function ObtErrorTelefono() {
        return $this->Error_Telefono;
    }
    
    public function ObtErrorModelo() {
        return $this->Error_Modelo;
    }
    
    public function ObtErrorIMEI() {
        return $this->Error_IMEI;
    }
    
    public function Mostrar_Nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }
    
    public function Mostrar_Telefono() {
        if ($this->telefono !== "") {
            echo 'value="' . $this->telefono . '"';
        }
    }
    
    public function Mostrar_Modelo() {
        if ($this->modelo !== "") {
            echo 'value="' . $this->modelo . '"';
        }
    }
    
    public function Mostrar_IMEI() {
        if ($this->IMEI !== "") {
            echo 'value="' . $this->IMEI . '"';
        }
    }
    
    public function MostrarErrorNombre() {
        if ($this->Error_Nombre !== "") {
            echo $this->Aviso_Inicio . $this->Error_Nombre . $this->Aviso_Cierre;
        }
    }

    public function MostrarErrorTelefono() {
        if ($this->Error_Telefono !== "") {
            echo $this->Aviso_Inicio . $this->Error_Telefono . $this->Aviso_Cierre;
        }
    }
    
    public function MostrarErrorModelo() {
        if ($this->Error_Modelo !== "") {
            echo $this->Aviso_Inicio . $this->Error_Modelo . $this->Aviso_Cierre;
        }
    }
    
    public function MostrarErrorIMEI() {
        if ($this->Error_IMEI !== "") {
            echo $this->Aviso_Inicio . $this->Error_IMEI . $this->Aviso_Cierre;
        }
    }

    public function NotasValido() {
        if (                
                $this->Error_Nombre === "" &&                
                $this->Error_Telefono === "" &&
                $this->Error_Modelo === "" &&
                $this->Error_IMEI === "") {
            return true;
        } else {
            return false;
        }
    }
}