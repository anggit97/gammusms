<?php
mysql_connect('localhost', 'root', '123456');
mysql_select_db('gammu');

$query = mysql_query('SELECT * FROM `contact` LIMIT 20,10');
while($row = mysql_fetch_array($query)){
	$pesan = 'PHP Indonesia, Hi '.$row['nama'].' kesalahan penulisan tgl pd Meet 8 tgl sabtu, 26 nov 2013 dan yg bnr adl sabtu, 26 okt 2013, Mohon konfirmasi kehadiran';
	// echo strlen($pesan).'<br>';
	mysql_query("INSERT INTO `gammu`.`outbox` (`DestinationNumber`, `TextDecoded`, `DeliveryReport`) 
		VALUES ('".$row['hp']."', '".$pesan."', 'yes');");
}