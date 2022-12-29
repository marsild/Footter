-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Thu Dec 29 15:54:41 2022 
-- * LUN file: C:\Users\lucap\Desktop\DB\Desk.lun 
-- * Schema: FootterSchema3/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database footter;


-- Tables Section
-- _____________ 

create table commento (
     id int not null,
     data_commento date not null,
     testo char(255) not null,
     nickname char(20) not null,
     constraint IDCOMMENTO primary key (id));

create table commento_del_post (
     id_post int not null,
     id_commento int not null,
     constraint IDdel primary key (id_commento, id_post));

create table piace (
     id int not null,
     nickname char(20) not null,
     constraint IDmipiace primary key (id, nickname));

create table notifica (
     id int not null,
     data_notifica date not null,
     messaggio char(255) not null,
     visualizzato char not null,
     nickname_riceve char(20) not null,
     nickname_causa char(20) not null,
     id_post int,
     constraint IDNOTIFICA primary key (id));

create table post (
     id int not null,
     immagine char(50),
     testo char(255),
     n_like int not null,
     n_commenti int not null,
     data_post date not null,
     nickname char(20) not null,
     constraint IDPOST primary key (id));

create table preferiti (
     squadra char(20) not null,
     nickname char(20) not null,
     constraint IDpreferiti primary key (squadra, nickname));

create table riguarda (
     squadra char(20) not null,
     id_post int not null,
     constraint IDriguarda primary key (squadra, id_post));

create table segue (
     nickname_segue char(20) not null,
     nickname_seguito char(20) not null,
     constraint IDsegue primary key (nickname_seguito, nickname_segue));

create table squadra (
     nome char(20) not null,
     logo char(50) not null,
     constraint IDSQUADRA primary key (nome));

create table utente (
     nome char(20) not null,
     cognome char(20) not null,
     psw char(20) not null,
     email char(50) not null,
     n_follower int not null,
     n_seguiti int not null,
     nickname char(20) not null,
     constraint IDUTENTE primary key (nickname));


-- Constraints Section
-- ___________________ 

alter table commento add constraint FKscrive
     foreign key (nickname)
     references utente (nickname);

alter table commento_del_post add constraint FKdel_COM
     foreign key (id_commento)
     references commento (id);

alter table commento_del_post add constraint FKdel_POS
     foreign key (id_post)
     references post (id);

alter table piace add constraint FKmip_UTE
     foreign key (nickname)
     references utente (nickname);

alter table piace add constraint FKmip_POS
     foreign key (id)
     references post (id);

alter table notifica add constraint FKriceve
     foreign key (nickname_riceve)
     references utente (nickname);

alter table notifica add constraint FKcausa
     foreign key (nickname_causa)
     references utente (nickname);

alter table notifica add constraint FKdi
     foreign key (id_post)
     references post (id);

alter table post add constraint FKpubblica
     foreign key (nickname)
     references utente (nickname);

alter table preferiti add constraint FKpre_UTE
     foreign key (nickname)
     references utente (nickname);

alter table preferiti add constraint FKpre_SQU
     foreign key (squadra)
     references squadra (nome);

alter table riguarda add constraint FKrig_POS
     foreign key (id_post)
     references post (id);

alter table riguarda add constraint FKrig_SQU
     foreign key (squadra)
     references squadra (nome);

alter table segue add constraint FKsegue_1
     foreign key (nickname_seguito)
     references utente (nickname);

alter table segue add constraint FKseg_UTE
     foreign key (nickname_segue)
     references utente (nickname);


-- Index Section
-- _____________ 

