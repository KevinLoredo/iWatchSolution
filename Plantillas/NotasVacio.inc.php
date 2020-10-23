<h1>Sistema Notas</h1>
<div class="contenedor">
    <div class="row">
        <div class="col-md-7">
            <div class="col-md-4">
                <br>
                <label><li><i class="fas fa-receipt"></i> <?php echo $TotalNotasArray; ?></li></label>
                <br>
                <br>
                <br>
            </div>
            <div class="col-md-9">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fab fa-fedex"></i></span>
                    <input type="text" name="guiaenvio" class="form-control" placeholder="GUIA DE ENVIO"
                           aria-describedby="sizing-addon1">
                </div>
                <br>
                <br>
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-user"></i></span>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre Del Cliente"
                           aria-describedby="sizing-addon1">
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-5">
            <div class="col-xs-10">
                <a href="#" class="thumbnail">
                    <img src="Img/Icon.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-directions"></i></span>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion"
                       aria-describedby="sizing-addon1">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-city"></i></span>
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad"
                       aria-describedby="sizing-addon1">
            </div>
        </div>

        <div class="col-md-3"><br></div>
        <div class="col-md-5">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-mobile-alt"></i></span>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono"
                       aria-describedby="sizing-addon1">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fab fa-apple"></i></span>
                <input type="text" name="modelo" class="form-control" placeholder="Modelo"
                       aria-describedby="sizing-addon1">
            </div>
        </div>
        <div class="col-md-2"><br></div>
        <div class="col-md-6">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-barcode"></i></span>
                <input type="text" name="imei" class="form-control" placeholder="IMEI"
                       aria-describedby="sizing-addon1">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <br>
            <br>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password Del Reloj"
                       aria-describedby="sizing-addon1">
            </div>
        </div>
        <div class="col-md-2"><br></div>
        <div class="col-md-5">
            <label><input type="checkbox" name="checkbox[]" value="Enciende"> Enciende</label>
            <br>
            <label><input type="checkbox" name="checkbox[]" value="Mojado"> Mojado</label>
            <br>
            <label><input type="checkbox" name="checkbox[]" value="Pantalla Rota"> Pantalla Rota</label>
            <br>
            <label><input type="checkbox" name="checkbox[]" value="Pantalla Rayada"> Pantalla Rayada</label>
            <br>
            <label><input type="checkbox" name="checkbox[]" value="Pantalla Manchas"> Pantalla Manchas</label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <textarea name="observaciones" rows="4" cols="45" placeholder="Observaciones"></textarea>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button type="submit" class="button" name="submit">ENVIAR NOTA</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>