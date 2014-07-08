<!DOCTYPE html>
<html>
<head>
	<title>Test php &amp; sql</title>
</head>
<body>
<div class="container">
	<h1>This is a php test.</h1>
</div>
</body>

<div class="container">
<?php

echo "php file called!";
print "<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	$comment = test_input($_POST['comment1']);
	echo "comment content is:".$comment."<br>";
	#echo "<br>";
	$connection = mysql_connect('localhost','tt','tingtao','tt');
	if(!$connection){
		die('Not connected:'.mysql_error());
	}

	if(!mysql_select_db("tt",$connection))
	{
		echo mysql_errno($connection).":".mysql_error($connection)."\n";
	}
	echo "Connection to db 'tt' established!<br>";

	$result = mysql_query("SHOW TABLES FROM tt");
	if (!$result) {
		# code...
		echo "no tables found!<br>";
	}
	while ($row = mysql_fetch_row($result)) {
		# code...
		if (!$row) {
			# code...
			die("no tables found!");
		}
		echo "this is a table from tt:".$row[0];
		echo "<br>";
		if (mysql_query("DROP TABLE ".$row[0])) {
		 	# code...
		 	echo "table ".$row[0]." deleted!<br>";
		 }

	}
	
	if(!mysql_query("CREATE TABLE t(
		FirstName CHAR(20), LastName CHAR(20), Age INT)")){
		echo "failed to create table t!<br>";
	}
	else{
		echo "table t cretated!<br>";
	}

	$sql = "INSERT into t (FirstName,LastName) VALUES ('Tingtao','Zhou')";
	echo "starting inserting into table<br>";
	if (!mysql_query($sql)) {
		die("Failed to insert into table t:".mysql_error());
		# code...
	}
	$result = mysql_query("SELECT * from t");
	$output = mysql_fetch_row($result);

	echo "This is to echo the \$output after insert into:".$output[0]."<br>";


/*	$result = mysql_query("INSERT INTO Comments
		VALUES (1)");
	if(!$result){
		die("Failed to add to table Comments!");
	}
	$output = mysql_fetch_row($result);
	echo "This is to echo the \$output after insert into:".$output."<br>";
	
	mysql_close($connection);
	*/
#	$file = fopen("comments.txt", "w") or exit("unable to open file!");
#	fwrite($file, $comment);
#	fclose($file);
}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

#echo 'b';
?>
</div>
</html>