<? php
$mysqli = new mysqli("localhost","ezvetnot","ezVetN0tes!","ezvetnot_no_jazzfest");

	 //check connection 
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
?>