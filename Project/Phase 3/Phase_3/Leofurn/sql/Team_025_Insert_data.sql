##Table Advertising_Campaign Table
##****************************
INSERT INTO Advertising_Campaign (date, description) SELECT date_ad, campaign FROM ad_campaigns_demo


##Table Category 
******************
INSERT INTO Category (category_name) SELECT Name FROM categories_demo

##Table City 
***************
INSERT INTO city (city_name, population, state) SELECT Name, Population, State FROM population_demo

##Table Date 
***************
INSERT INTO date (date) SELECT date FROM date_demo

##Table Holiday 
*******************
INSERT INTO Holiday (date, name) SELECT date, holidayname FROM holidays_demo


##Table Product
*******************
SET SESSION sql_mode='NO_AUTO_VALUE_ON_ZERO';
INSERT INTO Product (PID, retail_price, product_name) SELECT productid, retailprice, name FROM products_demo

##Table store
*****************
INSERT INTO store (store_number, store_phone_number, address,city_name,state,has_restaurant,has_snack_bar,childcare_time) SELECT storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time FROM stores_demo

##Table Belongs_to
***********************
INSERT INTO Belongs_to (PID, category_name) SELECT productid, categoryname FROM productcategories_demo


##Table fordiscount
***********************
INSERT INTO fordiscount (date, discounted_price, PID) SELECT date, discountprice, productid FROM discounts_demo

##Table Sold
***********************
INSERT INTO Sold (quantity, PID, store_number, date) SELECT quantity, productid, storeid, date FROM sales_demo
