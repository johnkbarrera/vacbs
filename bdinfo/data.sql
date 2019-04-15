INSERT INTO usuarios(usuario_nick, usuario_pass, usuario_perfil, usuario_estado)
	VALUES ('admin1', 'pas', 'ADMINISTRADOR', TRUE);
INSERT INTO usuarios(usuario_nick, usuario_pass, usuario_perfil, usuario_estado)
	VALUES ('admin2', 'pas', 'ADMINISTRADOR', TRUE);
INSERT INTO usuarios(usuario_nick, usuario_pass, usuario_perfil, usuario_estado)
	VALUES ('productor1', 'pas', 'PRODUCTOR', TRUE);
INSERT INTO usuarios(usuario_nick, usuario_pass, usuario_perfil, usuario_estado)
	VALUES ('productor2', 'pas', 'PRODUCTOR', TRUE);


INSERT INTO ganaderos(nombre, apellido, email, usuario, contrasena)
	VALUES ('admin', 'admin', 'admin@gmail.com', 'admin', 'admin');

INSERT INTO ganados(nombre, registro, raza, dob, pesodob, v_padre, v_madre, ganadero_id)
	VALUES ('Molinera Vigor Torch', '27444', '01', '17-05-2017', 80, 'Vigor', 'Molinera Dinasty Design Cuti', 1);
	
INSERT INTO ordenios(vaca_id, fecha, litros_leche, solidos, c_somaticas, prof_ubre, bcs, prof_corp, url_imagen)
	VALUES (1, '17-01-2018', 23, 45, 56, 43, 56, 34, '');

INSERT INTO estados_vacas(
	ordenio_id, vaca_id, estado, fecha, peso)
	VALUES (1, 1, '01', '17-01-2018', 80);
	
INSERT INTO geolocalizaciones(
	ordenio_id, vaca_id, latitud, longitud)
	VALUES (1, 1, 32.877879, 34.78687687);