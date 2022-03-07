drop database if exists integrado;
create database integrado;
use integrado;

CREATE TABLE clientes (
ID varchar(10) NOT NULL PRIMARY KEY,
Nombre varchar(30) NOT NULL,
DireccionCalle varchar(50) NOT NULL,
DireccionNumero varchar(50) DEFAULT NULL,
Ciudad varchar(50) DEFAULT NULL,
Comunidad varchar(10) NOT NULL,
Pais varchar(10) NOT NULL,
Telefono varchar(20) NOT NULL
);
CREATE TABLE pedidos (
ID_Pedido varchar(10) NOT NULL PRIMARY KEY,
ID_Cliente varchar(10) NOT NULL,
Fecha_Pedido DATE NOT NULL,
Fecha_Entrega DATE NOT NULL,
Importe numeric(15,2) NOT NULL, 
CONSTRAINT pedidosclientes_fk FOREIGN KEY (ID_Cliente) REFERENCES clientes (ID)
);

CREATE TABLE productos (
ID_Producto varchar(10) NOT NULL PRIMARY KEY,
Descripción varchar(200),
Cantidad integer DEFAULT NULL,
Precio numeric(15,2) DEFAULT NULL
);

CREATE TABLE productosPedido(
ID_Pedido varchar(10) NOT NULL,
ID_Producto varchar(10) NOT NULL,
CONSTRAINT productosPedido_fk FOREIGN KEY (ID_Pedido) REFERENCES pedidos (ID_Pedido),
CONSTRAINT productosPedido_fk2 FOREIGN KEY (ID_Producto) REFERENCES productos (ID_Producto)
);

