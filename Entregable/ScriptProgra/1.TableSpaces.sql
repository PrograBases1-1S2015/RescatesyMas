CREATE TABLESPACE Proy_Data
DATAFILE 'C:\app\Soto\oradata\dbprueba\Proydata01.dbf'
SIZE 10M
REUSE
AUTOEXTEND ON
NEXT 512
MAXSIZE 200M;
--
-- PE: INDEX
--
CREATE TABLESPACE Proy_Ind
DATAFILE 'C:\app\Soto\oradata\dbprueba\Proyind01.dbf'
SIZE 10M
REUSE
AUTOEXTEND ON
NEXT 512k
MAXSIZE 200M;
