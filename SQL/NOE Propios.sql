USE noe;

-- PROPUESTAS

CREATE TABLE IF NOT EXISTS `marca` (
  `cod_marca` INT(11) DEFAULT NULL,
  `nom_marca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_marca`)
);

-- Volcando datos para la tabla noe.marca: ~6 rows (aproximadamente)
INSERT INTO marca (cod_marca, nom_marca) VALUES
	(1, 'LENOVO'),
	(2, 'HP'),
	(3, 'SONY'),
	(4, 'DELL'),
	(5, 'ASUS'),
	(6, 'MSI'),
	(7, 'IBM');

-- Volcando estructura para tabla noe.modelo
CREATE TABLE IF NOT EXISTS modelo (
  cod_modelo int(11) NOT NULL AUTO_INCREMENT,
  cod_marca INT(11) NOT NULL,
  nom_modelo varchar(50) DEFAULT NULL,
  PRIMARY KEY (cod_modelo)
);

INSERT INTO modelo (cod_modelo, cod_marca, nom_modelo) VALUES
	(1, 1, 'Lenovo 1'),
	(2, 1, 'Lenovo 2'),
	(3, 2, 'HP 1'),
	(4, 2, 'HP 2'),
	(5, 3, 'Sony 1'),
	(6, 4, 'Dell 1'),
	(7, 5, 'Asus 1'),
	(8, 6, 'MSI 1'),
	(9, 7, 'IBM 1');
	
CREATE TABLE IF NOT EXISTS procesador (
	cod_procesador INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom_procesador VARCHAR(50) DEFAULT NULL
);

INSERT INTO procesador (cod_procesador, nom_procesador) VALUES
	(1, 'Intel Celeron'),
	(2, 'Intel Core i3'),
	(3, 'Intel Core i5'),
	(4, 'Intel Core i7'),
	(5, 'Intel Core i9'),
	(6, 'AMD A10'),
	(7, 'AMD Ryzen 7');
	
CREATE TABLE IF NOT EXISTS disco (
	cod_disco INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom_disco VARCHAR(50) DEFAULT NULL
);

INSERT INTO disco (cod_disco, nom_disco) VALUES
	(1, '250 GB'),
	(2, '500 GB'),
	(3, '750 GB'),
	(4, '1 TB'),
	(5, '1.25 TB'),
	(6, '2 TB');
	
CREATE TABLE IF NOT EXISTS ram (
	cod_ram INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom_ram VARCHAR(50) DEFAULT NULL
);

INSERT INTO ram (cod_ram, nom_ram) VALUES
	(1, '4 GB'),
	(2, '8 GB'),
	(3, '12 GB'),
	(4, '16 GB'),
	(5, '32 GB'),
	(6, '40 GB'),
	(7, '64 GB');



CREATE TABLE rol(
	idrol INT(11) AUTO_INCREMENT,
	nombrerol VARCHAR(50) NOT NULL,
	descripcion TEXT NOT NULL,
	estado INT(1) DEFAULT(1),
	PRIMARY KEY(idrol)
);

INSERT INTO rol(idrol,nombrerol,descripcion) VALUES
(1, 'Administrador', 'Acceso a todo el sistema');

CREATE TABLE usuario(
	id INT(11) AUTO_INCREMENT,
	id_user INT(11) NOT NULL,
	rolid INT(11) NOT NULL,
	username VARCHAR(50) NOT NULL,
	pass VARCHAR(100) NOT NULL,
	datecreated DATETIME DEFAULT CURRENT_TIMESTAMP(),
	dateupdated DATETIME DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
	estado INT(1) DEFAULT(1),
	PRIMARY KEY(id)
);

CREATE TABLE modulo(
	idmodulo BIGINT(20) AUTO_INCREMENT,
	titulo VARCHAR(50) NOT NULL,
	descripcion TEXT NOT NULL,
	estado INT(1) DEFAULT(1),
	PRIMARY KEY(idmodulo)
);

INSERT INTO modulo(titulo,descripcion,estado) VALUES 
('Home', 'Pagina principal', 1),
('Equipos', 'Inventario de equipos', 1),
('Funcionarios', 'Funcionarios', 1),
('Administracion', 'Manejo de roles y usuarios', 1);

CREATE TABLE permisos(
	idpermiso BIGINT(20) AUTO_INCREMENT,
	rolid BIGINT(20) NOT NULL,
	moduloid BIGINT(20) NOT NULL,
	r INT(1) DEFAULT(0),
	w INT(1) DEFAULT(0),
	u INT(1) DEFAULT(0),
	d INT(1) DEFAULT(0),
	PRIMARY KEY(idpermiso)
);

SELECT * FROM equipo;

SELECT * FROM usuario

SELECT * FROM funcionario

SELECT * FROM comentarios

SELECT * FROM usuario

SELECT id_user FROM usuario WHERE username = 'auxiliar.prueba' OR id_user = 2

INSERT INTO usuario(id_user,rolid,username,pass) VALUES
(1001995175, 1, 'esteban.padilla', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

SELECT u.id_user,u.username,CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'nombres',r.nombrerol,u.estado FROM usuario u
        INNER JOIN funcionario f ON f.num_doc = id_user
        INNER JOIN rol r ON u.rolid = r.idrol
        WHERE u.estado != 0

SELECT s.nom_seccional,e.tipo,m2.nom_modelo,e.serial,e.nombre_pc,CONCAT(f1.nombre1,' ',f1.nombre2,' ',f1.apellido1,' ',f1.apellido2) AS 'funcionario',
CONCAT(f2.nombre1,' ',f2.nombre2,' ',f2.apellido1,' ',f2.apellido2) AS 'responsable',e.estado FROM equipo e
INNER JOIN seccional s ON s.cod_seccional = e.seccional
INNER JOIN marca m1 ON m1.cod_marca = e.marca
INNER JOIN modelo m2 ON m2.cod_modelo = e.modelo
INNER JOIN funcionario f1 ON f1.num_doc = e.funcionario
INNER JOIN funcionario f2 ON f2.num_doc = e.asignado_por

SELECT e.tipo,m.cod_marca,m.cod_modelo,p.cod_procesador,d.cod_disco,r.cod_ram,e.procedencia,e.serial,e.cpu_tic,e.pantalla,e.pantalla_tic,
e.teclado,e.teclado_tic,e.mouse,e.mouse_tic,e.cargador,e.cargador_tic,e.nombre_pc,e.so,e.estado,s.cod_seccional,mu.cod_municipio,
f.num_doc,e.area,e.cargo,e.fecha_ingreso,e.ultima_actualizacion FROM equipo e
INNER JOIN modelo m ON m.cod_modelo = e.modelo
INNER JOIN procesador p ON p.nom_procesador = e.procesador
INNER JOIN disco d ON d.nom_disco = e.disco
INNER JOIN ram r ON r.nom_ram = e.ram
INNER JOIN seccional s ON s.cod_seccional = e.seccional
INNER JOIN municipio mu ON mu.cod_municipio = e.municipio
INNER JOIN funcionario f ON f.num_doc = e.funcionario

UPDATE equipo SET tipo=?,marca=?,modelo=?,cpu_tic=?,procesador=?,disco=?,ram=?,pantalla=?,pantalla_tic=?,teclado=?,
teclado_tic=?,mouse=?,mouse_tic=?,cargador=?,cargador_tic=?,bateria=?,procedencia=?,seccional=?,municipio=?,funcionario=?,
cargo=?,area=?,estado=?,nombre_pc=?,so=?,asignado_por=? WHERE SERIAL=?
