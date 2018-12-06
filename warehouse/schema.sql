drop table secundario;
drop table primario;
drop table fornecedor;
drop table organizado;
drop table categoria;
drop table localizado;
drop table produto;
drop table prateleira;
drop table corredor;
drop table supermercado;



create table supermercado(
      nif  integer ,
      nome varchar (200) not null,
      morada varchar (255) not null,
      primary key (nif),
      unique (nif));


create table corredor (
      nif integer ,
      num smallint ,
      largura numeric (3,2) ,
      primary key (nif, num),
      foreign key (nif)
        references supermercado (nif));


create table prateleira (
            nif integer ,
            num smallint ,
            lado varchar (10) ,
            altura varchar (10) ,
            primary key (nif, num, lado, altura),
            foreign key (nif, num)
                  references corredor (nif, num));


create table produto (
           cod bigint , 
           nome_marca varchar (200) not null, 
           designacao varchar (200) not null, 
           primary key (cod));
          

create table localizado (
          cod bigint,
          nif integer ,
          num smallint,
          lado varchar (10),
          altura varchar (10) ,
          slot integer not null, 
          frentes smallint not null, 
          max smallint not null, 
          primary key (cod, nif, num, lado, altura),
          foreign key (cod)
               references produto (cod),
          foreign key (nif, num , lado, altura)
               references prateleira (nif, num, lado ,altura));


create table categoria (
         id integer ,
         nome varchar (50) not null, 
         primary key (id));


create table organizado (
     cod bigint not null,
     id integer , 
     primary key (cod),
     foreign key (cod)
         references produto (cod),
    foreign key (id)
         references categoria (id));
    

create table fornecedor (
     nif_forn integer not null, 
     nome varchar (80) not null,
     primary key (nif_forn));


create table primario (
    nif_forn integer not null, 
    cod bigint ,
    data date not null, 
    primary key (cod),
    foreign key (nif_forn)
        references fornecedor (nif_forn),
    foreign key (cod)
        references produto (cod));
    
    
create table secundario (
    nif_forn integer ,
    cod bigint not null,
    primary key (nif_forn,cod),
    foreign key (nif_forn)
        references fornecedor (nif_forn),
    foreign key (cod)
        references produto (cod));

