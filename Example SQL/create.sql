CREATE TABLE Customer
(
	ID int,
	firstName varchar(255) NOT NULL,
	lastName varchar(255) NOT NULL,
	mailAddress varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	phoneNumber char(11) NOT NULL,
	address varchar(255) NOT NULL,
	isDeleted int DEFAULT 0,
	UNIQUE(mailAddress),
	UNIQUE(phoneNumber),
	PRIMARY KEY(ID)
);

CREATE TABLE Manufacturer
(
	ID int,
	name varchar(255) NOT NULL,
	city varchar(255) NOT NULL,
	isDeleted int DEFAULT 0,
	PRIMARY KEY(ID)
);

CREATE TABLE Product
(
	ID int,
	name varchar(255),
	price decimal(6,2) NOT NULL,
	stock int NOT NULL,
	ManufacturerID int,
	isDeleted int DEFAULT 0,
	FOREIGN KEY (ManufacturerID) REFERENCES Manufacturer(ID),
	PRIMARY KEY(ID,name,ManufacturerID)
);



CREATE TABLE Orders
(
	ID int,
	CustomerID int NOT NULL,
	orderDate datetime NOT NULL,
	address varchar(255) NOT NULL,
	paymentType varchar(255) NOT NULL,
	totalCost decimal(10,2) NOT NULL,
	FOREIGN KEY (CustomerID) REFERENCES Customer(ID),
	PRIMARY KEY(ID)
);

CREATE TABLE ShoppingCart
(
	CustomerID int,
	ProductID int,
	OrderID int DEFAULT 0,
	amountOfProduct int NOT NULL,
	addedDate datetime,
	FOREIGN KEY (CustomerID) REFERENCES Customer(ID),
	FOREIGN KEY (ProductID) REFERENCES Product(ID),
	PRIMARY KEY(CustomerID, ProductID, OrderID)
);

CREATE TABLE MilkAndMilkProducts
(
	ProductID int,
	amountOfMilkSugar decimal(4,2),
	FOREIGN KEY (ProductID) REFERENCES Product(ID),
	PRIMARY KEY(ProductID)
);

CREATE TABLE FruitsAndVegetables
(
	ProductID int,
	season varchar(255),
	FOREIGN KEY (ProductID) REFERENCES Product(ID),
	PRIMARY KEY(ProductID)
);

CREATE TABLE FoodOfAnimalOrigin
(
	ProductID int,
	meatType varchar(255),
	FOREIGN KEY (ProductID) REFERENCES Product(ID),
	PRIMARY KEY(ProductID)
);


CREATE TABLE Comment
(
	ID int,
	CustomerID int NOT NULL,
	ManufacturerID int NOT NULL,
	comment varchar(1000) NOT NULL,
	commentDate datetime NOT NULL,
	star int NOT NULL,
	FOREIGN KEY (CustomerID) REFERENCES Customer(ID),
	FOREIGN KEY (ManufacturerID) REFERENCES Manufacturer(ID),
	PRIMARY KEY(ID)
);

CREATE TABLE DiscountCodes
(
	Code varchar(255),
	numberOfUsage int NOT NULL,
	expireTime date NOT NULL,
	PRIMARY KEY(Code)
);

CREATE TABLE CustomerUsesDiscount
(
	CustomerID int,
	DiscountCode varchar(255),
	usageDate datetime NOT NULL,
	FOREIGN KEY (CustomerID) REFERENCES Customer(ID),
	FOREIGN KEY (DiscountCode) REFERENCES DiscountCodes(Code),
	PRIMARY KEY(CustomerID, DiscountCode)
);

CREATE TABLE `sequences` ( `ID` INT NOT NULL,
    `increment_insert_customer` INT NOT NULL,
    `increment_insert_manufacturer` INT NOT NULL ,
	`increment_insert_product` INT NOT NULL ,
	`increment_insert_orders` INT NOT NULL ,
	`increment_insert_comment` INT NOT NULL ,
PRIMARY KEY (`ID`));

INSERT INTO sequences(ID,increment_insert_customer,increment_insert_manufacturer,increment_insert_product,increment_insert_orders,increment_insert_comment)
VALUES(1,1,1,1,1,1);


DELIMITER $$

CREATE PROCEDURE `insert_customer` (
    IN `firstName` varchar(255),
    IN `lastName` varchar(255),
    IN `mailAddress` varchar(255),
		IN `password` varchar(255),
    IN `phoneNumber` char(11),
    IN `address` varchar(255)
)
BEGIN
    INSERT INTO `Customer` (firstName, lastName, mailAddress, password, phoneNumber, address)
    VALUES (`firstName`, `lastName`, `mailAddress`, `password`, `phoneNumber`, `address`);
