--B�squeda de mascota global--
create or replace procedure Buscar_Mascota(nombre_mascota varchar2,distrito_busqueda varchar2,raza_mascota number,color_mascota number,estado number,tamanio_mascota number,
tipo_mascota number, nivel_energia_mascota number,entrenamiento_mascota number,Result out sys_refcursor) is
begin  
  --Abrir cursor para guardar toda la informaci�n--
open Result for
Select m.nombre,m.fecha,m.descripcion,m.nota_adicional,de.direccion_exacta,d.distrito,em.estado_mascota,r.raza,tm.tipo_mascota,t.tamanio,p.nombre as nombre_Persona,p.num_telefono_1
from mascota m
inner join direccion_exacta de on m.direccion_exacta_id = de.direccion_exacta_id
inner join distrito d on de.distrito_id = d.distrito_id
inner join severidad s on m.severidad_id = s.severidad_id
inner join estado_mascota em on m.estado_mascota_id = em.estado_mascota_id
inner join raza r on m.raza_id = r.raza_id
inner join tipo_mascota tm on r.tipo_mascota_id = tm.tipo_mascota_id
inner join nivel_energia ne on m.nivel_energia_id = ne.nivel_energia_id
inner join color c on m.color_id = c.color_id
inner join tamanio t on m.tamanio_id = t.tamanio_id
inner join facilidad_entrenamiento fe on m.facilidad_entrenamiento_id = fe.facilidad_entrenamiento_id
inner join rescatista re on m.rescatista_id = re.rescatista_id
inner join persona p on re.persona_id = p.persona_id
where UPPER(m.nombre) like UPPER(nombre_mascota) or UPPER(d.distrito) like (distrito_busqueda) or 
m.raza_id = raza_mascota or m.color_id = color_mascota or m.estado_mascota_id = estado or m.tamanio_id = tamanio_mascota or
m.nivel_energia_id=nivel_energia_mascota or m.facilidad_entrenamiento_id=entrenamiento_mascota;
end Buscar_Mascota;
