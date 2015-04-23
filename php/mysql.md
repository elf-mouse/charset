# my.ini

    [client]
    default-character-set=utf8
    [mysql]
    default-character-set=utf8
    [mysqld]
    default-character-set=utf8

# mysql

    SHOW VARIABLES LIKE 'character%';
    SHOW VARIABLES LIKE 'collation_%';

# create table

    CREATE TABLE `test_charset_table` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `varchar1` varchar(255) DEFAULT NULL,
    `varbinary1` varbinary(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
