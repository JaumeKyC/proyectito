drop database if exists integrado;
create database integrado;
use integrado;

CREATE TABLE clientes (
ID integer NOT NULL PRIMARY KEY unique,
Nombre varchar(100) NOT NULL,
NombreContacto varchar(30) DEFAULT NULL,
ApellidoContacto varchar(30) DEFAULT NULL,
Email varchar (50)  NOT NULL,
Telefono varchar(20) NOT NULL,
DireccionCalle varchar(50) NOT NULL,
DireccionNumero varchar(50) DEFAULT NULL,
Ciudad varchar(50) DEFAULT NULL,
Comunidad varchar(50) NOT NULL,
Pais varchar(25) NOT NULL,
CodPostal varchar(25) NOT NULL
);

INSERT INTO clientes VALUES
	(1,'DGPRODUCTIONS GARDEN','Daniel G','GoldFish','correogenerico@gmail.com','676567654','False Street','52 2 A','Paiporta','Valencia','España','46200'),
	(2,'Empresa de Prueba','Paco ','Pipa','correogenerico@gmail.com','676566542','NoStreet','242 A','Neverwhere','Wonderland','Universe','00000'),
	(3,"Eu Augue Ltd","Hashim","Forbes",'correogenerico@gmail.com',"1-352-771-7823","618-9345 Lobortis Ave","MXK02L","Kano","Campania","Indonesia","7801"),
	(4,"Suscipit Est Corporation","Jasmine","Molina",'correogenerico@gmail.com',"1-709-747-7971","9114 Ornare, Rd.","EIY59E","Velden am Wörther See","Huádōng","Canada","30701"),
	(5,"Nisi Industries","Guy","Blackwell",'correogenerico@gmail.com',"281-8812","913-1844 Congue St.","UYM49V","Kobbegem","North Gyeongsang","Spain","6336"),
	(6,"Donec Luctus LLC","Micah","Brock",'correogenerico@gmail.com',"432-2667","1700 Nunc Street","JTJ56R","Buguma","Limón","Colombia","G2E 8H5"),
	(7,"Ligula Consulting","Bevis","Cochran",'correogenerico@gmail.com',"1-383-491-2213","Ap #721-5379 Elementum Ave","ILX20A","Pioneer","Gävleborgs län","Mexico","11578"),
	(8,"Euismod Enim Corp.","Samuel","Navarro",'correogenerico@gmail.com',"745-7247","Ap #441-8585 Donec Road","NJR51G","Jhelum","Upper Austria","Netherlands","2302"),
	(9,"Placerat Cras Industries","Dean","Marks",'correogenerico@gmail.com',"1-119-531-3651","Ap #398-946 Dapibus St.","KXQ75G","Kitsman","Alberta","Canada","06088"),
	(10,"Parturient Montes Nascetur Incorporated","Tad","Mcclain",'correogenerico@gmail.com',"713-7254","6422 Augue. Avenue","LQB13Y","Jecheon","Puntarenas","Chile","5691-9908"),
	(11,"Morbi Tristique Inc.","Fredericka","Suarez",'correogenerico@gmail.com',"1-381-363-7715","Ap #806-4815 Etiam Avenue","JZM58W","Belfast","National Capital Region","France","1632"),
	(12,"Duis Mi Ltd","Renee","Norton",'correogenerico@gmail.com',"466-5586","Ap #493-9067 Et Rd.","NBQ17N","Bischofshofen","Aragón","Australia","9114"),
	(13,"Aenean Eget Ltd","Duncan","Little",'correogenerico@gmail.com',"338-6138","P.O. Box 127, 4006 Euismod Rd.","VUH89X","Belfort","Victoria","Indonesia","8650"),
	(14,"Vulputate Incorporated","Wylie","Quinn",'correogenerico@gmail.com',"241-5342","805-2362 Lobortis Ave","BSY62G","Cumnock","Munster","Colombia","338729"),
	(15,"Nec Ligula Consectetuer Limited","Kay","Tucker",'correogenerico@gmail.com',"237-4464","P.O. Box 440, 2761 Velit St.","FQO25K","Hijuelas","Jalisco","Turkey","633311"),
	(16,"In Molestie Tortor Corp.","Stacy","Morris",'correogenerico@gmail.com',"308-0976","9719 Morbi Road","SVC87X","Sungai Penuh","Sachsen","South Africa","116584"),
	(17,"In Hendrerit Consectetuer LLP","Slade","Williamson",'correogenerico@gmail.com',"899-8544","Ap #325-522 Nec Rd.","QLH28P","Bath","Baden Württemberg","Colombia","16-628"),
	(18,"Diam Eu Dolor Company","TaShya","Carrillo",'correogenerico@gmail.com',"1-578-456-1392","591-3191 Et Rd.","MDT13B","Ipswich","Gyeonggi","Norway","02416"),
	(19,"Risus Nulla Eget Corp.","Jennifer","Mcbride",'correogenerico@gmail.com',"523-2868","P.O. Box 743, 1292 Nulla Rd.","BQK00H","Liverpool","South Sulawesi","Norway","3495"),
	(20,"Donec Egestas Corp.","Hyacinth","Carney",'correogenerico@gmail.com',"1-870-585-8548","P.O. Box 924, 946 Fusce Rd.","HJK91I","Leiden","Tarapacá","New Zealand","432124"),
	(21,"Nunc Quisque Foundation","Lucius","Wynn",'correogenerico@gmail.com',"1-755-882-2070","Ap #886-2448 Eget Street","ZTT53J","Cartagena","Leinster","Italy","36951"),
	(22,"Risus Nunc Incorporated","Ignatius","Porter",'correogenerico@gmail.com',"388-1833","163-5247 Senectus Rd.","DIH32D","Łódź","Hải Phòng","South Korea","7327"),
	(23,"Urna Foundation","Driscoll","Goff",'correogenerico@gmail.com',"784-2565","349-3437 Vestibulum Ave","FLM43K","Odda","North-East Region","United Kingdom","26342"),
	(24,"Amet Dapibus Id Institute","Uriah","Gillespie",'correogenerico@gmail.com',"322-0082","232-9404 Mi St.","EYL54F","Mmabatho","Trà Vinh","Nigeria","833556"),
	(25,"Venenatis Limited","Haviva","Casey",'correogenerico@gmail.com',"680-5413","245-2608 Vitae Avenue","GVY18C","Ararat","Schleswig-Holstein","Germany","36-98"),
	(26,"Mauris Rhoncus Id LLP","Leah","Nichols",'correogenerico@gmail.com',"525-2761","Ap #306-3114 Sed, St.","URM73V","Iquique","Burgenland","Peru","932392"),
	(27,"Lacinia Sed Congue Consulting","Serena","Ryan",'correogenerico@gmail.com',"738-8893","P.O. Box 383, 4085 Fringilla Avenue","WAP56L","Hoogeveen","Irkutsk Oblast","Chile","15-359"),
	(28,"Scelerisque Neque Nullam Associates","Gillian","Rosa",'correogenerico@gmail.com',"353-4945","432-6642 Sed Street","PCL56S","Pachuca","Lombardia","Austria","80M 6E6"),
	(29,"Cursus Non Egestas Corporation","Winter","Salazar",'correogenerico@gmail.com',"585-0003","P.O. Box 427, 9902 Luctus Avenue","UGT18D","Mercedes","Huádōng","Vietnam","538853"),
	(30,"Neque Venenatis Associates","Meghan","Mccormick",'correogenerico@gmail.com',"1-438-198-7365","Ap #871-6413 A Rd.","FZU86E","Portobuffolè","Bihar","Chile","6145"),
	(31,"Vestibulum Associates","Gloria","Mueller",'correogenerico@gmail.com',"315-6725","P.O. Box 221, 1419 Dui St.","OUO82R","Arica","East Java","Indonesia","254171"),
	(32,"Quam Vel LLP","Jin","Burks",'correogenerico@gmail.com',"225-6657","Ap #949-4168 Non St.","INS61V","Olinda","Troms og Finnmark","Ukraine","6636"),
	(33,"Nec Orci Consulting","Preston","Valencia",'correogenerico@gmail.com',"1-575-523-3194","862-5430 Hendrerit Rd.","KKG16W","Sete Lagoas","Hessen","Sweden","35965"),
	(34,"Et Inc.","Tara","Aguirre",'correogenerico@gmail.com',"1-447-246-5333","233-7756 Lobortis Ave","BUB71N","Culiacán","Cusco","Sweden","50783"),
	(35,"Vitae Sodales PC","Kelly","Hester",'correogenerico@gmail.com',"947-6331","Ap #383-6866 Etiam Rd.","FWL48R","Hildesheim","North Island","Pakistan","238278"),
	(36,"Nunc Incorporated","Mason","Kent",'correogenerico@gmail.com',"1-916-821-2702","P.O. Box 946, 6577 Tempus St.","SGG87I","Emarèse","Tasmania","Ireland","68588"),
	(37,"Arcu Et Institute","Cole","Bridges",'correogenerico@gmail.com',"220-8834","625-9900 Aliquam Street","NOG44M","Laoag","Irkutsk Oblast","Germany","12-144"),
	(38,"Mi Ac Mattis Incorporated","Chester","Nixon",'correogenerico@gmail.com',"314-6129","661-3829 Non Ave","LJK28C","San Luis Río Colorado","Innlandet","Belgium","47884"),
	(39,"Felis Orci Limited","Charde","Barnes",'correogenerico@gmail.com',"1-545-366-2651","Ap #223-9101 Eu Av.","GQM93N","Banda Aceh","West Region","South Africa","0260"),
	(40,"Vestibulum Massa Incorporated","Kitra","Woods",'correogenerico@gmail.com',"672-2629","772 Orci. St.","YDV92Y","Tibet","Victoria","Sweden","47817"),
	(41,"Sagittis PC","Cynthia","Faulkner",'correogenerico@gmail.com',"1-448-831-8330","Ap #517-4041 Mauris Ave","JYG67X","Surabaya","Euskadi","China","6562"),
	(42,"Ipsum Curabitur Inc.","Carla","Hurst",'correogenerico@gmail.com',"1-751-873-0534","947-6015 Facilisis Rd.","RHI26J","Bayeux","New South Wales","Indonesia","511637"),
	(43,"Magna Sed LLP","Rowan","Johnson",'correogenerico@gmail.com',"848-6661","P.O. Box 672, 4131 Volutpat. Rd.","KNY64J","Kleinmachnow","Västra Götalands län","France","363311"),
	(44,"Ultrices Duis Volutpat PC","Desirae","Mcfadden",'correogenerico@gmail.com',"388-5817","Ap #773-4507 Et, Rd.","CVE34B","Dutse","Belgorod Oblast","Colombia","17887"),
	(45,"Imperdiet Ullamcorper LLP","Victor","Hays",'correogenerico@gmail.com',"1-549-843-1117","Ap #160-3027 Turpis St.","LIO57J","Felixstowe","Gyeonggi","South Africa","22862"),
	(46,"Nunc Quisque Foundation","Joshua","Hubbard",'correogenerico@gmail.com',"623-1204","8498 Posuere St.","OPS31V","General Lagos","Azad Kashmir","Spain","4261"),
	(47,"Dui Fusce Corporation","Murphy","Melendez",'correogenerico@gmail.com',"654-7678","Ap #503-2862 Orci Street","JRT21V","Huancayo","Møre og Romsdal","Italy","86318"),
	(48,"A Sollicitudin PC","Katelyn","Trevino",'correogenerico@gmail.com',"1-686-950-7886","563-183 Ornare, Street","CUX82Q","Graneros","Coahuila","United Kingdom","5488-6426"),
	(49,"Arcu Vestibulum LLC","Velma","Ratliff",'correogenerico@gmail.com',"1-648-308-8587","P.O. Box 430, 9751 Eleifend St.","PGE93Y","Bayawan","Morayshire","Canada","7257"),
	(50,"At Arcu Incorporated","Lareina","Walker",'correogenerico@gmail.com',"1-416-817-7333","1998 Nec, Ave","TYP79X","Dillingen","Jambi","Sweden","551055");

