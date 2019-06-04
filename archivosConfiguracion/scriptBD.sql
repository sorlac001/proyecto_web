CREATE USER administrador with encrypted password '12Admin34';
CREATE USER vendedor with encrypted password '34Vendedor12';
CREATE USER cliente with encrypted password '43Cliente21';

CREATE DATABASE proyecto_web OWNER administrador;

\c proyecto_web;

CREATE TABLE tipo_usuarios
(
        id_tipo_usuario         serial          PRIMARY KEY,
        tipo                    CHAR(1)         NOT NULL
);

CREATE TABLE usuarios
(
        id_usuario              serial                  PRIMARY KEY,
        nombre                  VARCHAR(35)             NOT NULL,
        ap_paterno              VARCHAR(35)             NOT NULL,
        ap_materno              VARCHAR(35),
        telefono                VARCHAR(10)             NOT NULL,
        correo                  VARCHAR(30)             NOT NULL,
        usuario                 VARCHAR(15)             UNIQUE,
        contrasena              VARCHAR(30)             NOT NULL,
        id_tipo_usuario         serial                  NOT NULL,

        FOREIGN KEY(id_tipo_usuario) references tipo_usuarios(id_tipo_usuario)
);


CREATE TABLE direccion
(
        id_direccion    serial          PRIMARY KEY,
        calle           VARCHAR(30)     NOT NULL,
        numero          VARCHAR(5)      NOT NULL,
        colonia         VARCHAR(30)     NOT NULL,
        codigo_postal   VARCHAR(5)      NOT NULL,
        delegacion      VARCHAR(25)     NOT NULL,
        estado          VARCHAR(20)     NOT NULL,
        referencia      TEXT		NOT NULL,
        id_usuario      serial          NOT NULL,

        FOREIGN KEY(id_usuario) references usuarios(id_usuario)
);

CREATE TABLE marcas
(
        id_marca         serial          PRIMARY KEY,
        nombre          VARCHAR(30)     NOT NULL
);

CREATE TABLE mochilas
(
        id_mochila      serial                  PRIMARY KEY,
        nombre          VARCHAR(35)             NOT NULL,
        descripcion     TEXT 		        NOT NULL,
        descuento	INT			NOT NULL,
	tamano          CHAR(1)                 NOT NULL,
        precio          INT                     NOT NULL,
        cantidad        INT                     NOT NULL,
        imagen          VARCHAR(100)            NOT NULL,
        id_marca        serial                  NOT NULL,

        FOREIGN KEY(id_marca) references marcas(id_marca)
);

CREATE TABLE formas_pago
(
        id_forma_pago   serial          PRIMARY KEY,
        forma_pago      CHAR(1)         NOT NULL

);

CREATE TABLE tipos_envio
(
        id_tipo_envio   serial          PRIMARY KEY,
        tipo_envio      CHAR(1)         NOT NULL
);

CREATE TABLE ventas
(
        id_venta                serial                  PRIMARY KEY,
        fecha                   DATE                    NOT NULL,
        precio_unitario         INT                     NOT NULL,
        id_usuario              serial                  NOT NULL,
        id_forma_pago           serial                  NOT NULL,
        id_tipo_envio           serial                  NOT NULL,

        FOREIGN KEY(id_usuario) references usuarios(id_usuario),
        FOREIGN KEY(id_forma_pago) references formas_pago(id_forma_pago),
        FOREIGN KEY(id_tipo_envio) references tipos_envio(id_tipo_envio)
);

CREATE TABLE mochilasxventas
(
        id_mochila      serial          NOT NULL,
        id_venta        serial          NOT NULL,
        cantidad        INT             NOT NULL,

        PRIMARY KEY(id_mochila, id_venta),

        FOREIGN KEY(id_mochila) references mochilas(id_mochila),
        FOREIGN KEY(id_venta) references ventas(id_venta)
);

/***********************PERSMISOS ADMINISTRADOR*************************/
GRANT ALL PRIVILEGES ON tipo_usuarios TO administrador;
GRANT ALL PRIVILEGES ON usuarios TO administrador;
GRANT ALL PRIVILEGES ON marcas TO administrador;
GRANT ALL PRIVILEGES ON mochilas TO administrador;
GRANT ALL PRIVILEGES ON formas_pago TO administrador;
GRANT ALL PRIVILEGES ON tipos_envio TO administrador;
GRANT ALL PRIVILEGES ON ventas TO administrador;
GRANT ALL PRIVILEGES ON mochilasxventas TO administrador;
GRANT ALL PRIVILEGES ON direccion TO administrador;

