drop table PUNTUACION;
drop table CORRE;
drop table PILOTO;
drop table TRAMO;
drop table RALLY;
drop table COCHE;


create table RALLY (
codRally char(4),
nombre varchar(50) not null,
pais varchar(20) not null,
fecha date not null,
CONSTRAINT rallyClave PRIMARY KEY (codRally),
CONSTRAINT nombreUnico UNIQUE (nombre),
CONSTRAINT fechaValida CHECK (fecha >= to_date('01/01/2015','dd/mm/yyyy') AND 
fecha <= to_date('31/12/2015','dd/mm/yyyy')) );


create table TRAMO (
codTramo char(5),
totalKms decimal (5,2) not null,
dificultad char(1),
codRally char(4),
CONSTRAINT tramoClave PRIMARY KEY (codTramo),
CONSTRAINT valorDificultad CHECK (dificultad IN ('A','B','C')),
CONSTRAINT tramoAjena FOREIGN KEY (codRally) REFERENCES Rally (codRally) on 
delete cascade);


create table COCHE (
codCoche char(4),
marca char(10),
modelo char(20),
cilindrada integer,
CONSTRAINT cocheClave PRIMARY KEY (codCoche));


create table PILOTO (
codPiloto char (4),
nombreP char(50) not null,
grupoS char(2),
rh char(1),
nombreCop char(50) not null,
coche char(4) not null,
CONSTRAINT pilotoClave PRIMARY KEY (codPiloto),
CONSTRAINT pilotoAjena FOREIGN KEY (coche) REFERENCES Coche (codCoche),
CONSTRAINT valorGrupoS CHECK (grupoS IN ('A','B','0','AB')),
CONSTRAINT valorRh CHECK (rh IN ('+','-')),
CONSTRAINT pilotoUnico UNIQUE (nombreP),
CONSTRAINT copilotoUnico UNIQUE (nombreCop),
CONSTRAINT cocheUnico UNIQUE (coche));

create table POSICION(
codRally char(4),
codPiloto char(4),
posicion integer not null,
CONSTRAINT posicionClave PRIMARY KEY (codRally,codPiloto),
CONSTRAINT posicionAjena1 FOREIGN KEY (codRally) REFERENCES Rally(codRally),
CONSTRAINT posicionAjena2 FOREIGN KEY (codPiloto) REFERENCES 
Piloto(codPiloto));

create table CORRE (
codPiloto char(4),
codTramo char(5),
tiempo integer not null,
CONSTRAINT correClave PRIMARY KEY (codPiloto,codTramo),
CONSTRAINT correAjena1 FOREIGN KEY (codTramo) REFERENCES Tramo 
(codTramo),
CONSTRAINT correnAjena2 FOREIGN KEY (codPiloto) REFERENCES Piloto (codPiloto),
CONSTRAINT tiempoPositivo CHECK (tiempo>=0));


commit;

insert into RALLY values ('R001','Rally de Montecarlo','Mónaco',STR_TO_DATE('22-01-2015','%d-%m-%Y'));
insert into RALLY values ('R002','Rally Sweden','Suecia',STR_TO_DATE('12-02-2015','%d-%m-%Y'));
insert into RALLY values ('R003','Rally Guanajuato México','México',STR_TO_DATE('05-03-2015','%d-%m-%Y'));
insert into RALLY values ('R004','Rally Argentina','Argentina',STR_TO_DATE('23-04-2015','%d-%m-%Y'));
insert into RALLY values ('R005','Vodafone Rally de Portugal','Portugal',STR_TO_DATE('21-05-2015','%d-%m-%Y'));
insert into RALLY values ('R006','Rally Italia Sardegna','Italia',STR_TO_DATE('11-06-2015','%d-%m-%Y'));


insert into TRAMO values ('T1-R1',50,'A','R001');
insert into TRAMO values ('T2-R1',40,'B','R001');
insert into TRAMO values ('T3-R1',30,'A','R001');

insert into TRAMO values ('T1-R2',50,'A','R002');
insert into TRAMO values ('T2-R2',40,'B','R002');


insert into TRAMO values ('T1-R3',50,'A','R003');
insert into TRAMO values ('T2-R3',40,'B','R003');
insert into TRAMO values ('T3-R3',40,'B','R003');

insert into TRAMO values ('T1-R4',30,'A','R004');
insert into TRAMO values ('T2-R4',20,'C','R004');
insert into TRAMO values ('T3-R4',50,'A','R004');

insert into TRAMO values ('T1-R5',40,'B','R005');
insert into TRAMO values ('T2-R5',50,'A','R005');
insert into TRAMO values ('T3-R5',40,'B','R005');

