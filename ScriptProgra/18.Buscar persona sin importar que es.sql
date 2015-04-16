--Búsqueda de persona global--
create or replace function Buscar_Persona_Global(Nombre varchar2,Apellido varchar2,Tipo varchar2,correo varchar2,distrito varchar2,usuario varchar2) return sys_refcursor is
  Result sys_refcursor;
begin
  
  --Abrir cursor para guardar toda la información--
  if (tipo='rescatista') then
  open result for
   Select distinct per.nombre,per.apellidos,dis.distrito,us.nom_usuario,per.email
  from persona per,direccion_exacta dir,distrito dis, usuario us,rescatista res
  where per.nombre like Nombre||'%' and per.apellidos like Apellido||'%'
  and (dis.distrito like distrito||'%' and dir.distrito_id = dis.distrito_id and dir.direccion_exacta_id=per.direccion_exacta_id)
  and (us.nom_usuario like usuario||'%'  and per.usuario_id=us.usuario_id) or per.email like correo||'%'
  and res.persona_id = per.persona_id;
  elsif (tipo='adoptante') then
    open result for
   Select distinct per.nombre,per.apellidos,dis.distrito,us.nom_usuario,per.email
  from persona per,direccion_exacta dir,distrito dis, usuario us,adoptante adop
  where per.nombre like Nombre||'%' and per.apellidos like Apellido||'%'
  and (dis.distrito like distrito||'%' and dir.distrito_id = dis.distrito_id and dir.direccion_exacta_id=per.direccion_exacta_id)
  and (us.nom_usuario like usuario||'%'  and per.usuario_id=us.usuario_id) or per.email like correo||'%'
  and adop.persona_id = per.persona_id;
    
end if;

  return(Result);
end Buscar_Persona_Global;