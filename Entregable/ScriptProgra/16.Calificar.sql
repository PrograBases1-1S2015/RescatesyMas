--Función que obtiene todos los id de los adoptante que están relacionado con 
--un rescatista--
create or replace function Obtener_Adopciones(RID number) return sys_refcursor is
  Result sys_refcursor ;
begin
  open result for
  Select AXM.ADOPTANTE_ID
  from Adopciones_X_Mascota AXM
  inner join Mascota M
  on M.RESCATISTA_ID=RID and AXM.MASCOTA_ID=M.MASCOTA_ID;
  return(Result);
end Obtener_Adopciones;
--Procedemiento para calificar--
--Recibe el ID del rescatista y del adoptante--
create or replace procedure Calificar_Persona(Calificacion number,comentario varchar2,adoptante number,rescatista number) is
begin
  insert into calificacion(calificacion_id,calificacion,comentario,adoptante_id,rescatista_id)
  values (incremento_calificacion.nextval,calificacion,comentario,adoptante,rescatista); 
end Calificar_Persona;
--Función que obtiene el ID de una persona recibiendo el ID del adoptante--
--Obtener el id de una persona usando el adoptante
create or replace function Persona_ID_Con_Adoptante_ID(AID number) return number is
  Result number;
begin
  Select persona.persona_id into result
  from persona
  inner join Adoptante
  on adoptante.adoptante_id=AID and persona.persona_id=adoptante.persona_id;
  return(Result);
end Persona_ID_Con_Adoptante_ID;
--Trigger lista negra--
--Busca la calificaion general de una persona, si es menor a 3 
--Obtiene el id de la persona en base al id del adoptante
--para agregar los datos a la tabla
create or replace trigger Agregar_Lista_Negra
  after insert on calificacion  
  for each row
declare
  promedio number;
  persona number;
begin
  Select consultar_persona_calificacion(:old.adoptante_id) into promedio
  from dual;
  
  if promedio <= 3 then
    Select persona_id_con_adoptante_id(:old.adoptante_id) into persona from dual;
    insert into Listanegra(Listanegra_Id,Persona_Id)
    values (incremento_listanegra.nextval,persona);
   end if; 
end Agregar_Lista_Negra;

begin
  calificar_persona(1,'malo',2,2);
end;

select * from calificacion
