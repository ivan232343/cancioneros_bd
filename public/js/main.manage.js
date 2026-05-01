async function loader_manage_section(elemento) {
    let status = document.querySelector(".status-load")
    status.classList.remove("_hidden");
    status.innerHTML = "Un momento, cargando scripts"
    await sleep(750);
    switch (elemento) {
        case 'pass':
            copy_text_passwords();
            show_modal_password();
            break;

        default:
            break;
    }
    status.innerHTML = "Listo"
    setTimeout(() => {
        status.classList.add("_hidden");
    }, 1050)
}