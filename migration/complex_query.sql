

1)Выборка суммы заказов за определенный день

SELECT SUM(food.price) AS sumFromPrice
FROM order_food, food WHERE order_food.id_food = food.id_food
 AND order_food.id_order IN (SELECT `id_order` FROM `order` WHERE `date_order` = '2016-02-17')


2)список последних 5 заказов
SELECT `order`.id_order, `food`.food_name, `food`.price FROM `order`, `food`, order_food 
WHERE `order`.id_order IN (SELECT id_order FROM `order` GROUP BY id_order DESC LIMIT 5) AND food.id_food = 