
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
          <th>name</th>
          <th>phone</th>
          <th>address</th>
          <th>gender</th>
        </tr>
	</thead>
	<tbody>
		<?php
			$col= $_POST['selC'];
			$search = $_POST['searchC'];
			$server = "localhost:3306";
			$user = "root"; 
			$pass = "dmsrud1"; 
			$dbname = "mydb";
			
			$conn = new mysqli($server, $user, $pass, $dbname);
			
			
			$sql = "SELECT * FROM customer WHERE $col='$search'" ;
			
			$result = mysqli_query($conn, $sql);
			
			while($info = mysqli_fetch_array($result)){
				echo '<tr><td>' . $info[ 'name' ] . '</td><td>'. $info[ 'phone' ] . '</td><td>' . $info[ 'addr' ] . '</td><td>' . $info[ 'gender' ] . '</td></tr>';
			}
		?>
	</tbody>

</table>
</body>
</html>