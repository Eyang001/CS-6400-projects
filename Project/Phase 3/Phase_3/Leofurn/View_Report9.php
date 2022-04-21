<?php include("lib/header.php");?>
<title>View Report 9</title>

</head>
<body>
<?php include("lib/menu.php");?>
<div class="Dashboard_wrapper">
		<h3 class="summary_title">Advertising Campaign Analysis</h3>
		<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');
// Create connection

$query = "SELECT * FROM (
	SELECT a.aPID AS Product_ID, a.aname AS Product_Name, a.Q_during_ac AS Sold_During_Campaign, b.Q_outside_ac AS Sold_Outside_Campaign, 
	(a.Q_during_ac - b.Q_outside_ac) AS Difference
	FROM
	(SELECT sold.PID AS aPID, product.product_name AS aname, sum(sold.quantity) AS Q_during_ac
	FROM sold INNER JOIN product
	ON sold.PID = product.PID
	 WHERE  sold.date IN (SELECT advertising_campaign.date FROM advertising_campaign)
	GROUP BY sold.PID
	) a
	INNER JOIN 
	(SELECT sold.PID AS bPID, product.product_name AS bname, sum(sold.quantity) AS Q_outside_ac
	FROM sold INNER JOIN product
	ON sold.PID = product.PID
	 WHERE  sold.date NOT IN (SELECT advertising_campaign.date FROM advertising_campaign)
	GROUP BY sold.PID) b
	ON a.aPID = b.bPID
	ORDER BY Difference DESC LIMIT 10) a
	
	UNION
	
	SELECT * FROM (
	SELECT a.aPID AS Product_ID, a.aname AS Product_Name, a.Q_during_ac AS Sold_During_Campaign, b.Q_outside_ac AS Sold_Outside_Campaign, 
	(a.Q_during_ac - b.Q_outside_ac) AS Difference
	FROM 
	(SELECT sold.PID AS aPID, product.product_name AS aname, sum(sold.quantity) AS Q_during_ac
	FROM sold INNER JOIN product
	ON sold.PID = product.PID
	 WHERE  sold.date IN (SELECT advertising_campaign.date FROM advertising_campaign)
	GROUP BY sold.PID
	) a
	INNER JOIN 
	(SELECT sold.PID AS bPID, product.product_name AS bname, sum(sold.quantity) AS Q_outside_ac
	FROM sold INNER JOIN product
	ON sold.PID = product.PID
	 WHERE  sold.date NOT IN (SELECT advertising_campaign.date FROM advertising_campaign)
	GROUP BY sold.PID) b
	ON a.aPID = b.bPID
	ORDER BY Difference ASC LIMIT 10) b;
";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
// Check connection
if (!empty($result)) {

  echo "<table>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Sold During Campaign</th>
			<th>Sold Outside Campaign</th>
			<th>Difference</th>
		</tr>";
  // ROW WISE OUTPUT
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

		 echo "<tr><td>" . $row['Product_ID']. "     </td><td>        "         . $row['Product_Name']. "     </td><td>     "          . $row['Sold_During_Campaign']. "    </td><td>     "        . $row['Sold_Outside_Campaign']. "    </td> <td>    "       . $row['Difference']. "    </td></tr>    ";

	
  }
  echo "</table>";
} else {
  echo "<p style='text-align:center;'>0 results</p>";
}

?>
<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
</div></div>


<?php include("lib/footer.php");?>

</body>
</html>
