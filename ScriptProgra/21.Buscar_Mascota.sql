--Búsqueda de mascota global--
create or replace function Buscar_Mascota(nombre_mascota varchar2,fecha_busqueda date,distrito_busqueda varchar2,raza_mascota varchar2,color_mascota varchar2,estado varchar2,tamanio_mascota varchar2,
tipo_mascota varchar2, nivel_energia_mascota varchar2,entrenamiento_mascota varchar2) return sys_refcursor is
  Result sys_refcursor;
begin
  
  --Abrir cursor para guardar toda la información--
open Result for
Select m.nombre,m.requiere_espacion,m.foto_antes, m.foto_despues,m.veterinario,m.fecha,m.descripcion,m.nota_adicional,de.direccion_exacta,d.distrito,s.severidad,em.estado_mascota,
e.enfermedad,r.raza,tm.tipo_mascota,ne.nivel_energia,c.color,t.tamanio,fe.facilidad_entrenamiento,p.nombre as nombre_mascota, p.num_telefono_1,p.num_telefono_2
from mascota m
inner join direccion_exacta de on m.direccion_exacta_id = de.direccion_exacta_id
inner join distrito d on de.distrito_id = d.distrito_id
inner join severidad s on m.severidad_id = s.severidad_id
inner join estado_mascota em on m.estado_mascota_id = em.estado_mascota_id
inner join enfermedad e on m.enfermedad_id = e.enfermedad_id
inner join raza r on m.raza_id = r.raza_id
inner join tipo_mascota tm on r.tipo_mascota_id = tm.tipo_mascota_id
inner join nivel_energia ne on m.nivel_energia_id = ne.nivel_energia_id
inner join color c on m.color_id = c.color_id
inner join tamanio t on m.tamanio_id = t.tamanio_id
inner join facilidad_entrenamiento fe on m.facilidad_entrenamiento_id = fe.facilidad_entrenamiento_id
inner join rescatista re on m.rescatista_id = re.rescatista_id
inner join persona p on re.rescatista_id = p.persona_id

where m.nombre like nombre_mascota or m.fecha like fecha_busqueda or d.distrito like distrito_busqueda or r.raza like raza_mascota or
c.color like color_mascota or em.estado_mascota like estado or t.tamanio like tamanio_mascota or tm.tipo_mascota like tipo_mascota or 
ne.nivel_energia like nivel_energia_mascota or fe.facilidad_entrenamiento like entrenamiento_mascota
order by m.fecha desc;

  return(Result);
end Buscar_Mascota;
