<?php
include("lib/header.php");
?>
<!--<link rel="stylesheet" type="text/css" href="css/Report3.css" />-->
<title>View Report 3</title>
</head>
<body>
	<?php include("lib/menu.php");?>
	
	<div class="Dashboard_wrapper">
		<h3 class="summary_title">Store Revenue by Year by State</h3>
		<div class="report_data_wrapper">
			<?php
				if (empty($_POST["state"])) {
					
					include('lib/db_connection.php');

					//$month_year= "SELECT DISTINCT (DATE_FORMAT(date, '%m / %Y')) AS avalible_month FROM Sold ORDER BY avalible_month ASC";
					//$month_year_result = mysqli_query($conn, $month_year);

					$state= "SELECT DISTINCT store.state FROM store";
					$state_result = mysqli_query($conn, $state);
					
					mysqli_close($conn);
					
					
					?>
						<p>Select available State from list</p>
					<?php
						if (!empty($state_result)){
						?>
						<div>
							<form method="post">
								<select name="state" id="state" required>
									<option value="">- SELECT STATE -</option>
									<?php
										while($date_row = mysqli_fetch_array($state_result, MYSQLI_ASSOC)) {
											echo $date_row['state'] . '<br>';
											echo '<option value="'.$date_row['state'].'">'.$date_row['state'].'</option>';
										}
									?>
								</select>
								<input type="submit" name="submit" value="Submit">  
							</form>
							<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
						</div>
						<?php
					}else{
						echo '<p class="message">No available report dates.</p>';
					}
				}else{
					include('lib/db_connection.php');

					$state= $_POST["state"];			
										
					$report_query= "SELECT st.store_number AS Store_ID, st.address AS Address, st.city_name AS City, YEAR(s.date) AS Year, FORMAT(s.quantity * IFNULL(fd.discounted_price, p.retail_Price),2) AS Revenue
									FROM store st NATURAL JOIN (
										(sold s NATURAL JOIN product p ) LEFT OUTER JOIN fordiscount fd ON (
										s.PID = fd.PID AND
										s.date = fd.date)
										)
									WHERE st.state = '$state'
									GROUP BY Store_ID, Year
									ORDER BY Year ASC, Revenue DESC";
										
					$data_result = mysqli_query($conn, $report_query);

					mysqli_close($conn);
					if (!empty($data_result)){
						?>
							<div>
								<table>
									<tr>
										<th>Store_ID</th>
										<th>Address</th>
										<th>City</th>
										<th>Year</th>
										<th>Revenue</th>										
									</tr>
									<?php
										while($date_row = mysqli_fetch_array($data_result, MYSQLI_ASSOC)) {
											echo '
													<tr>
														<th>'.$date_row['Store_ID'].'</th>
														<th>'.$date_row["Address"].'</th>
														<th>'.$date_row["City"].'</th>
														<th>'.$date_row["Year"].'</th>
														<th>'.$date_row["Revenue"].'</th>														
													</tr>
												';
										}
										?>
								</table>	
								
								<p class="go_back"><a href="View_Report3.php">BACK TO REPORT 3</a></p>
							</div>
						<?php
					}
				}
			
			?>
			
		</div>
	</div>
	
	
	
	<?php include("lib/footer.php");?>
</body>
</html>