insert into TRAMO values ('T1-R6',30,'A','R006');
insert into TRAMO values ('T2-R6',20,'C','R006');


insert into COCHE values ('C001','Citroen','XSara WRC',2000);
insert into COCHE values ('C002','Subaru','Impreza WRC2004',2000);
insert into COCHE values ('C003','Ford','Focus WRC',2500);
insert into COCHE values ('C004','Peugeot','307 WRC',3000);
insert into COCHE values ('C005','Citroen','XSara WRC',3000);

insert into PILOTO values ('P001','Dani Sordo','0','+','Marc Martí','C001');
insert into PILOTO values ('P002','Sebastien Loeb','A','+','Daniel 
Elena','C005');
insert into PILOTO values ('P003','Robert Kubica','B','-','Pavlo Cherepin','C002');
insert into PILOTO values ('P004','Lorenzo Bertelli','AB','+','Giovanni Bernacchini','C003');
insert into PILOTO values ('P005','Sebastien Ogier','AB','-','Julien Ingrassia','C004');


INSERT INTO CORRE VALUES ('P001','T1-R1',400);
INSERT INTO CORRE VALUES ('P002','T1-R1',1000);
INSERT INTO CORRE VALUES ('P003','T1-R1',1200);
INSERT INTO CORRE VALUES ('P001','T2-R1',1400);
INSERT INTO CORRE VALUES ('P002','T2-R1',10000);
INSERT INTO CORRE VALUES ('P003','T2-R1',11200);
INSERT INTO CORRE VALUES ('P001','T3-R1',10000);
INSERT INTO CORRE VALUES ('P002','T3-R1',145);
INSERT INTO CORRE VALUES ('P003','T3-R1',1200); 


INSERT INTO CORRE VALUES ('P004','T1-R2',10388);
INSERT INTO CORRE VALUES ('P005','T1-R2',23000);
INSERT INTO CORRE VALUES ('P004','T2-R2',12000);
INSERT INTO CORRE VALUES ('P005','T2-R2',34000);


INSERT INTO CORRE VALUES ('P001','T1-R3',20000);
INSERT INTO CORRE VALUES ('P002','T1-R3',30000);
INSERT INTO CORRE VALUES ('P001','T2-R3',40000);
INSERT INTO CORRE VALUES ('P002','T2-R3',10000);
INSERT INTO CORRE VALUES ('P002','T3-R3',10000);


INSERT INTO CORRE VALUES ('P001','T1-R4',23000);
INSERT INTO CORRE VALUES ('P005','T1-R4',34800);
INSERT INTO CORRE VALUES ('P005','T2-R4',36000);
INSERT INTO CORRE VALUES ('P005','T3-R4',39000);


INSERT INTO CORRE VALUES ('P001','T1-R5',23400);
INSERT INTO CORRE VALUES ('P002','T1-R5',60000);
INSERT INTO CORRE VALUES ('P003','T1-R5',37000);
INSERT INTO CORRE VALUES ('P005','T1-R5',12000);
INSERT INTO CORRE VALUES ('P001','T2-R5',33000);
INSERT INTO CORRE VALUES ('P002','T2-R5',34000);
INSERT INTO CORRE VALUES ('P005','T2-R5',12000);
INSERT INTO CORRE VALUES ('P002','T3-R5',3400);
INSERT INTO CORRE VALUES ('P003','T3-R5',4700);



INSERT INTO POSICION VALUES ('R001','P001',1);
INSERT INTO POSICION VALUES ('R001','P002',2);
INSERT INTO POSICION VALUES ('R001','P003',3);

INSERT INTO POSICION VALUES ('R002','P004',1);
INSERT INTO POSICION VALUES ('R002','P005',2);
INSERT INTO POSICION VALUES ('R002','P001',3);

INSERT INTO POSICION VALUES ('R003','P001',1);
INSERT INTO POSICION VALUES ('R003','P002',2);
INSERT INTO POSICION VALUES ('R003','P005',3);

INSERT INTO POSICION VALUES ('R004','P001',1);
INSERT INTO POSICION VALUES ('R004','P005',2);
INSERT INTO POSICION VALUES ('R004','P002',3);

INSERT INTO POSICION VALUES ('R005','P001',1);
INSERT INTO POSICION VALUES ('R005','P002',2);
INSERT INTO POSICION VALUES ('R005','P003',3);

INSERT INTO POSICION VALUES ('R006','P002',1);
INSERT INTO POSICION VALUES ('R006','P001',2);
INSERT INTO POSICION VALUES ('R006','P003',3);
 
commit;
