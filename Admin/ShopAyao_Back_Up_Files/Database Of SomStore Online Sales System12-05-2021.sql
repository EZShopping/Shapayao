DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(123) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("42","Electronics","ELECTRONICS","12039452_525963140912391_6353341236808813360_n.png");
INSERT INTO category VALUES("43","Women\'s Apparel","WOMEN\'S CLOTHING","1638438670_n43r.png");
INSERT INTO category VALUES("44","Men\'s Apparel","MEN\'S CLOTHING","44.png");
INSERT INTO category VALUES("45","Beverages","WINES AND OTHER DRINKS","1638429689_Guyabano-Wine.png");
INSERT INTO category VALUES("46","Furnitures","FURNITURES","1638429819_asian-furniture-250x250.jpg");
INSERT INTO category VALUES("47","Home and Living","HOME ESSENTIALS","1638444782_received_857034181849844.jpeg");
INSERT INTO category VALUES("48","Stationary","STATIONARIES","1638425873_Philodendron.jpg");
INSERT INTO category VALUES("49","Collectibles","COLLECTIBLES","1638427626_Aliwa.jpg");
INSERT INTO category VALUES("50","Crafts","CRAFTS","1638437490_Sling.jpg");
INSERT INTO category VALUES("51","Foods","FOODS","1638441591_received_662476401344749.jpeg");


DROP TABLE IF EXISTS chatting;

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO chatting VALUES("6","Janan Ali","Hallo is any budy there?","2014-08-13 10:01:29","127.0.0.1");
INSERT INTO chatting VALUES("7","Abdirasaaq","Tell  Me The Black Pepsi","2014-08-13 10:04:15","127.0.0.1");
INSERT INTO chatting VALUES("8","Admin","Halo Iam Here","2014-08-13 10:05:04","127.0.0.1");
INSERT INTO chatting VALUES("9","Abdirasaaq","How The price of b pepsui","2014-08-13 10:05:29","127.0.0.1");
INSERT INTO chatting VALUES("10","Admin","!0 dollar at lest","2014-08-13 10:05:50","127.0.0.1");
INSERT INTO chatting VALUES("11","Nimco Qadaafi","OO Walaal Tuxaaafa Waa Qaalia WWa sidee","2014-08-15 12:36:58","127.0.0.1");
INSERT INTO chatting VALUES("12","Admin","It&#39;s Too Fair According Ware House Mannager","2014-08-15 12:37:34","127.0.0.1");
INSERT INTO chatting VALUES("13","Janan","Any Budy There????????????????????","2014-08-15 13:44:33","127.0.0.1");
INSERT INTO chatting VALUES("14","mahamed","gudoomiye waran bal","2014-08-18 01:15:15","::1");
INSERT INTO chatting VALUES("15","admin","wa khayr sxb sare","2014-08-18 01:15:39","::1");


DROP TABLE IF EXISTS clients;

CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(29) NOT NULL,
  `Phone` varchar(29) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO contact VALUES("7","A.rahman Osman","Mucaad33@gmail.com","252634188000"," i like this Shopping site ");
