
<html>
<head>
    <style>

    </style>
</head>
<body>
<?php
    $name = $_POST['txt_name'];
    $phone = $_POST['txt_phone'];
    $addr = $_POST['txt_addr'];
    $gender = $_POST['sel_gender'];
    
	
    $server = "localhost:3306";
	$user = "root"; 
    $pass = "dmsrud1"; 
    $dbname = "mydb";
	
	$conn = new mysqli($server, $user, $pass, $dbname);
	$sql = "insert into customer(name, phone, addr,gender)" . "values('$name', '$phone', '$addr', '$gender')";
	
	
	mysqli_query($conn, $sql);
	
	echo "ADD SUCCESS !";
	
?>

</body>
</html>