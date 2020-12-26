
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
			$m = $_POST['m'];
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			$conn = new mysqli($server, $user, $pass, $dbname);
			$sql = "SELECT product.supplierName, transactions.customerName FROM product 
LEFT JOIN transactions ON product.productID=transactions.transproductID ORDER BY supplierName ASC, customerName ASC";
			$result = mysqli_query($conn, $sql);
			$totalnum = mysqli_num_rows($result);
			$supplier;
			$name;
			$num = 0;
			$rownum = 0;
			while($info = mysqli_fetch_array($result)){
				$rownum = $rownum + 1;
				if($name != $info['customerName'] || $rownum == $totalnum){
					if($name == $info['customerName'] || $rownum == $totalnum){
						$num = $num + 1;
					}
					if($num >= $m){
						$test = $test . '<tr><td>' . $name . '</td></tr>';
					}
					$name = $info['customerName'];
					if($supplier != $info['supplierName']){
						$supplier = $info['productName'];
						$num = 0;
					}
					$num = 0;
				}
				$num = $num + 1;
				
			}
			echo $test;
		?>
	</tbody>

</table>
</body>
</html>