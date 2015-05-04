--------------------------Busqueda de  tratamientos----------------------------------------------
create or replace procedure Buscar_Tratamientos(ID_Enfermedad number) is
       resultado sys_refcursor;
begin
 open resultado for Select tratamiento from tratamiento
  where enfermedad_id = ID_Enfermedad;
end Buscar_Tratamientos;
---------------------------------Busqueda de Medicamentos----------------------------------------
create or replace procedure Buscar_Medicamentos(ID_Tratamiento number) is
       resultado sys_refcursor;
begin
 open resultado for Select medicamento from medicamento
  where tratamiento_id = ID_Tratamiento;
end Buscar_Medicamentos;
---------------------------------Busqueda de Razas----------------------------------------
create or replace procedure Buscar_Razas(ID_Tipo_Mascota number) is
       resultado sys_refcursor;
begin
 open resultado for Select raza from raza
  where tipo_mascota_id = ID_Tipo_Mascota;
end Buscar_Razas;
