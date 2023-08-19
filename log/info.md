# alterando a tabela
````
 ALTER TABLE `categorias` ADD `prioridade` TINYINT(2) NOT NULL AFTER `categoria`, ADD `fixo` BOOLEAN NOT NULL DEFAULT TRUE AFTER `prioridade`;
````

````
ALTER TABLE movimentacoes add FOREIGN KEY fk_categoria (idCategoria) REFERENCES categorias(id)
````
````
TRUNCATE TABLE `projetophp`.`movimentacoes`
````

