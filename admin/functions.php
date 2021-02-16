<?php 

function connection()
	{
		$host='localhost';
		$user='admin';
		$pass='123';
		$db = 'db_one';
		$con = mysqli_connect($host,$user,$pass,$db);
		if (!$con) {
			echo '<h2>Database not connected!</h2>';
		}
		return $con;
	}

	function save_data($data){
		$link = connection();

		$title=$data['title'];
		$body = $data['body'];
		$status = $data['status'];
		

		$sql = "INSERT INTO blog(title,body,status,image) values('$title','$body','$status','')"; 
		if (mysqli_query($link,$sql)) {
			$id = mysqli_insert_id($link);
			$img_name = $_FILES["image"]['name'];
			$source_path = $_FILES["image"]['tmp_name'];
			$destination_path = 'images/'.$id."_".$img_name;
			move_uploaded_file($source_path,$destination_path);
			$sql = "UPDATE blog SET image = '$destination_path' WHERE id = '$id' ";
			mysqli_query($link,$sql);
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}

	function get_data($limit='',$offset=''){
		$link = connection();
		if ($limit==''&&$offset=='') {
			$sql  = "SELECT * FROM blog WHERE delete_status != 0 ORDER BY id DESC";
		}
		else{
			$sql  = "SELECT * FROM blog WHERE delete_status != 0 ORDER BY id DESC LIMIT $limit OFFSET $offset ";
		}
		
		if (mysqli_query($link,$sql)) {
			$result=mysqli_query($link,$sql);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}

	function view_data($id){
		$link = connection();
		$sql = "SELECT * FROM blog WHERE id = '$id'";
		if (mysqli_query($link,$sql)) {
			$result=mysqli_query($link,$sql);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}

	}

	function update_data($data){
		$link = connection();
		
		if (!empty($_FILES['image']['name'])) {
			$image = 'images/'.$data['id'].'_'.$_FILES['image']['name'];
			$source = $_FILES['image']['tmp_name'];
			$destination = $image;
			if (!empty($data['old_image'])) {
				unlink($data['old_image']);
			}
			move_uploaded_file($source, $destination);
		}
		else{
			
			$image=$data['old_image'];
		}
		
		$title = $data['title'];
		$body = $data['body'];
		$status = $data['status'];
		$id = $data['id'];
		$sql = "UPDATE blog SET title = '$title', body = '$body', status='$status', image='$image' WHERE id = '$id' ";
		if (mysqli_query($link,$sql)) {
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}

	function delete_data($id){
		$link = connection();
		// $sql = "DELETE FROM blog WHERE id = '$id'";
		$sql = "UPDATE blog SET delete_status = 0 WHERE id = '$id' ";
		if (mysqli_query($link,$sql)) {
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}
	function search_data($search_item){
		$link = connection();
		$sql  = "SELECT * FROM blog WHERE (title LIKE '%$search_item%') OR (body LIKE '%$search_item%') AND  delete_status != 0 ORDER BY id DESC";
		if (mysqli_query($link,$sql)) {
			$result=mysqli_query($link,$sql);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}
 ?>