CREATE TABLE pedidos (
ID_Pedido integer NOT NULL PRIMARY KEY unique,
ID_Cliente integer NOT NULL,
Fecha_Pedido DATE NOT NULL,
Fecha_Esperada DATE NOT NULL,
Fecha_Entrega DATE DEFAULT NULL,
Estado varchar(15) NOT NULL,
Importe numeric(15,2) NOT NULL, 
CONSTRAINT pedidosCliente_fk FOREIGN KEY (ID_Cliente) REFERENCES clientes (ID)
);

INSERT INTO pedidos VALUES 
(101,4,'2021-01-17','2021-01-19','2021-01-19','Entregado',1200),
(102,12,'2021-04-14','2021-04-16','2021-04-15','Entregado',1200),
(103,33,'2021-06-20','2021-06-23','2021-01-23','Entregado',1200),
(104,14,'2021-06-21','2021-01-23','2021-01-23','Entregado',1200),
(105,8,'2021-08-02','2021-08-04','2021-08-04','Entregado',1200),
(106,3,'2021-09-08','2021-09-11','2021-09-11','Entregado',1200),
(107,2,'2021-11-14','2021-11-16','2021-11-15','Entregado',1200),
(108,5,'2022-01-26','2022-01-28','2022-01-28','Entregado',1200),
(109,4,'2021-01-17','2021-01-19','2021-01-19','Entregado',1200),
(110,50,'2022-05-16','2022-05-19',null ,'Pendiente',1200),
(111,50,'2022-05-16','2022-05-19',null ,'Pendiente',1200),
(112,12,'2021-04-14','2021-04-16','2021-04-15','Entregado',1200),
(113,33,'2021-06-20','2021-06-23','2021-01-22','Entregado',1200),
(114,14,'2021-06-21','2021-01-23','2021-03-25','Entregado',1200),
(115,8,'2021-02-02','2021-08-04','2021-06-04','Entregado',1200),
(116,3,'2021-02-08','2021-09-11','2021-09-11','Entregado',1200),
(117,2,'2021-11-14','2021-11-16','2021-11-15','Entregado',1200),
(118,5,'2022-01-26','2022-01-28','2022-02-28','Entregado',1200),
(119,12,'2022-05-12','2022-05-14',null ,'En Reparto',1200),
(120,6,'2022-05-13','2022-05-15',null ,'En Reparto',1200),
(121,19,'2022-05-13','2022-05-16',null ,'En Reparto',1200),
(122,44,'2022-05-16','2022-05-18',null ,'Pendiente',1200),
(123,50,'2022-05-16','2022-05-19',null ,'Pendiente',1200),
(124,23,'2022-05-20','2022-05-21',null ,'Pendiente',1200);

