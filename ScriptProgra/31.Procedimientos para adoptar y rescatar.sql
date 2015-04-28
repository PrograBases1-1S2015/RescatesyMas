--PROCEDIMIENTO PARA TRABAJAR DESDE LA BASE
create or replace procedure BUSCAR_MxR(NUSUARIO varchar2,RESULTADO OUT SYS_REFCURSOR ) is
   IDUSU NUMBER;
   IDRRES NUMBER;
begin
  SELECT USUARIO_ID(NUSUARIO) INTO IDUSU FROM DUAL;
  SELECT buscar_rescatista(IDUSU) INTO IDRRES FROM DUAL;
  OPEN RESULTADO FOR
  
  SELECT MASCOTA_ID,NOMBRE
  FROM MASCOTA 
  WHERE RESCATISTA_ID=IDRRES AND ESTADO_MASCOTA_ID=1;
  
end BUSCAR_MXR;




--Causas--
Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Cambio de residencia');

Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Problemas con los vecinos');

Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Alergía de uno de los miembros de la familia');

Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Falta de tiempo para cuidarlo');

Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Ruptura amorosa');

Insert into causa(causa_id,causa)
values(incremento_causa.nextval,'Ya no lo queremos');
--BUSCAR TODAS LAS CAUSAS--
create or replace procedure GET_CAUSAS(RESULTADO OUT SYS_REFCURSOR) is
begin
  OPEN RESULTADO FOR
  SELECT CAUSA_ID,CAUSA
  FROM CAUSA ;
end GET_CAUSAS;
--BUSCAR MASCOTAS ASOCIADAS A UN ADOPTANTE--
create or replace procedure MASCOTASXADOPTANTE(NUSUARIO VARCHAR2,RESULTADO OUT SYS_REFCURSOR) is
       IDA NUMBER;
       IDU NUMBER;
begin
  SELECT USUARIO_ID(NUSUARIO) INTO IDU FROM DUAL;
  SELECT buscar_adoptante(IDU) INTO IDA FROM DUAL;
  
  OPEN RESULTADO FOR
      SELECT M.MASCOTA_ID,M.NOMBRE
      FROM MASCOTA M
      INNER JOIN ADOPCIONES_X_MASCOTA AXM
      ON AXM.ADOPTANTE_ID= IDA AND M.MASCOTA_ID=AXM.MASCOTA_ID;
end MASCOTASXADOPTANTE;
