'use stric'
document.querySelectorAll(".nav-content .item").forEach((e, i) => {
    e.onclick = (b) => {
        let tabs = document.querySelector("#cancionero-main .box-info").children
        code_send = e.dataset.code
        for (let t = 0; t < tabs.length; t++) {
            if (tabs[t].classList.contains("_active")) {
                tabs[t].classList.remove("_active")
                tabs[t].classList.add("_no_active")
            }
        }
        tabs[i].classList.remove("_no_active");
        tabs[i].classList.add("_active");
        if (code_send != "form") {
            let data = "&post=" + code_send;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "record/get_section.php", true);
            xhr.setRequestHeader("Charset", "UTF-8");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(data);
            xhr.getResponseHeader("Content-type", "text/html");
            xhr.onreadystatechange = (e) => {
                if (xhr.readyState === 4) {
                    tabs[i].innerHTML = xhr.response
                    xhr = undefined;
                    console.log(xhr);
                }
            }

        }

    }
})
