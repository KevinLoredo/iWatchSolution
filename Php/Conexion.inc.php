<?php

class Conexion
{
    private static $conexion;
    
    public static function AbrirConexion()
    {
        if(!isset(self::$conexion))
        {
            try
            {
                include_once 'Config.inc.php';
                
                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8");
                    
            } catch (PDOException $Ex)
            {
                print "ERROR: " . $Ex -> getMessage() . "<br>";
                die();
            }
        }
    }
    
    public static function CerrarConexion()
    {
        if(isset(self::$conexion))
        {
            self::$conexion = null;
        }
    }
    
    public static function ObtConexion()
    {
        return self::$conexion;
    }
}