document.addEventListener("DOMContentLoaded", main);

function main() {
    pressedButton();
    newClientForm();

/*     let form = document.getElementById("insertForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        const xhttp = new XMLHttpRequest();
        xhttp.addEventListener("readystatechange", function(){})
        xhttp.open("POST", "new.php", true);
        xhttp.send(form);
    }); */
}
function pressedButton() {
    let img = document.getElementsByClassName("img-button");
    let title = document.getElementsByClassName("titulo-centrado");
    for (let i = 0; i < img.length; i++) {
        let actualShadow = window.getComputedStyle(img[i]).getPropertyValue("box-shadow");
        img[i].addEventListener("mousedown", function () {
            img[i].style.boxShadow = "none";
        });
        img[i].addEventListener("mouseup", function () {
            img[i].style.boxShadow = actualShadow;
        });
        title[i].addEventListener("mousedown", function () {
            img[i].style.boxShadow = "none";
        });
        title[i].addEventListener("mouseup", function () {
            img[i].style.boxShadow = actualShadow;
        });

    }
};
function newAction(form) {
    let newForm = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    });
    xhttp.open("POST", "../pages/new.php", true);
    xhttp.send(newForm);
}
function newClientForm() {
    document.getElementById("pop-up-cliente").addEventListener("click", function () {
        document.getElementById("clientitos").style.display = "grid";

    });
    document.getElementById("cancelar-pop-up").addEventListener("click", function () {
        document.getElementById("clientitos").style.display = "none";

    });
}


