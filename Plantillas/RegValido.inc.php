<h1>Registrar</h1>
<br>
<div class="contenedor">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-at"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Correo Electronico" <?php $validador->Mostrar_Email()?>
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorEmail();
                       ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-user"></i></span>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre De Usuario" <?php $validador->Mostrar_Nombre()?>
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorNombre();
                       ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-5">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-key"></i></span>
                <input type="password" name="clave1" class="form-control" placeholder="Contraseña"
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorClave1();
                       ?>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-key"></i></span>
                <input type="password" name="clave2" class="form-control" placeholder="Repite La Contraseña"
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorClave2();
                       ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-11">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-directions"></i></span>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion" <?php $validador->Mostrar_Direccion()?>
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorDireccion();
                       ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-5">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-city"></i></span>
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" <?php $validador->Mostrar_Ciudad()?>
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorCiudad();
                       ?>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-mobile-alt"></i></span>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono" <?php $validador->Mostrar_Telefono()?>
                       aria-describedby="sizing-addon1">
                       <?php
                       $validador->MostrarErrorTelefono();
                       ?>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <button type="submit" class="button" name="submit">ENVIAR REGISTRO</button>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>