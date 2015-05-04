--Búsqueda de persona global--
create or replace function Buscar_Persona_Global(Nombre varchar2,Apellido varchar2,Tipo varchar2,correo varchar2,distrito varchar2,usuario varchar2,resultado out sys_refcursor) is
begin
  if (tipo='rescatista') then
  open resultado for
   Select distinct per.nombre,per.apellidos,dis.distrito,us.nom_usuario,per.email
  from persona per,direccion_exacta dir,distrito dis, usuario us,rescatista res
  where UPPER(per.nombre) like UPPER(Nombre)||'%' and UPPER(per.apellidos) like UPPER(Apellido)||'%'
  and (UPPER(dis.distrito) like UPPER(distrito)||'%' and dir.distrito_id = dis.distrito_id and dir.direccion_exacta_id=per.direccion_exacta_id)
  and (UPPER(us.nom_usuario) like UPPER(usuario)||'%'  and (per.usuario_id=us.usuario_id) or UPPER(per.email) like UPPER(correo)||'%'
  and res.persona_id = per.persona_id;
  elsif (tipo='adoptante') then
    open resultado for
   Select distinct per.nombre,per.apellidos,dis.distrito,us.nom_usuario,per.email
  from persona per,direccion_exacta dir,distrito dis, usuario us,adoptante adop
  where UPPER(per.nombre) like UPPER(Nombre)||'%' and UPPER(per.apellidos) like UPPER(Apellido)||'%'
  and (UPPER(dis.distrito) like UPPER(distrito)||'%' and dir.distrito_id = dis.distrito_id and dir.direccion_exacta_id=per.direccion_exacta_id)
  and (UPPER(us.nom_usuario) like UPPER(usuario)||'%'  and per.usuario_id=us.usuario_id) or UPPER(per.email) like UPPER(correo)||'%'
  and adop.persona_id = per.persona_id;
    
end Buscar_Persona_Global;
