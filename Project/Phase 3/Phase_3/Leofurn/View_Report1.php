<html>

<?php include("lib/header.php");?>
<?php include("css/leofurn_style");?>
<head>
<title>View Report 1</title>

</head>
<body>
<?php include("lib/menu.php");?>

<div class="Dashboard_wrapper">
<div class="summary_title">LEOFURN :View Report 1 </div>
<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');
// Create connection

$query = "SELECT B.category_name AS category_name, COUNT(P.PID) AS Total_Number, MIN(P.retail_Price) AS Min_Price, FORMAT(AVG(P.retail_Price),2) AS Avg_Price, FORMAT(MAX(P.retail_Price),2) AS Max_Price FROM product AS P, category AS C LEFT OUTER JOIN belongs_to AS B ON C.category_name = B.category_name WHERE B.PID = P.PID GROUP BY C.category_name ORDER BY C.category_name ASC";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
// Check connection
if (!empty($result)) {
?>
  	<div>
		<table>
			<tr>
				<th>CATEGORY NAME</th>
				<th>TOTAL NUMBER</th>
				<th>MIN PRICE </th>
				<th>AVG PRICE</th>
				<th>MAX PRICE </th>
			</tr>  
  <?php
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

		 echo "<tr><td align='center'>" . $row['category_name']. "     </td><td align='center'>        "         . $row['Total_Number']. "     </td><td align='center'>     "          . $row['Min_Price']. "    </td><td align='center'>     "        . $row['Avg_Price']. "    </td> <td align='center'>    "       . $row['Max_Price']. "    </td></tr>    ";

	
  }
  	?>						
  </table>
  <p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
  </div> 
  
  </div>
  </div>
  
  <?php
} else {
  echo "<p style='text-align:center;'>0 results</p>";
}

include("lib/footer.php");
?>

</body>
</html>
