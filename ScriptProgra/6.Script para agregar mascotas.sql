
---1.---------------------- Procedimiento para agregar severidad--------------------------------

create or replace procedure Agregar_Severidad(Tipo_Severidad varchar2) is
begin
  insert into severidad(severidad_id,severidad)
  values(incremento_severidad.nextval,Tipo_Severidad);
end Agregar_Severidad;

-----------Funcion para obtener el ID de la severidad----------------------------------------

create or replace function Severidad_ID(Tipo_Severidad varchar2)
 return number is
  ID number;
begin
  Select severidad_id into  ID 
  from severidad
  where (severidad = Tipo_Severidad);   
  
  return(ID);
end Severidad_ID;

---2.---------------------- Procedimiento para agregar estado de la mascota--------------------------------

create or replace procedure Agregar_Estado_Mascota(Estado varchar2) is
begin
  insert into estado_mascota(estado_mascota_id,estado_mascota)
  values(incremento_estado_mascota.nextval,Estado);
  
end Agregar_Estado_Mascota;

-----------Funcion para obtener el ID del estado de la mascota---------------------------------------

create or replace function Estado_Mascota_ID(Estado varchar2) 
return number is
  ID number;
begin
   Select estado_mascota_id into  ID 
   from estado_mascota
   where (estado_mascota = Estado);  
  
  return(ID);
end Estado_Mascota_ID;

---3.---------------------- Procedimiento para agregar enfermedad--------------------------------

create or replace procedure Agregar_Enfermedad(Nombre_Enfermedad varchar2) is
begin
   insert into enfermedad(enfermedad_id,enfermedad)
   values(incremento_enfermedad.nextval,Nombre_Enfermedad);
  
end Agregar_Enfermedad;

-----------Funcion para obtener el ID de la enfermedad------------------------------------------

create or replace function Enfermedad_ID(Nombre_Enfermedad varchar2)
 return number is
  ID number;
begin
   Select enfermedad_id into  ID 
   from enfermedad
   where (enfermedad = Nombre_Enfermedad);   
  
  return(ID);
end Enfermedad_ID;

---4.---------------------- Procedimiento para agregar tratamiento-----------------------------

create or replace procedure Agregar_Tratamiento(Nombre_Tratamiento varchar2, Enfermedad number) is
begin
  insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
  values(incremento_tratamiento.nextval,Nombre_Tratamiento,Enfermedad)
end Agregar_Tratamiento;

-----------Funcion para obtener el ID del tratamiento------------------------------------------

create or replace function Tratamiento_ID(Nombre_Tratamiento varchar2) 
return number is
  ID number;
begin
   Select tratamiento_id into  ID 
   from tratamiento
   where (tratamiento = Nombre_Tratamiento);   
  
  return(ID);
end Tratamiento_ID;

---5.---------------------- Procedimiento para agregar medicamentos-----------------------------

create or replace procedure Agregar_Medicamentos(Nombre_Medicamentos varchar2, Tratamiento number) is
begin
  insert into medicamento(medicamento_id,medicamento,tratamiento_id)
  values(incremento_medicamento.nextval,Nombre_Medicamentos,Tratamiento)
end Agregar_Medicamentos;

-----------Funcion para obtener el ID de medicamentos------------------------------------------

create or replace function Medicamentos_ID(Nombre_Medicamentos varchar2) 
return number is
  ID number;
begin
   Select medicamento_id into  ID 
   from medicamento
   where (medicamento = Nombre_Medicamentos);   
  
  return(ID);
end Medicamentos_ID;


---6.---------------------- Procedimiento para agregar tipo de mascota------------------------------

create or replace procedure Agregar_Tipo_Mascota(Tipo_de_Mascota varchar2) is
begin
  insert into tipo_mascota(tipo_mascota_id,tipo_mascota)
  values(incremento_tipo_mascota_id.nextval,Tipo_de_Mascota);
end Agregar_Tipo_Mascota;

-----------Funcion para obtener el ID del tipo de mascota------------------------------------------

create or replace function Tipo_Mascota_ID(Nombre_Tipo_Mascota varchar2) 
return number is
  ID number;
begin
  Select tipo_mascota_id into  ID 
  from tipo_mascota
  where (tipo_mascota = Nombre_Tipo_Mascota);  
  
  return(ID);
end Tipo_Mascota_ID;

---7.---------------------- Procedimiento para agregar raza-----------------------------

create or replace procedure Agregar_Raza(Nombre_Raza varchar2, Tipo_Mascota number) is
begin
  insert into raza(raza_id,raza,tipo_mascota_id)
  values(incremento_raza.nextval,Nombre_Raza,Tipo_Mascota)
