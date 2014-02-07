create database CIS2288;
use CIS2288;

create table users ( username varchar(20), password varchar(40), primary key (username));
insert into users values ( 'admin', sha1('rootpass') );

create table guestbook ( title varchar(50), message varchar(255), username varchar(20), dateandtime varchar(255));

grant select,insert,update,delete on CIS2288.* 
             to 'cis2288_user'@'localhost' 
             identified by 'cis2288_password';
flush privileges;