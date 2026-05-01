let modal_manage = document.querySelector("#save_pass")
let copy_pass = document.querySelector(".copy_pass")
modal_manage.querySelector(".btn-.cerrar").onclick = () => { modal_manage.classList.add("_hidden") }
modal_manage.querySelector("#is_edited").onchange = (e) => {
    let btn_pass = document.querySelector("#save_pass .actualizar")
    if (e.target.checked === true) {
        btn_pass.removeAttribute("disabled")
    } else {
        btn_pass.setAttribute("disabled", false)
    }
}
copy_pass.querySelector("span").onclick = (e => {
    // copiar la constraseña generada
    let temp = document.querySelector("textarea#temp")
    let stado = document.querySelector(".status")
    let content = copy_pass.querySelector("#pass_chg").value
    temp.innerHTML = content
    temp.classList.remove("_hidden")
    temp.focus(); temp.select();
    stado.classList.remove("_hidden");
    if (document.execCommand('copy')) {
        stado.innerHTML = "<p><span class='mdi mdi-clipboard-check-multiple'></span>copiado correctamente</p>"
    } else {
        stado.innerHTML = `<p><span class='mdi mdi-clipboard-alert'></span>no se pudo copiar</p>`
    }
    setTimeout(() => {
        stado.classList.add("_hidden");
    }, 1050)
    temp.classList.add("_hidden")

})
document.querySelector("#save_pass").onsubmit = (e) => {
    e.preventDefault();
    //tratamiento de datos
    let data = '{';
    document.querySelectorAll("input[type=password],input[type=hidden]").forEach((e) => {
        data += ` '${e.name}': '${e.value}'`;
    })
    data+='}'
    console.log(data);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/chgpass.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`&data=`+JSON.stringify(data))
    xhr.getResponseHeader("Content-type", "application/json");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            let estado = document.querySelector(".status")
            estado.innerHTML = `<p>${xhr.response}<br>la ventana se cerra pronto</p>`
            estado.style.background = "green"
            estado.style.textAlign = "center"
            estado.style.padding = ".25rem"
            estado.style.margin = "7px 0"
            estado.classList.remove("_hidden")
            setTimeout(function () {
                window.close()
            }, 2500)
        }
    }
}