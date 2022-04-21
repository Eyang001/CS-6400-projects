<?php include("lib/header.php");?>
  <title>View Report 7</title>
</head>

<?php include("lib/menu.php");?>
  <body>
    <div class="Dashboard_wrapper">
      <h3 class="summary_title">Childcare Sales Volume</h3>
      <div class="report_data_wrapper">
            <?php include('lib/db_connection.php');
            // Create connection
              $query = "SELECT Year(s.date) AS year, Month(s.date) AS month, 
IF(st.childcare_time=0,'No_childcare',st.childcare_time) AS limit_time, FORMAT(SUM(s.quantity * IFNULL(fd.discounted_price, p.retail_Price)),2) AS sale
              FROM (sold AS s NATURAL JOIN product AS p)
              INNER JOIN fordiscount as fd ON s.PID = fd.PID
              LEFT OUTER JOIN store AS st ON s.store_number = st.store_number
              WHERE s.date IN
(
select  s.date FROM sold as s  where  s.date < (select max(s.date) FROM sold s  ) and
    s.date > ((select (max(s.date)- INTERVAL 12 month) as new1 FROM sold s  ))
    )
              GROUP BY month, limit_time
              ORDER BY year ASC, month ASC, st.childcare_time ASC";
                        
              $result = mysqli_query($conn, $query);
            mysqli_close($conn); 
            // Check connection
              if (!empty($result)) { 
                echo "<table> <tr> <th> YEAR  </th> 
                            <th> MONTH </th>
							<th> CHILDCARE LIMIT TIME </th> 
                            <th> TOTAL SALES </th> </tr>";
                printf($row['month']);
              // ROW WISE OUTPUT
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<tr><td align='center' >" . $row['year'] . "</td>
                    <td align='center'> ". $row['month']. "</td>
					<td align='center'> ". $row['limit_time']. "</td>
                    <td align='center'>". $row['sale']. "</td> </tr>";
                    }
				echo '</table>';
              } else {
              echo "<p style='text-align:center;'>0 results</p>";
              }
            ?>
			<p class="go_back1"><a href="View_Reports.php">BACK TO VIEW REPORTS</a></p>
      </div>
    </div>

    <?php include("lib/footer.php");?>

  </body>
</html>
