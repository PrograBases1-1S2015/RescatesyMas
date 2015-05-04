create or replace procedure Get_Todas_Mascotas(Result out sys_refcursor) is
begin
  --Abrir cursor para guardar toda la informaci�n--
open Result for
Select m.nombre,m.fecha,m.descripcion,m.nota_adicional,de.direccion_exacta,d.distrito,em.estado_mascota,r.raza,tm.tipo_mascota,t.tamanio,p.nombre as nombre_persona, p.num_telefono_1
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
order by m.fecha desc;
end Get_Todas_Mascotas;
