
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
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			$conn = new mysqli($server, $user, $pass, $dbname);
			$sql = "SELECT product.productName, transactions.customerName, customer.gender FROM product 
LEFT JOIN transactions ON product.productID=transactions.transproductID
LEFT JOIN customer ON transactions.customerName=customer.name ORDER BY productName ASC";
			
			$result = mysqli_query($conn, $sql);
			$totalnum = mysqli_num_rows($result);
			$name;
			$male = 0;
			$female = 0;
			$m = "Male";
			$rownum = 0;
			
			while($info = mysqli_fetch_array($result)){
				$rownum = $rownum + 1;
				if($name != $info['productName'] || $rownum == $totalnum ){
					if($name == $info['productName'] || $rownum == $totalnum){
						if($info['gender'] == $m){
							$male=$male+1;
						}
						else{
							$female=$female+1;
						}
					}
					if($female > $male){
						$test = $test . '<tr><td>' . $name . '</td></tr>';
					}	
				    $name = $info['productName'];
				    $male = 0;
				    $female = 0;
				}
				if($info['gender'] == $m){
				    $male=$male+1;
				}
				else{
				    $female=$female+1;
				}
				
			}
			echo $test;
		?>
	</tbody>

</table>
</body>
</html>