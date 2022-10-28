<?php
require_once "event.php";
session_start();
if (isset($_POST['addComplaint'])) {
	$subject =$_POST['subject'];
	$cdate =$_POST['cdate'];
	$ctime =$_POST['ctime'];
	$uid= $_SESSION['userID'];
	if (!empty($_POST['cDescription'])) {
		$cDescription = "description/" .rand().$ctime.$uid.".html";
		$description = $_POST['cDescription'];
		$descFile = fopen("../" . $cDescription, "w");
		fwrite($descFile, $description);
		fclose($descFile);

	}
	$event = new Event;
	echo $ctime;
	 if ($event->addComplaint($uid, $cdate, $ctime, $subject, $cDescription)) {

		$event = null;
	 	header("Location: /userPanel");
	 	exit;

	}

} 

?>