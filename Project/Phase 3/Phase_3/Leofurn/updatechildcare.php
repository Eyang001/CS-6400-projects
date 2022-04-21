<?php include("lib/header.php");?>
<title>LEOFURN SALES REPORTING</title>
</head>
<body>
    
	<?php include("lib/menu.php");?>

	<div class="Dashboard_wrapper">
		<h3 class="summary_title">We will select a "STORE NUMBER" to update the "CHILD CARE LIMIT TIME</h3>
		<div class="report_data_wrapper">
	
    <?php
        include('lib/db_connection.php');  
        $records = mysqli_query($conn, "SELECT DISTINCT(store_number) FROM store WHERE childcare_time != 0");
	
	
		if(empty($_POST["store_number"]) && empty($_POST["limit_time"])){
			?>
				<div class="center_content">
					<form method="post">
						<div class="center_content">
							<select name='store_number' required>
							<option value=""> - select store number - </option>
						
							<?php
								while($data1 = mysqli_fetch_array($records, MYSQLI_ASSOC)){
									echo "<option value='".$data1['store_number']."'>".$data1['store_number']."</option>";
								}
							?>
							
							</select>
							<input class="edit_form_input" type="text" name="limit_time" placeholder="Please enter the time limit" />
							<input name = "submit" type = "submit" id="submit" value = "submit">
						</div>
						</form>
						
						<p class="go_back1"><a href="edit_form.php">BACK TO EDIT FORM</a></p>
				</div>
			<?php
		}else{
			if(isset($_POST['submit'])){
				//validation check if is number and if input is over 24 hours (1440 minutes)
				if(!is_numeric($_POST['limit_time'])){
					$error = 'Error: numbers only';
				}elseif($_POST['limit_time'] > 1440){
					$error = 'Error: max time reached';
				}
				
				
				switch ($error) {
					case 'Error: numbers only':
					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: red; padding: 15px;'>Error: numbers only!</p>
						<p class="go_back1"><a href="updatechildcare.php">BACK TO EDIT CITY POPULATION</a></p>
					<?php
						break;
					case 'Error: max time reached':
						?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: red; padding: 15px;'>Error: childcare time cannot be over 24 hours (1440 minutes)!</p>
						<p class="go_back1"><a href="updatechildcare.php">BACK TO EDIT CITY POPULATION</a></p>
					<?php
						break;
				}
				
				
				if(empty($error)){
					$store_number = $_POST['store_number'];
					$limit_time = $_POST['limit_time'];
					
					$updatequery = "UPDATE store SET childcare_time = '$limit_time' WHERE store_number = '$store_number'";
					$result = mysqli_query($conn, $updatequery);
					
					$reseult_select = "SELECT store_number, childcare_time FROM store WHERE store_number = '$store_number'";
					$result = mysqli_query($conn, $reseult_select);
					
					while($date_row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$store_number = $date_row['store_number'];
						$childcare_time = $date_row['childcare_time'];
					}
					
					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: green; padding: 15px;'>Store chilcare time is succesfully updated<br>Current store# 
						<?php
							echo $store_number . ' childcare time is: ' . $childcare_time;
						?></p>
						<p class="go_back1"><a href="updatechildcare.php">BACK TO EDIT CITY POPULATION</a></p>
					<?php
				}
				
			}
		}
 
		
	mysqli_close($conn);	
    ?>
	</div>
	</div>

<?php include("lib/footer.php"); ?>
	</body>
	</html>

 