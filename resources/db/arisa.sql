create database arisa;
use arisa;

create table rol(
idRol int primary key auto_increment,
nombre varchar(50),
borradoLogico int
);

create table usuario(
idUser int primary key auto_increment,
nombre varchar(50),
correo varchar(50),
pass varchar(50),
image varchar(250),
idRol int,
borradoLogico int,
foreign key(idRol) references rol(idRol)
);


create table proveedor(
idProveedor int primary key auto_increment,
nombre varchar(50),
empresa varchar(50),
telefono varchar(50),
nit  varchar(50),
registroFiscal varchar(50),
celular varchar(50),
correo varchar(50),
direccion varchar(50),
borradoLogico int 
);



create table compras(
idCompras int primary key auto_increment,
fecha date,
subtotal double,
idProveedor int,
borradoLogico int,
foreign key(idProveedor) references proveedor(idProveedor)
);

create table inventario(
idInventario int primary key auto_increment,
nombreInv varchar(50),
precio double,
stock int,
descripcion varchar(50),
idCompra int,
borradoLogico int,
foreign key(idCompra) references compras(idCompras)
);

create table detalleInvCompra(
idDetalleInvCompra int primary key auto_increment,
idCompra int,
idInventario int,
cantidad int,
cantAnterior int,
foreign key(idCompra) references compras(idCompras),
foreign key(idInventario) references inventario(idInventario)
);



create table estado2(
idEstado2 int primary key auto_increment,
nombre varchar(50),
borradoLogico int
);


create table estado1(
idEstado1 int primary key auto_increment,
nombre varchar(50),
borradoLogico int
);
 
create table tipoImpresion(
idTipoImpresion int primary key auto_increment,
nombre varchar(50),
costo double,
borradoLogico int
);

create table cliente(
idCliente int primary key auto_increment,
nombre varchar(50),
apellido varchar(50),
empresa varchar(50),
telefono varchar(50),
celular varchar(50),
correo varchar(50),
nit varchar(50),
direccion varchar(50),
registroFiscal varchar(50),
borradoLogico int
);

create table cotizacion(
idCotizacion int primary key auto_increment,
codigo varchar(50),
idCliente int null,
idEstado1 int,
fecha date,
descripcion text,
borradoLogico int,
foreign key(idCliente) references cliente(idCliente),
foreign key(idEstado1) references estado1(idEstado1)
);


create table descripcion(
idDescripcion int primary key auto_increment,
subtotal float,
iva float,
vTotal float
);

create table detalleCotizacion(
idDetalle int primary key auto_increment,
idCotizacion int,
idDescripcion int,
descripcion text,
cantidad int,
precio float,
total float,
borradoLogico int,
foreign key(idCotizacion) references cotizacion(idCotizacion),
foreign key(idDescripcion) references descripcion(idDescripcion)
);

create table muestra(
idMuestra int primary key auto_increment,
url varchar(50),
comentarios varchar(100),
fecha date,
borradoLogico int,
idCotizacion int,
idEstado1 int,
idEstado2 int,
foreign key(idEstado1) references estado1(idEstado1),
foreign key(idEstado2) references estado2(idEstado2),
foreign key(idCotizacion) references cotizacion(idCotizacion)
);

create table orden(
idOrden int primary key auto_increment,
nombre varchar(50),
comentarios varchar(50),
idMuestra int,
idEstado2 int,
borradoLogico int,
foreign key(idMuestra) references muestra(idMuestra),
foreign key(idEstado2) references estado2(idEstado2)
);

create table detalleMaterial(
idDetalleMaterial int primary key auto_increment,
idOrden int,
idInventario int,
cantidad int,
foreign key(idInventario) references inventario(idInventario),
foreign key(idOrden) references orden(idOrden)
);

create table desperdicio(
idDesperdicio int primary key auto_increment,
idOrden int,
idInventario int,
cantidad int,
comentario varchar(50) not null,
foreign key(idInventario) references inventario(idInventario),
foreign key(idOrden) references orden(idOrden)
);


create table tipofactura(
idFactura int primary key auto_increment,
nombre varchar(50),
borradoLogico int
);

/* Esta tabla hace Referencia a Facturazion*/
create table venta(
idVenta int primary key auto_increment,
fecha date,
idCliente int,
idFactura int,
idOrden int,
subTotal double,
borradoLogico int,
foreign key(idCliente) references cliente(idCliente),
foreign key(idFactura) references tipofactura(idFactura),
foreign key(idOrden) references orden(idOrden)
);

create table historial
(idH int not null primary key auto_increment,
descripcion varchar(200) not null,
fecha varchar(50) not null,
hora varchar(50) not null);





/* INSERCIONES */

insert into rol values
(1,"Administrador",1),
(2,"Vendedor",1),
(3,"Diseñador",1);

insert into usuario values
(1,"Admin","admin@mail.com",sha1("12345"),"admin.jpg",1,1);

insert into proveedor values
(1,"Juan Carlos","Telecom S.A de C.V","2328-9887","0315-141280-120-2","MELM8305281H0","7364-2157","juan@mail.com","San Julian",1),
(2,"Rocio Alejandra","Freund S.A de C.V","2200-9367","0585-100694-100-1","LSJM8305281M2","7995-2097","rocio@mail.com","San Salvador",1);


insert into compras values
(1,"2019-11-11",273.5,1,1),
(2,"2019-11-14",159.8,1,1),
(3,"2019-11-15",886.9,2,1);

insert into inventario values
(1,"Producto X",29.99,10,"Descripcion del Producto X",1,1),
(2,"Producto Y",17.99,10,"Descripcion del Producto Y",2,1),
(3,"Producto Z",92.99,10,"Descripcion del Producto Z",3,1);

insert into estado2 values
(1,"En Espera",1),
(2,"En Proceso",1),
(3,"Terminada",1),
(4,"Entregada",1);

insert into estado1 values
(1,"Aprobado",1),
(2,"No Aprobado",1);

insert into tipoImpresion values
(1,"Laser",5,1),
(2,"digital",1,1),
(3,"offset",5,1);

alter table orden add column idCotizacion int not null;
alter table orden add column fecha date not null;

alter table orden add CONSTRAINT fk_Cot FOREIGN KEY (idCotizacion) REFERENCES cotizacion (idCotizacion) on DELETE no ACTION on UPDATE CASCADE;


insert into cliente values
(1,"Jose","Perez","Jugueton S.A de C.V","2698-9874","7698-9841","joseJugeton@mail.com","0978-140991-687-9","Santa Tecla","MSH89SGDH4",1),
(2,"Pedro","Cazada","Bimbo S.A de C.V","2025-9405","7699-0087","pedroBimbo@mail.com","0112-041293-022-7","Santa Tecla","JUI881SDJ1",1),
(3,"Carmen","Guillen","Impresa Repuestos S.A de C.V","2255-9800","7056-4021","carmenImpRespuestos@mail.com","0132-010179-112-9","San Salvador","LPS984SJ4",1);