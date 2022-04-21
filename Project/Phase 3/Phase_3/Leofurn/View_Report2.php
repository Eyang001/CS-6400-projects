<?php include("lib/header.php");?>
<?php include("css/leofurn_style");?>
<head>
<title>View Report 2</title>
</head>
<body>
  <?php include("lib/menu.php");?>

  <div class="Dashboard_wrapper">
    <div class="summary_title">LEOFURN :View Report 2 </div>
      <div class="report_data_wrapper">
        <?php include('lib/db_connection.php');
          // Create connection
              $query = "SELECT r.PID as PID, r.product_name As PName, FORMAT(r.Retail_price,2) AS Retail_Price, r.rsold+d.dsold AS Units_sold_total, r.rsold As Unites_sold_as_retail, d.dsold As Units_sold_on_discount, 
              FORMAT(r.Sale_Retail + d.Sale_discount,2) AS Actual_Rev,
              FORMAT(r.Sale_Retail + d.dsold*r.Retail_price*.75,2) AS Predicted_Rev, 
              FORMAT(d.Sale_discount - d.dsold*r.Retail_price*.75,2) AS Diff
                            FROM (SELECT p.PID AS PID, p.product_name, p.retail_Price AS Retail_price, SUM(s.quantity) AS rsold, 	
                                  SUM(p.retail_Price*s.quantity) AS Sale_Retail
                                  FROM belongs_to AS bt NATURAL JOIN product AS p NATURAL JOIN sold as s 
                                  LEFT OUTER JOIN fordiscount AS fd
                                  ON (p.PID = fd.PID AND s.date = fd.date)
                                  WHERE bt.category_name = \"Couches and Sofas\" AND fd.discounted_price IS NULL
                                  GROUP BY p.PID
                                   ) r
                                  
                                  NATURAL JOIN
                                  
                                  (SELECT p.PID as PID, p.product_name, SUM(s.quantity) AS dsold,
                                   SUM(fd.discounted_price*s.quantity) AS Sale_discount
                                  FROM belongs_to AS bt NATURAL JOIN product AS p NATURAL JOIN sold as s
                                  LEFT OUTER JOIN fordiscount AS fd
                                  ON (p.PID = fd.PID AND s.date = fd.date)
                                  WHERE bt.category_name = \"Couches and Sofas\" AND fd.discounted_price IS NOT NULL 
                                  GROUP BY p.PID                 	
                                  ) d
                                  
                                  WHERE d.Sale_discount - d.dsold*r.Retail_price*.75 > 5000 OR d.Sale_discount - d.dsold*r.Retail_price*.75 < -5000
                                  ORDER BY d.Sale_discount - d.dsold*r.Retail_price*.75 DESC;     
                               
              ";
				$result = mysqli_query($conn, $query);
				mysqli_close($conn);
                if(!empty($result)){
                  echo "<table class='report_2 td'> <tr> <th> PID </th> 
                                <th> NAME </th> 
                                <th> RETAIL_PRICE </th>
                                <th> Q_SOLD_TOTAL </th>
                                <th> Q_SOLD_DISC </th>
                                <th> Q_SOLD_RETA </th>
                                <th> ACTUAL_REV </th>
                                <th> PREDICTED_REV </th>
                                <th> DIFFERENCE </th>
                                </tr>";
                  // ROW WISE OUTPUT
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr><td text-align='center' >" . $row['PID'] . "</td>
                        <td align='center'> ". $row['PName']. "</td>
                        <td align='center'> ". $row['Retail_Price']. "</td>
                        <td align='center'> ". $row['Units_sold_total']. "</td>
                        <td align='center'> ". $row['Units_sold_on_discount']. "</td>
                        <td align='center'> ". $row['Unites_sold_as_retail']. "</td>
                        <td align='center'> ". $row['Actual_Rev']. "</td>
                        <td align='center'> ". $row['Predicted_Rev']. "</td>
                        <td align='center'>". $row['Diff']. "</td> </tr>";
                  }
				  echo '</table>';
                } else {
                  echo "<p style='text-align:center;'>0 results</p>";
                }
              ?>
			  <p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
      </div>
  </div>


  <?php include "lib/footer.php";?>

</body>
</html>
