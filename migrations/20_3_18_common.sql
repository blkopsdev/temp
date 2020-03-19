ALTER TABLE `drop`.`wp_common` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
ADD COLUMN `purpose` VARCHAR(45) NULL AFTER `company`,
ADD COLUMN `payment_status` VARCHAR(45) NULL AFTER `purpose`,
ADD COLUMN `transaction_id` VARCHAR(45) NULL AFTER `payment_status`; 