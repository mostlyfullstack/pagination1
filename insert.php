<?php
	//connect to database
	ob_start();
	session_start();
	$dbConnect = mysqli_connect('localhost','root','','pagination');
	if(!$dbConnect){echo'Database Connection Error'; exit();}
	
	
	//insert into database
	if( isset($_POST['submit']) ){
		$name = trim($_POST['name']);
		$details = $_POST['details'];
		//insert into database
		$insertQry = "insert into info (name,details) values ('".$name."','".$details."')";
		$insertQryFinal = mysqli_query($dbConnect,$insertQry);
		if( $insertQryFinal ){
			$_SESSION['success'] = 'success';
			header('location:insert.php'); exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>insert</title>
		<link rel="stylesheet" href="style-v1.css">
		<style>
			body{width:100%;min-height:100vh;display:flex;flex-flow:row wrap;align-items:center;justify-content:center;}
		</style>
	</head>
<body>
	<div class="tempnum">
		<?php
			//count all entries from database
			$countQry = mysqli_query($dbConnect,'select * from info');
			$numCountQry = mysqli_num_rows($countQry);
		?>
		Total Entries : <?php echo $numCountQry; ?>
	</div>
	<form class="main-form" method="post">
		<?php if( isset($_SESSION['success']) ) {?>
		<div class="success-msg">Data inserted Successfully</div>
		<?php } ?>
		<input type="text" name="name" placeholder="name">
		<input type="text" name="details" placeholder="details">
		<input type="submit" name="submit" value="submit">
	</form>
	<?php
		unset( $_SESSION['success'] );
	?>
</body>	
</html>