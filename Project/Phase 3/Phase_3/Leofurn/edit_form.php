
	
<html>
<body>
<?php include("lib/header.php");?>
<?php include("css/leofurn_style");?>
<head>
<title>LEOFURN SALES REPORTING</title>
</head>

	<?php include("lib/menu.php");?>
	<div class="center_content">
		<div class="center_left">
			<div class="Dashboard_wrapper">
				<div class="summary">LEOFURN :"VIEW /UPDATE /INSERT" LINKS</div>
					<div class="left_content">
						<div class="nav_bar">
						<h4 class="sub_title">LEOFURN :VIEW DATASET </h4>
							<ul>
								<li><a href="viewcity.php" <?php if($current_filename == 'viewcity.php') echo "class='active'"; ?>>To View "CITY TABLE DATA" Information </a></li>  
								<li><a href="viewchildcare.php" <?php if($current_filename == 'viewchildcare.php') echo "class='active'"; ?>>To View "CHILDCARE TABLE DATA" Information </a></li>  				
								<li><a href="viewholiday.php" <?php if($current_filename == 'viewholiday.php') echo "class='active'"; ?>>To View "HOLIDAY TABLE DATA" Information </a></li>  
								<li><a href="viewdate.php" <?php if($current_filename == 'viewdate.php') echo "class='active'"; ?>>To View "DATE TABLE DATA" Information </a></li>                                 
							</ul>
							<h4 class="sub_title">LEOFURN :UPDATE DATA /INSERT DATA INTO THE TABLE </h4>
							<ul>
								<li><a href="updatecity.php" <?php if($current_filename == 'updatecity.php') echo "class='active'"; ?>>To Update City Population</a></li>  
								<li><a href="updatechildcare.php" <?php if($current_filename == 'updatechildcare.php') echo "class='active'"; ?>>To Update Childcare Limit Time</a></li>  				
								<li><a href="insertholiday.php" <?php if($current_filename == 'insertholiday.php') echo "class='active'"; ?>>To Insert a record into "HOLIDAY TABLE" </a></li> 
								
							</ul>
						</div>
					</div>	
					

		</div>
	</div>
</body>	
</html>
<?php include("lib/footer.php");?>