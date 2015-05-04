----------1. Usuario-----------------
--Procedimiento para agregar----------------

create or replace procedure Agregar_Usuario(Nombre varchar,contraseña varchar,token varchar,tipo number) is
begin
  insert into usuario(usuario_id,nom_usuario,contrasenia,access_token,tipo_usuario)
  values(incremento_usuario.nextval,Nombre,contraseña,token,tipo);

end Agregar_Usuario;
--Funciòn para buscar id-------------------
create or replace function Usuario_ID(Nombre_Usuario varchar2) 
return number is
  Id number;
begin
  Select usuario_id into  ID 
  from Usuario
  where (nom_usuario = Nombre_Usuario);       
  
  return(ID);
end Usuario_ID;

----------2. Pais---------------------
--Procedimiento--
create or replace procedure Agregar_Pais(Nombre varchar) is
begin
  insert into pais(pais_id,pais)
  values(incremento_pais.nextval,Nombre);
  
end Agregar_Pais;

--Funcion busqueda--
create or replace function Pais_ID(Nombre_Pais varchar2) 
return number is
  Id number;
begin
  Select pais_id into  ID 
  from Pais
  where (Pais = Nombre_Pais);       
  
  return(ID);
end Pais_ID;


----------3. Provincia---------------------
create or replace procedure Agregar_Provincia(Nombre varchar2,Pais varchar2) is
       resultado number;
begin
 Select pais_id(pais) into resultado from dual;
 insert into Provincia(Provincia_id,Provincia,pais_Id)
  values(incremento_Provincia.nextval,Nombre,resultado);
  
end Agregar_Provincia;

--Funcion busqueda--
create or replace function Provincia_ID(Nombre_Provincia varchar2) 
return number is
  Id number;
begin
  Select Provincia_id into  ID 
  from Provincia
  where (Provincia = Nombre_Provincia);       
  
  return(ID);
end Provincia_ID;


----------4. Cantòn---------------------
--Procedimiento--
create or replace procedure Agregar_Canton(Nombre varchar2,Provincia varchar2) is
       resultado number;
begin
 Select provincia_id(provincia) into resultado from dual;
 insert into Canton(Canton_Id,Canton,Provincia_Id)
  values(incremento_canton.nextval,Nombre,resultado);

end Agregar_Canton;
--Funcion busqueda--
create or replace function Canton_ID(Nombre_Canton varchar2) 
return number is
  Id number;
begin
  Select Canton_id into  ID 
  from Canton
  where (Canton = Nombre_Canton);       
  
  return(ID);
end Canton_ID;
----------5. Distrito---------------------
--Procedimiento--
create or replace procedure Agregar_Distrito(Nombre varchar,Canton varchar2) is
       resultado number;
begin
 Select canton_id(Canton) into resultado from dual;
 insert into Distrito(Distrito_Id,Distrito,Canton_Id)
  values(incremento_distrito.nextval,Nombre,resultado);
  
end Agregar_Distrito;

--Funcion busqueda--
create or replace function Distrito_ID(Nombre_Distrito varchar2,NCanton varchar2)
return number is
  Id number;
begin
  Select Distrito_id into  ID
  from Distrito dis,canton can
  where (dis.distrito=Nombre_Distrito and can.canton=NCanton and can.canton_id=dis.canton_id);

  return(ID);
end Distrito_ID;
----------6. Direccion Exacta---------------------
--Procedimiento--
create or replace procedure Agregar_Direccion_Exacta(Nombre varchar,Distrito varchar2,Canton varchar2) is
       resultado number;
begin
 
 Select distrito_id(Distrito,Canton) into resultado from dual;
 insert into Direccion_Exacta(Direccion_Exacta_Id,Direccion_Exacta,Distrito_Id)
  values(incremento_Direccion_Exacta.nextval,Nombre,resultado);

end Agregar_Direccion_Exacta;
--Funcion busqueda--
create or replace function Direccion_Exacta_ID(Nombre_Direccion_Exacta varchar2)
return number is
  Id number;
begin
  Select Direccion_Exacta_id into  ID
  from Direccion_Exacta
  where (direccion_exacta=Nombre_Direccion_Exacta);

  return(ID);
end Direccion_Exacta_ID;


--Función para recuperar el ID de la persona--
--Utiliza como parametro el ID del usuario, ya que cuando una persona se
--logea lo que utiliza es el nombre de usuario.
create or replace function Persona_ID(Usuario number) return number is
  Result number;
begin
  Select persona_id into result 
  from persona
  where (usuario= Usuario_ID);
  return(Result);
  
end Persona_ID;

---Procedimiento para crear la persona---
--Procedimiento para agregar las personas--
create or replace procedure Agregar_Persona(nombre varchar,apellido varchar,cedula varchar,Direccion number,telef1 number,telef2 number,usuario number,email varchar,cargo number) as
   persona_agregada number;
   begin
  insert into persona(persona_id,nombre,apellidos,cedula,direccion_exacta_id,email,num_telefono_1,num_telefono_2,usuario_id,estado_listanegra)
  values(incremento_persona.nextval,nombre,apellido,cedula,direccion,email,telef1,telef2,usuario,'no');
   Select persona_Id(usuario) into persona_agregada from dual;
   if cargo = 0 then
     Insert into Adoptante(Adoptante_Id,Persona_Id)
     values(incremento_adoptante.nextval,persona_agregada);
    
    else
        Insert into rescatista(rescatista_id,persona_id)
        values(incremento_rescatista.nextval,persona_agregada);
        
     
     end if;
 end Agregar_Persona;
--Procedimiento que hace todo el trabajo--
create or replace procedure Registro(Usuario_n varchar2, contraseña varchar2,direccion varchar,distrito varchar,canton varchar,nombre varchar,apellido varchar,cedula varchar,telef1 number,email varchar,cargo number) is
  u_id number; --Id del usuario
  dire_id number; --Id de la direccion
begin
  --Inserta el usuario--
  begin
  agregar_usuario(usuario_n,contraseña,NULL,2);
  end;
  --Inserta la dirección--
  begin
  agregar_direccion_exacta(direccion,distrito,canton);
  end;
  --Recupera los id de usario y direccion--
  Select usuario_id(usuario_n) into u_id from dual;
  Select direccion_exacta_id(direccion) into dire_id from dual;
  --Inserta en persona--
  begin
    agregar_persona(nombre,apellido,cedula,dire_id,telef1,NULL,u_id,email,cargo);
  end;

end Registro;
































































