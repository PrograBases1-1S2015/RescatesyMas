-----------------CREAR USUARIO_PASSWORD
create or replace function Usuario_Password(Nombre_Usuario varchar2)
return varchar2 is
  PASSWORD varchar2(30);
begin
  Select Contrasenia  into  PASSWORD
  from Usuario
  where (nom_usuario = Nombre_Usuario);

  return(PASSWORD);
end Usuario_Password;
-----------------CREAR GET_PAISES
create or replace procedure Get_Paises(resultado out sys_refcursor) is
begin
 open resultado for Select pais_id, pais from pais;
end Get_Paises;
-----------------CREAR BUSCAR_USUARIO
create or replace procedure Buscar_Usuario(Username in varchar2,resultado out sys_refcursor) is
begin
 open resultado for Select nom_usuario, contrasenia, tipo_usuario from usuario
where nom_usuario =Username;
end Buscar_Usuario;
-----------------VERFIFICAR_EMAIL
create or replace function Verificar_Email( Email_Per varchar2)
return varchar2 is
   Email_Persona varchar2(30);
begin
  Select email into  Email_Persona
  from persona
  where (email = Email_Per);

  return(Email_Persona);
end Verificar_Email;
-----------------VERFICAR_USUARIO
create or replace function Verificar_Usuario( Nombre_Usuario varchar2)
return varchar2 is
   Nombre varchar2(30);
begin
  Select Usuario.Nom_Usuario into  Nombre
  from Usuario
  where (Nom_Usuario = Nombre_Usuario);

  return(Nombre);
end Verificar_Usuario;
-----------------VERFICAR_CEDULA
create or replace function Verificar_Cedula( Cedula_Persona varchar2)
return varchar2 is
   Cedula_Pers varchar2(30);
begin
  Select Cedula into  Cedula_Pers
  from Persona
  where (Cedula = Cedula_Persona);

  return(Cedula_Pers);
end Verificar_Cedula;