end $$

DELIMITER $$

CREATE PROCEDURE `insert_manufacturer`
(
	IN `name` varchar(255),
	IN `city` varchar(255)
)
BEGIN
	INSERT INTO `Manufacturer` (name, city)
	VALUES (`name`, `city`);
end $$



DELIMITER $$
CREATE PROCEDURE `insert_milk_and_milk_product`
(
	IN `name` varchar(255),
	IN `price` decimal(6,2),
	IN `stock` int,
	IN `type` varchar(255),
	IN `ManufacturerID` int,
	IN `amountOfMilkSugar` decimal(4,2)
)
BEGIN
	IF (SELECT count(*) FROM Product where Product.name = `name` and Product.ManufacturerID = `ManufacturerID`) = 0
        THEN

        INSERT INTO `Product` (name, price, stock, ManufacturerID)
		VALUES (`name`, `price`, `stock`, `ManufacturerID`);

		INSERT INTO `MilkAndMilkProducts` (amountOfMilkSugar)
		VALUES (`amountOfMilkSugar`);

        END IF;

end $$

DELIMITER $$
CREATE PROCEDURE `insert_fruits_and_vegetables`
(
	IN `name` varchar(255),
	IN `price` decimal(6,2),
	IN `stock` int,
	IN `type` varchar(255),
	IN `ManufacturerID` int,
	IN `season` varchar(255)
)
BEGIN
	IF (SELECT count(*) FROM Product where Product.name = `name` and Product.ManufacturerID = `ManufacturerID`) = 0
        THEN

		
        INSERT INTO `Product` (name, price, stock, ManufacturerID)
		VALUES (`name`, `price`, `stock`, `ManufacturerID`);

		INSERT INTO `FruitsAndVegetables` (season)
		VALUES (`season`);
        END IF;

end $$

DELIMITER $$
CREATE PROCEDURE `insert_food_of_animal_origin`
(
	IN `name` varchar(255),
	IN `price` decimal(6,2),
	IN `stock` int,
	IN `type` varchar(255),
	IN `ManufacturerID` int,
	IN `meatType` varchar(255)
)
BEGIN
	IF (SELECT count(*) FROM Product where Product.name = `name` and Product.ManufacturerID = `ManufacturerID`) = 0
        THEN

        
        INSERT INTO `Product` (name, price, stock, ManufacturerID)
		VALUES (`name`, `price`, `stock`, `ManufacturerID`);

		INSERT INTO `FoodOfAnimalOrigin` (meatType)
		VALUES (`meatType`);
        END IF;

end $$

DELIMITER $$
CREATE PROCEDURE `insert_orders`
(
	IN `CustomerID` int,
	IN `orderDate` datetime,
	IN `address` varchar(255),
	IN `paymentType` varchar(255),
	IN `totalCost` decimal(10, 2)
)
BEGIN
	INSERT INTO `Orders` (CustomerID, orderDate, address, paymentType, totalCost)
	VALUES (`CustomerID`, `orderDate`, `address`, `paymentType`, `totalCost`);
end $$

DELIMITER $$
CREATE PROCEDURE `insert_comment`
(
	IN `CustomerID` int,
	IN `ManufacturerID` int,
	IN `comment` varchar(1000),
	IN `commentDate` datetime,
	IN `star` int
)
BEGIN
	INSERT INTO `Comment` (CustomerID, ManufacturerID, comment, commentDate, star)
	VALUES (`CustomerID`, `ManufacturerID`, `comment`, `commentDate`, `star`);
end $$

DELIMITER $$
CREATE PROCEDURE `insert_discount_code`
(
	IN `Code` varchar(255),
	IN `numberOfUsage` int,
	IN `expireTime` datetime
)
BEGIN
	INSERT INTO `DiscountCodes` (Code, numberOfUsage, expireTime)
	VALUES (`Code`, `numberOfUsage`, `expireTime`);
end $$

DELIMITER $$
CREATE PROCEDURE `insert_customer_uses_discount`
(
	IN `CustomerID` int,
	IN `DiscountCode` varchar(255),
	IN `usageDate` datetime
)
BEGIN
	INSERT INTO `CustomerUsesDiscount` (CustomerID, DiscountCode, usageDate)
	VALUES (`CustomerID`, `DiscountCode`, `usageDate`);
end $$

