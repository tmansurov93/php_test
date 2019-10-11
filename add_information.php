<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Добавить заявления</title>
</head>

<body>
	<p align="left"><a href="index.php">Форма заявления</a></a></p>
	<?php
	if(isset($_POST['send'])){

		if(isset($_POST[''])){

		}

				if(isset($_POST['f_name'])){
			$f_name=$_POST['f_name'];
		}


				if(isset($_POST['l_name'])){
			$l_name=$_POST['l_name'];
		}


				if(isset($_POST['m_name'])){
					$m_name=$_POST['m_name'];
			
		}

				if(isset($_POST['date_b'])){
			$date_b=$_POST['date_b'];
		}

				if(isset($_POST['country'])){
			$country=$_POST['country'];
		}

				if(isset($_POST['home_address'])){
			$home_address=$_POST['home_address'];
		}

				if(isset($_POST['email_address'])){
			$email_address=$_POST['email_address'];
		}

		if(isset($_POST['phone_number'])){
			$phone_number=$_POST['phone_number'];
		}

			if(isset($_POST['position'])){
			$position=$_POST['position'];
		}



		//echo $f_name."-".$l_name."-".$m_name."-".$date_b."-".$country."-".$home_address."-".$email_address."-".$phone_number;
	
		if(empty($f_name) || empty($l_name) || empty($country) || empty($date_b) || empty($home_address) || empty($email_address) || empty($phone_number) || empty($position)){
			echo "<h1 align='center'>Вводите всю информацию.</h1>";
		}
		else{

			require_once("classes/classes.php");

			$employees=new employees();
			$employees->add_employees($f_name,$l_name,$m_name,$position,$country,$date_b,$home_address,$email_address,$phone_number);


		}
	}
	?>
</body>
</html>