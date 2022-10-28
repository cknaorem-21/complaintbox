<?php
require_once "database.php";

class Event {

    	public function addComplaint($uid, $cdate, $ctime, $subject, $dec) {
		$db = new database;
		$db->mk_conn();
		$sql = "INSERT into complaints(UID,cDate,cTime,subject,cDescription) values('$uid', '$cdate', '$citme', '$subject', '$dec')";
		$result = $db->query($sql);
		$db->close();
		if ($result) {
			return true;
		}

	}
}
?>