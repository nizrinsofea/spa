drop table service cascade constraints;
drop table customer cascade constraints;
drop table package cascade constraints;
drop table staff cascade constraints;
drop table branch cascade constraints;


create table branch
(branchid 	varchar2(5) not null,
 street 		varchar2(20),
 city 		varchar2(15),
 state 		varchar2(10),
 postcode 	varchar2(10),
 phoneno 	varchar2(11),
 	constraint branch_branchid_pk primary key(branchid)
);

create table staff
(staffid 		varchar2(4) not null,
 fname 		varchar2(10),
 lname 		varchar2(10),
 sex 		varchar2(1),
 dob 		date,
 position 	varchar2(15),
 salary 		number(7,2),
 branchid 	varchar2(5),
 	constraint staff_staffid_pk primary key(staffid),
 	constraint staff_branchid_fk foreign key(branchid)
		references branch(branchid)
);


create table package
(packid 		varchar2(5) not null,
 packagename 	varchar2(20),
 description 	varchar2(50),
 price 		number(5,2),
 	constraint package_packid_pk primary key(packid)
);


create table customer
(custid 		varchar2(5) not null,
 fname 		varchar2(10),
 lname 		varchar2(10),
 sex 		varchar2(1),
 dob 		date,
 phoneno 	varchar2(15),
 state 		varchar2(10),
 membership 	varchar2(1),
 	constraint customer_custid_pk primary key(custid)
);


create table service
(invno 		varchar2(4) not null,
 dateservice 	date,
 custid 		varchar2(5),
 packid 		varchar2(5),
 staffid 		varchar2(4),
 branchid 	varchar2(5),
 	constraint service_invno_pk primary key(invno),
 	constraint service_branchid_fk foreign key(branchid)
		references branch(branchid),
 	constraint service_staffid_fk foreign key(staffid)
		references staff(staffid),
 	constraint service_custid_fk foreign key(custid)
		references customer(custid),
 	constraint service_packid_fk foreign key(packid)
		references package(packid)
);	
INSERT INTO branch values ('BPG02','Jalan Paya Besar','Pagoh','Johor','84600','06-9742601');
INSERT INTO branch values ('BKT03','Jalan Sultan Ahmad','Kuantan','Pahang','25200','09-5705015');
INSERT INTO branch values ('BGM05','Jalan Gombak','Kuala Lumpur','Selangor','50728','03-61964000');


INSERT INTO staff values ('S002','Aerina','Rosli','F',TO_DATE('19/03/82','DD/MM/YY'),'Spa Attendant',1800,'BKT03');
INSERT INTO staff values ('S005','Amira','Sufiya','F',TO_DATE('13/09/98','DD/MM/YY'),'Manager',8000,'BKT03');
INSERT INTO staff values ('S007','Hasya','Najia','F',TO_DATE('30/08/96','DD/MM/YY'),'Aesthetician',2000,'BPG02');
INSERT INTO staff values ('S008','Maryam','Roslan','F',TO_DATE('14/02/96','DD/MM/YY'),'Masseur',2500,'BGM05');
INSERT INTO staff values ('S010','Amir','Fahmi','M',TO_DATE('05/06/88','DD/MM/YY'),'Spa Attendant',1800,'BKT03');
INSERT INTO staff values ('S011','Nursyaza','Zubir','F',TO_DATE('16/09/97','DD/MM/YY'),'Masseur',2500,'BKT03');
INSERT INTO staff values ('S012','Zafirah','Shahar','F',TO_DATE('03/11/97','DD/MM/YY'),'Hair Stylist',1700,'BPG02');
INSERT INTO staff values ('S013','Zaki','Jaafar','M',TO_DATE('17/03/84','DD/MM/YY'),'Spa Attendant',1800,'BGM05');
INSERT INTO staff values ('S014','Syafiq','Asyraf','F',TO_DATE('06/01/98','DD/MM/YY'),'Manager',8000,'BPG02');
INSERT INTO staff values ('S016','Sharifah','Toharan','F',TO_DATE('31/10/99','DD/MM/YY'),'Nail Technician',1900,'BGM05');
INSERT INTO staff values ('S019','Irfan','Ishak','M',TO_DATE('26/12/87','DD/MM/YY'),'Manager',8000,'BGM05');
INSERT INTO staff values ('S020','Izzat','Najmi','M',TO_DATE('16/06/97','DD/MM/YY'),'Nail Technician',1900,'BKT03');
INSERT INTO staff values ('S021','Jasmine','Roslan','F',TO_DATE('27/04/96','DD/MM/YY'),'Masseur',2500,'BPG02');
INSERT INTO staff values ('S023','Natasha','Aziz','F',TO_DATE('05/05/85','DD/MM/YY'),'Hair Stylist',1700,'BKT03');
INSERT INTO staff values ('S024','Nadzreen','Aqil','M',TO_DATE('31/08/90','DD/MM/YY'),'Spa Attendant',1800,'BPG02');
INSERT INTO staff values ('S026','Adlin','Adudu','F',TO_DATE('26/06/94','DD/MM/YY'),'Nail Technician',1900,'BGM05');
INSERT INTO staff values ('S029','Shairah','Affendy','F',TO_DATE('15/03/85','DD/MM/YY'),'Aesthetician',2000,'BGM05');
INSERT INTO staff values ('S031','Zahirah','Aziz','F',TO_DATE('13/12/96','DD/MM/YY'),'Nail Technician',1900,'BKT03');
INSERT INTO staff values ('S033','Afiqah','Fadilah','F',TO_DATE('25/11/86','DD/MM/YY'),'Nail Technician',1900,'BPG02');
INSERT INTO staff values ('S034','Nuraini','Selamat','F',TO_DATE('08/12/94','DD/MM/YY'),'Aesthetician',2000,'BGM05');
INSERT INTO staff values ('S037','Sabak','Lahak','F',TO_DATE('09/08/83','DD/MM/YY'),'Hair Stylist',1700,'BGM05');
INSERT INTO staff values ('S038','Nuralisya','Shaheer','F',TO_DATE('06/01/87','DD/MM/YY'),'Aesthetician',2000,'BKT03');
INSERT INTO staff values ('S039','Syed','Khalid','M',TO_DATE('19/11/83','DD/MM/YY'),'Masseur',2500,'BGM05');
INSERT INTO staff values ('S040','Athirah','Zakaria','F',TO_DATE('10/07/86','DD/MM/YY'),'Hair Stylist',1700,'BGM05');


