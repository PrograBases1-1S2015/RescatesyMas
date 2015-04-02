---Buscar provincias--
create or replace procedure Buscar_Provincias(ID_Pais number) is
       resultado sys_refcursor;
begin
 open resultado for 
 Select provincia 
 from provincia
 inner join pais
  on provincia
end Buscar_Provincias;
--Buscar Cantones--
create or replace procedure Buscar_Cantones(ID_Provincia number) is
       resultado sys_refcursor;
begin
 open resultado for Select canton.canton from provincia
inner join canton
on canton.provincia_id = provincia.provincia_id and provincia.provincia_id=ID_Provincia;
end Buscar_Cantones;
--Buscar Distritos--
create or replace procedure Buscar_Distritos(ID_Distrito number) is
       resultado sys_refcursor;
begin
 open resultado for Select distrito.distrito from canton
inner join distrito
on canton.canton_id = distrito.canton_id and canton.canton_id=ID_distrito;
end Buscar_Distritos;