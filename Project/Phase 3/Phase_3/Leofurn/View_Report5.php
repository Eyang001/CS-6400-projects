<?php
include("lib/header.php");
?>
<title>View Report 5</title>
</head>
<body>
	<?php include("lib/menu.php");?>
	
	<div class="Dashboard_wrapper">
		<h3 class="summary_title">State with Highest Volume for each category</h3>
		<div class="report_data_wrapper">
			<?php
				if (empty($_POST["month_year"])) {
					
					include('lib/db_connection.php');

					$month_year= "SELECT DISTINCT (DATE_FORMAT(date, '%m / %Y')) AS avalible_month FROM sold ORDER BY avalible_month ASC";
					$month_year_result = mysqli_query($conn, $month_year);

					mysqli_close($conn);
					
					
					?>
						<p>Select available Month and Year from list</p>
					<?php
						if (!empty($month_year_result)){
						?>
						<div>
							<form method="post">
								<select name="month_year" id="month_year" required>
									<option value="">- SELECT MONTH YEAR -</option>
									<?php
										while($date_row = mysqli_fetch_array($month_year_result, MYSQLI_ASSOC)) {
											echo $date_row['avalible_month'] . '<br>';
											echo '<option value="'.$date_row['avalible_month'].'">'.$date_row['avalible_month'].'</option>';
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
					
					$month_year_date = explode(" / ",$_POST["month_year"]);
					$month_date = $month_year_date[0];
					$month_year = $month_year_date[1];
					
					$report_query= "SELECT b.Category_Name, b.Max_Qty_sold, c.State
									FROM
									(SELECT a.Category_Name, MAX(a.Qty_sold) AS Max_Qty_sold FROM( SELECT SUM(S1.quantity) AS Qty_sold, B.category_name AS Category_Name, S2.state AS State FROM sold as S1 INNER JOIN belongs_to AS B ON S1.PID = B.PID INNER JOIN store AS S2 ON S1.store_number = S2.store_number WHERE MONTH(S1.date) = '$month_date' AND YEAR(S1.date) = '$month_year'
									GROUP BY Category_Name, State ORDER BY Category_Name ASC) a GROUP BY a.Category_Name) b
									,
									(SELECT SUM(S1.quantity) AS Qty_sold, B.category_name AS Category_Name, S2.state AS State FROM sold as S1 INNER JOIN belongs_to AS B ON S1.PID = B.PID INNER JOIN store AS S2 ON S1.store_number = S2.store_number
									WHERE MONTH(S1.date) = '$month_date' AND YEAR(S1.date) = '$month_year'
									GROUP BY Category_Name, State ORDER BY Category_Name ASC) c
									WHERE b.Max_Qty_sold = c.Qty_sold AND b.Category_Name = c.Category_Name";
					$data_result = mysqli_query($conn, $report_query);

					mysqli_close($conn);
					if (!empty($data_result)){
						?>
							<div>
								<table>
									<tr>
										<th>Category Name</th>
										<th>State</th>
										<th>Quantity Sold</th>
									</tr>
									<?php
										while($date_row = mysqli_fetch_array($data_result, MYSQLI_ASSOC)) {
											echo '
													<tr>
														<th>'.$date_row["Category_Name"].'</th>
														<th>'.$date_row["State"].'</th>
														<th>'.$date_row["Max_Qty_sold"].'</th>
													</tr>
												';
										}
										?>
								</table>	
								
								<p class="go_back"><a href="View_Report5.php">BACK TO REPORT 5</a></p>
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