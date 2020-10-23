<?php

class RepositorioAdmin {

    public static function ObtTodos($conexion) {
        $AdminArray = array();

        if (isset($conexion)) {
            try {
                include_once 'Admin.inc.php';

                $sql = "SELECT * FROM adminneg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $AdminArray[] = new Admin($fila['id'],                                
                                $fila['Admin'],
                                $fila['Password'],                                
                                $fila['FechaRegistro']);
                    }
                } else {
                    print 'No Hay Admin: ';
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage();
            }
        }
        return $AdminArray;
    }

    public function ObtLogAdmin($conexion, $nombre) {
        $admin = null;

        if (isset($conexion)) {
            try {
                include_once 'Admin.inc.php';

                $sql = "SELECT * FROM adminneg WHERE Admin = :Admin";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Admin', $nombre, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $admin = new Admin(
                            $resultado['id'],                            
                            $resultado['Admin'],
                            $resultado['Password'],
                            $resultado['FechaRegistro']);
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }

        return $admin;
    }

    public static function obtener_admin_por_id($conexion, $id) {
        $admin = null;

        if (isset($conexion)) {
            try {
                include_once 'Admin.inc.php';

                $sql = "SELECT * FROM adminneg WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $admin = new Admin(
                            $resultado['id'],                            
                            $resultado['Admin'],
                            $resultado['Password'],
                            $resultado['FechaRegistro']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $admin;
    }
}