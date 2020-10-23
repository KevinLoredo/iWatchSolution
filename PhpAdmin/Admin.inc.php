<?php

class Admin{

    private $id;
    private $Admin;
    private $Password;
    private $FechaRegistro;

    public function __construct($id, $Admin, $Password, $FechaRegistro) {
        $this->id = $id;
        $this->Admin = $Admin;
        $this->Password = $Password;
        $this->FechaRegistro = $FechaRegistro;
    }

    public function ObtId() {
        return $this->id;
    }    

    public function ObtAdmin() {
        return $this->Admin;
    }

    public function ObtPassword() {
        return $this->Password;
    }

    public function ObtFechaRegistro() {
        return $this->FechaRegistro;
    }
}