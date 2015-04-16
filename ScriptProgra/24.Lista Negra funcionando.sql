--Paquete para guardar el id del adoptante--
CREATE OR REPLACE Package pck_promedio as
 IDA number;
end;
--Trigger para antes de la inserción--
create or replace trigger Almacenar_Calificacion
  before insert on calificacion  
  for each row
declare
  
begin
  Select :new.adoptante_id into pck_promedio.IDA from dual;
end Almacenar_Calificacion;

--Trigger de lista negra--

create or replace trigger Agregar_Lista_Negra
  after insert on calificacion
declare
   promedio number;
  persona number;
begin
  
promedio:= consultar_persona_calificacion(pck_promedio.IDA);

  if promedio <= 3 then
    --Recuerden haber corrido antes este script--
    Select persona_id_con_adoptante_id(pck_promedio.IDA) into persona from dual;
    insert into Listanegra(Listanegra_Id,Persona_Id)
    values (incremento_listanegra.nextval,persona);
    
    update persona
    Set estado_listaNegra='si'
    where persona_id=persona;
    
   end if;
end Agregar_Lista_Negra;