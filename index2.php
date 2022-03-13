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
		<title>pagination v2</title>
		<link rel="stylesheet" href="style-v1.css">
	</head>
<body>
	
	<div class="container">
		<!--pagination list-->
		<?php 
			function pagination(){
				global $page, $pagePrev, $pageNext, $totalPagesNum;
				
				echo '<ul class="pagination">';
					if( $page != 1 ){
						echo '<li><a href="index2.php?p=1">First</a></li>';
					}
					if( $page >= 2 ){
						echo '<li><a href="index2.php?p='.$pagePrev.'">'.$pagePrev.'</a></li>';
					}
					echo '<li class="current-page"><a>'.$page.'</a></li>';
					if( $pageNext <= ($totalPagesNum-1) ){
						echo '<li><a href="index2.php?p='.$pageNext.'">'.$pageNext.'</a></li>';
					}
					if( $totalPagesNum != $page ){
						echo '<li><a href="index2.php?p='.$totalPagesNum.'">Last ('.$totalPagesNum.')</a></li>';
					}
				echo '</ul>';
			}
		?>
		<div class="pagination-container">
			<?php pagination(); ?>
		</div>
		
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
		<p>Entries in DB : <?php echo $allFromDbNum; ?></p>
		<p>current page : <?php echo $page; ?></p>
		<p>Total pages : <?php echo $totalPagesNum; ?></p>
		<p>Previous Page : <?php echo $pagePrev; ?></p>
		<p>Next Page : <?php echo $pageNext; ?></p>
		<p>Page Limit num : <?php echo $pageLimitNum; ?></p>
		<p>Page Offset : <?php echo $pageOffset; ?></p>
		<p>Offset Num: <?php echo $offsetNum; ?></p>
		
	</div>
	
	<div class="page-note">
		<p>to show pagination page links</p>
	</div>
</body>	
</html>