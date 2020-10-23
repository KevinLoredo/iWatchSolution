<?php

class Usuario{

    private $id;
    private $EmailNeg;
    private $UsuarioNeg;
    private $PasswordNeg;
    private $DireccionNeg;
    private $CiudadNeg;
    private $TelefonoNeg;
    private $FechaRegistro;

    public function __construct($id, $EmailNeg, $UsuarioNeg, $PasswordNeg, $DireccionNeg, $CiudadNeg, $TelefonoNeg, $FechaRegistro) {
        $this->id = $id;
        $this->EmailNeg = $EmailNeg;
        $this->UsuarioNeg = $UsuarioNeg;
        $this->PasswordNeg = $PasswordNeg;
        $this->DireccionNeg = $DireccionNeg;
        $this->CiudadNeg = $CiudadNeg;
        $this->TelefonoNeg = $TelefonoNeg;
        $this->FechaRegistro = $FechaRegistro;
    }

    public function ObtId() {
        return $this->id;
    }
    
    public function ObtEmail() {
        return $this->EmailNeg;
    }

    public function ObtUsuario() {
        return $this->UsuarioNeg;
    }

    public function ObtPassword() {
        return $this->PasswordNeg;
    }

    public function ObtDireccion() {
        return $this->DireccionNeg;
    }

    public function ObtCiudad() {
        return $this->CiudadNeg;
    }

    public function ObtTelefono() {
        return $this->TelefonoNeg;
    }

    public function ObtFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function CambUsuario($UsuarioNeg) {
        $this->UsuarioNeg = $UsuarioNeg;
    }

    public function CambPassword($PasswordNeg) {
        $this->PasswordNeg = $PasswordNeg;
    }

    public function CambDireccion($DireccionNeg) {
        $this->DireccionNeg = $DireccionNeg;
    }

    public function CambCiudad($CiudadNeg) {
        $this->CiudadNeg = $CiudadNeg;
    }

    public function CambTelefono($TelefonoNeg) {
        $this->TelefonoNeg = $TelefonoNeg;
    }

}
