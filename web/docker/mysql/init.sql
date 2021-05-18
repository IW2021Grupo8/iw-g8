INSERT INTO `country` (`id`, `code`, `name`) VALUES
(1, 'es', 'España');

INSERT INTO `company` (`id`, `country_id`, `vat`, `name`, `deleted`) VALUES
(1, '1', 'R2464781J', 'GENERES SA', '0');


INSERT INTO `user` (`id`, `company_id`, `email`, `first_name`, `last_name`, `deleted`, `roles`, `password`) VALUES
(1, NULL, 'user@user.com', 'JUSTO', 'HEREDIA VELA', '0', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$sRxdQ1qVpYG85Zn/WupOyw$kYDhpXhKF0egInhGBj9WdE5yg9AEi5DKiu26+YECWoY'),
(2, NULL, 'company@company.com', 'LUIS ALBERTO', 'SAEZ VENTURA', '0', '[\"ROLE_COMPANY\"]', '$argon2id$v=19$m=65536,t=4,p=1$sRxdQ1qVpYG85Zn/WupOyw$kYDhpXhKF0egInhGBj9WdE5yg9AEi5DKiu26+YECWoY');
