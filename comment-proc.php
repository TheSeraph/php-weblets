
<?php

$servername = "localhost";
$username = "sitemaster";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=comments", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br>"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

//$db_connection = mysqli_connect("127.0.0.1", "sitemaster", "password");
// mysqli_select_db($db_connection, "comments");

$comment_name = $_POST["comment_name"];
$comment_msg = $_POST["comment_msg"];

$name_length = strlen($comment_name);
$comment_length = strlen($comment_msg);


if($comment_length > 140)
{
	header("location: index.php?comment_error=twitter");
}
elseif($name_length==0 or $comment_length==0)
{
	header("location: index.php?comment_error=empty");
}
else
{
	try {
		$conn = new PDO("mysql:host=$servername;dbname=comments", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO comments (comment_name, comment_msg)
		VALUES ('$comment_name', '$comment_msg')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully <br> ";
    }
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	// mysqli_query($db_connection,"INSERT INTO comments VALUES( '','$comment_name','$comment_msg' )");
	header("location: index.php?comment_error=none");
	// echo "Hello $comment_name <br>";
	// echo "Your comment shwasz: $comment_msg <br> ";
	
}
?>