CREATE TABLE productos (
ID_Producto varchar(15) NOT NULL PRIMARY KEY,
Nombre varchar(70) NOT NULL,
Proveedor varchar(50) DEFAULT NULL,
Descripción varchar(1000),
CantidadEnStock integer NOT NULL,
PrecioVenta numeric(15,2) DEFAULT NULL,
PrecioProveedor numeric(15,2) DEFAULT NULL
);

INSERT INTO productos VALUES 
	('1','Plato de ducha Legacy 160x70 cm blanco','Leroy Merlin','Plato de ducha Roca rectangular de la serie Legacy, fabricado en España, en resina con acabado antideslizante color blanco texturizado',15,257.96,200),
	('2','Sierra de Poda 300MM','Leroy Merlin','Gracias a la poda se consigue manipular un poco la naturaleza, dándole la forma que más nos guste. Este trabajo básico de jardinería también facilita que las plantas crezcan de un modo más equilibrado, y que las flores y los frutos vuelvan cada año con regularidad. Lo mejor es dar forma cuando los ejemplares son jóvenes, de modo que exijan pocos cuidados cuando sean adultos. Además de saber cuándo y cómo hay que podar, tener unas herramientas adecuadas para esta labor es también de vital importancia.',13,14,11),
    ('3','Pintura interior Bienestar BRUGUER mate 4L beige playa','Leroy Merlin','Pintura acrílica Bruguer Bienestar en color beige playa con acabado mate, perfecta para decorar las paredes de tu hogar y crear así un ambiente a tu gusto',33,29,15),
	('4','Pack 10 guantes de látex Impact Talla M','Leroy Merlin','Pack de 10 guantes extrafinos de látex de un solo uso, que proporcionan protección en pequeños trabajos de limpieza o pintura',1000,1.29,0.15),
	('5','Pack 10 guantes de látex Impact Talla XL','Leroy Merlin','Pack de 10 guantes extrafinos de látex de un solo uso, que proporcionan protección en pequeños trabajos de limpieza o pintura',999,1.50,0.20),
	('6','Crocs Crocband- Zapatillas Unisex Adulto','TextilSL','Zapatillas de montaña exlusivas para Frank Cuesta',255,23,13),
	('7','Aspirador Vertical con cable 2 en 1','MaisonSA','Diseño personalizable 2 en 1; aspiradora con cable y motor ecológico',45,55,41),
	('8','Australian Gold Intensifier Dry Acelerador del Bronceado, 237 Ml','AleHop','De árbol de té australiano, extracto de banana, nuez negra, aloe vera, pantenol y vitamina e.',320,18,5),
	('9','Remington Plancha de Pelo Profesional Keratin Therapy Pro','AleHop','producto 1: Placas de Cerámica Avanzada - Plancha para el pelo con revestimiento de cerámica avanzada con queratina. Placas flotantes y extralargas de 100 mm',78,63,21),
    ('10','Ventana PVC blanca oscilobatiente con persiana de 120X135 cm','MaisonSA','Ventana de PVC en color blanco con persiana, fabricada en España, con 2 hojas y apertura oscilobatiente',150,250,81),
	('11','Kit tapajuntas de PVC blanco de 70 mm para ventana de 100x115 cm','MaisonSA','Diseño personalizable 2 en 1; aspiradora con cable y motor ecológico',45,55,41),
	('12','Tapajuntas de PVC blanco de 70 mm con cámara','MaisonSA','Se fija con adhesivo o mediante clip con tirafondos. Medidas: 3 m de longitud.',400,8,3),
    ('13','Toldo Zefir brazo extensible motorizado con cofre gris tela gris','MaisonSA','Toldo de brazo extensible con semicofre serie Zefir de apertura motorizada con mando a distancia.',45,550,410),
    ('14','Puerta garaje seccional Primo motorizada blanco','MaisonSA','Puerta de garaje seccional motorizada con 3 velocidades de apertura fabricada en acero de color blanco con un acabado rugoso',40,890,481),
    ('15','Ventana PVC ARTENS blanca oscilobatiente con persiana y guía','Artens','Ventana de PVC en color blanco con persiana, fabricada en España, con 2 hojas y apertura oscilobatiente',13,320,120);
    
