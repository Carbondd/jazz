<? 
	if(mail($_GET['number']."@".$_GET['carrier'],'',$_GET['txt'], "FROM:admin@ez-vetnotes.com"))
		{
			//echo "Message Sent!";  ?>
			<script type="text/javascript">
				alert("Message Sent!");
				history.back();
			</script> <? 
		}
	else
		{
			//echo "Message Failed!"; ?>
			<script type="text/javascript">
				alert("Message Failed!");
				history.back();
			</script> <? 
		}
?>