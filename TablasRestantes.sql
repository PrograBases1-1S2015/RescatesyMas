CREATE TABLE FORMULARIOS_X_ADOPTANTE (
adoptante_id NUMBER(6),
tipo_formulario_id NUMBER(6),
respuesta_id NUMBER(6),
pregunta_id NUMBER(6)
);

ALTER TABLE FORMULARIOS_X_ADOPTANTE add
constraint pk_f_x_a
primary key(adoptante_id, tipo_formulario_id, respuestas_id, pregunta_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_adoptante_f_x_a
	FOREIGN KEY(adoptante_id) 
	REFERENCES ADOPTANTE(adoptante_id);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_tipo_formulario_f_x_a
	FOREIGN KEY(tipo_formulario_id) 
	REFERENCES TIPO_FORMULARIO(tipo_formulario_id);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_pregunta_f_x_a
	FOREIGN KEY(pregunta_id) 
	REFERENCES TIPO_FORMULARIO(pregunt_id);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_respuesta_f_x_a
	FOREIGN KEY(respuesta_id) 
	REFERENCES RESPUESTA(respuesta_id);
