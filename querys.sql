SELECT*FROM pizzas


DELETE FROM pizzas

INSERT INTO pizzas (nome, ingredientes, valor) VALUES
('Calabresa', 'Mussarela, calabresa fatiada e cebola', 45.50),
('Mussarela', 'Mussarela e molho de tomate', 40.00),
('Frango com Catupiry', 'Frango desfiado, catupiry e mussarela', 52.90),
('Portuguesa', 'Mussarela, presunto, ovo, ervilha, cebola e calabresa', 62.90),
('Moda do Juca', 'Mussarela, peito de peru, palmito, alho poró e alcaparras', 72.50);
 
SELECT * FROM pizzas


SELECT idPizza, nome, ingredientes, valor FROM pizzas
ORDER BY valor ASC


CREATE TABLE bebidas (
    idBebidas INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    litros VARCHAR(50) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);
 
INSERT INTO bebidas (nome, litros, valor) VALUES
('Coca-Cola', '350 ml', 15.50),
('Guarana', '600 ml', 19.00),
('Soda', '1 litro', 25.00),
('Tubaína', '2 litros', 50.00),
('Cerveja', '290 ml', 3.00);

 
SELECT * FROM bebidas