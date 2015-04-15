--En caso de que tire error a la hora de ejectuar los procedimientos usar lo siguiente--
ALTER USER proyecto QUOTA 100M ON proy_ind 
GRANT UNLIMITED TABLESPACE TO proyecto

--1.Agregar el usuario parte por parte invocando las funciones desde php--
  Agregar_Usuario('nombre','contrasena','token');
--2.Como se supone que el distrito ya existe se ejecuta el procedimiento
--de la dirección directa.
  Agregar_Direccion_Exacta('Este','San Antonio');

--3.Ahora sí, para agregar la persona en si se debe declarar dos variables en
--php. Una para guardar el id del usuario y otra para guardar el id del distrito.
--Las funciones se llaman usando Select Nombre_Funcion(parametros) from dual
begin
	Agregar_Persona('Amanda','Solano','33333333',Variable con la direccion,2222222,22222,variable con usuario,'corre@correo.com');


--2.Agregar la persona directamente--
--Hay un procedimiento que hace todo el proceso, solamente es cuestión de pasarle todos los parametros--
begin
  Registro('Amanda','1234','token','3 metros al este','San Antonio','Amanda','Solano',
  '11111111',24333333,22222222,'prueba@prueba.com',0 );
end;	
