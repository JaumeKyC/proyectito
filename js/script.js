document.addEventListener("DOMContentLoaded", main);

function main() {
    pressedButton();
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

