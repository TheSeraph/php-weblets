<form action="/comment-proc.php" method="post">
    <div>
        <label for="comment_name">Name:</label>
        <input type="text" id="comment_name" name="comment_name" placeholder="Rick Sanchez">
    </div>
    <div>
        <label for="comment_msg">Message:</label>
        <textarea id="comment_msg" name="comment_msg" placeholder="Look at me! I'm a pickle!"></textarea>
    </div>
	<div class="button">
		<button type="submit">Send your message</button>
	</div>
</form>
<?php
if (isset($_GET['comment_error'])) {
    // echo $_GET['comment_error'];
	
	$comment_error = $_GET['comment_error'];
	
	switch ($comment_error) {
    case "twitter":
		echo "PLS. STAHP. 140 Characters or less. Seriously, some people think they can just ramble on and on and on, like anyone cares about what they're saing. Like it's remotely interesting. Well let me tell YOU JIM. I think you're super boring. Your stories are rubbish. Your ridiculous tales of international heroism... BORING. Especially the one about the time you went ice skating on the Rideau canal. Do you know how normal skating is in Canada? We don't even use skates half the time! It's called broomball, you bafoon. Man, I could really use a poutine right about now. Sweety, can we go to that poutine place? I think it's in shoreditch...";
		break;
    case "empty":
        echo "You have to put in a name AND a comment, genius.";
        break;
    case "none":
        echo "Your murmurings shall be recorded in the annals of time.";
        break;
	default:
		echo "Go ahead, spin";
		break;
	}
}



?>
<?php

$db_connection = mysqli_connect("127.0.0.1", "sitemaster", "password");
mysqli_select_db($db_connection, "comments");

$find_comments = mysqli_query($db_connection, "SELECT * FROM comments");
while($row = mysqli_fetch_assoc($find_comments))
{
	$list_name = $row['comment_name'];
	$list_msg = $row['comment_msg'];
	
	echo '<div style="float:left; width:200px; height:100px; margin:1em;">';
	echo "<b>$list_name</b> <i>said:</i><br><br>";
	echo "$list_msg <br> </div>";
} 
?>

