
	
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
				<div class="summary_title">LSRS VIEW REPORTS</div>
					<div class="left_content">
						<div class="nav_bar">
							<ul>
								<li><a href="View_Report1.php" <?php if($current_filename == 'View_Report1.php') echo "class='active'"; ?>>To View Report1: "Category Report" </a></li>  
								<li><a href="View_Report2.php" <?php if($current_filename == 'View_Report2.php') echo "class='active'"; ?>>To View Report2: "Actual versus Predicted Revenue for Couches and Sofas" </a></li>  				
								<li><a href="View_Report3.php" <?php if($current_filename == 'View_Report3.php') echo "class='active'"; ?>>To View Report3: "Store Revenue by Year by State" </a></li> 
								<li><a href="View_Report4.php" <?php if($current_filename == 'View_Report4.php') echo "class='active'"; ?>>To View Report4: "Outdoor Furniture on Groundhog Day ?" </a></li>  
								<li><a href="View_Report5.php" <?php if($current_filename == 'View_Report5.php') echo "class='active'"; ?>>To View Report5: "State with Highest Volume for each Category" </a></li>  				
								<li><a href="View_Report6.php" <?php if($current_filename == 'View_Report6.php') echo "class='active'"; ?>>To View Report6: "Revenue by Population" </a></li> 
								<li><a href="View_Report7.php" <?php if($current_filename == 'View_Report7.php') echo "class='active'"; ?>>To View Report7: "Childcare Sales Volume" </a></li>  
								<li><a href="View_Report8.php" <?php if($current_filename == 'View_Report8.php') echo "class='active'"; ?>>To View Report8: "Restaurant Impact on Category Sales" </a></li>  				
								<li><a href="View_Report9.php" <?php if($current_filename == 'View_Report9.php') echo "class='active'"; ?>>To View Report9: "Advertising Campaign Analysis" </a></li> 								
							</ul>
						</div>
					</div>	
					
		</div>
	</div>
</body>	
</html>
<?php include("lib/footer.php");?>