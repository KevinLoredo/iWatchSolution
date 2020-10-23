<?php

class RepositorioUsuario {    

    public function ObtNumUsuarios($conexion){
        $TotalUsuarios = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarioneg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                $TotalUsuarios = $resultado['total'];
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage();
            }
        }
        return $TotalUsuarios;
    }

    public function Insertar_Usuarios($conexion, $usuario){
        $Usuario_Insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarioneg(EmailNeg, UsuarioNeg, PasswordNeg, DireccionNeg, CiudadNeg, TelefonoNeg, FechaRegistro) VALUES(:EmailNeg, :UsuarioNeg, :PasswordNeg, :DireccionNeg, :CiudadNeg, :TelefonoNeg, NOW())";

                $EmailTemp = $usuario->ObtEmail();
                $NombreTemp = $usuario->ObtUsuario();
                $PasswordTemp = $usuario->ObtPassword();
                $DireccionTemp = $usuario->ObtDireccion();
                $CiudadTemp = $usuario->ObtCiudad();
                $TelefonoTemp = $usuario->ObtTelefono();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':EmailNeg', $EmailTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':UsuarioNeg', $NombreTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':PasswordNeg', $PasswordTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':DireccionNeg', $DireccionTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':CiudadNeg', $CiudadTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':TelefonoNeg', $TelefonoTemp, PDO::PARAM_STR);

                $Usuario_Insertado = $sentencia->execute(array(":EmailNeg" => $EmailTemp, ":UsuarioNeg" => $NombreTemp, ":PasswordNeg" => $PasswordTemp, ":DireccionNeg" => $DireccionTemp, ":CiudadNeg" => $CiudadTemp, ":TelefonoNeg" => $TelefonoTemp));
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Usuario_Insertado;
    }

    public function Nombre_Existe($conexion, $NombreTemp) {
        $Nombre_Existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarioneg WHERE UsuarioNeg = :UsuarioNeg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':UsuarioNeg', $NombreTemp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $Nombre_Existe = true;
                } else {
                    $Nombre_Existe = false;
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Nombre_Existe;
    }

    public function Email_Existe($conexion, $EmailTemp) {
        $Email_Existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarioneg WHERE EmailNeg = :EmailNeg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':EmailNeg', $EmailTemp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $Email_Existe = true;
                } else {
                    $Email_Existe = false;
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Email_Existe;
    }

    public function Telefono_Existe($conexion, $TelefonoTemp) {
        $Telefono_Existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarioneg WHERE TelefonoNeg = :TelefonoNeg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':TelefonoNeg', $TelefonoTemp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $Telefono_Existe = true;
                } else {
                    $Telefono_Existe = false;
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Telefono_Existe;
    }

    public function ObtLogUsuario($conexion, $nombre) {
        $usuario = null;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarioneg WHERE UsuarioNeg = :UsuarioNeg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':UsuarioNeg', $nombre, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['id'],
                            $resultado['EmailNeg'],
                            $resultado['UsuarioNeg'],
                            $resultado['PasswordNeg'],
                            $resultado['DireccionNeg'],
                            $resultado['CiudadNeg'],
                            $resultado['TelefonoNeg'],
                            $resultado['FechaRegistro']);
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $usuario;
    }

    public static function obtener_usuario_por_id($conexion, $id) {
        $usuario = null;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';
                $sql = "SELECT * FROM usuarios WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['id'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['password'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }

    public static function actualizar_password($conexion, $id_usuario, $nueva_clave) {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE usuarios SET password = :password WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':password', $nueva_clave, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $id_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_correcta = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $actualizacion_correcta;
    }
}
