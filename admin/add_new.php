<?php include 'functions.php'; ?>
<?php include 'header.php'; ?>
<h1>Add a new post</h1>
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
			$result = save_data($_POST);
			if($result){
				$title ='';
				$body = '';
				$message = 'Data saved successfully';
			}
			else{

			}
			// if success then return a message
		}

	}
 ?>

<small class="success"><?= $message; ?></small>
<form action="" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Add new</legend>
		<label>Post title</label><br>
		<input type="text" name="title" value="<?= $title; ?>"><span class="error"><?= $err_title?></span><br>
		<label>Post body</label><br>
		<textarea row='10' cols="7" name="body"><?= $body; ?></textarea><span class="error"><?= $err_body?></span><br>
		<label>Status</label><br>
		<select name="status">
			<option>Select</option>
			<option value="0">Unpublished</option>
			<option value="1" selected>Published</option>
		</select> <span class="error"><?= $err_status ?></span><br>
		<input type="file" name="image"><br>
		<input type="submit" name="btn_post" value="Published"><br>
		<input type="reset" name="btn_reset" value="Reset"><br>
	</fieldset>
</form>
</div>
</body>
</html>