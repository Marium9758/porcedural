<?php include 'admin/functions.php'; ?>
<?php include 'inc/header.php'; ?>

<?php 
	// $link=connection();
 	if (isset($_GET['status']) and $_GET['status']=='delete') {
 		$result = delete_data($_GET['id']);
 		if ($result) {
 			header('Location:index.php');
 		}
 		else{
 			echo "Data can not be deleted";
 		}
 	}
    $result = view_data($_GET['id']);
    $row = mysqli_fetch_assoc($result);
    echo '<h2>'.$row['title'].'</h2>';
    echo "<small>Published date: ".$row['date']." | ";
    if ($row['status']==1) {
    	echo '<span class="success">Published</span>';
    }
    else{
    	echo '<span class="error">Unpublished</span>';
    }
    echo '<br><img src="admin/'.$row['image'].'" width="400">';
    echo '<p>'.$row['body'].'</p>';
 ?>
<p><a href="index.php">Back</a></p>	
</div>
</body>
</html>