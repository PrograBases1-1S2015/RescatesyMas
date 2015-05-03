----Script para obtener la lista de adoptantes----------------

create or replace procedure Get_Adoptantes(resultado out sys_refcursor) is
begin
 open resultado for Select Persona.Persona_Id, Persona.Nombre,Persona.Apellidos
 from Persona Inner join Adoptante on persona.persona_id = Adoptante.Persona_Id;
end Get_Adoptantes;
