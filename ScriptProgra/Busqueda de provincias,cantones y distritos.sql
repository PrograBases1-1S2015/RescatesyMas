---Buscar provincias--
create or replace procedure Buscar_Provincias(ID_Pais number) is
       resultado sys_refcursor;
begin
 open resultado for Select provincia from provincia
  where provincia_id = ID_Pais;
end Buscar_Provincias;
--Buscar Cantones--
create or replace procedure Buscar_Cantones(ID_Provincia number) is
       resultado sys_refcursor;
begin
 open resultado for Select canton from canton
  where canton_id = ID_Provincia;
end Buscar_Cantones;
--Buscar Distritos--
create or replace procedure Buscar_Distritos(ID_Distrito number) is
       resultado sys_refcursor;
begin
 open resultado for Select Distrito from distrito
  where canton_id = ID_Distrito;
end Buscar_Distritos;