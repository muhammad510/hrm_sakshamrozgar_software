ALTER TABLE `system_config` ADD `logo` TEXT NULL AFTER `error_reporting`, ADD `favicon` TEXT NULL AFTER `logo`, ADD `phone` TEXT NULL AFTER `favicon`, ADD `email` TEXT NULL AFTER `phone`, ADD `youtube` TEXT NULL AFTER `email`, ADD `facebook` TEXT NULL AFTER `youtube`;

ALTER TABLE `system_config` ADD `state` INT(11) NULL AFTER `facebook`, ADD `district` INT(11) NULL AFTER `state`, ADD `zipCode` VARCHAR(100) NULL AFTER `district`, ADD `cRegistration` TEXT NULL AFTER `zipCode`, ADD `cPanNu` TEXT NULL AFTER `cRegistration`, ADD `cGstNu` TEXT NULL AFTER `cPanNu`;

ALTER TABLE `staff` ADD `uan` TEXT NULL AFTER `biometric_id`;
ALTER TABLE `staff` ADD `referred_by` INT(11) NULL AFTER `status`;


ALTER TABLE `staff` ADD `face_attendance` LONGTEXT NULL AFTER `id`;

ALTER TABLE `system_config` ADD `latitude` DOUBLE NULL AFTER `company_url`, ADD `longitude` DOUBLE NULL AFTER `latitude`, ADD `allowed_radius` DOUBLE NULL AFTER `longitude`;

ALTER TABLE `staff_attendance` ADD `login_face` LONGTEXT NULL AFTER `out_location`, ADD `logout_face` LONGTEXT NULL AFTER `login_face`;


ALTER TABLE `staff_attendance` ADD `in_latitude` TEXT NULL AFTER `out_location`, ADD `in_longitude` TEXT NULL AFTER `in_latitude`, ADD `out_latitude` TEXT NULL AFTER `in_longitude`, ADD `out_longitude` TEXT NULL AFTER `out_latitude`;

ALTER TABLE `staff` CHANGE `is_team_leader` `is_team_leader` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0';


ALTER TABLE `salary_master` ADD `department_id` INT(11) NULL AFTER `branch_id`;