DELIMITER $$
CREATE PROCEDURE `insert_shopping_cart`
(
	IN `CustomerID` int,
	IN `ProductID` int,
	IN `amountOfProduct` int,
	IN `addedDate` datetime
)
BEGIN
	INSERT INTO `ShoppingCart` (CustomerID, ProductID, amountOfProduct, addedDate)
	VALUES (`CustomerID`, `ProductID`, `amountOfProduct`, `addedDate`);
end $$


DELIMITER $$

CREATE PROCEDURE `update_customer`(
    IN `updateID` int,
    IN `updateFirstName` varchar(255),
    IN `updateLastName` varchar(255),
    IN `updateMailAddress` varchar(255),
    IN `updatePhoneNumber` char(11),
    IN `updateAddress` varchar(255)
)
BEGIN
    UPDATE Customer
    SET firstName = IF(`updateFirstName` <> '', `updateFirstName`, firstName),
        lastName = IF(`updateLastName` <> '', `updateLastName`, lastName),
        mailAddress = IF(`updateMailAddress` <> '', `updateMailAddress`, mailAddress),
        phoneNumber = IF(`updatePhoneNumber` <> '', `updatePhoneNumber`, phoneNumber),
        address = IF(`updateAddress` <> '', `updateAddress`, address)
    WHERE ID = `updateID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_manufacturer`(
    IN `updateID` int,
    IN `updateName` varchar(255),
    IN `updateCity` varchar(255)
    
)
BEGIN
    UPDATE Manufacturer
    SET name = IF(`updateName` <> '', `updateName`, name),
        city = IF(`updateCity` <> '', `updateCity`, city)
        
    WHERE ID = `updateID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_product`(
    IN `updateID` int,
    IN `updateName` varchar(255),
    IN `updatePrice` decimal(6,2),
    IN `updateStock` int,
    IN `updateManufacturerID` int
)
BEGIN
    
	UPDATE Product
    SET name = IF(`updateName` <> '', `updateName`, name),
        price = IF(`updatePrice` <> '', `updatePrice`, price),
        stock = IF(`updateStock` <> '', `updateStock`, stock),
        ManufacturerID = IF(`updateManufacturerID` <> '', `updateManufacturerID`, ManufacturerID)
    WHERE ID = `updateID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_shopping_cart`(
    IN `updateCustomerID` int,
    IN `updateProductID` int,
	IN `updateOrderID` int,
    IN `updateAmountOfProduct` int
)
BEGIN
    UPDATE ShoppingCart
    SET amountOfProduct = IF(`updateAmountOfProduct` <> '', `updateAmountOfProduct`, amountOfProduct),
		OrderID = IF(`updateOrderID` <> '', `updateOrderID`, OrderID)
    WHERE CustomerID = `updateCustomerID` AND ProductID = `updateProductID` AND OrderID = 0;
end $$

DELIMITER $$

CREATE PROCEDURE `update_milk_and_milk_product`(
    IN `updateProductID` int,
    IN `updateAmountOfMilkSugar` decimal(4,2)
)
BEGIN
    UPDATE MilkAndMilkProducts
    SET amountOfMilkSugar = `updateAmountOfMilkSugar`
    WHERE ProductID = `updateProductID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_fruits_and_vegetables`(
    IN `updateProductID` int,
    IN `updateSeason` varchar(255)
)
BEGIN
    UPDATE FruitsAndVegetables
    SET season = `updateSeason`
    WHERE ProductID = `updateProductID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_food_of_animal_origin`(
    IN `updateProductID` int,
    IN `updateMeatType` varchar(255)
)
BEGIN
    UPDATE FoodOfAnimalOrigin
    SET meatType = `updateMeatType`
    WHERE ProductID = `updateProductID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_order`(
    IN `updateID` int,
    IN `updateAddress` varchar(255),
    IN `updatePaymentType` varchar(255),
	IN `updateTotalCost` decimal(10,2)
)
BEGIN
    UPDATE Orders
    SET address = IF(`updateAddress` <> '', `updateAddress`, address),
        paymentType = IF(`updatePaymentType` <> '', `updatePaymentType`, paymentType),
		totalCost = IF(`updateTotalCost` <> '', `updateTotalCost`, totalCost)
    WHERE ID = `updateID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_comment`(
    IN `updateID` int,
    IN `updateComment` varchar(1000),
    IN `updateStar` int
)
BEGIN
    UPDATE Comment
    SET comment = IF(`updateComment` <> '', `updateComment`, comment),
        star = IF(`updateStar` <> '', `updateStar`, star)
    WHERE ID = `updateID`;
end $$

DELIMITER $$

