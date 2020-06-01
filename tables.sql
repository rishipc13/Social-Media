CREATE TABLE users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    user_first varchar(256) not null,
    user_last varchar(256) not null,
    user_email varchar(256) not null,
    user_uid varchar(256) not null,
    user_pwd varchar(256) not null,
    user_followers int(11) not null,
    user_following int(11) not null
);

CREATE TABLE follow_list(
  follower varchar(256) not null,
  followee varchar(256) not null    
);

CREATE TABLE posts(
username varchar(256) not null,
heading varchar(256) not null,
body varchar(256) not null,
post_id int(11) AUTO_INCREMENT not null PRIMARY KEY,
status int(11)
);