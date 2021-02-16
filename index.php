<?php 
   $title = 'Home';
   include 'admin/functions.php'; 
?>

<?php include 'inc/header.php'; ?>

<?php 

   if (isset($pages)) {
      include 'pages/'.$pages.'.php';
   }
   else{
      include 'pages/home.php';
   }

 ?>
<?php include 'inc/footer.php'; ?>