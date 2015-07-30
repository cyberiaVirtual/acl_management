drop database if exists `policies`; 
create database `policies`;
use `policies`;

grant usage on policies.* to policies@localhost identified by '@policies#';
grant select, insert, update, delete, drop, alter, create temporary tables on policies.* to policies@localhost;
flush privileges;

drop table if exists `policies`;
create table `policies`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `policies_path` varchar(255) not null,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;