<?php

include_once 'Php/Config.inc.php';
include_once 'Php/Conexion.inc.php';

include_once 'PhpUser/Usuario.inc.php';
include_once 'PhpUser/Notas.inc.php';

include_once 'PhpUser/RepositorioUsuario.inc.php';
include_once 'PhpUser/RepositorioNotas.inc.php';

Conexion::AbrirConexion();
/*
for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $email = sa(5).'@'.sa(3);
    $nombre = sa(10);
    $password = password_hash('123456', PASSWORD_DEFAULT);
    $direccion = sa(10);
    $ciudad = sa(6);
    $telefono = = num(10);
    
    $usuario = new Usuario('', $email, $nombre, $password, $direccion, $ciudad, $telefono, '');
    RepositorioUsuario::Insertar_Usuarios(Conexion::ObtConexion(), $usuario);
} */

for ($notas = 0; $notas <= 0; $notas++) {
    $GuiaEnvio = sa(5);
    $NombreNota = sa(6);
    $telefonoNota = num(10);
    $ModeloNota = sa(2);
    $IMEI = sa(2);
    $Observaciones = sa(2);
    
    $Nota = new Notas('', '1', '', '', '', '', '', '', '', '');
    RepositorioNotas::Insertar_Notas(Conexion::ObtConexion(), $Nota);
}

function num($longitud) {
    $caracteres = '0123456789';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    
    return $string_aleatorio;
}


function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    
    return $string_aleatorio;
}

function lorem() {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quam tortor, semper pretium velit sed, pulvinar posuere lectus. Nam eget hendrerit ante. Nunc sit amet eros at sapien tincidunt tempor. Quisque at urna ipsum. Praesent tincidunt magna sit amet ipsum luctus malesuada. Sed eget nibh vel mi dignissim egestas vitae vel leo. Donec id pulvinar erat. In sed metus ante. Etiam leo nunc, condimentum ut consectetur consectetur, aliquet auctor augue.
Aenean in erat odio. Sed sit amet eros faucibus, facilisis nibh sed, posuere lectus. Nunc quis ex sit amet neque euismod maximus. In interdum urna orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla porta diam, quis dignissim massa placerat eu. Nulla dignissim, enim eu rutrum faucibus, lorem arcu fringilla augue, non suscipit tortor ligula nec mauris. Ut rhoncus sit amet leo et placerat. Suspendisse vitae porta felis, eget placerat risus. Nullam et arcu libero. Aenean sit amet semper urna. Duis tincidunt felis sapien, eget faucibus risus feugiat eget. Donec viverra eu ex non volutpat. Etiam tempus lorem vitae orci pharetra porta. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
Phasellus id luctus ante. Curabitur et arcu tempor, sollicitudin augue quis, pretium lacus. Suspendisse massa sapien, suscipit vitae libero maximus, elementum mollis erat. Suspendisse porttitor feugiat tortor, ac commodo purus ultricies sit amet. Nam vitae leo fringilla, sagittis ante eget, finibus neque. Nam mauris quam, blandit sit amet leo nec, aliquam pharetra velit. Duis consectetur nisl risus, ut malesuada magna gravida quis. Praesent mollis sed dui sit amet malesuada. Phasellus molestie dolor eget diam pulvinar rutrum. Donec ligula nunc, tincidunt quis facilisis eu, convallis non lorem.
Donec sodales mattis magna, a aliquet sem cursus in. Sed ut sodales metus, vitae vulputate tortor. Donec convallis convallis ante finibus congue. Nam ac turpis turpis. Aenean ac feugiat erat, cursus imperdiet justo. Phasellus euismod, nibh ut mattis dictum, nibh ex gravida turpis, id sagittis dolor dolor non dui. Duis pharetra faucibus varius. Duis vitae blandit nisl. Nulla posuere aliquam pulvinar. Sed fringilla in dui non egestas. Maecenas venenatis, tellus et suscipit tempor, massa massa fermentum augue, et porttitor tellus lectus vel arcu. Aenean nibh lorem, tempus suscipit mauris in, dapibus sollicitudin ex. Curabitur ultrices mauris tempor cursus accumsan. Nullam sagittis cursus consequat. Cras ornare bibendum tellus, eget dictum ante ullamcorper sit amet. Cras sodales molestie tellus, vitae gravida nibh accumsan sed.
Cras venenatis eu erat ac tincidunt. Duis ante diam, dignissim id turpis at, ullamcorper commodo orci. Mauris in sagittis erat. Proin ipsum est, rhoncus ac tortor id, posuere mattis elit. Vestibulum viverra augue quis felis pellentesque semper. Cras magna nisi, sollicitudin non luctus quis, pharetra in lacus. Donec volutpat ante quis elit dapibus lacinia. Donec rutrum luctus urna, consectetur ullamcorper turpis porta ac. Aliquam sodales lorem eget turpis cursus, sed consequat turpis tincidunt. Proin commodo eros vel lobortis iaculis. Donec tincidunt lacinia sapien, et iaculis sapien venenatis nec. In id ex tellus. Suspendisse velit nibh, interdum egestas metus dictum, elementum egestas dui.';

    return $lorem;
}