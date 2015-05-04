--Insertar formularios--
insert into tipo_formulario(tipo_formulario_id,tipo_formulario)
values(incremento_tipo_formulario.nextval,'Formulario para el adoptante');

insert into tipo_formulario(tipo_formulario_id,tipo_formulario)
values(incremento_tipo_formulario.nextval,'Test de recomendación de adopciones');

--Insertar preguntas--
Alter table pregunta modify pregunta varchar2(200);--Cambiar tamaño
Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'Tipo de vivienda');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Tiene otras mascotas?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'Si tiene mascotas, ¿cuántas tiene actualmente?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Tiene patio en su casa?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'Indique el tiempo que le  va a dedicar a ejercitar a la mascota');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Tiene hijos?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'En caso afirmativo, ¿cuántos hijos tiene?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Hay alguna persona con alergias en su familia?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Dónde dormirá el animal?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Qué tipo de comida se le va a dar a la mascota?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Qué mira usted a la hora de elegir a una mascota?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Con qué finalidad busca adoptar una mascota? ');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿Qué lugar de la vivienda estaría destinada a la mascota?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'¿La mascota a adoptar para que tipo de persona sería?');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'Si la mascota se enferma usted que haría');

Insert into pregunta(pregunta_id,pregunta)
values(incremento_pregunta.nextval,'Está de acuerdo con que su mascota se encuentre esterilizada');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'¿Tiene espacio para la mascota?');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'¿Tiene tiempo para atender a la mascota?');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'Prefiere mascotas grandes, pequeñas o medianas ');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'Prefiere mascotas juguetonas o tranquilas');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'Prefiere mascotas con mucho pelaje o poco pelaje');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'¿De qué color le gustaría que fuera su mascota?');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'¿Quiere una mascota joven o adulta?');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'De que sexo busca a su mascota ');

Insert into pregunta(pregunta_id,pregunta)
values (incremento_pregunta.nextval,'Qué tipo de mascota está buscando:');
--Agregar respuestas a las preguntas--
Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Casa propia',1);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Casa alquilada',1);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',2);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',2);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'1',3);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'2',3);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'3',3);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'4 o más',3);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',4);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',4);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'1 vez a la semana',5);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'1 vez al mes',5);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'2 o más veces a la semana',5);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'2 o más veces al mes',5);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',6);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',6);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'1',7);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'2',7);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'3',7);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'4 o más',7);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',8);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',8);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'En su camita en el interior',9);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'En la cama del dueño',9);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'En el corredor',9);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'En una casa en el exterior',9);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'En una jaula',9);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Casera',10);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Croquetas',10);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Su físico',11);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Su carácter',11);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Su edad',11);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Para compañía',12);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Para cría',12);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Para caza',12);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Como guardián ',12);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Como terapia',12);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'El patio',13);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'El corredor',13);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'La sala.',13);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Un cuarto',13);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Un adulto',14);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Un niño',14);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Una persona mayor',14);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Persona con discapacidad',14);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Lo lleva al veterinario',15);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Deja que se cure solo',15);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Lo cura usted mismo',15);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',16);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',16);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',17);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',17);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Si',18);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'No',18);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Grandes',19);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Pequeñas',19);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Medianas',19);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Juguetonas',20);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Tranquilas',20);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Mucho pelaje',21);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Poco pelaje',21);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Café',22);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Negro',22);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Blanco',22);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Mostaza',22);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Joven',23);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Adulta',23);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Hembra',24);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Macho',24);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'De raza',25);

Insert into respuesta(respuesta_id,respuesta,pregunta_id)
values(incremento_respuesta.nextval,'Mestizo',25);

--Asignar preguntar a formularios

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,1);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,2);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,3);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,4);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,5);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,6);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,7);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,8);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,9);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,10);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,11);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,12);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,13);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,14);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,15);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (1,16);


Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,17);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,18);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,19);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,20);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,21);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,22);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,23);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,24);

Insert into formulario_x_pregunta(tipo_formulario_id,pregunta_id)
values (2,25);







