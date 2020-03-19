ALTER TABLE `drop`.`wp_indonesia_visa_traverler_data_new` 
ADD COLUMN `sponsor_person_name` VARCHAR(100) NULL DEFAULT NULL AFTER `employer_phone`,
ADD COLUMN `sponsor_address` VARCHAR(100) NULL DEFAULT NULL AFTER `sponsor_person_name`,
ADD COLUMN `sponsor_phone` VARCHAR(100) NULL AFTER `sponsor_address`;
