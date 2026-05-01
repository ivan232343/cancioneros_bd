const gen_tip = document.querySelector("#generar_tipificacion")
gen_tip.addEventListener('click', function (e) {
    let es_titular = document.querySelector("#is_titular")
    let nombre_cli = document.querySelector("#nombre_cli").value
    let motivo_cli = document.querySelector("#motivo_cli").value
    let tel_referencia = document.querySelector("#tel_referencia").value
    // let nac_call = document.querySelector("#nac_call").value
    let cod_ate_call = document.querySelector("#cod_ate_call").value
    let conmid_call = document.querySelector("#conmid_call").value
    var content = document.getElementById('copy_gen');

    content.innerHTML = (es_titular.checked == true ? "Titular " : "Usuario ") + nombre_cli + " / " + motivo_cli + " /tel: " + tel_referencia + " / " + conmid_call + " / " + cod_ate_call;
    content.style.display = "block";
    content.focus(); content.select(); document.execCommand('copy')
    estado("<p>Tipificacion copiado exitosamente</p>")
    content.style.display = "none";
})
// session storage 