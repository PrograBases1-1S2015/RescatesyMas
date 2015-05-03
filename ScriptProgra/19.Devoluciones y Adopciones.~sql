create or replace procedure Agregar_Devoluciones(adoptante varchar2,mascota number,causa number) is
       IDA number;
begin
  select buscar_adoptante(adoptante) into IDA from dual;
  insert into devoluciones_x_mascota(devoluciones_x_mascota_id,adoptante_id,mascota_id,fecha,causa_id)
  values(incremento_devo_x_mascota.nextval,IDA,mascota,SYSDATE,causa);
  
  update mascota 
  set estado_mascota_id = 1
  where mascota_id = mascota;
end Agregar_Devoluciones;


create or replace procedure Agregar_Adopciones(Usuario varchar2,IDM number) is
   ID_USUARIO NUMBER;
   ID_ADOPTANTE NUMBER;
begin
  SELECT USUARIO_ID(Usuario) INTO ID_USUARIO FROM DUAL;
  SELECT BUSCAR_ADOPTANTE(ID_USUARIO) INTO ID_ADOPTANTE FROM DUAL;

  INSERT INTO ADOPCIONES_X_MASCOTA(ADOPCIONES_X_MASCOTA_ID,ADOPTANTE_ID,MASCOTA_ID)
  VALUES (INCREMENTO_ADOP_X_MASCOTA.NEXTVAL,ID_ADOPTANTE,IDM);

  UPDATE MASCOTA MAS
  SET MAS.ESTADO_MASCOTA_ID=2
  WHERE MAS.MASCOTA_ID=IDM;


end Agregar_Adopciones;

