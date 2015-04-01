--En caso de que tire error a la hora de ejectuar los procedimientos usar lo siguiente--
ALTER USER proyecto QUOTA 100M ON proy_ind 
GRANT UNLIMITED TABLESPACE TO proyecto

--1.Agregar el usuario--
begin
  Agregar_Usuario('nombre','contrasena','token');
end;
--2.Como se supone que el distrito ya existe se ejecuta el procedimiento
--de la dirección directa.
begin
  Agregar_Direccion_Exacta('Direccion','Nombre del distrito');
end;
--3.Ahora sí, para agregar la persona en si se debe declarar dos variables en
--php. Una para guardar el id del usuario y otra para guardar el id del distrito.
--Las funciones se llaman usando Select Nombre_Funcion(parametros) from dual
begin
	Agregar_Persona('Nombre','Apellido','Cedula',Variable con la direccion,telefo1,telefo2,variable con usuario,'email');