CREATE TABLE detallePedido(
ID_Pedido integer NOT NULL,
ID_Producto varchar(15) NOT NULL,
Cantidad integer NOT NULL,
PrecioUnidad numeric(15,2) NOT NULL,
PRIMARY KEY (ID_Pedido,ID_Producto),
CONSTRAINT productosPedido_fk FOREIGN KEY (ID_Pedido) REFERENCES pedidos (ID_Pedido),
CONSTRAINT productosPedido_fk2 FOREIGN KEY (ID_Producto) REFERENCES productos (ID_Producto)

);

INSERT INTO detallePedido VALUES 
('101','8','2','18'),
('101','2','2','14'),
('101','7','1','55'),
('102','14','5','890'),
('103','3','2','29'),
('104','7','7','55'),
('105','7','1','55'),
('106','1','2','257.96'),
('107','8','6','18'),
('108','13','3','550'),
('108','9','7','63'),
 ('109','10','9','250'),
('110','10','1','250'),
('110','6','2','23'),
('110','15','2','320'),
('111','15','5','320'),
('112','8','1','18'),
('113','4','4','1.29'),
('113','11','2','55'),
('114','7','3','55');


CREATE TABLE login(
name varchar(20) Primary key,
user varchar(20) NOT NULL,
password varchar(60) NOT NULL,
id integer Not Null,
isAdmin bool not null);

Insert into login values
("admin", "admin", "1234", "1", 1),
("usuario", "usuario", "1234", "2", 0),
("paco", "paco", "1234", "3", 0),
("pepe", "pepe", "1234", "4", 0)
;
