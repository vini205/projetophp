# alterando a tabela
````
 ALTER TABLE `categorias` ADD `prioridade` TINYINT(2) NOT NULL AFTER `categoria`, ADD `fixo` BOOLEAN NOT NULL DEFAULT TRUE AFTER `prioridade`;
````

