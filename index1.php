<?php
	//connect to database
	ob_start();
	session_start();
	$dbConnect = mysqli_connect('localhost','root','','pagination');
	if(!$dbConnect){echo'Database Connection Error'; exit();}
	
	//pagination code begins
	$page = 1 ;
	$pageLimitNum = '10';
	$pageLimit = 'limit '.$pageLimitNum;
	$pageOffset = 'offset 0';	//initialize offset
	//fetch all results * result number from database
	
	$allFromDbQry = mysqli_query($dbConnect,"select * from info");
	$allFromDbNum = mysqli_num_rows($allFromDbQry);
	//count total page number
	$totalPagesNum = ceil( $allFromDbNum / $pageLimitNum );
	//validation to check if page get parameter is set and is a number
	if( isset($_GET['p']) && is_numeric($_GET['p']) ){
		$page = $_GET['p'];
		if( $page<=0 ){ $page=1; } //if page number is smaller than 1 set it to 1
	}
	//when page number is greater than total pages number, set it to higher or final page number
	if( $page > $totalPagesNum ){ $page = $totalPagesNum; }
	//set prev and next page number
	$pagePrev = $page - 1;
	$pageNext = $page + 1;
	//offset number
	//when page number is not 1, count the page offset number
	$offsetNum = $pageLimitNum * ($page - 1);
	$pageOffset = 'offset '.$offsetNum;
	//fetch results for this page number
	$resultsDisPgQry = mysqli_query($dbConnect,"select * from info $pageLimit $pageOffset");

	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>pagination v1</title>
		<link rel="stylesheet" href="style-v1.css">
	</head>
<body>
	<div class="page-note">
		<p>fetching all results from database for this page</p>
		<p>pagination is not designed</p>
	</div>
	<div class="container">
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Details</th>
			</tr>
			<?php
				while( $rowInfo = mysqli_fetch_array($resultsDisPgQry) ){
					echo '<tr>';
					echo '<td>'.$rowInfo["id"].'</td>';
					echo '<td>'.$rowInfo["name"].'</td>';
					echo '<td>'.$rowInfo["details"].'</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
	
	<div class="right-fixed">
		<p>current page : <?php echo $page; ?></p>
		<p>Total pages : <?php echo $totalPagesNum; ?></p>
		<p>Previous Page : <?php echo $pagePrev; ?></p>
		<p>Next Page : <?php echo $pageNext; ?></p>
		<p>Page Limit num : <?php echo $pageLimitNum; ?></p>
		<p>Page Offset : <?php echo $pageOffset; ?></p>
		<p>Offset Num: <?php echo $offsetNum; ?></p>
		
	</div>
</body>	
</html>