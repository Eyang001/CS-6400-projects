<?php include("lib/header.php");?>
<title>View Report 4</title>
</head>
<body>
<?php include("lib/menu.php");?>
<div class="Dashboard_wrapper">
<h3 class="summary_title">To View Report4: "Outdoor Furniture on Groundhog Day ?"</h3>
<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');
// Create connection
$query = "SELECT a.asold_year AS sold_year, a.atotal_yearly_sold AS total_yearly_sold, ROUND(a.atotal_yearly_sold / 365) AS avg_yearly_sold, b.groundhog_day_sold

FROM

(SELECT YEAR(s.date) AS asold_year, SUM(s.quantity) AS atotal_yearly_sold
 FROM sold AS s NATURAL JOIN belongs_to AS bt
 WHERE bt.category_name = 'Outdoor Furniture'
GROUP BY Year(s.date)
) a
 
 INNER JOIN
 
 (SELECT Year(s.date) AS bsold_year, SUM(s.quantity) AS groundhog_day_sold
  FROM sold AS s NATURAL JOIN belongs_to AS bt
 WHERE bt.category_name = 'Outdoor Furniture' AND DAY(s.date) = 2 AND MONTH(s.date) = 2 
 GROUP BY bsold_year
 ) b

ON a.asold_year = b.bsold_year

GROUP BY sold_year 
ORDER BY sold_year ASC";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
// Check connection
if (!empty($result)) { 

  echo "<table>
		<tr>
			<th>Sold Year</th>
			<th>Total Yearly Sold</th>
			<th>Average Daily Sold</th>
			<th>Total Groundhog Day Sold</th>
		</tr> ";
  // ROW WISE OUTPUT
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

		 echo "<tr>
					<td>". $row['sold_year']."</td>
					<td>". $row['total_yearly_sold']."</td>
					<td>". $row['avg_yearly_sold']."</td>
					<td>". $row['groundhog_day_sold'] ."</td>
				</tr>";

	
  }
  echo "</table>";
} else {
  echo "<p style='text-align:center;'>0 results</p>";
}
?>
<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
</div>
</div>

<?php include("lib/footer.php");?>

</body>
</html>