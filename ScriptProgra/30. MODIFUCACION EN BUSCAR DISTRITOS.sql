-----Modificacion en buscar distritos

create or replace procedure Buscar_Distritos(Nom_Canton in varchar2,resultado out sys_refcursor) is
begin
 open resultado for Select distrito_id, distrito from distrito inner join canton 
 on distrito.canton_id = canton.canton_id
 where canton.canton =Nom_Canton;
end Buscar_Distritos;
