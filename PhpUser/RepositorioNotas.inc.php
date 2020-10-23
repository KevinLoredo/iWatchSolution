<?php

include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';
include_once 'Notas.inc.php';

class RepositorioNotas {

    public function ObtNumNotas($conexion){
        $TotalNotas = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM notaneg";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                $TotalNotas = $resultado['total'];
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage();
            }
        }
        return $TotalNotas;
    }

    public function Insertar_Notas($conexion, $nota) {
        $Nota_Insertado = false;

        if (isset($conexion)) {
            try {
                
                $sql = "INSERT INTO notaneg(Autor_id, GuiaEnvio, NombreNota, TelefonoNota, ModeloNota, IMEINota, PasswordNota, ObservacionesNota, FechaRegistro) VALUES(:Autor_id, :GuiaEnvio, :NombreNota, :TelefonoNota, :ModeloNota, :IMEINota, :PasswordNota, :ObservacionesNota, NOW())";
                
                $Autor_idTemp = $nota->ObtAutor_id();
                $NombreTemp = $nota->ObtNombre();
                $TelefonoTemp = $nota->ObtTelefono();
                $ModeloTemp = $nota->ObtModelo();
                $IMEITemp = $nota->ObtIMEI();
                $PasswordTemp = $nota->ObtPassword();
                $ObservacionesTemp = $nota->ObtObservaciones();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':Autor_id', $Autor_idTemp, PDO::PARAM_INT);
                $sentencia->bindParam(':NombreNota', $NombreTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':TelefonoNota', $TelefonoTemp, PDO::PARAM_INT);
                $sentencia->bindParam(':ModeloNota', $ModeloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':IMEINota', $IMEITemp, PDO::PARAM_STR);
                $sentencia->bindParam(':PasswordNota', $PasswordTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':ObservacionesNota', $ObservacionesTemp, PDO::PARAM_STR);

                $Nota_Insertado = $sentencia->execute(array(":Autor_id" => $Autor_idTemp, ":NombreNota" => $NombreTemp, ":TelefonoNota" => $TelefonoTemp, ":ModeloNota" => $ModeloTemp, ":IMEINota" => $IMEITemp, ":PasswordNota" => $PasswordTemp, ":ObservacionesNota" => $ObservacionesTemp));
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Nota_Insertado;
    }
    
    public static function Obt_Fecha_Descendiente($conexion) {
        $Notas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM notaneg ORDER BY fecha DESC LIMIT 5";
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $Notas[] = new Notas(                                
                                $fila['id'],
                                $fila['Autor_id'],
                                $fila['GuiaEnvio'],
                                $fila['NombreNota'],
                                $fila['TelefonoNota'],
                                $fila['ModeloNota'],
                                $fila['IMEINota'],
                                $fila['PasswordNota'],
                                $fila['ObservacionesNota'],
                                $fila['FechaRegistro']);
                    }
                }
            } catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $Notas;
    }

    public static function obtener_entrada_por_url($conexion, $url) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas WHERE url LIKE :url";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $entrada = new Entrada(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'],
                            $resultado['titulo'], $resultado['texto'], $resultado['fecha'],
                            $resultado['activa']
                            );
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $entrada;
    }

    public static function obtener_entrada_por_id($conexion, $id) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas WHERE id = :id";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $entrada = new Entrada(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'],
                            $resultado['titulo'], $resultado['texto'], $resultado['fecha'],
                            $resultado['activa']
                            );
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $entrada;
    }

    public static function contar_entradas_activas_usuario($conexion, $id_usuario) {
    	$total_entradas = '0';

    	if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 1";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex -> getMessage();
            }
        }

        return $total_entradas;
    }

    public static function contar_entradas_inactivas_usuario($conexion, $id_usuario) {
    	$total_entradas = '0';

    	if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 0";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $total_entradas;
    }

    public static function obtener_entradas_usuario_fecha_descendente($conexion, $id_usuario) {
    	$entradas_obtenidas = [];

    	if (isset($conexion)) {
    		try {
    			$sql = "SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'cantidad_comentarios' ";
    			$sql .= "FROM entradas a ";
    			$sql .= "LEFT JOIN comentarios b ON a.id = b.entrada_id ";
    			$sql .= "WHERE a.autor_id = :autor_id ";
    			$sql .= "GROUP BY a.id ";
    			$sql .= "ORDER BY a.fecha DESC";

    			$sentencia = $conexion -> prepare($sql);
    			$sentencia -> bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
    			$sentencia -> execute();
    			$resultado = $sentencia -> fetchAll();

    			if (count($resultado)) {
    				foreach ($resultado as $fila) {
    					$entradas_obtenidas[] = array(
    						new Entrada(
								$fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
							),
							$fila['cantidad_comentarios']
    					);
    				}
    			}
    		} catch (PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    		}
    	}

    	return $entradas_obtenidas;
    }

    public static function titulo_existe($conexion, $titulo) {
    	$titulo_existe = true;

    	if (isset($conexion)) {
    		try {
    			$sql = "SELECT * FROM entradas WHERE titulo = :titulo";
    			$sentencia = $conexion -> prepare($sql);
    			$sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
    			$sentencia -> execute();
    			$resultado = $sentencia -> fetchAll();

    			if (count($resultado)) {
    				$titulo_existe = true;
    			} else {
    				$titulo_existe = false;
    			}
    		} catch(PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    		}
    	}

    	return $titulo_existe;
    }

    public static function url_existe($conexion, $url) {
    	$url_existe = true;

    	if (isset($conexion)) {
    		try {
    			$sql = "SELECT * FROM entradas WHERE url = :url";
    			$sentencia = $conexion -> prepare($sql);
    			$sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
    			$sentencia -> execute();
    			$resultado = $sentencia -> fetchAll();

    			if (count($resultado)) {
    				$url_existe = true;
    			} else {
    				$url_existe = false;
    			}
    		} catch(PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    		}
    	}

    	return $url_existe;
    }

    public static function eliminar_comentarios_y_entrada($conexion, $entrada_id) {
    	if (isset($conexion)) {
    		try {
    			$conexion -> beginTransaction();

    			$sql1 = "DELETE FROM comentarios WHERE entrada_id=:entrada_id";
    			$sentencia1 = $conexion -> prepare($sql1);
    			$sentencia1 -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
    			$sentencia1 -> execute();

    			$sql2 = "DELETE FROM entradas WHERE id=:entrada_id";
    			$sentencia2 = $conexion -> prepare($sql2);
    			$sentencia2 -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
    			$sentencia2 -> execute();

    			$conexion -> commit();
    		} catch (PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    			$conexion -> rollBack();
    		}
    	}
    }

    public static function actualizar_entrada($conexion, $id, $titulo, $url, $texto, $activa) {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE entradas SET titulo = :titulo, url = :url, texto = :texto, activa = :activa WHERE id = :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
                $sentencia -> bindParam(':activa', $activa, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();

                if (count($resultado)) {
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_correcta = false;
                }
            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $actualizacion_correcta;
    }

    public static function buscar_entradas_todos_los_campos($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas WHERE titulo LIKE :busqueda OR texto LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_titulo($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas WHERE titulo LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_contenido($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas WHERE texto LIKE :busqueda ORDER BY fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }

    public static function buscar_entradas_por_autor($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas e JOIN usuarios u ON u.id = e.autor_id WHERE u.nombre LIKE :busqueda ORDER BY e.fecha DESC LIMIT 25";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                            $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }

            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
            }
        }

        return $entradas;
    }
}
