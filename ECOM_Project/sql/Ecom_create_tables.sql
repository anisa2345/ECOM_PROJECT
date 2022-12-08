CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
);

CREATE TABLE `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `delivery_address` text NOT NULL,
  `user_id` int NOT NULL,
  `country` varchar(45) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `address_userid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);


CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
);

CREATE TABLE `sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `category` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_idx` (`category`),
  CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`)
);


CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `sub_category` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `thumbnail` varchar(300) DEFAULT NULL,
  `available_qty` int NOT NULL DEFAULT '0',
  `prod_highlight` varchar(45) DEFAULT 'NA',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `thumbnail_UNIQUE` (`thumbnail`),
  KEY `sub_category_idx` (`sub_category`),
  CONSTRAINT `sub_category` FOREIGN KEY (`sub_category`) REFERENCES `sub_category` (`id`)
) ;

CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `user_id_fk_idx` (`user_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);



CREATE TABLE `checkout` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cart_id` int DEFAULT NULL,
  `final_price` decimal(10,2) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checkout_cart_id_fk_idx` (`cart_id`),
  KEY `checkout_user_fk_idx` (`user_id`),
  CONSTRAINT `checkout_cart_id_fk` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  CONSTRAINT `checkout_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);


CREATE TABLE `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL,
  `address` text NOT NULL,
  `country` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `ord_user_id_fk_idx` (`user_id`)
);
