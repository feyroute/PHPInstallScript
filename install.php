<?php
//this is require to connect to a database
include 'dbconnect.php';

$table_persons = "persons";
$person_id = "pid";
$first_name = "firstName";
$last_name = "lastName";

$table_courses = "courses";
$course_id = "cid";
$department = "department";

//creating table person with one column as primary key


$sql = "create table $table_persons(
		$person_id int,
		$first_name varchar(30),
		$last_name varchar(30),
		primary key($person_id)
		)";

$sql2 = "create table $table_courses($course_id int,
		$department varchar(30),
		$person_id int,
		primary key($course_id),
		foreign key($person_id) references $table_persons($person_id)
			)";

?>

<!DOCTYPE html>
<html>
<head>
	<title>installtest</title>
	<link rel="stylesheet" type="text/css" href="install-style.css">
</head>
<body>
	<div id="alert-area">
		<?php

		//creating table

		if(mysqli_query($link,$sql)){
			echo 'create table '.$table_persons;
			echo "<br/>";
		}else{
			echo '<p class="error-line">';
			echo 'failed to create table '.$table_persons;
			echo "<br/>";
			echo '</p>';
		}

		if(mysqli_query($link,$sql2)){
			echo 'create table '.$table_courses;
			echo "<br/>";
		}else{
			echo '<p class="error-line">';
			echo 'failed to create table '.$table_courses;
			echo "<br/>";
			echo '</p>';
		}


		//close the connection to database everytime you open it " require'dbconnect.php' ".
			mysqli_close($link);
		?>

		<hr/>

		<p>
		<span class="error-line">WARNING</span>
			<ul>
			<li>if you dont see any error like this <span class="error-line"><?php echo 'failed to create table '.$table_persons;?></span>, thats mean your installtion works perfectly.</li>
			<li>for a security reason delete file "install.php" after the process installation complete</li>
			</ul>
		</p>
	</div>
</body>
</html>
