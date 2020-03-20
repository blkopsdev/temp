CREATE TABLE `wordpress`.`wp_russia_comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `uid` VARCHAR(45) NOT NULL,
  `comment` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`));
