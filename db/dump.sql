SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `who`     varchar(100) NOT NULL,
    `post_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `post_id` (`post_id`),
    CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

INSERT INTO `likes` (`id`, `who`, `post_id`)
VALUES (1, 'admin', 1);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`
(
    `id`    int(11)      NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `text`  text         NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

INSERT INTO `posts` (`id`, `title`, `text`)
VALUES (1, 'Príspevok 1', 'Obsah príspevku 1'),
       (2, 'Príspevok 2', 'Obsah príspevku 2');
