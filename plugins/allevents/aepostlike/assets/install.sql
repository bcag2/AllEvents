CREATE TABLE IF NOT EXISTS `#__allevents_postlike` (
  `event_id`       INT(11)     NOT NULL,
  `lastip`         VARCHAR(50) NOT NULL,
  `rating_dislike` INT(11)     NOT NULL,
  `rating_like`    INT(11)     NOT NULL,
  KEY `aepostlike_idx` (`event_id`)
);