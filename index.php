<form action="/comment-proc.php" method="post">
    <div>
        <label for="comment_name">Name:</label>
        <input type="text" id="comment_name" name="comment_name" value="Rick Sanchez">
    </div>
    <div>
        <label for="comment_msg">Message:</label>
        <textarea id="comment_msg" name="comment_msg">Look at me! I'm a pickle!</textarea>
    </div>
	<div class="button">
		<button type="submit">Send your message</button>
	</div>
</form>
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