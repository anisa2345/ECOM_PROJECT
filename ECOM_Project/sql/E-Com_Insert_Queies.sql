-- ----------------------------------------------------------
insert into category (id,name) values(1, 'MEN');
insert into category (id, name) values(2, 'WOMEN');
insert into category (id, name) values(3, 'UNISEX');
-- -----------------------------------------------------------
insert into sub_category(id, name, category) values (1, 'Footware',1);
insert into sub_category(id, name, category) values (2, 'Footware',2);

insert into sub_category(id, name, category) values (3, 'Clothing',1);
insert into sub_category(id, name, category) values (4, 'Clothing',2);

insert into sub_category(id, name, category) values (5, 'Electronics',3);

insert into sub_category(id, name, category) values (6, 'Watch',1);
insert into sub_category(id, name, category) values (7, 'Watch',2);
-- ---------------------------------------------------------
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Beat Headphone(red)','Beat\'s high bass high quality headphone', 'Beat', 5, 12999, 'headphone1.png',100,'Popular');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Headphone 2','Black headphone (high bass)', 'Samsung', 5, 1500, 'headphone2.png',100,'Popular');  
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Beat headphone (yellow)','Beat\'s high bass high quality headphone', 'Sony', 5, 2700, 'headphone3.png',100,'Popular');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black headphone','Boat\'s high bass headphone', 'Boat', 5, 3200, 'headphone4.jpg',100,'Popular');

INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('White Formal Shirt','White Formal Shirt for men', 'Peter England', 3, 1200, 'shirt1.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Brown Jacket','Men\s Brown Jacket', 'Max', 3, 1700, 'shirt2.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black Jacket','Black Jacket for men', 'Allen Solly', 3, 3800, 'shirt3.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Grey Shirt','Grey Shirt for men', 'Max', 3, 1800, 'shirt4.jpg',100,'NA');

INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Women Watch','Analogue Wrist Watch for Women\'s', 'Titan', 6, 1999, 'watch1.jpg',100,'Trending');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Women Watch','Women Bracelet Watch', 'Titan', 6, 2999, 'watch2.jpg',100,'Trending');

INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Watch','Multi Functional Sports Watch', 'Titan', 6, 1999, 'watch3.jpg',100,'Trending');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Watch','Digital Men\'s Watch', 'Titan', 6, 2999, 'watch4.jpg',100,'Trending');

INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black Shoe','Black Shoe', 'Campus', 1, 1200, 'shoe1.jpg',100,'New Arrival');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black Blue Shoe','Black Blue Shoe', 'Nike', 1, 2700, 'shoe2.jpg',100,'New Arrival');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black & White Shoe','Black & White Shoe', 'Campus', 2, 1700, 'shoe3.jpg',100,'New Arrival');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black high neck Shoe','Black high neck Shoe', 'Nike', 2, 3700, 'shoe4.jpg',100,'New Arrival');


INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black-Blue-Suit for Women','Black-Blue-suit for Women', 'Fashion', 4, 500, 'suit1.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Sky Suit For Women','Sky suit For Women', 'Fashion', 4, 600, 'suit2.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Red White suit for Women','Red White suit for Women', 'Fashion', 4, 700, 'suit3.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('One peice dress for women','One peice dress for women', 'Fashion', 4, 700, 'suit4.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black-Blue-suit for Women','Black-Blue-suit for Women', 'Fashion', 4, 500, 'suit5.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black stylish suit For Women','Black stylish suit for Women', 'Fashion', 4, 600, 'suit6.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Pink White suit for Women','Pink White suit for Women', 'Fashion', 4, 700, 'suit7.jpg',100,'NA');
INSERT INTO product ( title,`desc`,brand,sub_category,price, thumbnail,available_qty,prod_highlight) VALUES ('Black red suit for Women','Black red suit for Women', 'Fashion', 4, 700, 'suit8.jpg',100,'NA');

commit;



SET SQL_SAFE_UPDATES = 1;