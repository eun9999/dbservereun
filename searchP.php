
<html>
<head>
    <style>
		body {
			font-family: Consolas, monospace;
			font-family: 12px;
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
          <th>ProductID</th>
          <th>SupplierName</th>
        </tr>
	</thead>
	<tbody>
		<?php
			$col= $_POST['selP'];
			$search = $_POST['searchP'];
			
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			
			$conn = new mysqli($server, $user, $pass, $dbname);
			
			$sql = "SELECT * FROM product WHERE $col='$search'" ;
			
			$result = mysqli_query($conn, $sql);
			
			while($info = mysqli_fetch_array($result)){
				echo '<tr><td>' . $info[ 'productName' ] . '</td><td>'. $info[ 'productID' ] . '</td><td>' . $info[ 'supplierName' ] . '</td></tr>';
			}
		?>
	</tbody>

</table>
</body>
</html>