<!DOCTYPE html>
<html>
<head>
	<title>Tingtao Zhou's webpage</title>
  	<?php include "header.php" ?>
</head>
<body>

<?php 
include 'navigation.php';
?>


<div class="jumbotron">
	<div class="container">
<!--		::before-->
		<h2>
			Welcome to Tingtao's Homepage.
		</h2>
<!--		::after-->
		<p>
			<a href="#" class="btn btn-info btn-lg">Hello!</a>
		</p>
	</div>
</div>

<div class="container">
	<form method="post" action='receiveComment.php' id="form1_comment">
		<div class="container">
			<div>
				<label for="text_comment1">Comments</label>
			</div>
			<div class="form-group"><textarea id="text_comment1" rows='6' cols="3" form='form1_comment' name="comment1" placeholder='comments' class="form-control"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info" value="submit">Submit</button>
			</div>
		</div>
		<div class="container"></div>		
	</form>
	
</div>

</body>
</html>