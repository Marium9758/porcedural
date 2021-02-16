<?php include 'functions.php'; ?>
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
?>
<table border="1">
   <tr>
      <th>id</th>
      <th>image</th>
      <th>tile</th>
      <th>body</th>
      <th>date</th>
      <th>status</th>
      <th>Action</th>
   </tr>
<?php
   $result = get_data($limit,$offset); 
   while ($rows = mysqli_fetch_assoc($result)):?>
<tr>
   <td><?= $rows['id']; ?></td>
   <td><img src="<?= $rows['image']; ?>" width="40"></td>
   <td><a href="view.php?id=<?= $rows['id']; ?>"><?= $rows['title']; ?></a></td>
   <td width="20%"><?= substr($rows['body'],0,40); ?></td>
   <td><?= $rows['date']; ?></td>
   <td> 
     <?php if ($rows['status']==1) : ?>
        <span class="success">Published</span>
        
     <?php else: ?>
        <span class="error">Unpublished</span>
        }
     <?php endif;?>
   </td>
   <td>
      <a href="edit.php?id=<?= $rows['id']; ?>">Edit</a> | 
   <a href="?status=delete&id=<?= $rows['id']; ?>">Delete</a></td>
</tr>
<?php endwhile;  ?>  
</table>
<div style="clear: both;overflow: hidden;margin: 10px;width: 100px;">
   <?php 
      for ($i=1; $i <= $total_page; $i++) { 
         echo '<a href="?page='.$i.'">'.$i.'</a> &nbsp;';
      }
    ?> 
 </div>
</div>
</body>
</html>