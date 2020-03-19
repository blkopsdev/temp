ALTER TABLE `drop`.`wp_common` 
ADD COLUMN `total_amount` INT NULL DEFAULT 0 AFTER `table_name`,
ADD COLUMN `email_address` VARCHAR(100) NULL AFTER `total_amount`;
