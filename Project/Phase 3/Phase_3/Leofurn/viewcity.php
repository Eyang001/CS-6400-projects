<?php include("lib/header.php");?>
<title>LEOFURN SALES REPORTING</title>
</head>
<body>
<?php include("lib/menu.php");?>
	<div class="Dashboard_wrapper">
		<h3 class="summary_title">LEOFURN :View "CITY TABLE"</h3>
		<div class="report_data_wrapper">
<?php
include('lib/db_connection.php');


//pageination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 
$total_pages_sql = "SELECT COUNT(city_name) FROM city";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//get result by pageination
$query = "SELECT * FROM city ORDER BY city_name ASC LIMIT $offset, $no_of_records_per_page";
$result = mysqli_query($conn, $query);

if (!empty($result)) {  
?>
	<div>
		<table>
		<tr>
			<th>CITYNAME</th>
			<th>STATE</th>
			<th>POPULATION</th>
		</tr>
<?php
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   
	echo "<tr><td align='center'>" . $row["city_name"]. "</td><td align='center'>    " . $row["state"]. "</td><td align='center'>    " . $row["population"]. "</td></tr>    ";
	
  }
  ?>
  </table>		

	<ul class="pagination">
		<li><a href="?pageno=1">First</a></li>
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
		</li>
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
	</ul>
  
  </div>
  <?php
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
<p class="go_back"><a href="edit_form.php">BACK TO VIEW/EDIT FORM</a></p>
</div></div>
<?php include("lib/footer.php");?>
</body>
</html>

			
			
			







 