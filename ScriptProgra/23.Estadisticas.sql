------i. Cantidad de mascotas registradas, adoptadas y en espera de adopción-----------------------------
create or replace procedure Cantidad_Mascotas_Registradas(resultado out sys_refcursor) is
begin
  open resultado for
  Select count(mascota_id)
  from mascota;
end Cantidad_Mascotas_Registradas;
-----------------------------------------------------------------------

create or replace procedure Cantidad_Mascotas_Adoptadas(resultado out sys_refcursor) is
begin
  open resultado for
  Select count(mascota_id) 
  from mascota
  where (estado_mascota_id = 2);
end Cantidad_Mascotas_Adoptadas;
-------------------------------------------------

create or replace procedure Cantidad_Mascotas_En_Adopcion (resultado out sys_refcursor) is
begin
  open resultado for
  Select count(mascota_id) 
  from mascota
  where (estado_mascota_id = 1);
end Cantidad_Mascotas_En_Adopcion;

------ii.Listado de mascotas devueltas y la cantidad de veces que han sido 
------devueltas con un total al final que sumarice la cantidad de mascotas devueltas---------

-------------------------iii. Top 10 de motivos de devolución de mascotas---------------------------------------
create or replace procedure Top_devolucion_Mascotas(resultado out sys_refcursor) is       
begin
  open resultado for select causa
  from (select causa , DENSE_RANK() over (order by causa_id) causa_dense_rank
      from causa)
  where causa_dense_rank <= 10;
end Top_devolucion_Mascotas;

------------------------iv.----- Top 10 de mejores adoptantes-------------------------------------------------

create or replace procedure Top_Mejores_Adoptantes(resultado out sys_refcursor) is
begin
    open resultado for select nombre, apellidos
  	from (select nombre,apellidos, DENSE_RANK() over (order by persona.persona_id) adop_dense_rank
  	from persona, adoptante, calificacion
  	where adoptante.persona_id = persona.persona_id and adoptante.adoptante_id = calificacion.adoptante_id and calificacion.calificacion >= 4)
  	where adop_dense_rank <= 10;
end Top_Mejores_Adoptantes;

