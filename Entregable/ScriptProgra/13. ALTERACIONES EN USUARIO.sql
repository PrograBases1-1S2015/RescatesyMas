------------------ALTERACION TABLA USUARIO--------------
ALTER TABLE USUARIO ADD TIPO_USUARIO NUMBER(2);
------------TODOS LOS USUARIOS SERAN NORMALES---
UPDATE USUARIO SET TIPO_USUARIO = 2; 
---------------CREEN UN USUARIO DE USTEDES Y CAMBIEN EL TIPO_USUARIO A 1
---------------ESTE SERA ELA DMINISTRADOR DEL SISTEMA
UPDATE USUARIO SET TIPO_USUARIO = 1 WHERE NOM_USUARIO = 'asoto'; 



-------------------ALTERAR AGREGAR USUARIO

create or replace procedure Agregar_Usuario(Nombre varchar,contraseña varchar,token varchar,tipo number) is
begin
  insert into usuario(usuario_id,nom_usuario,contrasenia,access_token,tipo_usuario)
  values(incremento_usuario.nextval,Nombre,contraseña,token,tipo);

end Agregar_Usuario;

-----------------------ALTERAR REGISTRO PARA QUE POR DEFECTO TODOS SEAN USUARIOS

create or replace procedure Registro(Usuario_n varchar2, contraseña varchar2,direccion varchar,distrito varchar,nombre varchar,apellido varchar,cedula varchar,telef1 number,email varchar,cargo number) is
  u_id number; --Id del usuario
  dire_id number; --Id de la direccion
begin
  --Inserta el usuario--
  begin
  agregar_usuario(usuario_n,contraseña,NULL,2);
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

--------------VERIFICAR DATOS
SELECT * FROM USUARIO;
