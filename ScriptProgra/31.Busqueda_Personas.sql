

create or replace procedure Busqueda_Adoptante(NombreEntrada varchar2 ,Apellido varchar2,Tipo varchar2,correo varchar2,usuario varchar2,resultado out sys_refcursor) is
begin
   open resultado for
    Select p.nombre, p.apellidos,p.email,p.estado_listanegra, p.num_telefono_1,us.nom_usuario
    from adoptante adop
    inner join persona p on adop.persona_id = p.persona_id
    inner join usuario us on p.usuario_id = us.usuario_id
    where UPPER(p.nombre) like UPPER(NombreEntrada);
end Busqueda_Adoptante;


create or replace procedure Busqueda_Rescatista(NombreEntrada varchar2,Apellido varchar2,Tipo varchar2,correo varchar2,usuario varchar2,resultado out sys_refcursor) is
begin
    open resultado for
    Select p.nombre, p.apellidos,p.email,p.estado_listanegra, p.num_telefono_1,us.nom_usuario
    from rescatista res
    inner join persona p on res.persona_id = p.persona_id
    inner join usuario us on p.usuario_id = us.usuario_id
    where UPPER(p.nombre) like UPPER(NombreEntrada);
     
end Busqueda_Rescatista;