INSERT INTO package values ('PM001','Manicure','Clean, Strengthen Fingernails, Hand Scrub',52);
INSERT INTO package values ('PP002','Pedicure','Clean, Strengthen Fingernails, Foot Scrub',62);
INSERT INTO package values ('PF003','Signature Facial','Hydrating Treatment',135);
INSERT INTO package values ('PM004','Massage','Relaxing Full Body Massage',128);
INSERT INTO package values ('PH005','Hair','Cut, Trim, Wash, Scalp Treatment, Blow Dry',200);
INSERT INTO package values ('PU006','Acne Treatment','Deep Cleasing, Extractions',146);
INSERT INTO package values ('PL007','Lip','Scrub, Mosturize, Lip Therapy',36);
INSERT INTO package values ('PB008','Brows','Trim, Tint',55);
INSERT INTO package values ('PE009','Lashes','Cleanse, Tint, Perm',48);
INSERT INTO package values ('PD010','Ultimate Facial','Anti-Aging, Brightening Treatment',155);



INSERT INTO customer values ('C0001','Chowdury','Asif','M',TO_DATE('03/11/97','DD/MM/YY'),'013-79822029','Johor','Y');
INSERT INTO customer values ('C0002','Safwanah','Satar','F',TO_DATE('27/03/84','DD/MM/YY'),'015-25408875','WP','Y');
INSERT INTO customer values ('C0003','Akhyar','Al-Khairi','M',TO_DATE('06/01/98','DD/MM/YY'),'019-63579865','Perak','Y');
INSERT INTO customer values ('C0004','Khan','Istiak','M',TO_DATE('31/10/99','DD/MM/YY'),'014-26293726','Penang','N');
INSERT INTO customer values ('C0005','Norshahida','Rashid','F',TO_DATE('26/12/87','DD/MM/YY'),'011-21663775','WP','N');
INSERT INTO customer values ('C0006','Zahinah','Fikri','F',TO_DATE('16/06/97','DD/MM/YY'),'019-6672368','Terengganu','Y');
INSERT INTO customer values ('C0007','Syahmi','Kamarul','M',TO_DATE('17/04/96','DD/MM/YY'),'013-33734892','Selangor','Y');
INSERT INTO customer values ('C0008','Amirul','Alias','M',TO_DATE('13/01/96','DD/MM/YY'),'013-26970500','WP','N');
INSERT INTO customer values ('C0009','Afiqah','Azri','F',TO_DATE('05/05/85','DD/MM/YY'),'014-9665934','Kedah','N');
INSERT INTO customer values ('C0010','Faizah','Ikhwani','F',TO_DATE('31/08/90','DD/MM/YY'),'019-8941532','Selangor','Y');
INSERT INTO customer values ('C0011','Zaiton','Maideen','F',TO_DATE('26/06/94','DD/MM/YY'),'016-3842824','Selangor','Y');
INSERT INTO customer values ('C0012','Abikar','Abdilbari','M',TO_DATE('08/06/92','DD/MM/YY'),'013-77255530','Penang','N');
INSERT INTO customer values ('C0013','Naufal','Zuhairi','M',TO_DATE('15/03/85','DD/MM/YY'),'011-56738566','Terengganu','Y');
INSERT INTO customer values ('C0014','Nurhakimah','Hassan','F',TO_DATE('13/12/96','DD/MM/YY'),'014-3514707','Kelantan','N');
INSERT INTO customer values ('C0015','Siddique','Yahia','M',TO_DATE('25/11/86','DD/MM/YY'),'017-5570388','Johor','N');
INSERT INTO customer values ('C0016','Mardhiah','Azura','F',TO_DATE('08/12/94','DD/MM/YY'),'014-4077405','Penang','Y');
INSERT INTO customer values ('C0017','Azlina','Arna','F',TO_DATE('28/04/98','DD/MM/YY'),'019-6919001','Kedah','Y');
INSERT INTO customer values ('C0018','Shaila','Sharmin','F',TO_DATE('15/12/82','DD/MM/YY'),'013-87370850','Johor','Y');
INSERT INTO customer values ('C0019','Nadia','Mayee','F',TO_DATE('24/05/85','DD/MM/YY'),'014-6597831','Terengganu','N');
INSERT INTO customer values ('C0020','Ilham','Alshehab','F',TO_DATE('18/06/98','DD/MM/YY'),'012-7469825','Selangor','N');
INSERT INTO customer values ('C0021','Antasha','Faithal','F',TO_DATE('03/03/98','DD/MM/YY'),'019-2026941','Selangor','Y');
INSERT INTO customer values ('C0022','Huda','Mahzan','F',TO_DATE('12/11/93','DD/MM/YY'),'014-3698521','Selangor','N');
INSERT INTO customer values ('C0023','Fatihah','Ruslan','F',TO_DATE('23/05/97','DD/MM/YY'),'013-3621452','Kedah','Y');
INSERT INTO customer values ('C0024','Aynn','Ihsan','F',TO_DATE('14/02/95','DD/MM/YY'),'014-3698741','Johor','Y');
INSERT INTO customer values ('C0025','Durrah','Azlan','F',TO_DATE('04/05/93','DD/MM/YY'),'017-9173645','Pahang','N');


