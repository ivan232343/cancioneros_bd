<form action="record/save.php" method="POST" id="clientes_record">
    <div class="content-box _flex _warp _direction-col notext">
        <!-- datos primarios -->
        <div class="item _flex _aling-center _base-line">
            <label for="nombre_cli">Nombre</label>
            <input type="text" name="nombre_cli" id="nombre_cli" required>
        </div>
        <div class="item _flex _aling-center _base-line">
            <label for="motivo_cli">Motivo </label>
            <input type="text" name="motivo_cli" id="motivo_cli" required>
        </div>

        <div class="item _flex _aling-center _base-line">
            <label for="observaciones_cli">obs </label>
            <textarea type="text" name="observaciones_cli" id="observaciones_cli" placeholder="Escribe las observaciones que meciona el cliente" style="height: 75px; width: 191px;"></textarea>
        </div>
        <div class="item _flex _aling-center _base-line">
            <label for="dni_cli">DNI</label>
            <input type="text" name="dni_cli" id="dni_cli" required>
        </div>
        <div class="item _flex _aling-center _base-line">
            <label for="tel_consulta">cod ser</label>
            <input type="number" name="tel_consulta" id="tel_consulta">
        </div>

        <div class="item _flex _aling-center _base-line">
            <label for="is_titular">Titular </label>
            <input type="checkbox" name="is_titular" id="is_titular" value="es_titular">
        </div>

        <!-- datos secundarios -->
        <div class="item _flex _aling-center _base-line">
            <label for="tel_referencia">ref</label>
            <input type="number" name="tel_referencia" id="tel_referencia">
        </div>
        <div class="item _flex _aling-center _base-line _hidden">
            <label for="correo_cli">Correo </label>
            <input type="email" name="correo_cli" id="correo_cli">
        </div>
        <!-- datos de llamada -->
        <div class="item _flex _aling-center _base-line">
            <label for="ani_call">ANI</label>
            <input type="text" name="ani_call" id="ani_call" required>
        </div>
        <div class="item _flex _aling-center _base-line">
            <label for="conmid_call">CONMID</label>
            <input type="text" name="conmid_call" id="conmid_call" required value="11111111">
        </div>
        <div class="item _flex _aling-center _base-line">
            <label for="nac_call">NAC</label>
            <input type="text" name="nac_call" id="nac_call" required>
        </div>
        <div class="item _flex _aling-center _content-s-around">
            <div class="item">
                <label for="cod_ate_call">codigo de atencion</label>
                <input type="text" name="cod_ate_call" id="cod_ate_call">
            </div>
            <div class="item">
                <div class="uptoscaling"><span class="mdi mdi-account-arrow-up mdi-24px"></span></div>
            </div>
        </div>
        <div class="item _flex _aling-center _content-s-around">
            <div>
                <label for="is_cross">Envio a cross </label>
                <input type="checkbox" name="is_cross" id="is_cross" value="is_cross">
            </div>
            <div>
                <label for="is_tificado">Tipificado </label>
                <input type="checkbox" name="is_tificado" id="is_tificado" value="is_tificado">
            </div>
        </div>
        <div class="item _flex _aling-center _content-s-around">
            <div class="item">
                <a id="generar_tipificacion">Generar Tificacion</a>
                <textarea name="copy_gen" id="copy_gen" cols="0" rows="0" style="display: none;"></textarea>
            </div>
            <div class="item">
                <button type="submit">guardar</button>
            </div>
        </div>
        <div class="item">
            <span class="status"></span>
        </div>
    </div>
</form>
<!-- form de escalado
                        URGENTE ESCALAR
USUARIO: 
TITULAR: 
☎️TEL.:  
📱CEL.:  
🆔DNI.: 
 🔢CODIGO DE CLIENTE CMS: 
⏩CODIGO CASO: 
🗓️FECHA DE GENERACION:
📒OBSERVACIONES:
                     -->