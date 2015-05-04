

create or replace procedure Busqueda_Personas(Nombre varchar2,Apellido varchar2,Tipo varchar2,correo varchar2,usuario varchar2,resultado out sys_refcursor) is
begin
  if (UPPER(Tipo)= UPPER('rescatista')) then
    open resultado for
    Select p.nombre, p.apellidos,p.email,p.estado_listanegra, p.num_telefono_1,us.nom_usuario
    from persona p
    inner join usuario us on p.usuario_id = us.usuario_id
    where UPPER(p.nombre) like UPPER(Nombre) or UPPER(p.apellidos) like UPPER(Apellido) or UPPER(p.email) like UPPER(correo)
    or UPPER(us.nom_usuario) like UPPER(usuario);
   
  elsif (UPPER(Tipo)= UPPER('adoptante')) then
    open resultado for
    Select p.nombre, p.apellidos,p.email,p.estado_listanegra, p.num_telefono_1,us.nom_usuario
    from persona p
    inner join usuario us on p.usuario_id = us.usuario_id
    where UPPER(p.nombre) like UPPER(Nombre) or UPPER(p.apellidos) like UPPER(Apellido) or UPPER(p.email) like UPPER(correo)
    or UPPER(us.nom_usuario) like UPPER(usuario);
    
  end if;
end Busqueda_Personas;

