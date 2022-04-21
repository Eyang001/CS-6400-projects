<?php include("lib/header.php");?>
<title>LEOFURN SALES REPORTING</title>
</head>
<body>
    
	<?php include("lib/menu.php");?>

	<div class="Dashboard_wrapper">
		<h3 class="summary_title">City population update</h3>
		<div class="report_data_wrapper">
	
    <?php
        include('lib/db_connection.php');  
        $records = mysqli_query($conn, "SELECT state, city_name From city");
	
	
		if (empty($_POST["city_state"]) && empty($_POST["population"])) {
			?>
				<div class="center_content">
					<form method="post">
						<div class="center_content">
							<select name='city_state' required>
							<option value=""> - select city state - </option>
						
							<?php
								while($data1 = mysqli_fetch_array($records, MYSQLI_ASSOC)){
									echo "<option value='".$data1['city_name'] . " - " . $data1['state']."'>".$data1['city_name'] . " - " . $data1['state']."</option>";
								}
							?>
							
							</select>
							<input class="edit_form_input" type="text" name="population" placeholder="Please enter the Population here" />
							<input name = "submit" type = "submit" id="submit" value = "submit">
						</div>
						</form>
						
						<p class="go_back1"><a href="edit_form.php">BACK TO VIEW REPORTS</a></p>
				</div>
			<?php
		}else{
			if(isset($_POST['submit'])){
				//input validation
				if(is_numeric($_POST['population'])){
					$city_state_data = explode(" - ", $_POST["city_state"]);
					$city = $city_state_data[0];
					$state = $city_state_data[1];
					$population = $_POST['population'];

					$updatequery = "UPDATE city SET population = '$population' WHERE city_name = '$city' and state = '$state'";
					$result = mysqli_query($conn, $updatequery);
				
					
					$reseult_select = "SELECT city_name, state, population FROM city WHERE city_name = '$city' and state = '$state'";
					$result = mysqli_query($conn, $reseult_select);
					
					while($date_row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$city_name = $date_row['city_name'];
						$state_name = $date_row['state'];
						$city_population = $date_row['population'];
					}

					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: green; padding: 15px;'>City Population is succesfully updated<br> Current 
						<?php 
							echo $city_name . ' - ' . $state_name . ' population is: ' . $city_population;
						?></p>
						<p class="go_back1"><a href="updatecity.php">BACK TO EDIT CITY POPULATION</a></p>
					<?php
				}else{
					?>
						<p style='text-align:center; color: #fff; font-size: 27px; background: red; padding: 15px;'>Error: numbers only!</p>
						<p class="go_back1"><a href="updatecity.php">BACK TO EDIT CITY POPULATION</a></p>
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

 