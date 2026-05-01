'use stric'
document.querySelectorAll(".box.link_full_letra button").forEach((e) => {

    e.onclick = (b) => {
        let id_cancion = e.dataset.show_id;

        const datos = `&post=letras&identifier=${id_cancion}`;
        var xhr = new XMLHttpRequest();

        let dad_modal = document.querySelector(".modal-overlay");
        let modal_letra = document.querySelector(".modal-unique");
        xhr.open("POST", "record/get_modal.php", true);
        xhr.setRequestHeader("Charset", "UTF-8");
        dad_modal.classList.remove("_hidden");
        modal_letra.querySelector(".modal-body").innerHTML = `<div class="music_response-lyric"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`;

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(datos);
        xhr.getResponseHeader("Content-type", "text/html");
        xhr.onreadystatechange = (e) => {
            if (xhr.readyState === 4) {
                let response = JSON.parse(xhr.responseText);
                modal_letra.querySelector(".modal-title").innerHTML = `<div class="music_response-title">${response.title_lyric}</div>`;
                modal_letra.querySelector(".modal-body").innerHTML = `<div class="music_response-lyric">${response.full_lyric}</div>`;
            }
        }
    }
})

document.querySelector(".modal-close .btn-close").onclick = () => {
    document.querySelector(".modal-overlay").classList.add("_hidden");

    let dad_modal = document.querySelector(".modal-overlay");
    let modal_letra = document.querySelector(".modal-unique");
    modal_letra.querySelector(".modal-title").innerHTML = ``;
    modal_letra.querySelector(".modal-body").innerHTML = ``;
}