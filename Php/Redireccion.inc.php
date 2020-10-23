<?php

class Redireccion
{
    public function Redirigir($Url) {
        header('Location: ' . $Url, true, 301);
        exit();
    }
}