INSERT INTO contact VALUES("8","Abdirahman Ali Abdi","jananalibritish@gmail.com","0252634138440"," What a nice shopping site");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `Cust_Id` int(15) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(25) NOT NULL DEFAULT '',
  `UserName` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(25) NOT NULL DEFAULT '',
  `Email` varchar(55) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `Re_Password` varchar(20) NOT NULL DEFAULT '',
  `Country` varchar(25) NOT NULL DEFAULT '',
  `City` varchar(25) NOT NULL DEFAULT '',
  `Adress` varchar(55) NOT NULL DEFAULT '',
  `PostalCode` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cust_Id`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("17","Abdirahman Ali Abdi","admin","063 4138440","jananalibritish@gmail.com","admin123","admin123","Somalia","Awdal","Hargeisa","767u");
INSERT INTO customer VALUES("18","Abdirahman Osman","Osman","+252-63-418440","Mucaad@gmail.com","osman123","osman123","Somalia","Awdal","Xalane","Borama201");
INSERT INTO customer VALUES("19","Janan Ali British","arabsiyo","+252-63-4138440","Arabsiyo@gmail.com","arabsiyo123","arabsiyo123","Somalia","Woqooyi Galbeed","Arabsiyo","Hr103");


DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `Employee_ID` int(95) NOT NULL AUTO_INCREMENT,
  `Employee_Name` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO employee VALUES("4","Jovelyn Garcia","jovelyn@gmail.com","jovelyn123","j.png");


DROP TABLE IF EXISTS invoice_items;

CREATE TABLE `invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` int(10) unsigned DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `unit_price` decimal(9,2) DEFAULT 0.00,
  `qty` decimal(9,3) DEFAULT 1.000,
  `tax` decimal(4,2) DEFAULT 0.00,
  `price` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice` (`invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS invoices;

CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Due',
  `date_due` date DEFAULT NULL,
  `client` int(10) unsigned DEFAULT NULL,
  `client_contact` int(10) unsigned DEFAULT NULL,
  `client_address` int(10) unsigned DEFAULT NULL,
  `client_phone` int(10) unsigned DEFAULT NULL,
  `client_email` int(10) unsigned DEFAULT NULL,
  `client_website` int(10) unsigned DEFAULT NULL,
  `client_comments` int(10) unsigned DEFAULT NULL,
  `subtotal` decimal(9,2) DEFAULT NULL,
  `discount` decimal(4,2) DEFAULT 0.00,
  `tax` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `client` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS membership_grouppermissions;

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT 0,
  `allowEdit` tinyint(4) NOT NULL DEFAULT 0,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`permissionID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO membership_grouppermissions VALUES("1","1","clients","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("2","1","invoices","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("3","1","invoice_items","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("4","2","clients","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("5","2","invoices","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("6","2","invoice_items","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("7","3","clients","1","3","3","3");
INSERT INTO membership_grouppermissions VALUES("8","3","invoices","1","3","3","3");
INSERT INTO membership_grouppermissions VALUES("9","3","invoice_items","1","3","3","3");


DROP TABLE IF EXISTS membership_groups;

CREATE TABLE `membership_groups` (
  `groupID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO membership_groups VALUES("1","anonymous","Anonymous group created automatically on 2014-08-17","0","0");
INSERT INTO membership_groups VALUES("2","anonymous","Anonymous group created automatically on 2014-08-17","0","0");
INSERT INTO membership_groups VALUES("3","Admins","Admin group created automatically on 2014-08-17","0","1");


DROP TABLE IF EXISTS membership_userrecords;

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) unsigned DEFAULT NULL,
  `dateUpdated` bigint(20) unsigned DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  PRIMARY KEY (`recID`),
  KEY `pkValue` (`pkValue`),
  KEY `tableName` (`tableName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS membership_users;

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) unsigned DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text DEFAULT NULL,
  `custom2` text DEFAULT NULL,
  `custom3` text DEFAULT NULL,
  `custom4` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO membership_users VALUES("admin","21232f297a57a5a743894a0e4a801fc3","admin@localhost","2014-08-17","3","0","1","","","","","Admin member created automatically on 2014-08-17");
INSERT INTO membership_users VALUES("guest","","","2014-08-17","1","0","1","","","","","Anonymous member created automatically on 2014-08-17");


DROP TABLE IF EXISTS payment;

CREATE TABLE `payment` (
  `order_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(25) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Postal_Code` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Country` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `Phone` varchar(55) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Dilivery_Address` varchar(75) NOT NULL,
  `Total_Amount` varchar(55) NOT NULL,
  PRIMARY KEY (`order_ID`),
  KEY `Warehouse_ID` (`Warehouse_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO payment VALUES("1","Janan Ali British","jananalibritish@gmail.com","Ar102","Arabsiyo","SRB","Arabsiyo","+252634138440","8","Arabsiyo","");
INSERT INTO payment VALUES("2","Abdirahman Osman","j@j.com","i","h","SOM","h","9","8","h","");
INSERT INTO payment VALUES("3","Abdirahman Osman","jananalibri@gmail.com","2522","hargeisa jigjiga yar","SOM","Hargeisa","4138440","8","150 street end","");


DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `Product_ID` int(255) NOT NULL AUTO_INCREMENT,
  `productName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Category_ID` (`Category_ID`),
  KEY `Warehouse_ID` (`Warehouse_ID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

INSERT INTO product VALUES("1","Alocasia","48","N/A","plant","10","alocasia","300","1638701160_1638426723_1637405463431.jpg");
INSERT INTO product VALUES("2","Sling Bag","50","N/A","Bag","11","Hand-made","350","1638715020_1638437490_Sling.jpg");
INSERT INTO product VALUES("3","Traditional Wear","43","N/A","Abul","10","Womens","1500","1638700800_1638438670_n43r.png");
INSERT INTO product VALUES("4","Bignay Wine","45","N/A","Wine","8","Fruit Wine","300","1638700920_1638429459_Bugnay-Wine.jpg");
INSERT INTO product VALUES("11","Aglaonema Emerald Star","48","N/A","Plants","8","indoor plant","250","1638700440_1638421029_Emerald.jpg");
INSERT INTO product VALUES("12","Santol Wine","45","N/A","Drinks","7","Fruit Wine","350","1638700860_1638428040_Santol-Wine.jpg");
INSERT INTO product VALUES("13","Mens Suit","44"," na","suit","9","suit","1590","1638701820_44.png");
INSERT INTO product VALUES("14","Laptop Pavillion","42","HP","laptop","7","laptop","50000","1638701880_12039452_525963140912391_6353341236808813360_n.png");
INSERT INTO product VALUES("15","Alocasia Frydek","48","na","plants","8","alocasia plant","280","1638702000_1638422139_Alocasia.jpg");
INSERT INTO product VALUES("16","Picarra Plant","48","na","plant","8","picarra","300","1638702120_1638425679_Picarra.jpg");
INSERT INTO product VALUES("17","Blushing Philodendron","48","na","plant","8","indoor plant","200","1638702240_1638425873_Philodendron.jpg");
INSERT INTO product VALUES("18","Black Velvet","48","na","plant","8","perennial","500","1638702660_1638426286_Velvet.jpg");
INSERT INTO product VALUES("20","Redlipstick Alomenia","48","na","plant","8","Bright colored","250","1638702720_1638426522_RedLipstick.jpg");
INSERT INTO product VALUES("21","Alocasia","48","na","plant","8","indoor plant","300","1638702780_1638426723_1637405463431.jpg");
INSERT INTO product VALUES("22","Tiger Plant","48","na","plant","8","indoor plant","200","1638702840_1638427158_1637405452345.jpg");
INSERT INTO product VALUES("23","Variegated Papua Kalipay Plant","48","na","plant","8","indoor plant","280","1638703020_1638426074_1637405490593.jpg");
INSERT INTO product VALUES("24","Fruit Tray","50","na","vines","10","hand-made","250","1638703080_1638427427_Fruitray.png");
INSERT INTO product VALUES("26","Aliwa Miniature","49","na","miniature","11","miniature","350","1638703200_1638427626_Aliwa.jpg");
INSERT INTO product VALUES("27","Tapey Wine","45","na","wine","12","fruit wine","300","1638703260_1638428209_1638413810_Tapey-Wine.png");
INSERT INTO product VALUES("28","Accessories","43","na","jewelries","11","jewelries","150","1638703320_1638428363_Accessories1.jpg");
INSERT INTO product VALUES("29","Food Keeper","50","na","weaved","11","hand-made","500","1638703320_1638428488_Food-Keeper.jpg");
INSERT INTO product VALUES("30","Guyabano Wine","45","na","wine","12","fruit Wine","300","1638703680_1638429689_Guyabano-Wine.png");
INSERT INTO product VALUES("31","Asian furniture","46","na","wood","14","wooden","15700","1638708240_1638429819_asian-furniture-250x250.jpg");
INSERT INTO product VALUES("32","Tote Bag","50","na","hand made","10","hand made","450","1638703920_1638437338_Bag1.png");
INSERT INTO product VALUES("33","Traditional Wear","43","na","pair","9","traditional","1590","1638703980_1638440648_IMG_20211124_122829_666[1].jpg.png");
INSERT INTO product VALUES("34","Apayao Blend","45","na","ground","12","ground coffee","450","1638704040_1638441375_received_292629055748964.jpeg");
INSERT INTO product VALUES("35","Banana Chips","51","na","fried","12","banana chips","8","1638704040_1638441591_received_662476401344749.jpeg");
INSERT INTO product VALUES("36","Chili Oil","51","na","condiments","11","oil","175","1638704160_received_288531493203084[1].jpeg");
INSERT INTO product VALUES("37","Baag","44","na","abul","11","traditional wear","600","1638704340_received_579883823114827[1].jpeg");
INSERT INTO product VALUES("38","Door Mat","47","na","mat","9","hand-made","35","1638704400_1638441740_received_6779678655390763.jpeg");
INSERT INTO product VALUES("39","Necklace","43","na","na","10","necklace","500","1638704460_1638444522_received_1575107606164795.jpeg");
INSERT INTO product VALUES("40","Pias Wine","45","na","na","12","fruit wine","250","1638704460_1638445368_Pias-Wine.jpg");
INSERT INTO product VALUES("41","Sony Experia","42","na","na","17","Sony Experia","6999","1638704520_530201353846AM_635_sony_xperia_z.png");
INSERT INTO product VALUES("42","SONY Camera","42","na","na","15","camera","15990","1638704580_1638441828_camera.jpg");
INSERT INTO product VALUES("43","Android Phone","42","na","phone","14","black android","3999","1638704640_android-phone.jpg");
INSERT INTO product VALUES("44","Rock Formation Collectible","49","na","na","7","rock formation","350","1638704700_1638445750_Souvenir.jpg");
INSERT INTO product VALUES("45","Ipad Air","42","Apple","ipad","17","ipad air","17000","1638704820_iPad-air.png");
INSERT INTO product VALUES("46","Ipad Air 2","42","apple","air","17","ipad air 2","25000","1638704880_da4371ffa192a115f922b1c0dff88193.png");
INSERT INTO product VALUES("47","Iphone 6S","42","6s","iphone","17","iphone 6s","21000","1638704940_http___pluspng.com_img-png_iphone-6s-png-iphone-6s-gold-64gb-1000.png");
INSERT INTO product VALUES("48","Iphone 6 plus","42","apple","iphone","17","iphone 6 plus","23000","1638705000_http___pluspng.com_img-png_iphone-hd-png-iphone-apple-png-file-550.png");
INSERT INTO product VALUES("49","iphone 5s","42","apple","iphone","17","iphone 6s","12000","1638705060_iphone mobile.jpg");
INSERT INTO product VALUES("50","HP Laptop","42","HP","laptop","14","laptop","25000","1638705120_k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg-bc204bdaebb10e709a997a8bb4518156dfa6e3ed-optim-450x450.jpg");
INSERT INTO product VALUES("51","Aliwa","47","na","na","11"," ","1500","1638705480_1638444782_received_857034181849844.jpeg");
INSERT INTO product VALUES("52","Wood Table","46","na","na","14","wooden","3500","1638707640_1638706140_received_3175941275976027[1].jpeg");
INSERT INTO product VALUES("53","Pot Holder","47","na","na","9","hand made","35","1638706200_received_3078855222385349[1].jpeg");
INSERT INTO product VALUES("54","Wooden Chair","46","na","na","14","wooden","3500","1638706260_received_439149344450446[1].jpeg");
INSERT INTO product VALUES("55","Weaved Tote Bag","50","na","na","11","Hand made","450","1638706560_received_568620144218666.jpeg");
INSERT INTO product VALUES("56","Womens Wallet","43","na","na","10","wallet","200","1638706560_received_581627649837942.jpeg");
INSERT INTO product VALUES("57","Basket","50","na","na","10","hand made","450","1638706800_Bag2.jpg");
INSERT INTO product VALUES("58","Kalinga Coffee","45","na","na","12","Brewed Coffee","550","1638707760_received_1595144014164154[1].jpeg");
INSERT INTO product VALUES("59","Abul Clothe","47","na","na","9","abul clothe","599","1638707880_received_647683836226703[1].jpeg");
INSERT INTO product VALUES("60","Turmeric Tea","45","na","na","10","tea","200","1638708000_received_495820901648104[1].jpeg");
INSERT INTO product VALUES("61","Wooden Cabinet","46","na","na","14","wooden","15000","1638708480_received_188829096716844[1].jpeg");
INSERT INTO product VALUES("62","Flower Vase","50","na","na","8","hand made","450","1638708900_received_278494830681099[1].jpeg");
INSERT INTO product VALUES("63","Fruit Basket","50","na","na","10","fruit basket","575","1638709200_received_271112224962835[1].jpeg");
INSERT INTO product VALUES("64","Iku KNife","47","na","na","11","iku knife","500","1638709740_received_404829341097549[1].jpeg");
INSERT INTO product VALUES("65","Iku Miniature","49","na","na","10","Iku miniature","500","1638711180_received_268267085214870[1].jpeg");
INSERT INTO product VALUES("66","White Line Half Sleeve for Men","44","na","na","15","White Lined","649","1638712140_received_448839493344978.jpeg");
INSERT INTO product VALUES("67","Isnag Knives Miniature","49","na","na","11","souvenirs","450","1638712260_received_280401037281047.jpeg");
INSERT INTO product VALUES("68","Floral Long Wallet","43","na","na","16","long wallet","250","1638713940_received_282758843792051[1].jpeg");
INSERT INTO product VALUES("69","Belt Bag for women","43","na","na","16","belt bag","379","1638714120_received_483683909736806[1].jpeg");
INSERT INTO product VALUES("70","Chanel Slippers","43","an","an","16","channel for women","250","1638714240_received_195024106165184[1].jpeg");
INSERT INTO product VALUES("71","Crop top for Women","43","na","na","16","cro top","350","1638714360_148701.jpg");
INSERT INTO product VALUES("72","Minimalist Necklace","43","na","na","16","minimal style","750","1638714420_received_629010768135893[1].jpeg");
INSERT INTO product VALUES("73","Shoes for Men","44","na","na","15","blue","550","1638714900_rrr.jpg");


DROP TABLE IF EXISTS tblsongs;

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `songsinger` varchar(100) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

INSERT INTO tblsongs VALUES("38","Parokya ","Parokya Ni Edgar - One And Only You.mp3","Parokya ");
INSERT INTO tblsongs VALUES("37","Amber Pacific","Amber Pacific - Falling Away.mp3","Them");
INSERT INTO tblsongs VALUES("42","Parokya ","Parokya Ni Edgar - Gitara.mp3","Parokya ");
INSERT INTO tblsongs VALUES("43","Boyce Avenue","Boyce Avenue - Because of You.mp3","Boyce Avenue");
INSERT INTO tblsongs VALUES("44","Boyce Avenue","Boyce Avenue - Every Breath.mp3","Boyce Avenue");
INSERT INTO tblsongs VALUES("45","Eminem","Eminen 8 miles.mp3","Eminem");


DROP TABLE IF EXISTS warehouse;

CREATE TABLE `warehouse` (
  `Warehouse_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `PostalCode` varchar(55) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Warehouse` varchar(55) NOT NULL,
  PRIMARY KEY (`Warehouse_ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `PostalCode` (`PostalCode`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO warehouse VALUES("7","PH","Apayao","Luna","3813","shopayao@gmail.com","SA Luna");
INSERT INTO warehouse VALUES("8","PH","Apayao","Calanasan","3814","rose@gmail.com","SA Calanasan");
INSERT INTO warehouse VALUES("9","PH","Apayao","Flora","3810","avemay@gmail.com","SA Flora");
INSERT INTO warehouse VALUES("10","PH","Apayao","Kabugao","3809","jovelyn@gmail.com","SA Kabugao");
INSERT INTO warehouse VALUES("11","PH","Apayao","Pudtol","3812","joylumbo@gmail.com","SA Pudtol");
INSERT INTO warehouse VALUES("12","PH","Apayao","Sta. Marcela","3811","abegail@gmail.com","SA Sta. Marcela");
INSERT INTO warehouse VALUES("14","","Cagayan","Tuguegarao","3500","trixie@gmail.com","SA Tuguegarao");
INSERT INTO warehouse VALUES("15","PH","Cagayan","Aparri","3515","rhomar@gmail.com","SA Aparri");
INSERT INTO warehouse VALUES("16","PH","Cagayan","Sanchez Mira","3518","jayrald@gmail.com","SA Sanchez Mira");
INSERT INTO warehouse VALUES("17","PH","Cagayan","Claveria","3519","dhonaguinalldovill@gmail.com","SA Claveria");


