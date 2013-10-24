<?php
mysql_connect('localhost', 'root', '123456');
mysql_select_db('gammu');

if (isset($_POST['submit'])) {
	mysql_query("INSERT INTO `gammu`.`outbox` (`DestinationNumber`, `TextDecoded`, `DeliveryReport`) 
		VALUES ('".$_POST['no']."', '".$_POST['message']."', 'yes');");
	header("Location: index.php");
}
?>
<form method="post">
	<input type="text" name="no"><br>
	<textarea name="message" id="message" cols="30" rows="10"></textarea><br>
	<input type="submit" value="Submit" name="submit">
</form>
<?
$query = mysql_query('SELECT * FROM `inbox` ORDER BY `id` DESC LIMIT 0, 10');
while ($row = mysql_fetch_assoc($query)) {
	echo $row['SenderNumber'].' '.$row['ReceivingDateTime'].'<br/>';
	echo $row['TextDecoded'].'<hr>';
}
