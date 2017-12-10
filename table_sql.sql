ALTER TABLE `tables` ADD `status` INT(11) NOT NULL DEFAULT '0' AFTER `description`;
ALTER TABLE `dish` CHANGE `price` `price` FLOAT(11) NOT NULL;
