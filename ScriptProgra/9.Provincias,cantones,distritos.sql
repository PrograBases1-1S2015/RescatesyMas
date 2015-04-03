--Agregar pais--
Insert into pais(pais_id,pais)
values (incremento_pais.nextval,'Costa Rica');



--Agregar provincias
Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'San José',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Alajuela',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Cartago',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Heredia',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Limón',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Guanacaste',1);

Insert into provincia(provincia_id,provincia,pais_id)
values (incremento_provincia.nextval,'Puntarenas',1);

--Agregar cantones
--San José
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Escazú',1);
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Desamparados',1);
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Alajuelita',1);
--Alajuela
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Grecia',2);
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Guatuso',2);
Insert into canton(canton_id,canton,provincia_id)
values (incremento_canton.nextval,'Orotina',2);

--Agregar Distritos--
--San José--
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Antonio',1);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Miguel',1);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Rafael',1);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Juan de Dios',2);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Los Guido',2);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Patarrá',2);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Josecito',3);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Concepción',3);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Felipe',3);
--Alajuela--
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Grecia',4);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Isidro',4);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Río Cuarto',4);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'San Rafael',5);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Buena Vista',5);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Cote',5);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Orotina',6);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Hacienda Vieja',6);
Insert into distrito(distrito_id,distrito,canton_id)
values (incremento_distrito.nextval,'Coyolar',6);
