--1.-------------------------------Agregar enfermedades------------------------
----------Enfermedades perros-------------------
insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Demodicosis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Ehrliquiosis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Dirofilariosis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Parasitosis externa'); --Perros y gatos---

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Parasitosis interna');---Perros y gatos---

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Artritis canina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Moquillo canino');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Leishmaniosis canina.');
-----------------Enfermedades gatos-------------------------------------
insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Virus de la inmunodeficiencia felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Virus de la leucemia felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Alopecia felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Artrosis felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Rabia felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Leucemia felina');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Bronconeumonía');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Conjuntivitis');

--------------------------------Enfermedades conejos----------------------

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Enfermedad hemorrágica del conejo');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Pasterelosis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Tarsos ulcerados');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Coccidiosis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Invaginación de los párpados');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Mastitis');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Tularemia');

--------------------Enfermedades de hamsters------------------------------

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Abscesos');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Estreñimiento');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Irritación en los ojos');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Enfermedad de cola humeda');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Labios irritados');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Tumores');

insert into enfermedad(enfermedad_id,enfermedad)
values(incremento_enfermedad.nextval,'Bronquitis');
select * from enfermedad
--2.------------------------------Agregar Tratamientos------------------------------
insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Unguento',1);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Aerosoles',1);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Pastillas',2);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Parches activos',2);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Inyección',2);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Medicamento de uso Tópico',3);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Champú antiseborréico',3);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Ayuno',9);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Dieta Balanceada',4);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Hidratación',4);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Quimioterapia',8);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Hospitalización',5);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Diálisis',5);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Trasplante',6);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Fluidoterapia',6);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Suministro de fluído subcutáneo',7);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Antibiótico',7);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Antiparasitario',8);

insert into tratamiento(tratamiento_id,tratamiento,enfermedad_id)
values(incremento_tratamiento.nextval,'Terapia',9);
select * from tratamiento

---3.---------------------------Agregar Medicamentos-------------------------------
insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Amitraz',1);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Doxicilina',1);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Moxidectina',2);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Imidacloprid',2);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Ivermectina',3);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Milbemicina Oxima',3);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Selamectina',4);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Piperazina',4);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Nitroimidazoles',5);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Tinidazol',5);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Metronidazol',6);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Paromomicina',6);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Nitazoxanida',7);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Timol',7);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Flumetrina',8);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Oxalico Acido',10);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Tau Fluvalinato',9);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Cumafos',9);

insert into medicamento(medicamento_id,medicamento,tratamiento_id)
values(incremento_medicamento.nextval,'Acido Formico',10);
select * from medicamento
---4.--------------------------Agregar Severidad-----------------------------------
insert into severidad(severidad_id,severidad)
values(incremento_severidad.nextval,'Crítico');

insert into severidad(severidad_id,severidad)
values(incremento_severidad.nextval,'Buen estado');

insert into severidad(severidad_id,severidad)
values(incremento_severidad.nextval,'Mal estado');
select * from severidad
----5.-----------------------Agregar estado de la mascota----------------------------

insert into estado_mascota(estado_mascota_id,estado_mascota)
values(incremento_estado_mascota.nextval,'En adopción');

insert into estado_mascota(estado_mascota_id,estado_mascota)
values(incremento_estado_mascota.nextval,'Adoptado');
select * from estado_mascota
---6.----------------------Agregar tipo de mascotas--------------------------------
insert into tipo_mascota(tipo_mascota_id,tipo_mascota)
values(incremento_tipo_mascota_id.nextval,'Perro');

insert into tipo_mascota(tipo_mascota_id,tipo_mascota)
values(incremento_tipo_mascota_id.nextval,'Gato');

insert into tipo_mascota(tipo_mascota_id,tipo_mascota)
values(incremento_tipo_mascota_id.nextval,'Conejo');

insert into tipo_mascota(tipo_mascota_id,tipo_mascota)
values(incremento_tipo_mascota_id.nextval,'Hámster');
select * from tipo_mascota
---7.-----------------Agregar Razas-----------------------------------------------
-----Perros----------------------------
insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Chihuahua',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Papillón',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pomeranian',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Maltés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Yorkshire terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bichón Frisé',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'West Highland White Terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Boston terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bulldog inglés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bulldog francés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pug',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Terrier escocés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Shih Tzu',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Basset Hound',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Dachshund',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Poodle toy',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Schnauzer miniatura',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Cocker Spaniel Inglés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bull terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pinscher miniatura',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Jack Russel terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Fox terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Beagle',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Border collie',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Boxer',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pastor Alemán',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Labrador Retriever',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Golden Retriever',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Afgano',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Galgo',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'American Staffordshire terrier',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Dálmata',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Blood Hound',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Husky Siberiano',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pastor Australiano',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Doberman',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Shetland',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Rottweiler',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Rhodesian ridgeback',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Dogo Argentino',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Gran Danés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Viejo Pastor Inglés',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Mastín Napolitano',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Terranova',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Akita Inu',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'San Bernardo',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Weimeraner',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Chow chow',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Shar pei',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Grande de los pirineos',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Samoyedo',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Pointer',1);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Caniche',1);

