CREATE USER proyecto
IDENTIFIED BY proyecto
DEFAULT TABLESPACE proy_data 
QUOTA 10M ON proy_data 
TEMPORARY TABLESPACE temp
QUOTA 5M ON system;
-------Permisos de Proyecto-----------
grant connect to proyecto;
grant create table to proyecto;
grant create sequence to proyecto;
grant create trigger to proyecto;
grant create procedure to proyecto;
grant unlimited tablespace to proyecto;
