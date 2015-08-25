-- Add new column token
ALTER TABLE `bdp`.`user` 
ADD COLUMN `token` VARCHAR(32) NOT NULL AFTER `last_login`;

-- Set safe updates to false
SET SQL_SAFE_UPDATES = 0;

-- Fill token for every user
UPDATE user SET token = MD5(password) WHERE token='';