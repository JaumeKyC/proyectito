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
    document.getElementById("cancelar2-pop-up").addEventListener("click", function () {
        document.getElementById("editaditos").style.display = "none";
    });
}

function productosInfo() {
    let infoButtons = document.getElementsByClassName("pop-up-producto-info");
    for (let index = 0; index < infoButtons.length; index++) {
      
        infoButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); 
            
            productosInfoAction(infoButtons[index].id);
        });
    }
}

function productosInfoAction(id) {
   
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); 
            
            drawProductoInfo(data); 
        }
    });
    xhttp.open("GET", "infoProducto.php?id=" + id, true);
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
       
        deleteButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); 
           
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

        
        editButtons[index].addEventListener("click", function (e) {
            e.preventDefault();
            productoEditAction(editButtons[index].id);

        });
    }
}

function productoEditAction(id) {

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); 
            
            drawProductoEdit(data); 
        }
    });
    xhttp.open("GET", "infoProducto.php?id=" + id, true);
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