/***********************PERSMISOS VENDEDOR*************************/
GRANT insert ON mochilas TO vendedor;
GRANT select ON mochilas TO vendedor;
GRANT delete ON mochilas TO vendedor;
GRANT update ON mochilas TO vendedor;

GRANT select ON marcas TO vendedor;

/***********************PERSMISOS CLIENTE*************************/
GRANT select ON tipo_usuarios TO cliente;

GRANT insert ON usuarios TO cliente;
GRANT select ON usuarios TO cliente;
GRANT delete ON usuarios TO cliente;
GRANT update ON usuarios TO cliente;

GRANT select ON marcas TO cliente;

GRANT select ON mochilas TO cliente;

GRANT select ON formas_pago TO cliente;

GRANT select ON tipos_envio TO cliente;

GRANT insert ON ventas TO cliente;
GRANT select ON ventas TO cliente;
GRANT delete ON ventas TO cliente;
GRANT update ON ventas TO cliente;

GRANT insert ON mochilasxventas TO cliente;
GRANT select ON mochilasxventas TO cliente;
GRANT delete ON mochilasxventas TO cliente;
GRANT update ON mochilasxventas TO cliente;

/************************************INSERCIONES*******************************/

INSERT INTO tipo_usuarios(tipo) VALUES('A');
INSERT INTO tipo_usuarios(tipo) VALUES('V');
INSERT INTO tipo_usuarios(tipo) VALUES('C');


INSERT INTO marcas(nombre) VALUES('Sin marca');
INSERT INTO marcas(nombre) VALUES('Adidas');
INSERT INTO marcas(nombre) VALUES('Kipling');
INSERT INTO marcas(nombre) VALUES('Samsonite');
INSERT INTO marcas(nombre) VALUES('Reebook');
INSERT INTO marcas(nombre) VALUES('Patito');

INSERT INTO usuarios(nombre, ap_paterno, ap_materno, telefono, correo, usuario, contrasena, id_tipo_usuario) VALUES ('Felipe', 'Aline', 'Caballero', 1111111111, 'asd@asd.com', 'administrador', 'prueba', 1);
INSERT INTO usuarios(nombre, ap_paterno, ap_materno, telefono, correo, usuario, contrasena, id_tipo_usuario) VALUES ('Ramon', 'Hernandez', 'Maturano', 1111111111, 'asd@asd.com', 'vendedor', 'prueba', 2);
INSERT INTO usuarios(nombre, ap_paterno, ap_materno, telefono, correo, usuario, contrasena, id_tipo_usuario) VALUES ('Alexa', 'Romero', 'Villagran', 1111111111, 'asd@asd.com', 'cliente', 'prueba', 3);

INSERT INTO formas_pago(forma_pago) VALUES ('P');
INSERT INTO formas_pago(forma_pago) VALUES ('D');
INSERT INTO formas_pago(forma_pago) VALUES ('T');

INSERT INTO tipos_envio(tipo_envio) VALUES ('X');
INSERT INTO tipos_envio(tipo_envio) VALUES ('S');

INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Air256Pro', 'Mochila de lona color negro con rayas blancas', '.10', 'M', '490.50', '1', 'mochila1.jpg', '1');
INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Re32AirV2', 'Mochila de lona color verde con diagonales blancas', '.15', 'C', '325.00', '2', 'mochila2.jpg', '2');
INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Ki09Pro15', 'Mochila de lona color rosa y con un accesorio', '.20', 'G', '599.98', '3', 'mochila3.jpg', '1');
INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Yellow Amanecer', 'Mochila de lona color rosa', '.30', 'M', '432.23', '3', 'amarilla.jpg', '4');
INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Panda coqueto', 'Mochila de lona color verde con un panda', '.40', 'G', '123.2', '3', 'panda.jpg', '3');
INSERT INTO mochilas(nombre, descripcion, descuento, tamano, precio, cantidad, imagen, id_marca) VALUES ('Rosa Melenio', 'Mochila de tela color rosa', '.50', 'C', '54.5', '3', 'rosita.jpg', '5');