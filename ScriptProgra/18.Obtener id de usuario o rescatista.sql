--Funcion para buscar un adoptante--
create or replace function Buscar_Adoptante(NUsuario integer) return integer is
  Result integer;
begin
  Select adp.adoptante_id into result
  from adoptante adp
  inner join persona per
  on per.persona_id=adp.persona_id and per.persona_id=NUsuario;
  return(Result);
end Buscar_Adoptante;

--Función para buscar un rescatista--
create or replace function Buscar_Rescatista(NUsuario number) return number is
    Result integer;
begin
 Select res.rescatista_id into result
  from rescatista res
  inner join persona per
  on per.persona_id=res.rescatista_id and per.persona_id=NUsuario;
  return(Result);
end Buscar_Rescatista;

--Funcion para buscar una mascota--
create or replace function Buscar_Mascota(nombreMascota varchar2) return varchar2 is
  Result varchar2;
begin
  Select mst.nombre into Result
  from mascota mst
  inner join adoptante_x_mascota a_x_m
  on a_x_m.mascota_id=mst.mascota_id and mst.nombre=nombreMascota;
  return(Result);
end Buscar_Mascota;

--Función que retornar el id ya sea de un rescatista o de un adoptante--
create or replace function ID_Rescatista_Adoptante(NUsuario Varchar) return number is
  Result number;
  IDUsuario integer;
  IDPersona integer;
  Existe integer;

begin
  Select usuario_id(NUsuario) into IDUsuario from dual;
  Select persona_id(IDUsuario)into IDPersona from dual;

  --Mediante un count se búscara en la tabla de adoptantes si el
  --registro existe. Si manda un uno es que está y por lo tanto almacenará
  --devolver el dato.

  Select count(1) into existe
  from dual
  where exists(
        select 1
        from Adoptante
        where adoptante.persona_id=IDPersona
      );

   if existe = 1 then
      Select Buscar_Adoptante(IDPersona) into Result from dual;
    else
     Select Buscar_Rescatista(IDPersona) into Result from dual;
   end if;
  return(Result);
end ID_Rescatista_Adoptante;


