--------------------Buscar Provicias

create or replace procedure Buscar_Provincias(ID_Pais in number,resultado out sys_refcursor) is
begin
 open resultado for
 Select provincia_id,provincia
 from provincia
 where provincia.pais_id= ID_Pais;
end Buscar_Provincias;

--------------------Buscar Cantones

create or replace procedure Buscar_Cantones(ID_Provincia in number,resultado out sys_refcursor) is
begin
 open resultado for Select canton_id, canton from canton
where provincia_id =ID_Provincia;

--------------------Buscar Distritos

create or replace procedure Buscar_Distritos(ID_Canton in number,resultado out sys_refcursor) is
begin
 open resultado for Select distrito_id, distrito from distrito
 where canton_id =ID_Canton;
end Buscar_Distritos;
end Buscar_Cantones;
