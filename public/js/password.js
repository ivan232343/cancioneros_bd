'use stric'

// function change_button_password() {
//     const save_pass = document.querySelector("#save_pass");
//     save_pass.onsubmit = (e) => {
//         var xhr = new XMLHttpRequest();
//         //     console.log(xhr);
//         xhr.open(save_pass.method, save_pass.action, true);
//         xhr.setRequestHeader("Charset", "UTF-8");
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.send(data);
//         //     console.log(xhr.status);
//         //     // xhr.onprogress = function () { estado("<p>cargando...</p>") };
//         //     xhr.onreadystatechange = function () { // Call a function when the state changes.
//         //         if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//         //             console.log("si esta");
//         //             alkar.reset();
//         //         }
//         //         if (xhr.readyState === 4) {
//         //             // estado(`<p>${xhr.response}</p>`)
//         console.log(xhr.response);
//         //         }
//     }
// }
function show_modal_password() {
    let modal_manage = document.querySelector(".modal-unique")
    let open_modal = document.querySelectorAll(".btn-chg-pass")

    // rellenar_form_password()
    open_modal.forEach(e => {
        e.onclick = () => {
            rellenar_form_password(e.dataset.datasent);
            // modal_manage.classList.remove("_hidden")
        }
    })

}
function copy_text_passwords() {
    document.querySelectorAll(".text-copy .pass-show").forEach((e) => {
        e.onclick = (d) => {
            let chg_eye = e.querySelector("span.mdi").classList
            chg_eye.toggle("mdi-eye")
            chg_eye.toggle("mdi-eye-off")
            let path = d.path[2];
            let no_activo = path.querySelector(".pass-censore ._no_active")
            let activo = path.querySelector(".pass-censore ._active")
            no_activo.classList.remove("_no_active")
            no_activo.classList.add("_active")
            activo.classList.remove("_active")
            activo.classList.add("_no_active")
        }
    })
    document.querySelectorAll(".text-copy p").forEach((e) => {
        e.onclick = (s) => {
            // console.log(s)
            let temp = document.querySelector("textarea#temp")
            let stado = document.querySelector(".status._pass")
            console.log(s);
            let content = e.dataset.tocopy
            temp.innerHTML = content
            temp.classList.remove("_hidden")
            stado.classList.remove("_hidden");
            temp.focus(); temp.select();
            if (document.execCommand('copy')) {
                stado.innerHTML = "<p><span class='mdi mdi-clipboard-check-multiple'></span>copiado correctamente</p>"
            } else {
                stado.innerHTML = `<p><span class='mdi mdi-clipboard-alert'></span>no se pudo copiar</p>`
            }
            setTimeout(() => {
                stado.classList.add("_hidden");
            }, 1050)
            temp.classList.add("_hidden")
        }
    })
}
function rellenar_form_password(data) {
    let sent = "&post=chg_pass&identifier=" + data;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/get_modal.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(sent);
    xhr.getResponseHeader("Content-type", "application/json");
    xhr.onreadystatechange = (e) => {
        if (xhr.readyState === 4) {
            let retorna = JSON.parse(xhr.response);
            xhr = undefined;
            editor_pass = window.open(window.location.href + "passwords/edit", "nueva", "screenX=-1,screenY=-1,width=300,height=265,resizable=no, toolbar=no, scrollbars=no, menubar=no, status=no, directories=no")
            editor_pass.document.write(`
            <HEAD>
                <TITLE>Editando contraseña para  ${retorna.nombre_app} </TITLE>
                <link rel="stylesheet" href="${window.location.origin}${window.location.pathname}public/css/form.css">
                <link rel="stylesheet" href="${window.location.origin}${window.location.pathname}public/plugins/mdi/css/icon.popup.min.css">
            </HEAD>
            <BODY>
            <form method="post" id="save_pass" >
            <div class="cards-content notext _flex _direction-col">
            <!-- identificador para no volver a cargar el formulario -->
                <input type="hidden" name="is_active" class="is_active" value="${retorna.identifier}">
                <!-- identificador de la contraseña a guardar -->
                <input type="hidden" name="to_change" class="to_change" value="${retorna.pass_to_change}">
                <!-- identificador para mantener el nombre de usuario -->
                <input type="hidden" name="id_user" class="id_user" value="${retorna.id_usu_mant}">
                    <div class="card-head _flex _content-s-between">
                        <div class="tittle">
                        <p>cambiar contraseña para ${retorna.nombre_app}</p>
                        </div>
                        <div class="btn- cerrar">
                            <span class="mdi mdi-window-close"></span>
                        </div>
                    </div>
                    <div class="card-body  ">
                        <div class="item">
                            <label for="pass_chg">${retorna.cod_user}</label>
                            <div class="copy_pass">
                                <input type="password" name="pass_chg" id="pass_chg" value="${retorna.password_new}">
                                <span class="mdi mdi-content-copy mdi-24px"></span>
                            </div>
                        </div>
                        <div class="item">
                            <label for="is_edited">Se pudo editar la contraseña? </label>
                            <input type="checkbox" name="is_edited" id="is_edited">
                        </div>
                    </div>
                    <div class="card-footer _flex _direction-col _content-center">
                        <div class="item">
                            <button disabled class="actualizar">Actualizar contraseña</button>
                        </div>
                        <div class="item">
                        <textarea name="temp" id="temp" cols="0" rows="0" class="_hidden"></textarea>
                            <div class="status"></div>
                        </div>
                    </div>
            </div>
            </form>
            <script src="${window.location.origin}${window.location.pathname}public/js/popup.password.js"></script>
`)

        }
    }
}
function save_password(data) {

}