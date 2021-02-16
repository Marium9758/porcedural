<?php include 'admin/functions.php'; ?>
<?php include 'header.php'; ?>

<!-- <?php 
	// $link=connection();
   $result = get_data();
   while ($rows = mysqli_fetch_assoc($result)) {
         echo '<div class="post">';
      		echo "<h1>".$rows['title']."</h1>";
      		echo "<small>Published date: ".$rows['date']." | ";
      		if ($rows['status']==1) {
      			echo '<span class="success">Published</span>';
      		}
      		else{
      			echo '<span class="error">Unpublished</span>';
      		}
      		echo "</small>";
      		echo '<br><img src="'.$rows['image'].'" width="100">';
      		echo "<p>".substr($rows['body'],0,100).' <a href="view.php?id='.$rows['id'].'">read more</a></p>';
         echo "</div>";
   }
 ?> -->
<div style="padding: 20px; margin: 0 auto; width:800px;">
   <form action="search.php" method="get">
      <input type="text" name="s">
      <input type="submit" name="submit" value="Search">
   </form>
</div>
<?php 
$result = search_data($_GET['s']);
$count=mysqli_num_rows($result);

if ($count) : 
while ($rows = mysqli_fetch_assoc($result)):?>
<div class="post">
   <h1><a href="view.php?id=<?= $rows['id']; ?>"><?= $rows['title']; ?></a></h1>
   <small>
      Published date: <?= $rows['date']; ?> | 
      <?php if ($rows['status']==1) : ?>
         <span class="success">Published</span>
         
      <?php else: ?>
         <span class="error">Unpublished</span>
         }
      <?php endif;?>
   </small>
   <br><img src="admin/<?= $rows['image']; ?>" width="100">
   <p><?= substr($rows['body'],0,100); ?><a href="view.php?id=<?= $rows['id']; ?>">read more</a></p>
</div>
<?php endwhile;  ?>  
<?php else:  ?>
<h2>No results found</h2>
<?php endif; ?>  
</div>
</body>
</html>