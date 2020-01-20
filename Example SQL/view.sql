CREATE VIEW commentView AS
SELECT com.ID,c.firstName as 'CustomerName', m.id as 'ManufacturerID',m.name as 'ManufacturerName', m.city as 'ManufacturerCity', com.comment, com.commentDate, com.star AS commentStar
FROM customer c, manufacturer m, comment com
WHERE com.CustomerID = c.ID AND com.ManufacturerID = m.ID AND m.isDeleted = 0;



CREATE VIEW productView AS
SELECT p.ID AS ProductID, p.name AS productName, p.price, p.stock, m.ID ,m.name, m.city, p.isDeleted as 'isProductDeleted', m.isDeleted as 'isManufacturerDeleted'
FROM product p, manufacturer m
WHERE p.ManufacturerID = m.ID
ORDER BY p.ID;


CREATE VIEW cartView AS
SELECT  c.firstName, c.lastName, c.mailAddress,
        c.phoneNumber, c.address, p.name, p.price, s.amountOfProduct
FROM product p, customer c, ShoppingCart s
WHERE s.CustomerID = c.ID AND s.ProductID = p.ID;



CREATE VIEW averageStar AS
SELECT a.ID, a.name as 'Manufacturer Name', a.city as 'Manufacturer City', IFNULL(AVG(b.star), 0 ) as 'Average Star'
  FROM manufacturer AS a LEFT OUTER JOIN comment AS b
    ON a.ID = b.ManufacturerID where a.isDeleted = 0
 GROUP BY a.ID;

CREATE VIEW orderView AS
SELECT c.firstName,c.lastName,p.name,s.amountOfProduct , o.orderDate, p.price * s.amountOfProduct as Cost, o.ID 
FROM ShoppingCart s, Orders o, Customer c, product p 
where c.ID = s.CustomerID and s.OrderID = o.ID and p.ID = s.ProductID

