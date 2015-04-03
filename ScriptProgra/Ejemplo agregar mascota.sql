----------Para ejecutar los procedimientos hacer lo siguiente-------
------ Se realiza asi para todos los procedimientos---------
--1.------------------------------ Agregar mascota------------------------------
begin
	Agregar_Mascota()

	
        commit;

end; 

--2.---Agregar enfermedad-----
begin
	Agregar_Enfermedad(1,'Demodicosis');

	
        commit;

end; 
---Ahora como ya tenemos agregado la enfermedad podemos agregar tratamiento
begin
	Agregar_Tratamiento(1,'Demodicosis');

	
        commit;

end; 

--Luego como ya se agrego el tratamiento ahora podemos agregar medicamento
begin
	Agregar_Medicamento(1,'Demodicosis');

	
        commit;

end; 

--3--------Agregar tipo_mascota-----
begin
	Agregar_Tipo_Mascota(1,'Demodicosis');

	
        commit;

end; 
--Ahora como ya tenemos el tipo de mascota ya podemos agregar la raza.
begin
	Agregar_Raza(1,'Demodicosis');

	
        commit;

end; 






-------------------Para ejecutar las funciones----------------------
DECLARE
  Valor NUMBER;
BEGIN
  Valor := fn_Obtener_Precio('000100');
  dbms_output.put_line(today); ------Para ver si retorna el id correspondiente-----

END; 

