<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel ="shortcut icon" href="images/dog-paw.png" type="image/ico">
        <title>Getting in Touch | Jayashree Dog Training Academy</title>
		<link rel="stylesheet" href="css/animate.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Lato|Ubuntu|Open+Sans|Tangerine" rel="stylesheet">
    </head>
	<script>
		setTimeout(function() 
		{ 
			window.location.href="index.html" 
		}, 3000);
	</script>
	<style>
		html{
			background: #fff;
			padding: 0;
			margin: 0;
			font-family: 'Ubuntu','Lato','Open Sans';
			font-size: 20px;
			overflow: auto;
		}
	
		body{
			text-align: center;
			padding: 0 ;
			margin: 0 auto;
			max-width: 600px;
			width: 100%;
			height: 79px;
			background: #fff;
			border: 1px solid #fff;
			animation-delay: 0.3s;
		}
		.head{
			background: #64DD17;
			color: #ff5c26;
			animation-delay: 0.2s;
		}
		.name{
			font-family: Ubuntu;
			font-size: 15px;
			margin: 10px auto;
			background: #64DD17;
			text-align: center;
			padding: 10px;
		}
	</style>
	<body>
			<?php
                $headers =  'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: jayashreedogtrainer@gmail.com' . "\r\n";
				if(isset($_POST['submit'])){
					
                    $host = "mysql.hostinger.in";
                    $username = "u392796240_user";
                    $password = "1995august21";
                    $db_name = "u392796240_dbase";
					
					$conn = new mysqli($host, $username, $password, $db_name);
					// Check connection
					if($conn->connect_error) {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Can't  Connect!" . "</p>" . "</div>";
						die("" . $conn->connect_error);
						
					} 
					
					$query = "INSERT INTO connect (firstname, lastname, email, message)
							  VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[message]')";
							  
					if(mysqli_query($conn, $query)) {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Thank you for getting in touch!" . "</p>" . "</div>";
						
						$msg = "Hi $_POST[first_name]!,\nThank You for getting in touch with me. I will contact you as soon as possibe!\n\nCheers!";
						
						$result=mail("$_POST[email]","Thank You Mail",$msg,$headers);
						$result=mail("jayashreedogtrainer@gmail.com","You got Feedback","$_POST[first_name] $_POST[last_name] sent you a feedback!",$headers);
                        if(!$result) {   
						   echo "Error";   
						} else {
						   echo "Message sent!";
						}
					} else {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Error: " . $query . "<br>" . mysqli_error($conn). "</p>" . "</div>";
					}
					
				}
			?>
	</body>
</html>
		