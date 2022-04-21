<?php include("lib/header.php");?>
<title>View Report 8</title>
</head>
<?php include("lib/menu.php");?>
<body>
<div class="Dashboard_wrapper">
<h3 class="summary_title">Restaurant Impact on Category Sales</h3>
<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');
// Create connection

$query = "SELECT B.category_name AS Category,
CASE
WHEN S2.has_restaurant = 0 THEN 'Non-restaurant' ELSE 'Restaurant'
END AS Store_Type,
sum(S1.quantity) AS Quantity_Sold
FROM sold AS S1, belongs_to AS B, store AS S2
WHERE S1. PID = B.PID AND S1.store_number = S2.store_number
GROUP BY B.category_name, S2.has_restaurant
ORDER BY Category ASC, Store_Type ASC
";

            
$result = mysqli_query($conn, $query);
mysqli_close($conn); 
// Check connection
if (!empty($result)) { 
  echo "<table> <tr> <th>Category</th> 
                <th>Store_Type</th> 
                <th>Quantity_Sold</th> </tr>";
  printf($row['Category']);
  // ROW WISE OUTPUT
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         echo "<tr><td align='center' >" . $row['Category'] . "</td>
         <td align='center'> ". $row['Store_Type']. "</td>
         <td align='center'>". $row['Quantity_Sold']. "</td> </tr>";
  }
  echo '</table>';
} else {
  echo "<p style='text-align:center;'>0 results</p>";
}

?>

<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
</div></div>

	<?php include("lib/footer.php");?>
</body>
</html>