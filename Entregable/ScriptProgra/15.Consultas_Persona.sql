--Todas estas funciones utilizan las anteriores de busqueda de rescatista/adoptante
--Función para almacenar los comentarios que tuvo una persona--
create or replace function Consultar_Personas_Comentarios(IDPErsona integer) return sys_refcursor  is
  consulta sys_refcursor ;
  
begin
  open consulta for
  Select cal.comentario
  from Calificacion cal
  where cal.adoptante_id=IDPersona
  order by cal.fec_creacion;
   
  return(Consulta);
end Consultar_Personas_Comentarios;
--Función para almacenar el promedio de calificación del adoptante--
create or replace function Consultar_Persona_Calificacion(IDPersona varchar2) return number  is
  Result number ;
 begin
 	Select AVG(cal.calificacion) into Result
  	from Calificacion cal
  	where (cal.adoptante_id=IDPersona);
  return(Result);
end Consultar_Persona_Calificacion;
--Función para saber el estado de una persona en la lista negra
create or replace function Consulta_Persona_ListaNegra(IDPersona number) return varchar2 is
  Result varchar2(30);
begin
  Select per.estado_listanegra into result
  from persona per
  where per.persona_id=IDPersona;
  
  return(Result);
end Consulta_Persona_ListaNegra;
