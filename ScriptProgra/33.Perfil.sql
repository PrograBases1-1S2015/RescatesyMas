--Obtener todos los datos--
create or replace procedure OBTENER_DATOS(USUARIO VARCHAR2,RESULTADO OUT SYS_REFCURSOR) is

begin
 
  OPEN RESULTADO FOR
    SELECT P.NOMBRE,P.APELLIDOS,P.CEDULA,D.DIRECCION_EXACTA,P.EMAIL,P.NUM_TELEFONO_1,U.CONTRASENIA,C.CANTON,PR.PROVINCIA,PA.PAIS,DI.DISTRITO
  FROM PERSONA P, USUARIO U, DIRECCION_EXACTA D,CANTON C,PROVINCIA PR,PAIS PA,DISTRITO DI
  WHERE U.NOM_USUARIO=USUARIO and p.usuario_id=u.usuario_id AND DI.DISTRITO_ID=D.DIRECCION_EXACTA_ID AND DI.CANTON_ID=C.CANTON_ID AND
  C.PROVINCIA_ID=PR.PROVINCIA_ID AND PR.PAIS_ID=PA.PAIS_ID 
  AND P.DIRECCION_EXACTA_ID=D.DIRECCION_EXACTA_ID;
end OBTENER_DATOS;
--Actualizar campos--
create or replace procedure Actualizar(usuario varchar2,Nombre varchar2,apellido varchar2, telefono number,correo varchar2,contra varchar2,direccion varchar2,distrito number) is
id number;
dir number;
begin
  Select Usuario_ID(usuario) into id from dual;
  Select p.direccion_exacta_id into dir from persona p where p.usuario_id=id;
  update persona p
  set p.nombre=Nombre,
  p.apellidos=apellido,
  p.num_telefono_1=telefono,
  p.email=correo
  where p.usuario_id=id;
  
  update usuario u
  set u.contrasenia=contra
  where u.nom_usuario=usuario;
  
  update direccion_exacta d
  set d.direccion_exacta=direccion,
  d.distrito_id=distrito
  where dir=d.direccion_exacta_id and distrito!='';
  
  
  
end Actualizar;



--Actualizar dirección exacta--