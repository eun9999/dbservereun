<html>
<head>
    <style>

    </style>
</head>
<body>
<?php
	$row = 1;
	$server = "localhost:3306";
	$user = "root"; 
    $pass = "dmsrud1"; 
    $dbname = "mydb";
	
	$conn = new mysqli($server, $user, $pass, $dbname);
	$file = $_FILES['csvfile']['name'];
	$uploaddir = 'D:\Bitnami\wampstack-8.0.0-1\apache2\htdocs\\';
	$uploadfile = $uploaddir . basename($_FILES['csvfile']['name']);
	/*
	if (move_uploaded_file($_FILES['csvfile']['tmp_name'], $uploadfile)) {
		echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
	} else {
		echo "파일 업로드 공격의 가능성이 있습니다!\n";
	}*/
	
	$handle = fopen($file, "r");
	if($handle == NULL){
		echo "fail";
	}
	else{
		echo "success";
	}
	while (($data = fgetcsv($handle, 1000, ","))) {
		$num = count($data);
		$row = $row + 1;
		if($data[0]=="C"){
			$name = ltrim($data[1]);
			$phone = ltrim($data[2]);
			$addr = ltrim($data[3]);
			$gender = ltrim($data[4]);
			
			$sql = "insert into customer(name, phone, addr, gender)" . "values('$name', '$phone', '$addr', '$gender')";
		}
		else if($data[0]=="T"){
			$transNum = ltrim($data[1]);
			$transProductID = ltrim($data[2]);
			$transPrice = ltrim($data[3]," $");
			
			$res = explode("/",ltrim($data[4]));
			if((int)$res[0] < 10){
				$res[0] = "0".$res[0];
			}
			if((int)$res[1] < 10){
				$res[1] = "0".$res[1];
			}
			$changedDate = $res[2]."-".$res[1]."-".$res[0];
			
			$transDate = $changedDate;
			
			$transCustomerName = ltrim($data[5]);
			
			$sql = "insert into transactions(transactionNum, transproductID, price, transDate, customerName)" . "values('$transNum', '$transProductID', '$transPrice', '$transDate', '$transCustomerName')";	
		}
		else if($data[0]=="P"){
			$productName = ltrim($data[1]);
			$productID = ltrim($data[2]);
			$supplier = ltrim($data[3]);
			
			$sql = "insert into product(productName, productID, supplierName)" . "values('$productName', '$productID', '$supplier')";
		}
		mysqli_query($conn, $sql);
	}
	fclose($handle);
	
?>
</body>
</html>