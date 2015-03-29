---1------------------TABLA ENFERMEDAD------------------------------
CREATE TABLE ENFERMEDAD(
enfermedad_id NUMBER(6),
enfermedad VARCHAR2(20) CONSTRAINT enfermedad_enfermedad_nn NOT NULL
);

ALTER TABLE ENFERMEDAD add
constraint pk_enfermedad
primary key(enfermedad_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_enfermedad
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a ENFERMEDAD-----------------------
ALTER TABLE ENFERMEDAD add Fec_creacion DATE;
ALTER TABLE ENFERMEDAD add Usuario_creacion VARCHAR2(10);
ALTER TABLE ENFERMEDAD add Fec_ultima_modificacion DATE;
ALTER TABLE ENFERMEDAD add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers ENFERMEDAD-------------------------
create or replace trigger beforeUpdate_enfermedad
  before update
  on ENFERMEDAD
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_enfermedad;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_enfermedad
  before insert
  on ENFERMEDAD
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_enfermedad;

----2-----------------TABlA TRATAMIENTO------------------------------------
CREATE TABLE TRATAMIENTO(
tratamiento_id NUMBER(6),
tratamiento VARCHAR2(20) CONSTRAINT tratamiento_tratamiento_nn NOT NULL,
enfermedad_id NUMBER(6) CONSTRAINT tratamiento_enfermed_nn NOT NULL
);

ALTER TABLE TRATAMIENTO add
constraint pk_tratamiento
primary key(tratamiento_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE TRATAMIENTO ADD CONSTRAINT FK_ENFERMEDAD_TRATAMIENTO
	FOREIGN KEY (enfermedad_id) REFERENCES ENFERMEDAD(enfermedad_id);

CREATE SEQUENCE incremento_tratamiento
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a TRATAMIENTO--------------------------
ALTER TABLE TRATAMIENTO add Fec_creacion DATE;
ALTER TABLE TRATAMIENTO add Usuario_creacion VARCHAR2(10);
ALTER TABLE TRATAMIENTO add Fec_ultima_modificacion DATE;
ALTER TABLE TRATAMIENTO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers TRATAMIENTO-----------------------------
create or replace trigger beforeUpdate_tratamiento
  before update
  on TRATAMIENTO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_tratamiento;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_tratamiento
  before insert
  on TRATAMIENTO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_tratamiento;


-----3----------------TABLA MEDICAMENTO-------------------------------
CREATE TABLE MEDICAMENTO(
medicamento_id NUMBER(6),
medicamento VARCHAR2(20) CONSTRAINT medicamento_medicamento_nn NOT NULL,
tratamiento_id NUMBER(6) CONSTRAINT medicamento_tratamiento_nn NOT NULL
);

ALTER TABLE MEDICAMENTO add
constraint pk_medicamento
primary key(medicamento_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE MEDICAMENTO ADD CONSTRAINT FK_TRATAMIENTO_MEDICAMENTO
	FOREIGN KEY (tratamiento_id) REFERENCES TRATAMIENTO(tratamiento_id);

CREATE SEQUENCE incremento_medicamento
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a MEDICAMENTO--------------------------
ALTER TABLE MEDICAMENTO add Fec_creacion DATE;
ALTER TABLE MEDICAMENTO add Usuario_creacion VARCHAR2(10);
ALTER TABLE MEDICAMENTO add Fec_ultima_modificacion DATE;
ALTER TABLE MEDICAMENTO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers MEDICAMENTO-------------------------
create or replace trigger beforeUpdate_medicamento
  before update
  on MEDICAMENTO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_medicamento;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_medicamento
  before insert
  on MEDICAMENTO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_medicamento;

------4--------Tabla NIVEL_ENERGIA-------------------------------
CREATE TABLE NIVEL_ENERGIA(
nivel_energia_id NUMBER(6),
nivel_energia VARCHAR2(49) CONSTRAINT nivel_energia_nn NOT NULL
);
ALTER TABLE NIVEL_ENERGIA add
constraint pk_nivel_energia
primary key(nivel_energia_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_nivel_energia
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a NIVEL DE ENERGIA--------------------------
ALTER TABLE NIVEL_ENERGIA add Fec_creacion DATE;
ALTER TABLE NIVEL_ENERGIA add Usuario_creacion VARCHAR2(10);
ALTER TABLE NIVEL_ENERGIA add Fec_ultima_modificacion DATE;
ALTER TABLE NIVEL_ENERGIA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers NIVEL DE ENERGIA-----------------------------
create or replace trigger beforeUpdate_nivel_energia
  before update
  on NIVEL_ENERGIA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_nivel_energia;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_nivel_energia
  before insert
  on NIVEL_ENERGIA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_nivel_energia;

-------5-----------Tabla COLOR------------------------------------------------------
CREATE TABLE COLOR(
color_id NUMBER(6),
color VARCHAR2(40) CONSTRAINT color_color_nn NOT NULL
);
ALTER TABLE COLOR add
constraint pk_color
primary key(color_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_color
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a COLOR--------------------------
ALTER TABLE COLOR add Fec_creacion DATE;
ALTER TABLE COLOR add Usuario_creacion VARCHAR2(10);
ALTER TABLE COLOR add Fec_ultima_modificacion DATE;
ALTER TABLE COLOR add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers COLOR-----------------------------
create or replace trigger beforeUpdate_color
  before update
  on COLOR
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_color;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_color
  before insert
  on COLOR
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_color;

---6-----------------------Tabla TIPO_FORMULARIO---------------------------------
CREATE TABLE TIPO_FORMULARIO(
tipo_formulario_id NUMBER(6),
tipo_formulario VARCHAR2(40) CONSTRAINT TF_tipo_formulario_nn NOT NULL
);
ALTER TABLE TIPO_FORMULARIO add
constraint pk_tipo_formulario
primary key(tipo_formulario_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_tipo_formulario
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a TIPO_FORMULARIO------------------------------
ALTER TABLE TIPO_FORMULARIO add Fec_creacion DATE;
ALTER TABLE TIPO_FORMULARIO add Usuario_creacion VARCHAR2(10);
ALTER TABLE TIPO_FORMULARIO add Fec_ultima_modificacion DATE;
ALTER TABLE TIPO_FORMULARIO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers TIPO_FORMULARIO-----------------------------
create or replace trigger beforeUpdate_tipo_formulario
  before update
  on TIPO_FORMULARIO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_tipo_formulario;
-------------------------------------------------------------------------------------
create or replace trigger beforeInsert_tipo_formulario
  before insert
  on TIPO_FORMULARIO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_tipo_formulario;


----7---------------------------Tabla PREGUNTA----------------------------------------
CREATE TABLE PREGUNTA(
pregunta_id NUMBER(6),
pregunta VARCHAR2(40) CONSTRAINT pregunta_pregunta_nn NOT NULL
);
ALTER TABLE PREGUNTA add
constraint pk_pregunta
primary key(pregunta_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_pregunta
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a PREGUNTA------------------------------
ALTER TABLE PREGUNTA add Fec_creacion DATE;
ALTER TABLE PREGUNTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE PREGUNTA add Fec_ultima_modificacion DATE;
ALTER TABLE PREGUNTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers PREGUNTA----------------------------
create or replace trigger beforeUpdate_pregunta
  before update
  on PREGUNTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_pregunta;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_pregunta
  before insert
  on PREGUNTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_pregunta;

----------8--------Tabla RESPUESTA-------------------------
CREATE TABLE RESPUESTA(
respuesta_id NUMBER(6),
respuesta VARCHAR2(40) CONSTRAINT respuesta_respuesta_nn NOT NULL,
pregunta_id NUMBER(6)
);

ALTER TABLE RESPUESTA add
constraint pk_respuesta
primary key(respuesta_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE RESPUESTA ADD CONSTRAINT FK_PREGUNTA_RESPUESTA
	FOREIGN KEY (pregunta_id) REFERENCES PREGUNTA(pregunta_id);

CREATE SEQUENCE incremento_respuesta
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a RESPUESTA------------------------------
ALTER TABLE RESPUESTA add Fec_creacion DATE;
ALTER TABLE RESPUESTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE RESPUESTA add Fec_ultima_modificacion DATE;
ALTER TABLE RESPUESTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers RESPUESTA-------------------------------
create or replace trigger beforeUpdate_respuesta
  before update
  on RESPUESTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_respuesta;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_respuesta
  before insert
  on RESPUESTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_respuesta;

----9----Tabla FORMULARIO_X_PREGUNTA-----------------------------
CREATE TABLE FORMULARIO_X_PREGUNTA(
tipo_formulario_id NUMBER(6),
pregunta_id NUMBER(6)
);

ALTER TABLE FORMULARIO_X_PREGUNTA add
constraint pk_formulario_x_pregunta
primary key(tipo_formulario_id,pregunta_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE FORMULARIO_X_PREGUNTA ADD CONSTRAINT FK_formulario_f_x_p
	FOREIGN KEY (tipo_formulario_id) REFERENCES TIPO_FORMULARIO(tipo_formulario_id);

ALTER TABLE FORMULARIO_X_PREGUNTA ADD CONSTRAINT FK_pregunta_f_x_p
	FOREIGN KEY (pregunta_id) REFERENCES PREGUNTA(pregunta_id);


-----------------------Agregar campos a FORMULARIO_X_PREGUNTA-----------------------------
ALTER TABLE FORMULARIO_X_PREGUNTA add Fec_creacion DATE;
ALTER TABLE FORMULARIO_X_PREGUNTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE FORMULARIO_X_PREGUNTA add Fec_ultima_modificacion DATE;
ALTER TABLE FORMULARIO_X_PREGUNTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers FORMULARIO_X_PREGUNTA-----------------------------
create or replace trigger beforeUpdate_f_x_p
  before update
  on FORMULARIO_X_PREGUNTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_f_x_p;
---------------------------------------------------------------------------------------
create or replace trigger beforeInsert_f_x_p
  before insert
  on FORMULARIO_X_PREGUNTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_f_x_p;

---10--------------------------------Tabla PAIS---------------------------------------
CREATE TABLE PAIS
(pais_id NUMBER(6), 
 pais VARCHAR2(45) CONSTRAINT pais_pais_nn NOT NULL
);

COMMENT ON TABLE PAIS
IS 'En esta tabla se almacenan los paises';

COMMENT ON COLUMN PAIS.pais_id
IS 'Identificador del país';

COMMENT ON COLUMN PAIS.pais
IS 'Nombre del país';

alter table PAIS add
constraint pk_pais
primary key(pais_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


CREATE SEQUENCE incremento_pais
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a PAIS-----------------------------
ALTER TABLE PAIS add Fec_creacion DATE;
ALTER TABLE PAIS add Usuario_creacion VARCHAR2(10);
ALTER TABLE PAIS add Fec_ultima_modificacion DATE;
ALTER TABLE PAIS add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers PAIS----------------------------
create or replace trigger beforeUpdate_pais
  before update
  on PAIS
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_pais;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_pais
  before insert
  on PAIS
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_pais;


-----11------------------Tabla Provincia-----------------------------------
CREATE TABLE PROVINCIA
(provincia_id NUMBER(6),
 provincia VARCHAR2(45) CONSTRAINT provincia_provincia_nn NOT NULL,
 pais_id NUMBER(6)
);

COMMENT ON TABLE PROVINCIA
IS 'En esta tabla se almacenan las provincias';

COMMENT ON COLUMN PROVINCIA.provincia_id
IS 'Identificador de la provincia';

COMMENT ON COLUMN PROVINCIA.provincia
IS 'Nombre de la provincia';

COMMENT ON COLUMN PROVINCIA.pais_id
IS 'Identificador del país al que pertenece la provincia, es un foreign key de la tabla PAIS';


AlTER TABLE PROVINCIA add
constraint pk_provincia
primary key(provincia_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE PROVINCIA ADD CONSTRAINT FK_PAIS_PROVINCIA
      FOREIGN KEY (pais_id) REFERENCES PAIS (pais_id);


CREATE SEQUENCE incremento_provincia
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a PROVINCIA-----------------------------
ALTER TABLE PROVINCIA add Fec_creacion DATE;
ALTER TABLE PROVINCIA add Usuario_creacion VARCHAR2(10);
ALTER TABLE PROVINCIA add Fec_ultima_modificacion DATE;
ALTER TABLE PROVINCIA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers PROVINCIA-----------------------------
create or replace trigger beforeUpdate_provincia
  before update
  on PROVINCIA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_provincia;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_provincia
  before insert
  on PROVINCIA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_provincia;


-------12--------------------Tabla Canton------------------------------------
CREATE TABLE CANTON
(canton_id NUMBER(6),
 canton VARCHAR2(45) CONSTRAINT canton_canton_nn NOT NULL,
 provincia_id NUMBER(6)

);

COMMENT ON TABLE CANTON
IS 'En esta tabla se almacenan los cantones';

COMMENT ON COLUMN CANTON.canton_id
IS 'Identificador del cantón';

COMMENT ON COLUMN CANTON.canton
IS 'Nombre del cantón';

COMMENT ON COLUMN CANTON.provincia_id
IS 'Identificador del cantón de una provincia, es un foreign key de la tabla CANTON';

AlTER TABLE CANTON add
constraint pk_canton
primary key(canton_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



ALTER TABLE CANTON ADD CONSTRAINT FK_PROVINCIA_CANTON
      FOREIGN KEY (provincia_id) REFERENCES PROVINCIA (provincia_id);


CREATE SEQUENCE incremento_canton
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a CANTON-----------------------------
ALTER TABLE CANTON add Fec_creacion DATE;
ALTER TABLE CANTON add Usuario_creacion VARCHAR2(10);
ALTER TABLE CANTON add Fec_ultima_modificacion DATE;
ALTER TABLE CANTON add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers CANTON-----------------------------
create or replace trigger beforeUpdate_canton
  before update
  on CANTON
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_canton;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_canton
  before insert
  on CANTON
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_canton;


---------13---------Tabla Distrito-------------------------------------
CREATE TABLE DISTRITO
(distrito_id NUMBER(6),
 distrito VARCHAR2(45) CONSTRAINT distrito_distrito_nn NOT NULL,
 canton_id NUMBER(6)

);

COMMENT ON TABLE DISTRITO
IS 'En esta tabla se almacenan los distritos';

COMMENT ON COLUMN DISTRITO.distrito_id
IS 'Identificador del distrito';

COMMENT ON COLUMN DISTRITO.distrito
IS 'Nombre del distrito';

COMMENT ON COLUMN DISTRITO.canton_id
IS 'Identificador del cantón al que pertenece el distrito, es un foreign key de la tabla CANTON';


AlTER TABLE DISTRITO add
constraint pk_distrito
primary key(distrito_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE DISTRITO ADD CONSTRAINT FK_CANTON_DISTRITO
      FOREIGN KEY (canton_id) REFERENCES CANTON (canton_id);


CREATE SEQUENCE incremento_distrito
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a DISTRITO-----------------------------
ALTER TABLE DISTRITO add Fec_creacion DATE;
ALTER TABLE DISTRITO add Usuario_creacion VARCHAR2(10);
ALTER TABLE DISTRITO add Fec_ultima_modificacion DATE;
ALTER TABLE DISTRITO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DISTRITO-----------------------------
create or replace trigger beforeUpdate_distrito
  before update
  on DISTRITO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_distrito;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_distrito
  before insert
  on DISTRITO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_distrito;

-----------14-------Tabla Direccion_Exacta------------------------------------------	
CREATE TABLE DIRECCION_EXACTA
(direccion_exacta_id NUMBER(6),
 direccion_exacta VARCHAR2(200) CONSTRAINT dir_exacta_dir_exacta_nn NOT NULL,
 distrito_id NUMBER(6)

);

COMMENT ON TABLE DIRECCION_EXACTA
IS 'En esta tabla se almacenan las direcciones';

COMMENT ON COLUMN DIRECCION_EXACTA.direccion_exacta_id
IS 'Identificador de la dirección';

COMMENT ON COLUMN DIRECCION_EXACTA.direccion_exacta
IS 'Descripción de la dirección';

COMMENT ON COLUMN DIRECCION_EXACTA.distrito_id
IS 'Identificador del distrito, es un foreign key de la tabla DISTRITO';


AlTER TABLE DIRECCION_EXACTA add
constraint pk_direccion_exacta
primary key(direccion_exacta_id)
using index

      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE DIRECCION_EXACTA ADD CONSTRAINT FK_DISTRITO_DIRECCION_EXACTA
      FOREIGN KEY (distrito_id) REFERENCES DISTRITO(distrito_id);

CREATE SEQUENCE incremento_direccion_exacta
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a DIRECCION_EXACTA-----------------------------
ALTER TABLE DIRECCION_EXACTA add Fec_creacion DATE;
ALTER TABLE DIRECCION_EXACTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE DIRECCION_EXACTA add Fec_ultima_modificacion DATE;
ALTER TABLE DIRECCION_EXACTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DIRECCION_EXACTA-----------------------------
create or replace trigger beforeUpdate_direccion_exacta
  before update
  on DIRECCION_EXACTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_direccion_exacta;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_direccion_exacta
  before insert
  on DIRECCION_EXACTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_direccion_exacta;

------15--------------Tabla Estado_Mascota--------------------------------
CREATE TABLE ESTADO_MASCOTA
(estado_mascota_id NUMBER(6),
 estado_mascota VARCHAR2(45) CONSTRAINT est_mascota_est_mascota_nn NOT NULL
);

COMMENT ON TABLE ESTADO_MASCOTA
IS 'En esta tabla se almacenan los estados de la mascota';

COMMENT ON COLUMN ESTADO_MASCOTA.estado_mascota_id
IS 'Identificador del estado de la mascota';

COMMENT ON COLUMN ESTADO_MASCOTA.estado_mascota
IS 'Estado de la mascota';


AlTER TABLE ESTADO_MASCOTA add
constraint pk_estado_mascota
primary key(estado_mascota_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



CREATE SEQUENCE incremento_estado_mascota
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a ESTADO_MASCOTA-----------------------------
ALTER TABLE ESTADO_MASCOTA add Fec_creacion DATE;
ALTER TABLE ESTADO_MASCOTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE ESTADO_MASCOTA add Fec_ultima_modificacion DATE;
ALTER TABLE ESTADO_MASCOTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers ESTADO_MASCOTA-----------------------------
create or replace trigger beforeUpdate_estado_mascota
  before update
  on ESTADO_MASCOTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_estado_mascota;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_estado_mascota
  before insert
  on ESTADO_MASCOTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_estado_mascota;


--------------16----Tabla Severidad---------------------------------------------
CREATE TABLE SEVERIDAD
(severidad_id NUMBER(6),
 severidad VARCHAR2(45) CONSTRAINT severidad_severidad_nn NOT NULL

);

COMMENT ON TABLE SEVERIDAD
IS 'En esta tabla se almacena la severidad de las mascotas';

COMMENT ON COLUMN SEVERIDAD.severidad_id
IS 'Identificador de la severidad';

COMMENT ON COLUMN SEVERIDAD.severidad
IS 'Severidad de la mascota';

AlTER TABLE SEVERIDAD add
constraint pk_severidad
primary key(severidad_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



CREATE SEQUENCE incremento_severidad
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a SEVERIDAD-----------------------------
ALTER TABLE SEVERIDAD add Fec_creacion DATE;
ALTER TABLE SEVERIDAD add Usuario_creacion VARCHAR2(10);
ALTER TABLE SEVERIDAD add Fec_ultima_modificacion DATE;
ALTER TABLE SEVERIDAD add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers SEVERIDAD-----------------------------
create or replace trigger beforeUpdate_severidad
  before update
  on SEVERIDAD
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_severidad;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_severidad
  before insert
  on SEVERIDAD
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_severidad;

-------------17----------Tabla facilidad_Entrenamiento-----------------------------
CREATE TABLE FACILIDAD_ENTRENAMIENTO
(facilidad_entrenamiento_id NUMBER(6),
 facilidad_entrenamiento VARCHAR2(45) CONSTRAINT fac_entre_fac_entre_nn NOT NULL

);

COMMENT ON TABLE FACILIDAD_ENTRENAMIENTO
IS 'En esta tabla se almacena la facilidad de entrenamiento de una mascota';

COMMENT ON COLUMN FACILIDAD_ENTRENAMIENTO.facilidad_entrenamiento_id
IS 'Identificador de la facilidad de entrenamiento';

COMMENT ON COLUMN FACILIDAD_ENTRENAMIENTO.facilidad_entrenamiento
IS 'Facilidad de entrenamiento de la mascota';



AlTER TABLE FACILIDAD_ENTRENAMIENTO add
constraint pk_facilidad_entrenamiento
primary key(facilidad_entrenamiento_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



CREATE SEQUENCE incremento_entrenamiento
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a FACILIDAD_ENTRENAMIENTO-----------------------------
ALTER TABLE FACILIDAD_ENTRENAMIENTO add Fec_creacion DATE;
ALTER TABLE FACILIDAD_ENTRENAMIENTO add Usuario_creacion VARCHAR2(10);
ALTER TABLE FACILIDAD_ENTRENAMIENTO add Fec_ultima_modificacion DATE;
ALTER TABLE FACILIDAD_ENTRENAMIENTO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers FACILIDAD_ENTRENAMIENTO---------------------------
create or replace trigger beforeUpdate_entrenamiento
  before update
  on FACILIDAD_ENTRENAMIENTO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_entrenamiento;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_entrenamiento
  before insert
  on FACILIDAD_ENTRENAMIENTO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_entrenamiento;

--------18-----------------Tabla TAMANIO---------------------------------------
CREATE TABLE TAMANIO
(tamanio_id NUMBER(6),
 tamanio VARCHAR2(45) CONSTRAINT tamanio_tamanio_nn NOT NULL

);

COMMENT ON TABLE TAMANIO
IS 'En esta tabla se almacenan los tamaños de las mascotas';

COMMENT ON COLUMN TAMANIO.tamanio_id
IS 'Identificador del tamaño';

COMMENT ON COLUMN TAMANIO.tamanio
IS 'Tamaño de la mascota';


AlTER TABLE TAMANIO add
constraint pk_tamanio
primary key(tamanio_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



CREATE SEQUENCE incremento_tamanio
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a TAMANIO -----------------------------
ALTER TABLE TAMANIO add Fec_creacion DATE;
ALTER TABLE TAMANIO add Usuario_creacion VARCHAR2(10);
ALTER TABLE TAMANIO add Fec_ultima_modificacion DATE;
ALTER TABLE TAMANIO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers TAMANIO---------------------------
create or replace trigger beforeUpdate_tamanio
  before update
  on TAMANIO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_tamanio;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_tamanio
  before insert
  on TAMANIO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_tamanio;

----------19----------------Tabla TIPO_MASCOTA-----------------------------------
CREATE TABLE TIPO_MASCOTA
	(tipo_mascota_id NUMBER(6),
	 tipo_mascota VARCHAR2(45) CONSTRAINT tipo_mascota_tipo_mascota_nn NOT NULL

	);

	COMMENT ON TABLE TIPO_MASCOTA
	IS 'En esta tabla se almacenan los tipos de las mascotas';

	COMMENT ON COLUMN TIPO_MASCOTA.tipo_mascota_id
	IS 'Identificador del tipo de mascota';

	COMMENT ON COLUMN TIPO_MASCOTA.tipo_mascota
	IS 'Nombre del tipo de mascota';

	AlTER TABLE TIPO_MASCOTA add
	constraint pk_tipo_mascota
	primary key(tipo_mascota_id)
	using index
	      tablespace Proy_ind pctfree 20
	      storage (initial 10K next 10K pctincrease 0);



	CREATE SEQUENCE incremento_tipo_mascota_id
	INCREMENT BY 1
	START WITH 1
	MAXVALUE 1000

-----------------------Agregar campos a TIPO_MASCOTA -----------------------------
ALTER TABLE TIPO_MASCOTA add Fec_creacion DATE;
ALTER TABLE TIPO_MASCOTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE TIPO_MASCOTA add Fec_ultima_modificacion DATE;
ALTER TABLE TIPO_MASCOTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers TIPO_MASCOTA---------------------------
create or replace trigger beforeUpdate_tipo_mascota
  before update
  on TIPO_MASCOTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_tipo_mascota;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_tipo_mascota
  before insert
  on TIPO_MASCOTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_tipo_mascota;


----------20--------------Tabla RAZA-------------------------------
CREATE TABLE RAZA
(raza_id NUMBER(6),
 raza VARCHAR2(45) CONSTRAINT raza_raza_nn NOT NULL,
 tipo_mascota_id NUMBER(6)

);


COMMENT ON TABLE RAZA
IS 'En esta tabla se almacenan las razas de las mascotas';

COMMENT ON COLUMN RAZA.raza_id
IS 'Identificador de la raza';

COMMENT ON COLUMN RAZA.raza
IS 'Nombre de la raza';

COMMENT ON COLUMN RAZA.tipo_mascota_id
IS 'Identificador del tipo de mascota al que pertenece la raza, es un foreign key de la tabla TIPO_MASCOTA';


AlTER TABLE RAZA add
constraint pk_raza
primary key(raza_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE RAZA ADD CONSTRAINT FK_TIPO_MASCOTA_RAZA
      FOREIGN KEY (tipo_mascota_id) REFERENCES TIPO_MASCOTA (tipo_mascota_id);

CREATE SEQUENCE incremento_raza
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a RAZA -----------------------------
ALTER TABLE RAZA add Fec_creacion DATE;
ALTER TABLE RAZA add Usuario_creacion VARCHAR2(10);
ALTER TABLE RAZA add Fec_ultima_modificacion DATE;
ALTER TABLE RAZA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers RAZA---------------------------
create or replace trigger beforeUpdate_raza
  before update
  on RAZA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_raza;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_raza
  before insert
  on RAZA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_raza

-----------21---------Tabla USUARIO---------------------------------
CREATE TABLE USUARIO
(usuario_id NUMBER(6),
nom_usuario VARCHAR2(45) CONSTRAINT usuario_nom_usuario_nn NOT NULL,
contrasenia VARCHAR2(45) CONSTRAINT persona_contrasenia_uk UNIQUE,
access_token VARCHAR2(300)
);

COMMENT ON TABLE USUARIO
IS 'En esta tabla se almacenan los datos del usuario de una persona';

COMMENT ON COLUMN USUARIO.usuario_id
IS 'Identificador del usuario';

COMMENT ON COLUMN USUARIO.nom_usuario
IS 'Nombre del usuario';

COMMENT ON COLUMN USUARIO.contrasenia
IS 'Contraseña del usuario';

COMMENT ON COLUMN USUARIO.access_token
IS 'Access token del usuario';


AlTER TABLE USUARIO add
constraint pk_usuario_id
primary key(usuario_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);



CREATE SEQUENCE incremento_usuario
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a USUARIO -----------------------------
ALTER TABLE USUARIO add Fec_creacion DATE;
ALTER TABLE USUARIO add Usuario_creacion VARCHAR2(10);
ALTER TABLE USUARIO add Fec_ultima_modificacion DATE;
ALTER TABLE USUARIO add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers USUARIO---------------------------
create or replace trigger beforeUpdate_usuario
  before update
  on USUARIO
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_usuario;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_usuario
  before insert
  on USUARIO
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_usuario

-------------22---------------Tabla PERSONA-----------------------------------
CREATE TABLE PERSONA(persona_id NUMBER(6),
 nombre VARCHAR2(45) CONSTRAINT persona_nombre_nn NOT NULL,
 apellidos VARCHAR2(45) CONSTRAINT persona_apellidos_nn NOT NULL,
 cedula VARCHAR2(300) CONSTRAINT persona_cedula_nn NOT NULL,
 direccion_exacta_id NUMBER(6) CONSTRAINT persona_direccion_exacta_nn NOT NULL,
 email VARCHAR2(45) 
 CONSTRAINT persona_email_nn NOT NULL,
 CONSTRAINT persona_email_uk UNIQUE(email),
 num_telefono_1 NUMBER(8),
 num_telefono_2 NUMBER(8),
 usuario_id NUMBER(6) CONSTRAINT persona_usuario_id_nn NOT NULL,
 estado_listaNegra VARCHAR(45) CONSTRAINT persona_estlistaNegra_nn NOT NULL,
 foto BLOB
);

COMMENT ON TABLE PERSONA
IS 'En esta tabla se almacenan los datos de las personas';

COMMENT ON COLUMN PERSONA.persona_id
IS 'Identificador de la persona';

COMMENT ON COLUMN PERSONA.nombre
IS 'Nombre de la persona';

COMMENT ON COLUMN PERSONA.apellidos
IS 'Apellidos de la persona';

COMMENT ON COLUMN PERSONA.cedula
IS 'Cédula de la persona';

COMMENT ON COLUMN PERSONA.direccion_exacta_id
IS 'Dirección del lugar donde vive la persona, es un foreign key de la tabla DIRECCION_EXACTA';

COMMENT ON COLUMN PERSONA.email
IS 'Email de la persona';

COMMENT ON COLUMN PERSONA.num_telefono_1
IS 'Telefono 1 de la persona';

COMMENT ON COLUMN PERSONA.num_telefono_2
IS 'Telefono 2 de la persona';

COMMENT ON COLUMN PERSONA.usuario_id
IS 'Identificador del usuario de la persona, es un foreign key de la tabla USUARIO';

COMMENT ON COLUMN PERSONA.estado_listaNegra
IS 'Estado que indica si una persona está o no en lista negra';

COMMENT ON COLUMN PERSONA.foto
IS 'Foto de la persona';


AlTER TABLE PERSONA add
constraint pk_persona_id
primary key(persona_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE PERSONA ADD CONSTRAINT FK_DIRECCION_EXACTA_PERSONA
      FOREIGN KEY (direccion_exacta_id) REFERENCES DIRECCION_EXACTA(direccion_exacta_id);


ALTER TABLE PERSONA ADD CONSTRAINT FK_USUARIO_PERSONA
      FOREIGN KEY (usuario_id) REFERENCES USUARIO(usuario_id);


CREATE SEQUENCE incremento_persona
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a PERSONA -----------------------------
ALTER TABLE PERSONA add Fec_creacion DATE;
ALTER TABLE PERSONA add Usuario_creacion VARCHAR2(10);
ALTER TABLE PERSONA add Fec_ultima_modificacion DATE;
ALTER TABLE PERSONA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers PERSONA---------------------------
create or replace trigger beforeUpdate_persona
  before update
  on PERSONA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_persona;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_persona
  before insert
  on PERSONA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_persona

---------------23------------------tabla Lista_Negra--------------------------------------------------------------
CREATE TABLE LISTANEGRA
(listaNegra_id NUMBER(6),
 persona_id NUMBER(6) CONSTRAINT listaNegra_persona_id_nn NOT NULL
 );

COMMENT ON TABLE LISTANEGRA
IS 'En esta tabla se almacenan las personas en lista negra';

COMMENT ON COLUMN LISTANEGRA.listaNegra_id
IS 'Identificador de la lista negra';

COMMENT ON COLUMN LISTANEGRA.persona_id
IS 'Identificador de la persona en lista negra, es un foreign key de la tabla PERSONA';

AlTER TABLE LISTANEGRA add
constraint pk_listaNegra_id
primary key(listaNegra_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE LISTANEGRA ADD CONSTRAINT FK_PERSONA_LISTANEGRA
      FOREIGN KEY (persona_id) REFERENCES PERSONA(persona_id);


CREATE SEQUENCE incremento_listaNegra
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a LISTANEGRA -----------------------------
ALTER TABLE LISTANEGRA add Fec_creacion DATE;
ALTER TABLE LISTANEGRA add Usuario_creacion VARCHAR2(10);
ALTER TABLE LISTANEGRA add Fec_ultima_modificacion DATE;
ALTER TABLE LISTANEGRA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers LISTANEGRA---------------------------
create or replace trigger beforeUpdate_listaNegra
  before update
  on LISTANEGRA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_listaNegra;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_listaNegra
  before insert
  on LISTANEGRA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_listaNegra

-----------------24---------------------Tabla RESCATISTA---------------------------------------------------------------
CREATE TABLE RESCATISTA
(rescatista_id NUMBER(6),
 persona_id NUMBER(6) CONSTRAINT rescatista_persona_id_nn NOT NULL
);


COMMENT ON TABLE RESCATISTA
IS 'En esta tabla se almacenan los datos del rescatista';

COMMENT ON COLUMN RESCATISTA.rescatista_id
IS 'Identificador del cantón';

COMMENT ON COLUMN RESCATISTA.persona_id
IS 'Identificador de la persona, es un foreign key de la tabla PERSONA';


AlTER TABLE RESCATISTA add
constraint pk_rescatista_id
primary key(rescatista_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE RESCATISTA ADD CONSTRAINT FK_PERSONA_RESCATISTA
      FOREIGN KEY (persona_id) REFERENCES PERSONA(persona_id);



CREATE SEQUENCE incremento_rescatista
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a RESCATISTA -----------------------------
ALTER TABLE RESCATISTA add Fec_creacion DATE;
ALTER TABLE RESCATISTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE RESCATISTA add Fec_ultima_modificacion DATE;
ALTER TABLE RESCATISTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers RESCATISTA---------------------------
create or replace trigger beforeUpdate_rescatista
  before update
  on RESCATISTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_rescatista;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_rescatista
  before insert
  on RESCATISTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_rescatista

--------------25-----------Tabla ADOPTANTE--------------------------------------------------------------------------
CREATE TABLE ADOPTANTE
(adoptante_id NUMBER(6),
 persona_id NUMBER(6) CONSTRAINT adoptante_persona_id_nn NOT NULL
 
);

COMMENT ON TABLE ADOPTANTE
IS 'En esta tabla se almacenan los datos del adoptante';

COMMENT ON COLUMN ADOPTANTE.adoptante_id
IS 'Identificador del adoptante';

COMMENT ON COLUMN ADOPTANTE.persona_id
IS 'Identificador de la persona, es un foreing key de la tabla PERSONA';


AlTER TABLE ADOPTANTE add
constraint pk_adoptante_id
primary key(adoptante_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);


ALTER TABLE ADOPTANTE ADD CONSTRAINT FK_PERSONA_ADOPTANTE
      FOREIGN KEY (persona_id) REFERENCES PERSONA(persona_id);



CREATE SEQUENCE incremento_adoptante
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a ADOPTANTE -----------------------------
ALTER TABLE ADOPTANTE add Fec_creacion DATE;
ALTER TABLE ADOPTANTE add Usuario_creacion VARCHAR2(10);
ALTER TABLE ADOPTANTE add Fec_ultima_modificacion DATE;
ALTER TABLE ADOPTANTE add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers ADOPTANTE---------------------------
create or replace trigger beforeUpdate_adoptante
  before update
  on ADOPTANTE
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_adoptante;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_adoptante
  before insert
  on ADOPTANTE
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_adoptante

----------------26------------------------Tabla FORMULARIOS_x_ADOPTANTE-----------------------------------------------------------------
CREATE TABLE FORMULARIOS_X_ADOPTANTE (
adoptante_id NUMBER(6),
tipo_formulario_id NUMBER(6),
respuesta_id NUMBER(6)
);

ALTER TABLE FORMULARIOS_X_ADOPTANTE add
constraint pk_f_x_a
primary key(adoptante_id, tipo_formulario_id, respuesta_id)
using index
      tablespace proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_adoptante_f_x_a
	FOREIGN KEY(adoptante_id) 
	REFERENCES ADOPTANTE(adoptante_id);

ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_tipo_formulario_f_x_a
	FOREIGN KEY(tipo_formulario_id) 
	REFERENCES TIPO_FORMULARIO(tipo_formulario_id);


ALTER TABLE FORMULARIOS_X_ADOPTANTE ADD CONSTRAINT fk_respuesta_f_x_a
	FOREIGN KEY(respuesta_id) 
	REFERENCES RESPUESTA(respuesta_id);

-----------------------Agregar campos a FORMULARIOS_X_ADOPTANTE -----------------------------
ALTER TABLE FORMULARIOS_X_ADOPTANTE add Fec_creacion DATE;
ALTER TABLE FORMULARIOS_X_ADOPTANTE add Usuario_creacion VARCHAR2(10);
ALTER TABLE FORMULARIOS_X_ADOPTANTE add Fec_ultima_modificacion DATE;
ALTER TABLE FORMULARIOS_X_ADOPTANTE add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers FORMULARIOS_X_ADOPTANTE---------------------------
create or replace trigger beforeUpdate_f_x_a
  before update
  on FORMULARIOS_X_ADOPTANTE
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_f_x_a;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_f_x_a
  before insert
  on FORMULARIOS_X_ADOPTANTE
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_f_x_a

------------------27----------------------Tabla MASCOTA-------------------------------------------
CREATE TABLE MASCOTA(
mascota_id NUMBER(6),
nombre VARCHAR2(45),
direccion_exacta_id NUMBER(6),
severidad_id NUMBER(6),
estado_mascota_id NUMBER(6),
enfermedad_id NUMBER(6),
requiere_espacion Number(1) CONSTRAINT mascota_requiere_espacio_nn NOT NULL,
foto_antes BLOB,
foto_despues BLOB,
veterinario VARCHAR2(45),
descripción VARCHAR2(45),
nota_adicional VARCHAR2(100),
fecha DATE CONSTRAINT mascota_fecha_nn NOT NULL,
raza_id NUMBER(6),
nivel_energia_id NUMBER(5),
color_id NUMBER(6),
tamanio_id NUMBER(6),
facilidad_entrenamiento_id NUMBER(6),
rescatista_id NUMBER(6)

);

ALTER TABLE MASCOTA ADD
CONSTRAINT pk_mascota
PRIMARY KEY(mascota_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_direccion_exacta_mascota
FOREIGN KEY(direccion_exacta_id)
REFERENCES DIRECCION_EXACTA(direccion_exacta_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_severidad_mascota
FOREIGN KEY(severidad_id)
REFERENCES SEVERIDAD(severidad_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_estado_mascota_mascota 
FOREIGN KEY(estado_mascota_id)
REFERENCES ESTADO_MASCOTA(estado_mascota_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_enfermedad_mascota
FOREIGN KEY(enfermedad_id)
REFERENCES ENFERMEDAD(enfermedad_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_raza_mascota
FOREIGN KEY(raza_id)
REFERENCES RAZA(raza_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_nivel_energia_mascota
FOREIGN KEY(nivel_energia_id)
REFERENCES NIVEL_ENERGIA(nivel_energia_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_color_mascota
FOREIGN KEY(color_id)
REFERENCES COLOR(color_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_tamanio_mascota
FOREIGN KEY(tamanio_id)
REFERENCES TAMANIO(tamanio_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_fac_entre_mascota
FOREIGN KEY(facilidad_entrenamiento_id)
REFERENCES FACILIDAD_ENTRENAMIENTO(facilidad_entrenamiento_id);

ALTER TABLE MASCOTA ADD
CONSTRAINT fk_rescatista_mascota
FOREIGN KEY(rescatista_id)
REFERENCES RESCATISTA(rescatista_id);

CREATE SEQUENCE incremento_mascota
INCREMENT BY 1
START WITH 1
MAXVALUE 1000;

-----------------------Agregar campos a MASCOTA -----------------------------
ALTER TABLE MASCOTA add Fec_creacion DATE;
ALTER TABLE MASCOTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE MASCOTA add Fec_ultima_modificacion DATE;
ALTER TABLE MASCOTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers MASCOTA---------------------------
create or replace trigger beforeUpdate_mascota
  before update
  on MASCOTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_mascota;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_mascota
  before insert
  on MASCOTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_mascota

--------------------28------------------Tabla ADOPCIONES_X_MASCOTA------------------------------------
CREATE TABLE ADOPCIONES_X_MASCOTA(
adopciones_x_mascota_id NUMBER(6),
adoptante_id NUMBER(6),
mascota_id NUMBER(6)
);

ALTER TABLE ADOPCIONES_X_MASCOTA ADD
CONSTRAINT pk_adopciones_x_mascota
PRIMARY KEY(adopciones_x_mascota_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE ADOPCIONES_X_MASCOTA ADD
CONSTRAINT fk_adoptante_a_x_m
FOREIGN KEY(adoptante_id) 
REFERENCES ADOPTANTE(adoptante_id);

ALTER TABLE ADOPCIONES_X_MASCOTA ADD
CONSTRAINT fk_mascota_a_x_m
FOREIGN KEY(mascota_id) 
REFERENCES MASCOTA(mascota_id);

CREATE SEQUENCE incremento_adop_x_mascota
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a ADOPCIONES_X_MASCOTA -----------------------------
ALTER TABLE ADOPCIONES_X_MASCOTA add Fec_creacion DATE;
ALTER TABLE ADOPCIONES_X_MASCOTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE ADOPCIONES_X_MASCOTA add Fec_ultima_modificacion DATE;
ALTER TABLE ADOPCIONES_X_MASCOTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers ADOPCIONES_X_MASCOTA---------------------------
create or replace trigger beforeUpdate_a_x_m
  before update
  on ADOPCIONES_X_MASCOTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_a_x_m;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_a_x_m
  before insert
  on ADOPCIONES_X_MASCOTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_a_x_m

-----------29-----------Tabla Causa----------------------------
CREATE TABLE CAUSA(
causa_id NUMBER(6),
causa VARCHAR(60) CONSTRAINT causa_causa_nn NOT NULL
); 

ALTER TABLE CAUSA ADD
CONSTRAINT pk_causa
PRIMARY KEY(causa_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);
      
      
CREATE SEQUENCE incremento_causa
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a CAUSA -----------------------------
ALTER TABLE CAUSA add Fec_creacion DATE;
ALTER TABLE CAUSA add Usuario_creacion VARCHAR2(10);
ALTER TABLE CAUSA add Fec_ultima_modificacion DATE;
ALTER TABLE CAUSA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers CAUSA---------------------------
create or replace trigger beforeUpdate_causa
  before update
  on CAUSA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_causa;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_causa
  before insert
  on CAUSA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_causa

-------------30-----------Tabla DEVOLUCIONES_X_MACOTA-------------------------------
CREATE TABLE DEVOLUCIONES_X_MASCOTA(
devoluciones_x_mascota_id NUMBER(6),
adoptante_id NUMBER(6),
mascota_id NUMBER(6),
causa_id NUMBER(6)
);

ALTER TABLE DEVOLUCIONES_X_MASCOTA ADD
CONSTRAINT pk_devoluciones_x_mascota
PRIMARY KEY(devoluciones_x_mascota_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

ALTER TABLE DEVOLUCIONES_X_MASCOTA ADD
CONSTRAINT fk_adoptante_d_x_m
FOREIGN KEY(adoptante_id) 
REFERENCES ADOPTANTE(adoptante_id);

ALTER TABLE DEVOLUCIONES_X_MASCOTA ADD
CONSTRAINT fk_mascota_d_x_m
FOREIGN KEY(mascota_id) 
REFERENCES MASCOTA(mascota_id);

ALTER TABLE DEVOLUCIONES_X_MASCOTA ADD
CONSTRAINT fk_causa_d_x_m
FOREIGN KEY(causa_id) 
REFERENCES CAUSA(causa_id);


CREATE SEQUENCE incremento_devo_x_mascota
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a DEVOLUCIONES_X_MASCOTA -----------------------------
ALTER TABLE DEVOLUCIONES_X_MASCOTA add Fec_creacion DATE;
ALTER TABLE DEVOLUCIONES_X_MASCOTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE DEVOLUCIONES_X_MASCOTA add Fec_ultima_modificacion DATE;
ALTER TABLE DEVOLUCIONES_X_MASCOTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DEVOLUCIONES_X_MASCOTA---------------------------
create or replace trigger beforeUpdate_d_x_m
  before update
  on DEVOLUCIONES_X_MASCOTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_d_x_m;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_d_x_m
  before insert
  on DEVOLUCIONES_X_MASCOTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_d_x_m

---------------31-------Tabla GRUPO_RESCATISTA---------------------------------------
CREATE TABLE GRUPO_RESCATISTA (
grupo_rescatista_id NUMBER(6),
rescatista_id NUMBER(6)
);

ALTER TABLE GRUPO_RESCATISTA ADD
CONSTRAINT pk_grupo_rescatista
PRIMARY KEY(grupo_rescatista_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

AlTER TABLE GRUPO_RESCATISTA ADD
CONSTRAINT fk_rescatista_grupo_rescatista
FOREIGN KEY(rescatista_id)
REFERENCES RESCATISTA(rescatista_id);


CREATE SEQUENCE incremento_grupo_rescatista_id
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a GRUPO_RESCATISTA -----------------------------
ALTER TABLE GRUPO_RESCATISTA add Fec_creacion DATE;
ALTER TABLE GRUPO_RESCATISTA add Usuario_creacion VARCHAR2(10);
ALTER TABLE GRUPO_RESCATISTA add Fec_ultima_modificacion DATE;
ALTER TABLE GRUPO_RESCATISTA add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DEVOLUCIONES_X_MASCOTA---------------------------
create or replace trigger beforeUpdate_grupo_res
  before update
  on GRUPO_RESCATISTA
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_grupo_res;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_grupo_res
  before insert
  on GRUPO_RESCATISTA
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_grupo_res

-------------32--Tabla CALIFICADOR--------------------------------------------------------
CREATE TABLE CALIFICADOR (
calificador_id NUMBER(6),
calificador VARCHAR2(45) CONSTRAINT calificador_calificador_nn NOT NULL
);

ALTER TABLE CALIFICADOR ADD
CONSTRAINT pk_calificador
PRIMARY KEY(calificador_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

CREATE SEQUENCE incremento_calificador
INCREMENT BY 1
START WITH 1
MAXVALUE 1000


-----------------------Agregar campos a CALIFICADOR -----------------------------
ALTER TABLE CALIFICADOR add Fec_creacion DATE;
ALTER TABLE CALIFICADOR add Usuario_creacion VARCHAR2(10);
ALTER TABLE CALIFICADOR add Fec_ultima_modificacion DATE;
ALTER TABLE CALIFICADOR add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DEVOLUCIONES_X_MASCOTA---------------------------
create or replace trigger beforeUpdate_calificador
  before update
  on CALIFICADOR
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_calificador;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_calificador
  before insert
  on CALIFICADOR
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_calificador

-----------32----tabla CALIFICACION-----------------------------------------------
CREATE TABLE CALIFICACION(
calificacion_id NUMBER(6),
calificacion NUMBER(2) CONSTRAINT calificacion_calificacion_nn NOT NULL,
calificador_id NUMBER(6)
);

ALTER TABLE CALIFICACION ADD
CONSTRAINT pk_calificacion
PRIMARY KEY(calificacion_id)
using index
      tablespace Proy_ind pctfree 20
      storage (initial 10K next 10K pctincrease 0);

AlTER TABLE CALIFICACION ADD
CONSTRAINT fk_calificador_calificacion
FOREIGN KEY(calificador_id)
REFERENCES CALIFICADOR(calificador_id);

CREATE SEQUENCE incremento_calificacion
INCREMENT BY 1
START WITH 1
MAXVALUE 1000

-----------------------Agregar campos a CALIFICACION -----------------------------
ALTER TABLE CALIFICACION add Fec_creacion DATE;
ALTER TABLE CALIFICACION add Usuario_creacion VARCHAR2(10);
ALTER TABLE CALIFICACION add Fec_ultima_modificacion DATE;
ALTER TABLE CALIFICACION add Usuario_ultima_modificacion VARCHAR2(10);

------------------------------Triggers DEVOLUCIONES_X_MASCOTA---------------------------
create or replace trigger beforeUpdate_calificacion
  before update
  on CALIFICACION
  for each row
begin
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeUpdate_calificacion;
--------------------------------------------------------------------------
create or replace trigger beforeInsert_calificacion
  before insert
  on CALIFICADOR
  for each row
begin
    :new.fec_creacion := sysdate;
    :new.usuario_creacion := user;
    :new.fec_ultima_modificacion := sysdate;
    :new.usuario_ultima_modificacion := user;
end beforeInsert_calificacion