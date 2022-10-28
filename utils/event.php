<?php
require_once "database.php";

class Event {

    	public function addComplaint($uid, $cdate, $ctime, $subject, $dec) {
		$db = new database;
		$db->mk_conn();
		$sql = "INSERT into complaints(UID,cDate,cTime,subject,cDescription) values('$uid', '$cdate', '$ctime', '$subject', '$dec')";
		$result = $db->query($sql);
		$db->close();
		if ($result) {
			return true;
		}

	}
	public function getComplaints() {

		$db = new database;
		$db->mk_conn();
		$sql = "SELECT * from complaints";
		$result = $db->query($sql);
		$db->close();
		$complaints = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($complaints, $row);
			$row = $result->fetch_assoc();
		}
		return $complaints;
	}
	public function getComplaintsByID($id) {

		$db = new database;
		$db->mk_conn();
		$sql = "SELECT * from complaints where CID='$id'";
		$result = $db->query($sql);
		$db->close();
		$complaints = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($complaints, $row);
			$row = $result->fetch_assoc();
		}
		return $complaints;
	}
	public function getDescription($id) {

		$db = new database;
		$db->mk_conn();
		$sql = "SELECT cDescription from complaints where CID = '$id'";
		$result = $db->query($sql);
		$db->close();
		$row = $result->fetch_assoc();
		return $row['cDescription'];
	}

	public function Deletecomplaint($id) {

		$db = new database;
		$db->mk_conn();
		$sql = "DELETE from complaints where CID = '$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result) {
			return true;
		}

	}
}
?>