create table school_manager(
  id int unsigned,
  username varchar(255),
  password varchar(255),
  role_id tinyint
);

create table school_role(
  role_id smallint unsigned,
  role_name varchar(20),
  role_auth_ids varchar(128)
);

create table school_auth(
  id smallint unsigned,
  auth_name varchar(20),
  pid smallint unsigned,
  is_nav tinyint
);