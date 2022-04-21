<?php
include('lib/db_connection.php');

$total_store_query = "SELECT COUNT(DISTINCT(store_number)) AS NumberOfStores FROM store";
$result = mysqli_query($conn, $total_store_query);
$count = mysqli_num_rows($result); 

if (!empty($result) && ($count > 0) ) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$total_num_store = $row['NumberOfStores'];
}else{
	$total_num_store = 0;
}

$total_store_offer_food_query = "SELECT COUNT(DISTINCT(store_number)) AS NumberOfStores FROM store WHERE has_restaurant != 0 OR has_snack_bar != 0";
$result = mysqli_query($conn, $total_store_offer_food_query);
$count = mysqli_num_rows($result); 
if (!empty($result) && ($count > 0) ) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$total_num_store_offer_food = $row['NumberOfStores'];
}else{
	$total_num_store_offer_food = 0;
}


$total_store_offer_childcare_query = "SELECT COUNT(DISTINCT(store_number)) AS NumberOfStores FROM store WHERE childcare_time != 0";
$result = mysqli_query($conn, $total_store_offer_childcare_query);
$count = mysqli_num_rows($result); 
if (!empty($result) && ($count > 0) ) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$total_num_store_childcare = $row['NumberOfStores'];
}else{
	$total_num_store_childcare = 0;
}


$total_product_query = "SELECT COUNT(DISTINCT(PID)) AS NumberOfProducts FROM product";
$result = mysqli_query($conn, $total_product_query);
$count = mysqli_num_rows($result); 
if (!empty($result) && ($count > 0) ) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$total_num_product = $row['NumberOfProducts'];
}else{
	$total_num_product = 0;
}


$total_distinct_advertising_campaigns_query = "SELECT COUNT(DISTINCT(description)) AS NumberOfCampaigns FROM advertising_campaign";
$result = mysqli_query($conn, $total_distinct_advertising_campaigns_query);
$count = mysqli_num_rows($result); 
if (!empty($result) && ($count > 0) ) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$total_num_distinct_advertisment = $row['NumberOfCampaigns'];
}else{
	$total_num_distinct_advertisment = 0;
}

mysqli_close($conn);
include("lib/header.php");
?>
<title>LEOFURN SALES REPORTING</title>
</head>

<body>
	<?php include("lib/menu.php");?>
	
	<div class="Dashboard_wrapper">
		<h3 class="summary_title">LEOFURN DASHBOARD SUMMARY</h3>
		<div class="report_data_wrapper">
			<table>
			  <tr>
				<th>TOTAL NUMBER OF STORES</th>
				<td><?php echo $total_num_store; ?></td>
			  </tr>
			  <tr>
				<th>TOTAL NUMBER OF STORE OFFER FOOD (RESTURANT, SNACK BAR, OR BOTH)</th>
				<td><?php echo $total_num_store_offer_food; ?></td>
			  </tr>
			  <tr>
				<th>TOTAL NUMBER OF STORE OFFER CHILDCARE</th>
				<td><?php echo $total_num_store_childcare; ?></td>
			  </tr>
			  <tr>
				<th>TOTAL NUMBER OF PRODUCT</th>
				<td><?php echo $total_num_product; ?></td>
			  </tr>
			  <tr>
				<th>TOTAL DISTINCT ADVERTISING CAMPAIGNS</th>
				<td><?php echo $total_num_distinct_advertisment; ?></td>
			  </tr>
			</table>
		</div>
	</div>
	
	
	
	<?php include("lib/footer.php");?>
</body>
</html>