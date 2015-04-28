-- Add/modify columns 
alter table PREGUNTA add enable number default 1 not null;
-- Add comments to the columns 
comment on column PREGUNTA.enable
  is 'Indica si la pregunta esta activa o no';
  
  
create or replace procedure Buscar_Preguntas(ID_Formulario in number,resultado out sys_refcursor) is
begin
 open resultado for Select pregunta.pregunta_id, pregunta.pregunta from pregunta inner join formulario_x_pregunta 
 on pregunta.pregunta_id = formulario_x_pregunta.pregunta_id
 where formulario_x_pregunta.tipo_formulario_id = ID_Formulario;
end Buscar_Preguntas;  

create or replace procedure Buscar_Respuestas(ID_Pregunta in number,resultado out sys_refcursor) is
begin
 open resultado for Select respuesta.respuesta_id, respuesta.respuesta from respuesta  
 where respuesta.pregunta_id = ID_Pregunta;
end Buscar_Respuestas;
