CREATE TABLE usuarios(
	usuario_id 		INT auto_increment,
    usuario_nick 	VARCHAR(50),
    usuario_pass 	VARCHAR(200),
    usuario_perfil VARCHAR(20),
    usuario_estado 	BOOLEAN,    
    CONSTRAINT usuario_id PRIMARY KEY(usuario_id)
);

CREATE TABLE ganaderos (
    ganadero_id     INT auto_increment,
	nombre      	VARCHAR(50),
	apellido    	VARCHAR(50),
	email       	VARCHAR(100),
    usuario     	VARCHAR(50),
	contrasena  	VARCHAR(15),
    CONSTRAINT ganadero_id PRIMARY KEY (ganadero_id)
);
CREATE TABLE ganados (
    vaca_id  	INT auto_increment,
	nombre   	VARCHAR(50),
	registro 	VARCHAR(20),
	raza     	CHAR(2),
	DOB      	DATE,
	pesoDOB  	NUMERIC(5,2),
	v_padre  	VARCHAR(100),
	v_madre  	VARCHAR(100),
	ganadero_id INT,
    CONSTRAINT vaca_id PRIMARY KEY (vaca_id),
	FOREIGN KEY (ganadero_id) REFERENCES ganaderos(ganadero_id)
);
CREATE TABLE ordenios (
    ordenio_id     INT auto_increment,
	vaca_id        INT,
	fecha          TIMESTAMP,
	litros_leche   NUMERIC(5,2),
	solidos        NUMERIC(5,2),
	c_somaticas    NUMERIC(5,2),
	prof_ubre      NUMERIC(5,2),
	BCS            NUMERIC(5,2),
	prof_corp      NUMERIC(5,2),
	URL_imagen     VARCHAR(500),
    CONSTRAINT ordenio_id_vaca_id PRIMARY KEY(ordenio_id, vaca_id),
	FOREIGN KEY (vaca_id) REFERENCES ganados (vaca_id)
);
CREATE TABLE estados_vacas (
	estado_id	INT auto_increment,
    ordenio_id  INT,
	vaca_id     INT,
	estado      CHAR(2),
	fecha       DATE,
	peso        NUMERIC(5,2),
    CONSTRAINT estado_id PRIMARY KEY(estado_id),
	FOREIGN KEY (ordenio_id, vaca_id) REFERENCES ordenios(ordenio_id, vaca_id)
);
CREATE TABLE geolocalizaciones (
    geo_id       INT auto_increment,
	ordenio_id   INT,
	vaca_id      INT,
	latitud      NUMERIC(10,8),
	longitud     NUMERIC(10,8),
    CONSTRAINT geo_id PRIMARY KEY(geo_id),
	FOREIGN KEY (ordenio_id, vaca_id) REFERENCES ordenios(ordenio_id, vaca_id)
);
CREATE TABLE catalogos(
	catalogo_id  INT auto_increment,
	cod_tabla    VARCHAR(3),
	indice		 CHAR(1),
	codigo       VARCHAR(4),
	descripcion  VARCHAR(80),
	CONSTRAINT catalogo_id PRIMARY KEY(catalogo_id)
);