<!DOCTYPE HTML>  
<html>
<head>
</head>

<body>  

<form method="POST">  
  <h1>Who is your favorite author?</h1><br>
   <input type="radio" id="option1" name="poll" value="Miguel de Cervantes">&nbsp; Miguel de Cervantes
  <br><br>
   <input type="radio" id="option2" name="poll" value="Charles Dickens">&nbsp; Charles Dickens
  <br><br>
   <input type="radio" id="option3" name="poll" value="J.R.R. Tolkien">&nbsp; J.R.R. Tolkien
  <br><br>
   <input type="radio" id="option4" name="poll" value="Antoine de Saint-Exuper">&nbsp; Antoine de Saint-Exuper
  <br><br>
  <input type="submit" name="submit" value="Submit Poll"></form>&nbsp;&nbsp; <form target="_blank"><input type="submit" formaction="PollDisplay.php" value="Show Poll"></form> 
  

  
<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  

if(isset($_POST['submit']))
{	

if(isset($_POST['poll']))
{

$op1 = $_POST['poll'];
if($op1=="Miguel de Cervantes" or $op1=="Charles Dickens" or $op1=="J.R.R. Tolkien" 
    or $op1=="Antoine de Saint-Exuper")
	{ 	
     $sql = "INSERT INTO `poll`(`pollValue`) VALUES ('$op1')";
	 if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Poll Submmited")</script>';
	 } 
	 else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	}
}
else{
echo "Poll not selected";
}
}

?>
</body>
</html>