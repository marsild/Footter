-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Wed Dec 28 18:35:49 2022 
-- * LUN file: C:\Users\lucap\Desktop\DB\Desk.lun 
-- * Schema: FootterSchema2/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Footter;


-- Tables Section
-- _____________ 

create table COMMENTO (
     id int not null,
     data date not null,
     testo char(255) not null,
     nickname char(20) not null,
     constraint ID_COMMENTO primary key (id));

create table UTENTE (
     nome char(20) not null,
     cognome char(20) not null,
     psw char(20) not null,
     email char(50) not null,
     nFollower int not null,
     nSeguiti int not null,
     nickname char(20) not null,
     constraint ID_UTENTE primary key (nickname));

create table NOTIFICA (
     id int not null,
     data date not null,
     messaggio char(255) not null,
     visualizzato char not null,
     nickname char(20) not null,
     Ric_nickname char(20) not null,
     Di_id int,
     constraint ID_NOTIFICA primary key (id));

create table SQUADRA (
     nome char(20) not null,
     logo char(50) not null,
     constraint ID_SQUADRA primary key (nome));

create table POST (
     id int not null,
     immagine char(50),
     testo char(255),
     nLike int not null,
     nCommenti int not null,
     data date not null,
     nickname char(20) not null,
     constraint ID_POST primary key (id));

create table del (
     I_C_id int not null,
     id int not null,
     constraint ID_del primary key (I_C_id, id));

create table miPiace (
     id int not null,
     nickname char(20) not null,
     constraint ID_miPiace primary key (id, nickname));

create table preferiti (
     nome char(20) not null,
     nickname char(20) not null,
     constraint ID_preferiti primary key (nome, nickname));

create table riguarda (
     id int not null,
     nome char(20) not null,
     constraint ID_riguarda primary key (nome, id));

create table segue (
     S_U_nickname char(20) not null,
     nickname char(20) not null,
     constraint ID_segue primary key (nickname, S_U_nickname));


-- Constraints Section
-- ___________________ 

alter table COMMENTO add constraint FKscrive
     foreign key (nickname)
     references UTENTE (nickname);

alter table NOTIFICA add constraint FKcausa
     foreign key (nickname)
     references UTENTE (nickname);

alter table NOTIFICA add constraint FKriceve
     foreign key (Ric_nickname)
     references UTENTE (nickname);

alter table NOTIFICA add constraint FKdi
     foreign key (Di_id)
     references POST (id);

alter table POST add constraint FKpubblica
     foreign key (nickname)
     references UTENTE (nickname);

alter table del add constraint FKdel_POS
     foreign key (id)
     references POST (id);

alter table del add constraint FKdel_COM
     foreign key (I_C_id)
     references COMMENTO (id);

alter table miPiace add constraint FKmiP_UTE
     foreign key (nickname)
     references UTENTE (nickname);

alter table miPiace add constraint FKmiP_POS
     foreign key (id)
     references POST (id);

alter table preferiti add constraint FKpre_UTE
     foreign key (nickname)
     references UTENTE (nickname);

alter table preferiti add constraint FKpre_SQU
     foreign key (nome)
     references SQUADRA (nome);

alter table riguarda add constraint FKrig_SQU
     foreign key (nome)
     references SQUADRA (nome);

alter table riguarda add constraint FKrig_POS
     foreign key (id)
     references POST (id);

alter table segue add constraint FKsegue_1
     foreign key (nickname)
     references UTENTE (nickname);

alter table segue add constraint FKseg_UTE
     foreign key (S_U_nickname)
     references UTENTE (nickname);


-- Index Section
-- _____________ 

