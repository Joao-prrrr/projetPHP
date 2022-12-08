-- Voila Website database
-- Author : Joao Araribá
-- Date : 10.11.2022 v1

-- Drop and create the database if it exists (to do only the first time to not delete all the data)
DROP database if exists voilaSiteWeb;
CREATE database voilaSiteWeb;

use voilaSiteWeb;

CREATE TABLE user
(
	id int not null auto_increment primary key,
	fname varchar(20),
    birthdate datetime
);

CREATE TABLE quizReponses
(
	responsesDate DATETIME not null,
    fk_userId int not null,
    utilityBoat_resp varchar(50) not null,
    forwardBoat_resp varchar(50) not null,
    otherName_resp varchar(20) not null,
    speedUnity_resp varchar(20) not null,
    knots_resp varchar(20) not null,
    othersSailSports_resp varchar(25) not null,
    windSurfDirection_resp varchar(50) not null,
    foil_resp varchar(20) not null,
    wrongWord_resp varchar(20) not null,
    comments_resp text not null,
    primary key (responsesDate, fk_userId),
    foreign key (fk_userId) REFERENCES user(id)
);