end Agregar_Raza;

-----------Funcion para obtener el ID de la raza------------------------------------------

create or replace function Raza_ID(Nombre_Raza varchar2) 
return number is
  ID number;
begin
   Select raza_id into  ID 
   from raza
   where (raza = Nombre_Raza);   
  
  return(ID);
end Raza_ID;

---8.---------------------- Procedimiento para agregar nivel de energia--------------------------------

create or replace procedure Agregar_Nivel_Energia(Nivel varchar2) is
begin
  insert into nivel_energia(nivel_energia_id,nivel_energia)
  values(incremento_nivel_energia.nextval,Nivel);
  
end Agregar_Nivel_Energia;

-----------Funcion para obtener el ID del nivel de energia---------------------------------------

create or replace function Nivel_Energia_ID(Nivel varchar2) 
return number is
  ID number;
begin
   Select nivel_energia_id into  ID 
   from nivel_energia
   where (nivel_energia = Nivel);  
  
  return(ID);
end Nivel_Energia_ID;

---9.---------------------- Procedimiento para agregar color--------------------------------

create or replace procedure Agregar_Color(Nombre_Color varchar2) is
begin
  insert into color(color_id,color)
  values(incremento_color.nextval,Nombre_Color);
  
end Agregar_Color;

-----------Funcion para obtener el ID del color---------------------------------------

create or replace function Color_ID(Nombre_Color varchar2) 
return number is
  ID number;
begin
   Select color_id into  ID 
   from color
   where (color = Nombre_Color);  
  
  return(ID);
end Color_ID;

---10.---------------------- Procedimiento para agregar tamaño--------------------------------

create or replace procedure Agregar_Tamanio(Tipo_Tamanio varchar2) is
begin
  insert into tamanio(tamanio_id,tamanio)
  values(incremento_tamanio.nextval,Tipo_Tamanio);
  
end Agregar_Tamanio;

-----------Funcion para obtener el ID de tamaño---------------------------------------

create or replace function Tamanio_ID(Tipo_Tamanio varchar2) 
return number is
  ID number;
begin
   Select tamanio_id into  ID 
   from tamanio
   where (tamanio = Tipo_Tamanio);  
  
  return(ID);
end Tamanio_ID;

---11.---------------------- Procedimiento para agregar facilidad entrenamiento--------------------------------

create or replace procedure Agregar_Facilidad_Entrenamiento(Facilidad varchar2) is
begin
  insert into facilidad_entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
  values(incremento_entrenamiento.nextval,Facilidad);
  
end Agregar_Facilidad_Entrenamiento;

-----------Funcion para obtener el ID de facilidad entrenamiento---------------------------------------

create or replace function Facilidad_Entrenamiento_ID(Facilidad varchar2) 
return number is
  ID number;
begin
   Select facilidad_entrenamiento_id into  ID 
   from facilidad_entrenamiento
   where (facilidad_entrenamiento = Facilidad);  
  
  return(ID);
end Facilidad_Entrenamiento_ID;

---12.---------------------- Procedimiento para agregar mascota--------------------------------------

create or replace procedure Agregar_Mascota(nombre_mascota varchar2, direccion_exacta number, severidad number,
 estado_mascota number, enfermedad number, requiere_espacio number, foto_antes null, foto_despues null,
  veterinario varchar2, descripcion varchar2, nota_adicional varchar2, fecha date, raza number,
   nivel_energia number, color number, tamanio number, facilidad_entrenamiento number, rescatista number) is
begin
  insert into MASCOTA(mascota_id,nombre,direccion_exacta_id,severidad_id,estado_mascota_id,enfermedad_id,
            requiere_espacion,foto_antes,foto_despues,veterinario,descripcion,nota_adicional,fecha,raza_id,
            nivel_energia_id,color_id,tamanio_id,facilidad_entrenamiento_id,rescatista_id) 

   values (incremento_mascota.nextval, nombre_mascota,direccion_exacta,severidad,estado_mascota,enfermedad,
       requiere_espacio,foto_antes,foto_despues,veterinario,descripcion,nota_adicional,fecha,raza,
       nivel_energia,color,tamanio,facilidad_entrenamiento,rescatista);
  
  
end Agregar_Mascota;

---------------------Funcion para obtener el ID de la mascota----------------------------------

create or replace function Mascota_ID(Nombre_Mascota varchar2) 
return number is
  ID number;
begin
  Select mascota_id into  ID
  from mascota
  where (nombre = Nombre_Mascota);  
  
  return(ID);
end Mascota_ID;