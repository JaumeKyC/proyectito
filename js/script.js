document.addEventListener("DOMContentLoaded", main);

function main() {
    pressedButton();
    newClientForm();
    clientEdit();
    clientInfo();
    clientDelete();
    

}
//Lenin
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
//Alejandro
function newClientForm() {
    document.getElementById("pop-up-cliente").addEventListener("click", function () {
        document.getElementById("clientitos").style.display = "grid";

    });
    document.getElementById("cancelar-pop-up").addEventListener("click", function () {
        document.getElementById("clientitos").style.display = "none";

    });
    document.getElementById("cancelar-pop-up-info").addEventListener("click", function () {
        document.getElementById("detallitos").style.display = "none";
    });
    document.getElementById("cancelar2-pop-up").addEventListener("click", function () {
        document.getElementById("editaditos").style.display = "none";
    });
    document.getElementById("cancelar-pop-up-delete").addEventListener("click", function () {
        document.getElementById("borraditos").style.display = "none";
    });
}
//Lenin
function clientInfo() {
    let infoButtons = document.getElementsByClassName("pop-up-cliente-info");
    for (let index = 0; index < infoButtons.length; index++) {
        infoButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); 
            clienteInfoAction(infoButtons[index].id);
        });
    }
}
//Lenin
function drawClientInfo(data) {
    document.getElementById("detallitos").style.display = "grid";
    let clientData = document.getElementById("infoCliente");
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
//Lenin
function clienteInfoAction(id) {
    
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); 
          
            drawClientInfo(data); 
        }
    });
    xhttp.open("GET", "infoClient.php?id=" + id, true);
    xhttp.send();
}
//Lenin y Jaume
function clientEdit() {
    let editButtons = document.getElementsByClassName("pop-up-cliente-edit");
    for (let index = 0; index < editButtons.length; index++) {
       
        editButtons[index].addEventListener("click", function (e) {
            e.preventDefault();
            clienteEditAction(editButtons[index].id);

        });
    }
}
//Lenin y Jaume
function clienteEditAction(id) {
   
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); 
            
            drawClientEdit(data);
        }
    });
    xhttp.open("GET", "infoClient.php?id=" + id, true);
    xhttp.send();
}
//Lenin y Jaume
function drawClientEdit(data) {
    document.getElementById("editaditos").style.display = "grid";
    let clientData = document.getElementsByClassName("input2");
    let index = 0;
    for (field in data) {
        clientData[index].value = data[field];
        index++;
    }
}
//Lenin
function clientDelete() {
    let deleteButtons = document.getElementsByClassName("pop-up-cliente-delete");
    for (let index = 0; index < deleteButtons.length; index++) {
       
        deleteButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); 
            clienteDeleteAction(deleteButtons[index].id);
        });
    }
}
//Lenin
function clienteDeleteAction(id) {
    document.getElementById("borraditos").style.display = "grid";
    let formulario = document.getElementById("deleteClientes");
    formulario.action = "";
    formulario.action = 'deleteClientes.php?id=' + id + '';
}


