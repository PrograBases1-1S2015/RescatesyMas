-------------NUEVOS CURSORES PARA LA PROGRA-------

create or replace procedure Get_Tipo_Mascota(resultado out sys_refcursor) is
begin
 open resultado for Select tipo_mascota_id, tipo_mascota from tipo_mascota;
end Get_Tipo_Mascota;

----------------------------------------------------

create or replace procedure Buscar_Razas(ID_Mascota in number,resultado out sys_refcursor) is
begin
 open resultado for Select raza_id, raza from raza
 where tipo_mascota_id =ID_Mascota;
end Buscar_Razas;

------------------------------------------------------

create or replace procedure Get_Severidad(resultado out sys_refcursor) is
begin
 open resultado for Select severidad_id, severidad from severidad;
end Get_Severidad;

--------------------------------------------------------

create or replace procedure Get_Estado_Mascota(resultado out sys_refcursor) is
begin
 open resultado for Select estado_mascota_id, estado_mascota from estado_mascota;
end Get_Estado_Mascota;

--------------------------------------------------------

create or replace procedure Get_Enfermedad(resultado out sys_refcursor) is
begin
 open resultado for Select enfermedad_id, enfermedad from enfermedad;
end Get_Enfermedad;

--------------------------------------------------------

create or replace procedure Get_Tamanio(resultado out sys_refcursor) is
begin
 open resultado for Select tamanio_id, tamanio from tamanio;
end Get_Tamanio;

-------------------------------------------------

create or replace procedure Get_Color(resultado out sys_refcursor) is
begin
 open resultado for Select color_id, color from color;
end Get_Color;

----------------------------------------------------

create or replace procedure Get_Nivel_Energia(resultado out sys_refcursor) is
begin
 open resultado for Select nivel_energia_id, nivel_energia from nivel_energia;
end Get_Nivel_Energia;

--------------------------------------------------

create or replace procedure Get_Facilidad_Entrenamiento(resultado out sys_refcursor) is
begin
 open resultado for Select facilidad_entrenamiento_id, facilidad_entrenamiento
 from facilidad_entrenamiento;
end Get_Facilidad_Entrenamiento;


