'use stric'
const alkar = document.querySelector("#clientes_record");
const estado = (d) => { document.querySelector(".status").innerHTML = d };
alkar.onsubmit = (e) => {
    e.preventDefault();
    let data;
    document.querySelectorAll("input[type='checkbox']:checked").forEach(function (e) {
        // document.querySelector(".status").innerHTML += "&" + e.value + "=true<br>";
        data += "&" + e.value + "=1";
    });
    document.querySelectorAll("input[type=text],input[type=number],input[type=email]").forEach(function (e) {
        // document.querySelector(".status").innerHTML += "&" + e.attributes.name.nodeValue + "=" + (e.value!=""?e.value:null)+"<br>";
        data += "&" + e.attributes.name.nodeValue + "=" + (e.value != "" ? e.value : null);
    });
    document.querySelectorAll("textarea").forEach(function (e) {
        // document.querySelector(".status").innerHTML += "&" + e.attributes.name.nodeValue + "=" + (e.value!=""?e.value:null)+"<br>";
        data += "&" + e.attributes.name.nodeValue + "=" + (e.value != "" ? e.value : null);
    });
    timestamp = new Date();
    data += "&time_stamp=" + timestamp.getFullYear() + "-" + (timestamp.getMonth() + 1) + "-" + timestamp.getDate() + " " + timestamp.getHours() + ":" + timestamp.getMinutes() + ":" + timestamp.getSeconds()
    var xhr = new XMLHttpRequest();
    console.log(xhr);
    xhr.open(alkar.method, alkar.action, true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
    console.log(xhr.status);
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
            alkar.reset();
        }
        if (xhr.readyState === 4) {
            estado(`<p>${xhr.response}</p>`)
            console.log(xhr.responseType);
        }
    }
    console.log(xhr.readyState);

}
