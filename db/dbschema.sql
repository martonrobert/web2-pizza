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

