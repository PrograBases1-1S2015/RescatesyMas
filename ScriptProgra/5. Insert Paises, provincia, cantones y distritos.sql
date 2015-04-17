
-----INSERTS EN PAIS---------------
INSERT INTO PAIS(PAIS_ID,PAIS)VALUES(incremento_pais.nextval,'Costa Rica');
INSERT INTO PAIS(PAIS_ID,PAIS)VALUES(incremento_pais.nextval,'Panama');
INSERT INTO PAIS(PAIS_ID,PAIS)VALUES(incremento_pais.nextval,'Nicaragua');
INSERT INTO PAIS(PAIS_ID,PAIS)VALUES(incremento_pais.nextval,'Colombia');
INSERT INTO PAIS(PAIS_ID,PAIS)VALUES(incremento_pais.nextval,'venezuela');
------------EL SELECT ES PARA QUE VEAN CON CUAL ID QUEDO COSTA RICA
------------EN MI CASO FUE EL ID 2.
SELECT * FROM PAIS;
-------------INSERTS EN PROVINCIA------------
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'San Jose',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Puntarenas',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Alajuela',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Limon',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Guanacaste',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Cartago',1);
INSERT INTO PROVINCIA (PROVINCIA_ID,PROVINCIA,PAIS_ID)VALUES(incremento_provincia.nextval,'Heredia',1);
-------------SELECT PARA VER LOS ID
SELECT * FROM PROVINCIA;
------------INSERTS EN CANTONES
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Escazu',1);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Desamparados',1);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Alajuelita',1);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Esparza',2);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Golfito',2);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Garabito',2);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Grecia',3);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Guatuso',3);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Orotina',3);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Matina',4);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Pococi',4);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Siquirres',4);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Liberia',5);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Hojancha',5);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Abangares',5);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'El Guarco',6);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Turrialba',6);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Oreamuno',6);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Barva',7);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'Santo Domingo',7);
INSERT INTO CANTON (CANTON_ID,CANTON,PROVINCIA_ID) VALUES(incremento_canton.nextval,'San Rafael',7);
-------------SELECT PARA VER LOS ID
SELECT * FROM CANTON;
-------------INSERTS EN DISTRITO
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Antonio',1);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Rafael',1);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San  Miguel',1);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Juan De Dios',2);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Los Guido',2);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Patarra',2);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Jocesito',3);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Concepcion',3);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San felipe',3);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Espiritu Santo',4);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Jeronimo',4);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Macacona',4);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Golfito',5);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Puerto Jimenez',5);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Pavon',5);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Jaco',6);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Tarcoles',6);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Grecia',7);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Isidro',7);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Rio Cuarto',7);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Rafael',8);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Buena Vista',8);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Cote',8);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Orotina',9);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Hacienda Vieja',9);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Coyolar',9);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Matina',10);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Batan',10);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Carrandi',10);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Guapiles',11);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Jimenez',11);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Roxana',11);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Siquirres',12);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Pacuario',12);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Florida',12);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Cañas Dulces',13);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Nacascolo',13);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Mayorga',13);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Monte Romo',14);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Puerto Carrillo',14);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Huacas',14);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Las Juntas',15);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Sierra',15);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Juan',15);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'El Tejar',16);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Isidro',16);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Tobosi',16);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Turrialba',17);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'La suiza',17);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Peralta',17);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Rafael',18);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Cipreses',18);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Santa Rosa',18);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Barva',19);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Pedro',19);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Pablo',19);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Santo Domingo',20);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Vicente',20);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Miguel',20);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Rafael',21);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'San Jocesito',21);
INSERT INTO DISTRITO (DISTRITO_ID,DISTRITO,CANTON_ID) VALUES (incremento_distrito.nextval,'Santiago',21);
-------------SELECT PARA VER LOS ID
SELECT * FROM DISTRITO;





  
