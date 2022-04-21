/* CREATE TABLE */
CREATE TABLE ad_campaigns_demo(
date_ad VARCHAR(100),
campaign VARCHAR(100)
);

/* INSERT QUERY NO: 1 */
INSERT INTO ad_campaigns_demo(date_ad, campaign)
VALUES
(
'2000-01-03', 'Art with an attitude.'
);

/* INSERT QUERY NO: 2 */
INSERT INTO ad_campaigns_demo(date_ad, campaign)
VALUES
(
'2000-01-16', 'Art with an attitude.'
);

/* INSERT QUERY NO: 3 */
INSERT INTO ad_campaigns_demo(date_ad, campaign)
VALUES
(
'2000-02-17', 'Art with an attitude.'
);

/* INSERT QUERY NO: 4 */
INSERT INTO ad_campaigns_demo(date_ad, campaign)
VALUES
(
'2000-02-18', 'Art with an attitude.'
);

/* INSERT QUERY NO: 5 */
INSERT INTO ad_campaigns_demo(date_ad, campaign)
VALUES
(
'2000-02-26', 'Art with an attitude.'
);


/* CREATE TABLE */
CREATE TABLE categories_demo(
Name VARCHAR(100)
);

/* INSERT QUERY NO: 1 */
INSERT INTO categories_demo(Name)
VALUES
(
'Aquarium furniture'
);

/* INSERT QUERY NO: 2 */
INSERT INTO categories_demo(Name)
VALUES
(
'Bamboo furniture'
);

/* INSERT QUERY NO: 3 */
INSERT INTO categories_demo(Name)
VALUES
(
'Bar furniture'
);

/* INSERT QUERY NO: 4 */
INSERT INTO categories_demo(Name)
VALUES
(
'Bedrooms'
);

/* INSERT QUERY NO: 5 */
INSERT INTO categories_demo(Name)
VALUES
(
'Casegoods'
);

/* CREATE TABLE */
CREATE TABLE date_demo(
date VARCHAR(100)
);

/* INSERT QUERY NO: 1 */
INSERT INTO date_demo(date)
VALUES
(
'2000-01-01'
);

/* INSERT QUERY NO: 2 */
INSERT INTO date_demo(date)
VALUES
(
'2000-01-02'
);

/* INSERT QUERY NO: 3 */
INSERT INTO date_demo(date)
VALUES
(
'2000-01-03'
);

/* INSERT QUERY NO: 4 */
INSERT INTO date_demo(date)
VALUES
(
'2000-01-04'
);

/* INSERT QUERY NO: 5 */
INSERT INTO date_demo(date)
VALUES
(
'2000-01-05'
);

/* CREATE TABLE */
CREATE TABLE discounts_demo(
productid DOUBLE,
date VARCHAR(100),
discountprice DOUBLE
);

/* INSERT QUERY NO: 1 */
INSERT INTO discounts_demo(productid, date, discountprice)
VALUES
(
1, '2002-09-23', 125.43
);

/* INSERT QUERY NO: 2 */
INSERT INTO discounts_demo(productid, date, discountprice)
VALUES
(
1, '2005-01-02', 164.55
);

/* INSERT QUERY NO: 3 */
INSERT INTO discounts_demo(productid, date, discountprice)
VALUES
(
2, '2000-04-09', 239.68
);

/* INSERT QUERY NO: 4 */
INSERT INTO discounts_demo(productid, date, discountprice)
VALUES
(
2, '2007-03-23', 208.72
);

/* INSERT QUERY NO: 5 */
INSERT INTO discounts_demo(productid, date, discountprice)
VALUES
(
3, '2009-10-05', 183.21
);

/* CREATE TABLE */
CREATE TABLE holidays_demo(
date VARCHAR(100),
holidayname VARCHAR(100)
);

/* INSERT QUERY NO: 1 */
INSERT INTO holidays_demo(date, holidayname)
VALUES
(
'2009-05-25', 'Memorial Day'
);

/* INSERT QUERY NO: 2 */
INSERT INTO holidays_demo(date, holidayname)
VALUES
(
'2011-01-01', 'New Year\'s Day'
);

/* INSERT QUERY NO: 3 */
INSERT INTO holidays_demo(date, holidayname)
VALUES
(
'2011-01-17', 'Martin Luther King Jr. Day'
);

/* INSERT QUERY NO: 4 */
INSERT INTO holidays_demo(date, holidayname)
VALUES
(
'2011-02-21', 'President\'s Day'
);

/* INSERT QUERY NO: 5 */
INSERT INTO holidays_demo(date, holidayname)
VALUES
(
'2011-05-30', 'Memorial Day'
);

/* CREATE TABLE */
CREATE TABLE population_demo(
Name VARCHAR(100),
State VARCHAR(100),
Population DOUBLE
);

/* INSERT QUERY NO: 1 */
INSERT INTO population_demo(Name, State, Population)
VALUES
(
'Akron', 'MO', 7684915
);

/* INSERT QUERY NO: 2 */
INSERT INTO population_demo(Name, State, Population)
VALUES
(
'Akron', 'OH', 5947796
);

