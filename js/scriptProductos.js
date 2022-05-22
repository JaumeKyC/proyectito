document.addEventListener("DOMContentLoaded", main);

function main() {
    newClientForm();
    productosInfo();
    productoDelete();
    productoEdit();

}
function newClientForm() {
    document.getElementById("pop-up-producto").addEventListener("click", function () {
        document.getElementById("productitos").style.display = "grid";
    });
    document.getElementById("cancelar-pop-up").addEventListener("click", function () {
        document.getElementById("productitos").style.display = "none";
    });
    document.getElementById("cancelar-pop-up-delete").addEventListener("click", function () {
        document.getElementById("borraditos").style.display = "none";
    });
    document.getElementById("cancelar-pop-up-info").addEventListener("click", function () {
        document.getElementById("detallitos").style.display = "none";
    });
    document.getElementById("cancelar-pop-up").addEventListener("click", function () {
        document.getElementById("editaditos").style.display = "none";
    });
}

function productosInfo() {
    let infoButtons = document.getElementsByClassName("pop-up-producto-info");
    for (let index = 0; index < infoButtons.length; index++) {
        /* infoButtons[index].href=clienteInfoAction(id); */
        infoButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); //Quitamos comportamiento por defecto
            /* alert(infoButtons[index].id); */
            productosInfoAction(infoButtons[index].id);
        });
    }
}

function productosInfoAction(id) {
    /* console.log(id); */
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); // 2 - Lo que se devuelva, lo convertimos en objeto Json
            /* console.log(data); */
            drawProductoInfo(data); // 3 - Y se lo pasamos a drawDetail
        }
    });
    xhttp.open("GET", "infoProducto.php?id=" + id, true); // 1 - Llama a detail.php pasándole por GET el id
    xhttp.send();
}

function drawProductoInfo(data) {
    document.getElementById("detallitos").style.display = "grid";
    let clientData = document.getElementById("infoProducto");
    clientData.innerHTML = "";

    for (field in data) {
        let row = document.createElement("tr");
        let th = document.createElement("th");
        th.innerHTML = field.charAt(0).toUpperCase() + field.slice(1);
        let td = document.createElement("td");
        td.innerHTML = data[field];

        row.appendChild(th);
        row.appendChild(td);
        clientData.appendChild(row);
    }

}
function productoDelete() {
    let deleteButtons = document.getElementsByClassName("pop-up-producto-delete");
    for (let index = 0; index < deleteButtons.length; index++) {
        /* infoButtons[index].href=clienteInfoAction(id); */
        deleteButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); //Quitamos comportamiento por defecto
            /* alert(infoButtons[index].id); */
            productoDeleteAction(deleteButtons[index].id);
        });
    }
}
function productoDeleteAction(id) {

    document.getElementById("borraditos").style.display = "grid";
    let formulario = document.getElementById("deleteProducto");
    formulario.action = "";
    formulario.action = 'deleteProductos.php?id=' + id + '';
}

function productoEdit() {
    let editButtons = document.getElementsByClassName("pop-up-producto-edit");
    for (let index = 0; index < editButtons.length; index++) {
  /*       console.log(editButtons[index]); */
        
        editButtons[index].addEventListener("click", function (e) {
            e.preventDefault();
            productoEditAction(editButtons[index].id);

        });
    }
}

function productoEditAction(id) {
  /*   console.log(id); */
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); // 2 - Lo que se devuelva, lo convertimos en objeto Json
            /* console.log(data); */
            drawProductoEdit(data); // 3 - Y se lo pasamos a drawDetail
        }
    });
    xhttp.open("GET", "infoProducto.php?id=" + id, true); // 1 - Llama a detail.php pasándole por GET el id
    xhttp.send();
}

function drawProductoEdit(data) {
    console.log(data);
    document.getElementById("editaditos").style.display = "grid";
    let clientData = document.getElementsByClassName("input2");
    let index = 0;
    for (field in data) {
        clientData[index].value = data[field];
        index++;
    }
}


