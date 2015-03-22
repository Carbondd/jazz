
<?
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
        $trip = val.tripDate;
        $trip = 2;

//get all of the contacts to show in report
	$query = "select * from tripContact, contact where contact.contactID = tripContact.contactID and tripID=$trip";
	//echo $query;
	//try to run the query
	try{$result2=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//array to hold contact info
	$contacts = [];	
	$i = 0;
	
	//save vars via while loop
	while($row = $result2->fetch_assoc()):
		$contacts[$i][name] = $row['contactName'];
		$contacts[$i][phone] = $row['contactPhone'];
		$i++;
	endwhile; ?>	
	
		<table>
		<? 
		foreach($contacts as $contact): ?>
			<tr><td><? echo $contact[name]; ?></td><td><? echo $contact[phone];  ?></td></tr>
		<? endforeach; ?>
		</table>