/* INSERT QUERY NO: 3 */
INSERT INTO population_demo(Name, State, Population)
VALUES
(
'Akron', 'RI', 3878285
);

/* INSERT QUERY NO: 4 */
INSERT INTO population_demo(Name, State, Population)
VALUES
(
'Albuquerque', 'NV', 3608365
);

/* INSERT QUERY NO: 5 */
INSERT INTO population_demo(Name, State, Population)
VALUES
(
'Albuquerque', 'OR', 6610173
);

/* CREATE TABLE */
CREATE TABLE productcategories_demo(
productid DOUBLE,
categoryname VARCHAR(100)
);

/* INSERT QUERY NO: 1 */
INSERT INTO productcategories_demo(productid, categoryname)
VALUES
(
1, 'Sword furniture'
);

/* INSERT QUERY NO: 2 */
INSERT INTO productcategories_demo(productid, categoryname)
VALUES
(
1, 'Occasional furniture'
);

/* INSERT QUERY NO: 3 */
INSERT INTO productcategories_demo(productid, categoryname)
VALUES
(
2, 'Outdoor Furniture'
);

/* INSERT QUERY NO: 4 */
INSERT INTO productcategories_demo(productid, categoryname)
VALUES
(
2, 'Metal furniture'
);

/* INSERT QUERY NO: 5 */
INSERT INTO productcategories_demo(productid, categoryname)
VALUES
(
3, 'Park furniture '
);

/* CREATE TABLE */
CREATE TABLE products_demo(
productid DOUBLE,
name VARCHAR(100),
retailprice DOUBLE
);

/* INSERT QUERY NO: 1 */
INSERT INTO products_demo(productid, name, retailprice)
VALUES
(
1, 'Zeejubin', 258.36
);

/* INSERT QUERY NO: 2 */
INSERT INTO products_demo(productid, name, retailprice)
VALUES
(
2, 'Varpickilower', 314.78
);

/* INSERT QUERY NO: 3 */
INSERT INTO products_demo(productid, name, retailprice)
VALUES
(
3, 'Unwerplar', 256.45
);

/* INSERT QUERY NO: 4 */
INSERT INTO products_demo(productid, name, retailprice)
VALUES
(
4, 'Parfropollin', 472.04
);

/* INSERT QUERY NO: 5 */
INSERT INTO products_demo(productid, name, retailprice)
VALUES
(
5, 'Inkilentor', 180.03
);


/* CREATE TABLE */
CREATE TABLE sales_demo(
productid DOUBLE,
storeid DOUBLE,
date VARCHAR(100),
quantity DOUBLE
);

/* INSERT QUERY NO: 1 */
INSERT INTO sales_demo(productid, storeid, date, quantity)
VALUES
(
1, 108, '2007-01-21', 1
);

/* INSERT QUERY NO: 2 */
INSERT INTO sales_demo(productid, storeid, date, quantity)
VALUES
(
1, 214, '2002-09-02', 7
);

/* INSERT QUERY NO: 3 */
INSERT INTO sales_demo(productid, storeid, date, quantity)
VALUES
(
1, 234, '2002-05-11', 2
);

/* INSERT QUERY NO: 4 */
INSERT INTO sales_demo(productid, storeid, date, quantity)
VALUES
(
1, 242, '2000-09-14', 1
);

/* INSERT QUERY NO: 5 */
INSERT INTO sales_demo(productid, storeid, date, quantity)
VALUES
(
1, 315, '2005-02-27', 3
);

/* CREATE TABLE */
CREATE TABLE stores_demo(
storeid DOUBLE,
phone VARCHAR(100),
address VARCHAR(100),
cityname VARCHAR(100),
state VARCHAR(100),
restaurant DOUBLE,
snackbar DOUBLE,
childcare_time DOUBLE
);

/* INSERT QUERY NO: 1 */
INSERT INTO stores_demo(storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time)
VALUES
(
1, '(239) 167-4627', '78 Fabien Freeway', 'Oakland', 'NH', 1, 1, 45
);

/* INSERT QUERY NO: 2 */
INSERT INTO stores_demo(storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time)
VALUES
(
2, '(744) 032-1717', '29 West Milton St.', 'New Orleans', 'IN', 1, 1, 45
);

/* INSERT QUERY NO: 3 */
INSERT INTO stores_demo(storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time)
VALUES
(
3, '544-510-8934', '271 Fabien Parkway', 'Lubbock', 'IL', 1, 1, 30
);

/* INSERT QUERY NO: 4 */
INSERT INTO stores_demo(storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time)
VALUES
(
4, '340-264-5348', '444 North Rocky Milton Avenue', 'Cleveland', 'CT', 0, 1, 0
);

/* INSERT QUERY NO: 5 */
INSERT INTO stores_demo(storeid, phone, address, cityname, state, restaurant, snackbar, childcare_time)
VALUES
(
5, '(111) 026-2512', '97 Hague Blvd.', 'Tampa', 'NE', 1, 1, 0
);