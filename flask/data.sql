CREATE TABLE `topic` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(20),
	`body` TEXT,
	PRIMARY KEY (`id`)
);
INSERT INTO topic(title, body) VALUES('HTML', 'HTML is ...');
INSERT INTO topic(title, body) VALUES('CSS', 'CSS is ...');
INSERT INTO topic(title, body) VALUES('JS', 'JS is ...');
