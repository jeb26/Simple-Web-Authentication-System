/**Create the database**/
create database auth;

/**Create the credentials table**/
use auth;

create table credentials (
	user_name VARCHAR(32),
	pass_word VARCHAR(32)
)Engine=INNODB;

/**Create the insert credentials**/
insert into credentials (user_name,pass_word) values("jeb26","hoboken");
insert into credentials (user_name,pass_word) values("kki29","roses");
