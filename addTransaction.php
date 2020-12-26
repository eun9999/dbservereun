
<html>
<head>
    <style>

    </style>
</head>
<body>
<?php
	$transNum = $_POST['txt_transactionNum'];
	$transProductID = $_POST['txt_transproductID'];
	$transPrice = $_POST['txt_price'];
	$transDate = $_POST['txt_date'];
	$transCustomerName = $_POST['txt_customerName'];
	echo $transDate;
    $server = "localhost:3306";
	$user = "root"; 
    $pass = "dmsrud1"; 
    $dbname = "mydb";
	
	$conn = new mysqli($server, $user, $pass, $dbname);
	$sql = "insert into transactions(transactionNum, transproductID, price, transDate, customerName)" . "values('$transNum', '$transProductID', '$transPrice', '$transDate', '$transCustomerName')";
	
	mysqli_query($conn, $sql);
	echo "ADD SUCCESS !";
?>

</body>
</html>