<?php include 'functions.php'; ?>
<?php include 'header.php'; ?>
<?php 
	// print_r($_POST);
	$title='';
	$body = '';
	$status = '';
	$err_title = '';
	$err_body = '';
	$err_status = '';
	$message = '';
	$error = 0;

	
	if (isset($_POST['btn_post'])) {
		$title=$_POST['title'];
		$body = $_POST['body'];
		$status = $_POST['status'];
		if ($title=='') {
			$err_title= 'needs title';
			$error++;
		}
		if ($body=='') {
			$err_body = 'needs body';
			$error++;
		}
		if ($status=='') {
			$err_status= 'needs status';
			$error++;
		}

		if ($error==0) {
			// run query into database

			$result = update_data($_POST);
			if($result){
				$message = 'Data updated successfully';
			}
			else{

			}
			// if success then return a message
		}

	}
	$result = view_data($_GET['id']);
    $row = mysqli_fetch_assoc($result);
 ?>
 <h1>Edit post</h1>
<small class="success"><?= $message; ?></small>
<div style="width: 45%;float: left;">
	<form action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit post</legend>
			<label>Post title</label><br>
			<input type="hidden" name="id" value="<?= $row['id']; ?>">
			<input type="text" name="title" value="<?= $row['title']; ?>"><span class="error"><?= $err_title?></span><br>
			<label>Post body</label><br>
			<textarea row='10' cols="7" name="body"><?= $row['body']; ?></textarea><span class="error"><?= $err_body?></span><br>
			<label>Status</label><br>
			<select name="status">
				<option>Select</option>
				<?php 
					if ($row['status']==1) {
						echo '<option value="1" selected>Published</option>';
						echo '<option value="0">Unpublished</option>';
					}
					else{
						echo '<option value="1">Published</option>';
						echo '<option value="0" selected>Unpublished</option>';
					}
				 ?>
				
				
			</select> <span class="error"><?= $err_status ?></span><br>
			<input type="file" name="image"><br>
			<input type="hidden" name="old_image" value="<?= $row['image']; ?>">
			<input type="submit" name="btn_post" value="Update"><br>
			<input type="reset" name="btn_reset" value="Reset"><br>
		</fieldset>
	</form>
</div>
<div style="width: 45%;float: left;margin-left: 20px;">
	<img src="<?= $row['image']; ?>" width="200">
</div>
</div>
</body>
</html>