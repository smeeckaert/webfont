CREATE TABLE IF NOT EXISTS `dev_font` (
  `font_id` int(11) NOT NULL AUTO_INCREMENT,
  `font_name` varchar(255) NOT NULL,
  PRIMARY KEY (`font_id`)
)  CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `dev_symbol` (
  `symb_id` int(11) NOT NULL AUTO_INCREMENT,
  `symb_name` varchar(255) NOT NULL,
  `symb_folder` varchar(255) NOT NULL,
  PRIMARY KEY (`symb_id`)
)  CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `dev_font_symbol` (
  `fosy_id` int(11) NOT NULL AUTO_INCREMENT,
  `fosy_font_id` int(11) NOT NULL,
    `fosy_symb_id` int(11) NOT NULL,
  `fosy_character` CHAR(1) NOT NULL,
  PRIMARY KEY (`fosy_id`)
)  CHARSET=utf8 AUTO_INCREMENT=1 ;