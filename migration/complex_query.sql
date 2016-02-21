

1)Выборка суммы заказов за определенный день

SELECT SUM(food.price) AS sumFromPrice
FROM order_food, food WHERE order_food.id_food = food.id_food
 AND order_food.id_order IN (SELECT `id_order` FROM `order` WHERE `date_order` = '2016-02-17')

    SELECT SUM(food.price) AS sumFromPrice
    FROM food WHERE order_food.id_food = food.id_food
JOIN `id_order` FROM `order` WHERE `date_order` = '2016-02-17'


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


3) Список 5 популярных блюд
SELECT food.name_food, COUNT( food.name_food ),
 order_food.id_food, order_food.id_order
FROM food 
JOIN order_food ON order_food.id_food = food.id_food
GROUP BY food.name_food
ORDER BY COUNT( food.name_food ) DESC
LIMIT 5

4) 10 успешных официантов
SELECT waiter.id_waiter, waiter.name, waiter.surname, cnt_order FROM 
(SELECT id_waiter, COUNT(id_waiter) AS cnt_order
 FROM `order` GROUP BY id_waiter ORDER BY cnt_order DESC LIMIT 10) as s
 JOIN waiter ON waiter.id_waiter = s.id_waiter