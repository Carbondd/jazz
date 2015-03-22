<?php
	error_reporting(-1);
	$mbox = imap_open("{box707.bluehost.com:143/imap}", "jazz@carbondd.com", "jazz123");
	//$mbox = imap_open("{box707.bluehost.com:143/imap}", "r.kazokas@carbondd.com", "Ironmaiden7");
	if($mbox)
	{ 
	/*
		echo "<h1>Mailboxes</h1>\n";
		$folders = imap_listmailbox($mbox, "{box707.bluehost.com:143/imap}", "*");
		
		if ($folders == false) {
			echo "Call failed<br />\n";
		} else {
			foreach ($folders as $val) {
				echo $val . "<br />\n";
			}
		}
		
		echo "<h1>Headers in INBOX</h1>\n";
		$headers = imap_headers($mbox);
		
		if ($headers == false) {
			echo "Call failed<br />\n";
		} else {
			foreach ($headers as $val) {
				echo $val . "<br />\n";
			}
		}
		*/
		$text = imap_body($mbox, $num);
		$elements = imap_mime_header_decode($text);
		for ($i=0; $i<count($elements); $i++) {
			echo "Charset: {$elements[$i]->charset}\n";
			echo "Text: {$elements[$i]->text}\n\n";
		}
		
		 //Check no.of.msgs 
		 $num = imap_num_msg($mbox); 
	
		 //if there is a message in your inbox 
		 if( $num >0 ) { 
			  //read that mail recently arrived 
			  echo imap_qprint(imap_body($mbox, $num)); 
		 } 
		 

	
		 //close the stream 
		 imap_close($mbox); 
		 
	}else
		print("Mailbox is Empty");	
?>