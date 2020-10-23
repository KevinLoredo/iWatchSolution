<?php

class Notas{

    private $id;
    private $Autor_id;
    private $GuiaEnvio;
    private $NombreNota;
    private $TelefonoNota;
    private $ModeloNota;
    private $IMEINota;
    private $PasswordNota;
    private $PantallaRota;
    private $PantallaRayada;
    private $Enciende;
    private $Mojado;
    private $ObservacionesNota;
    private $FechaRegistro;

    public function __construct($id, $Autor_id, $GuiaEnvio, $NombreNota, $TelefonoNota, $ModeloNota, $IMEINota, $PasswordNota, $PantallaRota, $PantallaRayada, $Enciende, $Mojado, $ObservacionesNota, $FechaRegistro) {
        $this->id = $id;
        $this->Autor_id = $Autor_id;
        $this->GuiaEnvio = $GuiaEnvio;
        $this->NombreNota = $NombreNota;
        $this->TelefonoNota = $TelefonoNota;
        $this->ModeloNota = $ModeloNota;
        $this->IMEINota = $IMEINota;
        $this->PasswordNota = $PasswordNota;
        $this->PantallaRota = $PantallaRota;
        $this->PantallaRayada = $PantallaRayada;
        $this->Enciende = $Enciende;
        $this->Mojado = $Mojado;
        $this->ObservacionesNota = $ObservacionesNota;
        $this->FechaRegistro = $FechaRegistro;
    }

    public function ObtId() {
        return $this->id;
    }
    
    public function ObtAutor_id() {
        return $this->Autor_id;
    }
    
    public function ObtGuiaEnvio() {
        return $this->GuiaEnvio;
    }
    
    public function ObtNombre() {
        return $this->NombreNota;
    }

    public function ObtTelefono() {
        return $this->TelefonoNota;
    }

    public function ObtModelo() {
        return $this->ModeloNota;
    }

    public function ObtIMEI() {
        return $this->IMEINota;
    }

    public function ObtPassword() {
        return $this->PasswordNota;
    }
    
    public function ObtPantallaRota() {
        return $this->PantallaRota;
    }
    
    public function ObtPantallaRayada() {
        return $this->PantallaRayada;
    }
    
    public function ObtEnciende() {
        return $this->Enciende;
    }
    
    public function ObtMojado() {
        return $this->Mojado;
    }

    public function ObtObservaciones() {
        return $this->ObservacionesNota;
    }

    public function ObtFechaRegistro() {
        return $this->FechaRegistro;
    }
}
