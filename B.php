
<html>
<head>
    <style>
		body {
			font-family: Consolas, monospace;
			font-size: 12px;
			text-align: center;
		}
		table {
			width: 100%;
			text-align: center;
		}
		th, td {
			padding: 10px;
			border-bottom: 1px solid #dadada;
			text-align: center;
		}
    </style>
</head>
<body>
<table>
	<thead>
		<tr>
          <th>ProductName</th>
        </tr>
	</thead>
	<tbody>
		<?php
			$k = $_POST['k'];
			$date = $_POST['date'];
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			$conn = new mysqli($server, $user, $pass, $dbname);
			$sql = "SELECT eun.productName, SUM(eun.price) FROM (SELECT transactions.transDate, transactions.price, product.productName FROM transactions LEFT JOIN product ON transactions.transproductID=product.productID WHERE transactions.transDate < \"" . $date . "\" ORDER BY productName ASC) as eun 
group BY eun.productName
ORDER BY SUM(eun.price) DESC
LIMIT " . $k;
			
			$result = mysqli_query($conn, $sql);
			
			
			while($info = mysqli_fetch_array($result)){
				echo $info;
				echo '<tr><td>' . $info[ 'productName' ] . '</td></tr>';
			}
			
		?>
	</tbody>

</table>
</body>
</html>