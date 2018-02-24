CREATE TABLE `post` (
  `num` INTEGER(6) NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  `content` TEXT NOT NULL,
  `writer` VARCHAR(30) NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `hits` INTEGER(5) NOT NULL default 0,
  `field` INTEGER(1) NOT NULL,
  PRIMARY KEY(`num`,`field`),
  FOREIGN KEY(`writer`) REFERENCES `user` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comment` (
  `post_num` INTEGER(6) NOT NULL,
  `writer` VARCHAR(30) NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `content` TEXT NOT NULL,
  `comment_num` INTEGER(6) NOT NULL,
  `field` INTEGER(1) NOT NULL,
  PRIMARY KEY(`comment_num`,`post_num`,`field`),
  FOREIGN KEY(`writer`) REFERENCES `user` (`id`),
  FOREIGN KEY(`post_num`) REFERENCES `post` (`num`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
