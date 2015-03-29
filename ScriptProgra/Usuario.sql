----------1. Usuario-----------------
--Procedimiento para agregar----------------
create or replace procedure Agregar_Usuario(Nombre varchar,contraseña varchar,token varchar) is
begin
  insert into usuario(usuario_id,nom_usuario,contrasenia,access_token)
  values(incremento_usuario.nextval,Nombre,contraseña,token)
  
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
end Usuario_ID;


----------3. Provincia---------------------
--Procedimiento--
create or replace procedure Agregar_Provincia(Nombre varchar) is
begin
  insert into pais(provincia_id,provincia)
  values(incremento_provincia.nextval,Nombre);
  
end Agregar_Pais;

--Funcion busqueda--
create or replace function Provincia_ID(Nombre_Provincia varchar2) 
return number is
  Id number;
begin
  Select provincia_id into  ID 
  from Provincia
  where (Provincia = Nombre_Provincia);       
  
  return(ID);
end Usuario_ID;

----------4. Cantòn---------------------
--Procedimiento--
create or replace procedure Agregar_Provincia(Nombre varchar) is
begin
  insert into pais(Canton_id,Canton)
  values(incremento_Canton.nextval,Nombre);
  
end Agregar_Pais;

--Funcion busqueda--
create or replace function Canton_ID(Nombre_Canton varchar2) 
return number is
  Id number;
begin
  Select Canton_id into  ID 
  from Canton
  where (Canton = Nombre_Canton);       
  
  return(ID);
end Usuario_ID;
----------5. Distrito---------------------
--Procedimiento--
create or replace procedure Agregar_Distrito(Nombre varchar) is
begin
  insert into pais(Distrito_id,Distrito)
  values(incremento_Distrito.nextval,Nombre);
  
end Agregar_Pais;

--Funcion busqueda--
create or replace function Distrito_ID(Nombre_Distrito varchar2) 
return number is
  Id number;
begin
  Select Distrito_id into  ID 
  from Distrito
  where (Distrito = Nombre_Distrito);       
  
  return(ID);
end Usuario_ID;


