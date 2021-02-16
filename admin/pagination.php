<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
</head>
<body>
	<?php 

		$con = mysqli_connect('localhost','root','','pagination');
		$limit = 10;
		$offset = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$offset = ($page-1)*10;
		}

		$sql1 = 'SELECT * FROM data';
		$sql2 = 'SELECT * FROM data LIMIT '.$limit.' OFFSET '.$offset;
		$result1 = mysqli_query($con,$sql1);
		$result2 = mysqli_query($con,$sql2);
		$total_rows = mysqli_num_rows($result1);
		
		$total_pages = ceil($total_rows/$limit); 
		echo '<p>Total rows: <b>'.$total_rows.'</b> total page: <b>'.$total_pages.'</b></p>';
		while ($row = mysqli_fetch_assoc($result2)) {
			echo $row['id'].' '.$row['title'].' '.$row['description'].'<br>';
		}
		for ($i=1; $i<=$total_pages; $i++) { 
			echo '<a href="?page='.$i.'">Page'.$i.'</a>&nbsp;';
		}
	 ?>
</body>
</html>