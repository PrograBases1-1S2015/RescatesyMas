create or replace procedure Agregar_Devoluciones(adoptante number,mascota number,fecha date,causa number) is
begin
  insert into devoluciones_x_mascota(devoluciones_x_mascota_id,adoptante_id,mascota_id,fecha,causa_id)
  values(incremento_devo_x_mascota.nextval,adoptante,mascota,fecha,causa);
  update mascota 
  set estado_mascota_id = 1
  where mascota_id = mascota;
end Agregar_Devoluciones;


create or replace procedure Agregar_Adopciones(adoptante number, mascota number, foto blob) is
begin
  insert into adopciones_x_mascota(adopciones_x_mascota_id,adoptante_id,mascota_id,foto)
  values(incremento_adop_x_mascota.nextval,adoptante,mascota,foto);
  update mascota
  set estado_mascota_id = 2
  where mascota_id = mascota;
end Agregar_Adopciones;

