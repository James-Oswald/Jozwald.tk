<?php 
	//$data = $_REQUEST["d"];
	file_put_contents("data.txt", $_REQUEST["d"] . "|", FILE_APPEND);
	echo $_REQUEST["d"];
	//(file_put_contents("data.txt", $data . "|", FILE_APPEND | LOCK_EX)) ? echo $data : echo "error writing";
?>