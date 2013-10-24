<?php
mysql_connect('localhost', 'root', '123456');
mysql_select_db('gammu');
exit;
$query = mysql_query('SELECT * FROM `contact` WHERE `hadir` != "Hadir" AND `id` <= 30');
while($row = mysql_fetch_array($query)){
	$pesan = 'PHP Indonesia, Hi '.$row['nama'].' Mohon konfirmasi kehadirannya ke sini, bila sampai tgl 25 Okt 2013 jam 9 tdk konfirmasi mk akn di gantikan oleh yg lain';
	// echo strlen($pesan).'<br>';
	mysql_query("INSERT INTO `gammu`.`outbox` (`DestinationNumber`, `TextDecoded`, `DeliveryReport`) 
		VALUES ('".$row['hp']."', '".$pesan."', 'yes');");
}