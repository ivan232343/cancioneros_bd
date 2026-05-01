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
        <!-- datos de llamada -->
        <!-- botones de guardado -->
         
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