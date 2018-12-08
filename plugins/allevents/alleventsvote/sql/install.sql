CREATE TABLE IF NOT EXISTS `#__allevents_aevote` (
  `event_id`     INT(11)     NOT NULL,
  `extra_id`     INT(11)     NOT NULL,
  `user_id`      INT(11),
  `lastip`       VARCHAR(50) NOT NULL,
  `rating_sum`   FLOAT       NOT NULL,
  `label`        VARCHAR(50) NOT NULL,
  `rating_count` INT(11)     NOT NULL,
  KEY `aevote_idx` (`event_id`)
);
  