
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
          <th>TransactionNumber</th>
          <th>ProductID</th>
          <th>Price($)</th>
          <th>Date</th>
		  <th>CustomerName</th>
        </tr>
	</thead>
	<tbody>
		<?php
			$col= $_POST['selT'];
			$search = $_POST['searchT'];
			
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			
			$conn = new mysqli($server, $user, $pass, $dbname);
			
			$sql = "SELECT * FROM transactions WHERE $col='$search'";
			
			$result = mysqli_query($conn, $sql);
			
			while($info = mysqli_fetch_array($result)){
				echo '<tr><td>' . $info[ 'transactionNum' ] . '</td><td>'. $info[ 'transproductID' ] . '</td><td>' . $info[ 'price' ] . '</td><td>' . $info[ 'transDate' ] . '</td><td>' . $info[ 'customerName' ] . '</td></tr>';
			}
		?>
	</tbody>

</table>
</body>
</html>