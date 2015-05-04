--Cambios en la base para poder conectar con la interfaz--
--Modificar procedimiento para que funcione con los cursores--
create or replace procedure Buscar_Tratamientos(ID_Enfermedad number,resultado out sys_refcursor) is
       
begin
 open resultado for Select tratamiento_id,tratamiento from tratamiento
  where enfermedad_id = ID_Enfermedad;
end Buscar_Tratamientos;
--Preguntas y Respuesta--
--Agregar formulario--
create or replace procedure Agregar_Formulario(Tipo varchar2) is
begin
  Insert into Tipo_Formulario(Tipo_Formulario_Id,Tipo_Formulario)
  values (incremento_tipo_formulario.nextval,Tipo);
end Agregar_Formulario;
--Agregar Pregunta--
create or replace procedure Agregar_Pregunta(DPregunta varchar2) is
begin
       insert into Pregunta(Pregunta_id,Pregunta)
       values(incremento_pregunta.nextval,DPregunta); 
end Agregar_Pregunta;
--Agregar respuesta--
create or replace procedure Agregar_Respuesta(Res varchar2,PID number) is
begin
  insert into Respuesta(Respuesta_Id,Respuesta,Pregunta_Id)
  values(incremento_respuesta.nextval,res,PID);
end Agregar_Respuesta;
--Asignar preguntar al formulario--
create or replace procedure Agregar_F_X_P(F number,P number) is
begin
  insert into Formulario_x_Pregunta(Tipo_Formulario_Id,Pregunta_Id)
  values(F,P);
end Agregar_F_X_P;

--Para los combo box--
create or replace procedure Get_Formulario(Resultado out sys_refcursor) is
begin
  open Resultado for Select tipo_formulario_id,tipo_formulario from Tipo_Formulario ;
end Get_Formulario;

create or replace procedure Get_Pregunta(Resultado out sys_refcursor) is
begin
  open Resultado for Select pregunta_id,pregunta from pregunta;
end Get_Pregunta;
