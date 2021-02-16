
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

$limit = 10;
$offset = 0;
$page = 1;
if (isset($_GET['page'])) {
   $page = $_GET['page'];
   $offset = ($page-1)*$limit; 
}

$total_row = mysqli_num_rows(get_data());
$total_page = ceil($total_row/$limit);
print '<p>total page'.$total_page.'</p>';

$result = get_data($limit,$offset); 
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

<div style="clear: both;overflow: hidden;margin: 10px;width: 100px;">
   <?php 
      for ($i=1; $i <= $total_page; $i++) { 
         echo '<a href="?page='.$i.'">'.$i.'</a> &nbsp;';
      }
    ?> 
 </div>