INSERT INTO service values ('V001',TO_DATE('01/06/20','DD/MM/YY'),'C0001','PH005','S037','BGM05');
INSERT INTO service values ('V002',TO_DATE('01/06/20','DD/MM/YY'),'C0002','PE009','S038','BKT03');
INSERT INTO service values ('V003',TO_DATE('01/06/20','DD/MM/YY'),'C0006','PM001','S026','BGM05');
INSERT INTO service values ('V004',TO_DATE('01/06/20','DD/MM/YY'),'C0003','PH005','S012','BPG02');
INSERT INTO service values ('V005',TO_DATE('01/06/20','DD/MM/YY'),'C0004','PU006','S023','BKT03');
INSERT INTO service values ('V006',TO_DATE('01/06/20','DD/MM/YY'),'C0005','PL007','S007','BPG02');
INSERT INTO service values ('V007',TO_DATE('01/06/20','DD/MM/YY'),'C0006','PE009','S026','BGM05');
INSERT INTO service values ('V008',TO_DATE('02/06/20','DD/MM/YY'),'C0011','PL007','S029','BGM05');
INSERT INTO service values ('V009',TO_DATE('02/06/20','DD/MM/YY'),'C0009','PM004','S011','BKT03');
INSERT INTO service values ('V010',TO_DATE('02/06/20','DD/MM/YY'),'C0010','PB008','S016','BGM05');
INSERT INTO service values ('V011',TO_DATE('02/06/20','DD/MM/YY'),'C0009','PP002','S031','BKT03');
INSERT INTO service values ('V012',TO_DATE('02/06/20','DD/MM/YY'),'C0008','PH005','S012','BPG02');
INSERT INTO service values ('V013',TO_DATE('03/06/20','DD/MM/YY'),'C0011','PM004','S039','BGM05');
INSERT INTO service values ('V014',TO_DATE('03/06/20','DD/MM/YY'),'C0012','PB008','S037','BGM05');
INSERT INTO service values ('V015',TO_DATE('03/06/20','DD/MM/YY'),'C0014','PE009','S033','BPG02');
INSERT INTO service values ('V016',TO_DATE('03/06/20','DD/MM/YY'),'C0015','PH005','S037','BGM05');
INSERT INTO service values ('V017',TO_DATE('03/06/20','DD/MM/YY'),'C0013','PH005','S023','BKT03');
INSERT INTO service values ('V018',TO_DATE('03/06/20','DD/MM/YY'),'C0014','PP002','S033','BPG02');
INSERT INTO service values ('V019',TO_DATE('04/06/20','DD/MM/YY'),'C0016','PF003','S029','BGM05');
INSERT INTO service values ('V020',TO_DATE('04/06/20','DD/MM/YY'),'C0017','PM004','S021','BPG02');
INSERT INTO service values ('V021',TO_DATE('04/06/20','DD/MM/YY'),'C0018','PB008','S034','BGM05');
INSERT INTO service values ('V022',TO_DATE('04/06/20','DD/MM/YY'),'C0019','PU006','S031','BKT03');
INSERT INTO service values ('V023',TO_DATE('04/06/20','DD/MM/YY'),'C0020','PH005','S012','BPG02');
INSERT INTO service values ('V024',TO_DATE('04/06/20','DD/MM/YY'),'C0021','PM001','S026','BGM05');
INSERT INTO service values ('V025',TO_DATE('04/06/20','DD/MM/YY'),'C0022','PF003','S007','BPG02');
INSERT INTO service values ('V026',TO_DATE('04/06/20','DD/MM/YY'),'C0023','PM004','S011','BKT03');
INSERT INTO service values ('V027',TO_DATE('05/06/20','DD/MM/YY'),'C0025','PP002','S016','BGM05');
INSERT INTO service values ('V028',TO_DATE('05/06/20','DD/MM/YY'),'C0024','PE009','S038','BKT03');
INSERT INTO service values ('V029',TO_DATE('05/06/20','DD/MM/YY'),'C0020','PM004','S021','BPG02');
INSERT INTO service values ('V030',TO_DATE('05/06/20','DD/MM/YY'),'C0010','PL007','S040','BGM05');
INSERT INTO service values ('V031',TO_DATE('05/06/20','DD/MM/YY'),'C0009','PM001','S020','BKT03');
INSERT INTO service values ('V032',TO_DATE('06/06/20','DD/MM/YY'),'C0014','PM004','S021','BPG02');
INSERT INTO service values ('V033',TO_DATE('06/06/20','DD/MM/YY'),'C0002','PD010','S023','BKT03');
INSERT INTO service values ('V034',TO_DATE('06/06/20','DD/MM/YY'),'C0018','PL007','S040','BGM05');
INSERT INTO service values ('V035',TO_DATE('06/06/20','DD/MM/YY'),'C0019','PM001','S020','BKT03');
INSERT INTO service values ('V036',TO_DATE('06/06/20','DD/MM/YY'),'C0016','PD010','S039','BGM05');
INSERT INTO service values ('V037',TO_DATE('06/06/20','DD/MM/YY'),'C0023','PF003','S038','BKT03');
INSERT INTO service values ('V038',TO_DATE('06/06/20','DD/MM/YY'),'C0006','PU006','S008','BGM05');
INSERT INTO service values ('V039',TO_DATE('06/06/20','DD/MM/YY'),'C0020','PF003','S007','BPG02');
INSERT INTO service values ('V040',TO_DATE('06/06/20','DD/MM/YY'),'C0007','PH005','S037','BGM05');
INSERT INTO service values ('V041',TO_DATE('07/06/20','DD/MM/YY'),'C0024','PP002','S031','BKT03');
INSERT INTO service values ('V042',TO_DATE('07/06/20','DD/MM/YY'),'C0021','PD010','S029','BGM05');
INSERT INTO service values ('V043',TO_DATE('07/06/20','DD/MM/YY'),'C0019','PM004','S011','BKT03');
INSERT INTO service values ('V044',TO_DATE('07/06/20','DD/MM/YY'),'C0006','PL007','S034','BGM05');
INSERT INTO service values ('V045',TO_DATE('07/06/20','DD/MM/YY'),'C0017','PF003','S007','BPG02');
INSERT INTO service values ('V046',TO_DATE('07/06/20','DD/MM/YY'),'C0025','PM004','S039','BGM05');
INSERT INTO service values ('V047',TO_DATE('07/06/20','DD/MM/YY'),'C0009','PL007','S038','BKT03');
INSERT INTO service values ('V048',TO_DATE('07/06/20','DD/MM/YY'),'C0023','PH005','S023','BKT03');
INSERT INTO service values ('V049',TO_DATE('07/06/20','DD/MM/YY'),'C0010','PD010','S029','BGM05');
INSERT INTO service values ('V050',TO_DATE('07/06/20','DD/MM/YY'),'C0022','PU006','S021','BPG02');


select * from Branch;
select * from Staff;
select * from Package;
select * from Customer;
select * from Service;