------------------Gatos---------------------------------------

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Angora',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Persa',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Siamés',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bengala',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'British Shorthair',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Maine Coon',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Ragdoll',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Exótico',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Sphynx',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'American Shorthair',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Scottish Fold',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bosque de Noruega',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Burmés',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Siberiano',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Abisinio',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Angora Turco',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Sagrado de Birmania',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Himalayo',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Manx',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Munchkin',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Atigrado',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Azul ruso',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bobtail Americano',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bombay',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Chartreux',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Cornish rex',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Cornish rex',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Devon rex',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Bobtail japonés',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Mau egipcio',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Curl Americano',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Korat',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Colorpoint Shorthair',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Ocicat',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Snowshoe',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Ragamuffin',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Burmilla',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Chausie',2);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Singapura',2);


---------------------------Conejos---------------------------------
insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Netherland Dwarf',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Polish',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Dwarf Hotot',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Holland Dwarf',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Daisy Dwarf',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Jersey Woolly',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Daisy Angora',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Hare Dwarf',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Dutch',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Mini Arlequín',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Mini Rex',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Lion Head',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Holland Lop',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Mini Lop',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'American Fuzzy Lop',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Daisy',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Rex',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'English Lop',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Neocelandés',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Gigante de Flandes',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Angora Ingles',3);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Arlequín',3);

------------------Hamsters-----------------------------------------------
insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Común, dorado o sirio',4);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Ruso',4);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Campbell',4);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Chino',4);

insert into raza(raza_id,raza,tipo_mascota_id)
values(incremento_raza.nextval,'Roborowski',4);

---8.------------------Agregar nivel de energia-----------------
insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Peligrosamente bajo');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Muy bajo');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Bajo');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Poco bajo');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Normal');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Poco alto');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Alto');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Muy Alto');

insert into nivel_energia(nivel_energia_id,nivel_energia)
values(incremento_nivel_energia.nextval,'Peligrosamente alto');
select * from raza
---9.------------------Agregar Color--------------------------

insert into color(color_id,color)
values(incremento_color.nextval,'Blanco');

insert into color(color_id,color)
values(incremento_color.nextval,'Negro');

insert into color(color_id,color)
values(incremento_color.nextval,'Cafe claro');

insert into color(color_id,color)
values(incremento_color.nextval,'Cafe oscuro');

insert into color(color_id,color)
values(incremento_color.nextval,'Naranja');

insert into color(color_id,color)
values(incremento_color.nextval,'Negro con blanco');

insert into color(color_id,color)
values(incremento_color.nextval,'Cafe con blanco');

insert into color(color_id,color)
values(incremento_color.nextval,'Negro con cafe');

insert into color(color_id,color)
values(incremento_color.nextval,'Cafe con negro y blanco');

insert into color(color_id,color)
values(incremento_color.nextval,'Gris con blanco');

insert into color(color_id,color)
values(incremento_color.nextval,'Gris');

insert into color(color_id,color)
values(incremento_color.nextval,'Napolitano con chocolate');

insert into color(color_id,color)
values(incremento_color.nextval,'Gris con cafe');

insert into color(color_id,color)
values(incremento_color.nextval,'Gris con negro');

insert into color(color_id,color)
values(incremento_color.nextval,'Amarillo');
select * from color
---10.------------------Agregar Tamaño----------------------------

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'5-10cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'10-15cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'15-20cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'20-25cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'25-30cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'30-35cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'35-40cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'40-45cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'45-50cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'50-55cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'55-60cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'60-65cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'65-70cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'70-75cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'75-80cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'80-85cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'85-90cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'90-95cm');

insert into Tamanio(tamanio_id,tamanio)
values(incremento_tamanio.nextval,'95-100cm');
select * from tamanio
---11.---------------Agregar facilidad de entrenamiento-----------------------

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Sabe Hablar');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Aprende Solo');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Muy Facil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Facil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Menos Facil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Medio');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Menos Dificil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Dificil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'Muy Dificil');

insert into Facilidad_Entrenamiento(facilidad_entrenamiento_id,facilidad_entrenamiento)
values(incremento_entrenamiento.nextval,'No hace caso del todo');
select * from Facilidad_Entrenamiento
