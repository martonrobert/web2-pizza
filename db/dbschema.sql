CREATE DATABASE pizza
    DEFAULT CHARACTER SET = 'utf8mb4';

use pizza;

create table pizza (
    nev varchar(255) not null,
    kategorianev varchar(255) not null,
    vegetarianus tinyint(4) not null default 0,
    primary key (nev)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Pizzák';

create table kategoria (
    nev varchar(255) not null,
    ar DECIMAL(12,2) not null,
    primary key (nev)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Pizza kategóriák';


create table rendeles (
    az int(10) unsigned not null auto_increment,
    pizzanev varchar(255) not null,
    darab int(10) unsigned not null,
    felvetel datetime not null,
    kiszallitas datetime null,
    primary key (az)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Pizza rendelések';



drop table if exists felhasznalok;
create table felhasznalok (
    id int(10) unsigned not null auto_increment,
    nev varchar(255) not null,
    adminisztrator tinyint(4) unsigned not null default 0,
    email varchar(255) not null comment 'E-mail cím, egyben login név is',
    telefon varchar(20),
    kod varchar(60),
    jelszo varchar(255) not null,
    regisztracio datetime not null,
    email_megerosítve datetime,
    allapot varchar(1) not null comment 'Állapot: A: aktív, D: törölt',
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók';

insert into felhasznalok values (1,'',0,'',null,null,'','2000-01-01 00:00:00',null,'D');

drop table if exists tokens;
create table tokens (
    id int(10) unsigned not null auto_increment,
    felhasznalo_id int(10) unsigned not null,
    token_str varchar(255) not null,
    letrehozva datetime not null,
    torolt tinyint(4) not null default 0,
    primary key (id),
    index (token_str)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók';

insert into tokens values (1,1,'','2000-01-01 00:00:00',1);
