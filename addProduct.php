
<html>
<head>
    <style>

    </style>
</head>
<body>
<?php
	$productName = $_POST['txt_productName'];
	$productID = $_POST['txt_productID'];
	$supplier = $_POST['txt_supplier'];
	
	
    $server = "localhost:3306";
	$user = "root"; 
    $pass = "dmsrud1"; 
    $dbname = "mydb";
	
	$conn = new mysqli($server, $user, $pass, $dbname);
	$sql = "insert into product(productName, productID, supplierName)" . "values('$productName', '$productID', '$supplier')";
	
	mysqli_query($conn, $sql);
	echo "ADD SUCCESS !";
?>

</body>
</html>