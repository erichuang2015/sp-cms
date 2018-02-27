create table article
(
  ID int auto_increment
    primary key,
  author int not null,
  text text not null,
  article_category varchar(15) not null,
  title varchar(50) null
)
;

create index articolo_utente_ID_fk
  on article (author)
;

create index categoria_articolo
  on article (article_category)
;

create table category
(
  ID int auto_increment
    primary key,
  name varchar(15) not null,
  constraint categoria_nome_uindex
  unique (name)
)
;

alter table article
  add constraint article_ibfk_2
foreign key (article_category) references category (name)
;

create table comment
(
  ID int auto_increment
    primary key,
  author int not null,
  article int not null,
  text text not null,
  constraint commento__fk
  foreign key (article) references article (ID)
)
;

create index commento_fk
  on comment (author)
;

create index commento__fk
  on comment (article)
;

create table style
(
  background tinytext null,
  box tinytext null,
  title tinytext null,
  link tinytext null,
  link_hover tinytext null
)
;

create table user
(
  ID int auto_increment
    primary key,
  Username varchar(15) not null,
  Password varchar(35) not null,
  role int not null,
  Mail varchar(30) not null
)
;

alter table article
  add constraint articolo_utente_ID_fk
foreign key (author) references user (ID)
;

alter table comment
  add constraint commento_fk
foreign key (author) references user (ID)
;