<?php include("lib/header.php");?>
<title>LEOFURN SALES REPORTING</title>
<body>
	<?php include("lib/menu.php");?>
	<div class="Dashboard_wrapper">
	<h3 class="summary_title">Insert New Holiday</h3>
	<div class="report_data_wrapper">
		
    <?php 
		include('lib/db_connection.php');	
		if(empty($_POST["holiday_name"]) && empty($_POST["available_date"])){
			$available_date = mysqli_query($conn, "SELECT a.date as available_date FROM date a NATURAL LEFT JOIN holiday b WHERE b.date IS NULL ORDER BY a.date ASC");
			?>
				<div class="center_content">
					<form method="post">
						<div class="center_content">
							<select name='date' required>
							<option value=""> - select available date - </option>
						
							<?php
								while($data1 = mysqli_fetch_array($available_date, MYSQLI_ASSOC)){
									echo "<option value='".$data1['available_date']."'>".$data1['available_date']."</option>";
								}
							?>
							</select>
							<input class="edit_form_input" type="text" name="holiday_name" placeholder="Please enter holiday name" required />
							<input name = "submit" type = "submit" id="submit" value = "submit">
						</div>
						</form>
						
						<p class="go_back1"><a href="edit_form.php">BACK TO EDIT FORM</a></p>
				</div>
			<?php
		}else{
			if(isset($_POST['submit'])){
				$holiday_name = $_POST["holiday_name"];
				$holiday_date = $_POST["date"];
				
				//validation letters and apostaphe only
				if(!preg_match("/^[A-Z'-]{2,50}$/i", $holiday_name)){
					$error = 'Error: holiday name input';
					
					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: red; padding: 15px;'>Error: letters and apostrophe only!</p>
						<p class="go_back1"><a href="insertholiday.php">BACK TO Insert New Holiday</a></p>
					<?php
				}
				
				if(empty($error)){
					$insertquery = 'INSERT INTO holiday ( name , date) VALUES ("'.$holiday_name.'", "'.$holiday_date.'" )';
					$result = mysqli_query($conn, $insertquery);
					
					
					$reseult_select = "SELECT name, date FROM holiday WHERE date = '$holiday_date'";
					$result = mysqli_query($conn, $reseult_select);
					
					while($date_row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$holiday_name = $date_row['name'];
						$holiday_date = $date_row['date'];
					}
					
					
					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: green; padding: 15px;'>New holiday is succesfully inserted<br>New Holiday:  
						<?php
							echo $holiday_name . ' - ' . $holiday_date;
						?></p>
						<p class="go_back1"><a href="insertholiday.php">BACK TO Insert New Holiday</a></p>
					<?php
					
					
				}
				
			}
		}
	?>

	
	</div>
	</div>

<?php 
mysqli_close($conn);
include("lib/footer.php");
?>
</body>
</html>	


 