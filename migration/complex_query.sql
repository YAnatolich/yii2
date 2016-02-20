

1)Выборка суммы заказов за определенный день

SELECT SUM(food.price) AS sumFromPrice
FROM order_food, food WHERE order_food.id_food = food.id_food
 AND order_food.id_order IN (SELECT `id_order` FROM `order` WHERE `date_order` = '2016-02-17')


2)список последних 5 заказов
a)
SELECT order_food.id_order, food.name_food, food.id_food
FROM order_food, food
WHERE order_food.id_order
IN (

SELECT id_order
FROM (

	SELECT id_order
	FROM `order`
	GROUP BY id_order DESC
	LIMIT 5
) AS s
)
AND order_food.id_food = food.id_food
ORDER BY `order_food`.`id_order` ASC
LIMIT 0 , 30


c) Список 5 популярных блюд
SELECT food.name_food, COUNT( food.name_food ) , order_food.id_food, order_food.id_order
FROM food 
JOIN order_food ON order_food.id_food = food.id_food
GROUP BY food.name_food
ORDER BY COUNT( food.name_food ) DESC
LIMIT 5