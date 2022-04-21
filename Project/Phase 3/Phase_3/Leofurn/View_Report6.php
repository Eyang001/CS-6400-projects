<html>
<?php include("lib/header.php");?>
<link rel="stylesheet" type="text/css" href="css/Report5.css" />
<head>
<title>View Report 6</title>

</head>
<body>
<?php include("lib/menu.php");?>


<div class="Dashboard_wrapper">
<h3 class="summary_title">Revenue by Population</h3>
<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');
// Create connection
$query = "SELECT *,
CASE
WHEN Population < 3700000 THEN 'Small'
WHEN Population >= 3700000 AND Population < 6700000 THEN 'Medium'
WHEN Population >= 6700000 AND Population < 9000000 THEN 'Large'
ELSE 'ExtraLarge'
END AS city_category
FROM(
SELECT a.Year, FORMAT((a.Revenue + b.Revenue),2) AS Revenue, a.Population
FROM
(SELECT Year(S1.date) as Year, C.city_name AS City_Name, C.state AS State, sum(S1.quantity*P.retail_Price) AS Revenue, C.population AS Population 
FROM sold AS S1 
JOIN product AS P ON S1.PID = P.PID 
JOIN store AS S2 ON S1.store_number = S2.store_number 
JOIN city AS C ON S2.city_name = C.city_name AND S2.state = C.state 
WHERE S1.PID NOT IN (SELECT PID FROM fordiscount) AND S1.date IN (SELECT date FROM fordiscount)
GROUP BY Year(S1.date), C.city_name, C.state 
ORDER BY Year(S1.date) ASC, Population ASC) a
LEFT OUTER JOIN
(SELECT Year(S1.date) as Year, C.city_name AS City_Name, C.state AS State, sum(S1.quantity*F.discounted_price) AS Revenue, C.population AS Population 
FROM fordiscount AS F,
sold AS S1 
JOIN product AS P ON S1.PID = P.PID 
JOIN store AS S2 ON S1.store_number = S2.store_number 
JOIN city AS C ON S2.city_name = C.city_name AND S2.state = C.state 
WHERE S1.PID = F.PID and S1.date = F.date
GROUP BY Year(S1.date), C.city_name, C.state 
ORDER BY Year(S1.date) ASC, Population ASC) b
ON a.Year = b.Year AND a.City_Name = b.City_Name AND a.State = b.State AND a.Population = b.Population
ORDER BY a.Year ASC, a.Population ASC) as T
";

            
$result = mysqli_query($conn, $query);
mysqli_close($conn); 
// Check connection
if (!empty($result)) { 
?>
  	<div>
		<table>
			<tr>
				<th>YEAR</th>
				<th>REVENUE</th>
				<th>POPULATION </th>
				<th>CITY CATEGORY</th>
			</tr>
<?php
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         echo "<tr><td align='center' >" . $row['Year'] . "</td>
         <td align='center'> ". $row['Revenue']. "</td>
		 <td align='center'> ". $row['Population']. "</td>
         <td align='center'>". $row['city_category']. "</td> </tr>";
  }
  ?>
  </table>
  </div>
  <?php
} else {
  echo "<p style='text-align:center;'>0 results</p>";
}
?>
<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
</div></div>

<?php include("lib/footer.php");?>
</body>
</html>
