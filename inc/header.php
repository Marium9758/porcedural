
<!DOCTYPE html>
<html>
<head>
	<title><?php if (isset($title)){echo $title;}?></title>
	<style type="text/css">
		
				.container{
					width: 960px;
					margin:0 auto;
					background: #ddd;
					padding: 10px;
					box-shadow: 0px 0px 1px 1px #dfdfdf;
					overflow: hidden;
				}
				input,textarea,select{
					width: 300px;
					padding: 10px;
					margin-bottom: 5px;
				}
				input[type='submit'],input[type='reset'],select{
					width: 322px;
				}
				.error{
					color: red;
				}
				.success{
					color:green;
				}
				input[type='file']{
					padding: 10px;
					border:1px solid #999;
				}
		.post{
			width: 30%;
			height: 300px;
			overflow: hidden;
			float: left;
			background: #f7f7f7;
			padding: 10px;
			margin:10px 5px;
			border: 1px solid #333;
		}
			
	</style>
</head>
<body>
	<div class="container">
		<a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="contact.php">Contact</a> 
<hr>