CREATE PROCEDURE `update_discount_codes`(
    IN `updateCode` varchar(255),
    IN `updateNumberOfUsage` int,
    IN `updateExpireTime` datetime
)
BEGIN
    UPDATE DiscountCodes
    SET numberOfUsage = IF(`updateNumberOfUsage` <> '', `updateNumberOfUsage`, numberOfUsage),
        expireTime = IF(`updateExpireTime` <> '', `updateExpireTime`, expireTime)
    WHERE Code = `updateCode`;
end $$


DELIMITER $$

CREATE PROCEDURE `delete_customer`
(
	IN `deleted_ID` int
)
BEGIN
	UPDATE customer
    SET isDeleted = 1
    WHERE ID = `deleted_ID`;

END $$


DELIMITER $$

CREATE PROCEDURE `delete_manufacturer`
(
	IN `deleted_ID` int
)
BEGIN
	UPDATE manufacturer
    SET isDeleted = 1
    WHERE ID = `deleted_ID`;
END $$

DELIMITER $$

CREATE PROCEDURE `delete_shopping_cart`
(
	IN `_CustomerID` int,
	IN `_ProductID` int
	
)
BEGIN
	DELETE FROM `ShoppingCart`
	WHERE CustomerID = `_CustomerID` AND ProductID = `_ProductID` AND OrderID = 0;

END $$

DELIMITER $$

CREATE PROCEDURE `delete_product`
(
	IN `_ProductID` int
)
BEGIN
	UPDATE product
    SET isDeleted = 1
    WHERE ID = `_ProductID`;
END $$



DELIMITER $$

CREATE PROCEDURE `delete_comment`
(
	IN `deleted_ID` int
)
BEGIN
	DELETE FROM `Comment`
	WHERE ID = `deleted_ID`;
END $$

DELIMITER $$

CREATE
    TRIGGER increment_insert_customer BEFORE INSERT
    ON Customer
    FOR EACH ROW BEGIN

        SET NEW.id = (SELECT increment_insert_customer from sequences where ID = 1);

        UPDATE sequences
        SET increment_insert_customer = increment_insert_customer + 1
        WHERE ID = 1;

    END$$

DELIMITER ;

DELIMITER $$

CREATE
    TRIGGER increment_insert_manufacturer BEFORE INSERT
    ON Manufacturer
    FOR EACH ROW BEGIN
        SET NEW.id = (SELECT increment_insert_manufacturer from sequences where ID = 1);

        UPDATE sequences
        SET increment_insert_manufacturer = increment_insert_manufacturer + 1
        WHERE ID = 1;

    END$$

DELIMITER ;



DELIMITER $$

CREATE
    TRIGGER increment_insert_product BEFORE INSERT
    ON Product
    FOR EACH ROW BEGIN
        SET NEW.id = (SELECT increment_insert_product from sequences where ID = 1);

        UPDATE sequences
        SET increment_insert_product = increment_insert_product + 1
        WHERE ID = 1;


    END$$

DELIMITER ;


DELIMITER $$

CREATE
    TRIGGER increment_insert_milk_product BEFORE INSERT
    ON MilkAndMilkProducts
    FOR EACH ROW BEGIN

        SET NEW.ProductID = (SELECT MAX(id) FROM Product);


    END$$

DELIMITER ;


DELIMITER $$

CREATE
    TRIGGER increment_fruits_and_vegetables BEFORE INSERT
    ON FruitsAndVegetables
    FOR EACH ROW BEGIN

        SET NEW.ProductID = (SELECT MAX(id) FROM Product);

    END$$

DELIMITER ;

DELIMITER $$

CREATE
    TRIGGER increment_food_of_animal_origin BEFORE INSERT
    ON FoodOfAnimalOrigin
    FOR EACH ROW BEGIN

        SET NEW.ProductID = (SELECT MAX(id) FROM Product);

    END$$

DELIMITER ;


DELIMITER $$

CREATE
    TRIGGER increment_insert_orders BEFORE INSERT
    ON Orders
    FOR EACH ROW BEGIN
        SET NEW.id = (SELECT increment_insert_orders from sequences where ID = 1);

        UPDATE sequences
        SET increment_insert_orders = increment_insert_orders + 1
        WHERE ID = 1;

    END$$

DELIMITER ;

DELIMITER $$

CREATE
    TRIGGER increment_insert_comment BEFORE INSERT
    ON Comment
    FOR EACH ROW BEGIN
        SET NEW.id = (SELECT increment_insert_comment from sequences where ID = 1);

        UPDATE sequences
        SET increment_insert_comment = increment_insert_comment + 1
        WHERE ID = 1;

    END$$

DELIMITER ;
