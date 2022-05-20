document.addEventListener("DOMContentLoaded", main);

function main() {
    pedidosDelete();
    hideGrid();
    pedidosInfo();
}
function hideGrid() {
    document.getElementById("cancelar-pop-up-delete").addEventListener("click", function () {
        document.getElementById("borraditos").style.display = "none";
    });
    document.getElementById("cancelar-pop-up-info").addEventListener("click", function () {
        document.getElementById("detallitos").style.display = "none";
    });
}

function pedidosDelete() {
    let deleteButtons = document.getElementsByClassName("pop-up-cliente-delete");
    for (let index = 0; index < deleteButtons.length; index++) {
        /* infoButtons[index].href=clienteInfoAction(id); */
        deleteButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); //Quitamos comportamiento por defecto
            /* alert(infoButtons[index].id); */
            pedidosDeleteAction(deleteButtons[index].id);
        });
    }
}

function pedidosDeleteAction(id) {

    document.getElementById("borraditos").style.display = "grid";
    let formulario = document.getElementById("deletePedidos");
    formulario.action = "";
    formulario.action = 'deletePedidos.php?id=' + id + '';
}

function pedidosInfo() {
    let infoButtons = document.getElementsByClassName("pop-up-pedidos-info");
    for (let index = 0; index < infoButtons.length; index++) {
        /* infoButtons[index].href=clienteInfoAction(id); */
        infoButtons[index].addEventListener("click", function (e) {
            e.preventDefault(); //Quitamos comportamiento por defecto
            /* alert(infoButtons[index].id); */
            pedidosInfoAction(infoButtons[index].id);
        });
    }
}

function pedidosInfoAction(id) {
    /* console.log(id); */
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText); // 2 - Lo que se devuelva, lo convertimos en objeto Json
            /* console.log(data); */
            drawPedidoInfo(data); // 3 - Y se lo pasamos a drawDetail
        }
    });
    xhttp.open("GET", "infoProductos.php?id=" + id, true); // 1 - Llama a detail.php pasándole por GET el id
    xhttp.send();
}


function drawPedidoInfo(data) {
    document.getElementById("detallitos").style.display = "grid";
    let clientData = document.getElementById("infoPedido");
    clientData.innerHTML = "";
    console.log(data);
    let row = document.createElement("tr");
    for (field in data[0]){
        console.log(field);
        let th = document.createElement("th");
        th.innerHTML = field.charAt(0).toUpperCase() + field.slice(1);
        row.appendChild(th);
        clientData.appendChild(row);
    }

    for (let i = 0; i < data.length; i++) {
        let row = document.createElement("tr");
        for (field in data[i]) {
/*             let th = document.createElement("th");
            th.innerHTML = field.charAt(0).toUpperCase() + field.slice(1); */
            let td = document.createElement("td");
            td.innerHTML = data[i][field];

            /* row.appendChild(th); */
            row.appendChild(td);
            clientData.appendChild(row);
        } 
} 


}

