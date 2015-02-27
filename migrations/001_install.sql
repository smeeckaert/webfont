CREATE TABLE IF NOT EXISTS `dev_font` (
  `font_id`   INT(11)      NOT NULL AUTO_INCREMENT,
  `font_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`font_id`)
)
  CHARSET =utf8
  AUTO_INCREMENT =1;


CREATE TABLE IF NOT EXISTS `dev_symbol` (
  `symb_id`     INT(11)      NOT NULL AUTO_INCREMENT,
  `symb_name`   VARCHAR(255) NOT NULL,
  `symb_input`  VARCHAR(255) NOT NULL,
  `symb_folder` VARCHAR(255) NOT NULL,
  `symb_ext`    CHAR(3)      NOT NULL,
  PRIMARY KEY (`symb_id`)
)
  CHARSET =utf8
  AUTO_INCREMENT =1;


CREATE TABLE IF NOT EXISTS `dev_font_symbol` (
  `fosy_id`        INT(11) NOT NULL AUTO_INCREMENT,
  `fosy_font_id`   INT(11) NOT NULL,
  `fosy_symb_id`   INT(11) NOT NULL,
  `fosy_character` CHAR(1) NOT NULL,
  PRIMARY KEY (`fosy_id`)
)
  CHARSET =utf8
  AUTO_INCREMENT =1;