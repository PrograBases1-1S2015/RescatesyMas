------SE CAMBIO POCO, SE INSERTA EL TOKEN NULL Y EL TELEFOMO 2 NULL-----------

create or replace procedure Registro(Usuario_n varchar2, contraseña varchar2,direccion varchar,distrito varchar,nombre varchar,apellido varchar,cedula varchar,telef1 number,email varchar,cargo number) is
  u_id number; --Id del usuario
  dire_id number; --Id de la direccion
begin
  --Inserta el usuario--
  begin
  agregar_usuario(usuario_n,contraseña,NULL);
  end;
  --Inserta la dirección--
  begin
  agregar_direccion_exacta(direccion,distrito);
  end;
  --Recupera los id de usario y direccion--
  Select usuario_id(usuario_n) into u_id from dual;
  Select direccion_exacta_id(direccion) into dire_id from dual;
  --Inserta en persona--
  begin
    agregar_persona(nombre,apellido,cedula,dire_id,telef1,NULL,u_id,email,cargo);
  end;

end Registro;

-------------LA CONTRASEÑA SE PUEDE REPETIR-------------

ALTER TABLE USUARIO DROP CONSTRAINT PERSONA_CONTRASENIA_UK;
