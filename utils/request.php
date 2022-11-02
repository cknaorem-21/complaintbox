<?php
require_once "event.php";
require_once "mailFunctions.php";
date_default_timezone_set('Asia/Kolkata');
session_start();
if (isset($_POST['addComplaint'])) {
	$subject =$_POST['subject'];
	$cdate =date("M,d,Y");
	$ctime =date("h:i:s A");
	$uid= $_SESSION['userID'];
	$category=$_POST['category'];
	if (!empty($_POST['cDescription'])) {
		$cDescription = "description/".rand().rand().rand().".html";
		$description = $_POST['cDescription'];
		$descFile = fopen("../" . $cDescription, "w");
		fwrite($descFile, $description);
		fclose($descFile);

	}
	$event = new Event;
	echo $ctime;
if($event->addComplaint($uid, $cdate, $ctime, $subject, $cDescription,$category)) {

		$event = null;
	 	header("Location: /userPanel");
	 	exit;

	}

}else if (isset($_POST['UpdateComplaint'])) {
	$subject =$_POST['subject'];
	$cdate =$_POST['cdate'];
	$ctime =$_POST['ctime'];
	$cid=$_POST['CID'];

	if (!empty($_POST['cDescription'])) {
		$cDescription = "description/" .rand().$ctime.$uid.".html";
		$description = $_POST['cDescription'];
		$descFile = fopen("../" . $cDescription, "w");
		fwrite($descFile, $description);
		fclose($descFile);

	}
	$event = new Event;
	 if ($event->updateComplaint($cid, $cdate, $ctime, $subject, $cDescription)) {
		$event = null;
	 	header("Location: /userPanel");
	 	exit;

	}

}else if (isset($_POST['assignWork'])){
	$Name="Admin";
	$CID=$_POST['CID'];
	$UID=$_POST['UID'];
	$comment=$_POST['comment'];
 	$dateTime= date("M,d,Y h:i:s A");
 	$event = new Event;
	 if ($event->addComment($UID, $CID, $dateTime, $comment,$Name)&&
	 	$event->assignWork($UID, $CID)) {
		$event = null;
	 	header("Location: /adminPanel/unseenComplaints");
	 	exit;

	}
}else if (isset($_POST['addUserComment'])){
	$UID= $_SESSION['userID'];
	$CID=$_POST['CID'];
	$Name=$_SESSION['userName'];
	$comment=$_POST['comment'];
 	$dateTime= date("M,d,Y h:i:s A");
 	$event = new Event;
	 if ($event->addComment($UID, $CID, $dateTime, $comment,$Name)) {
		$event = null;
	 	header("Location: /userPanel/complaintDetails/?id=$CID");
	 	exit;

	}
}else if (isset($_POST['addAdminComment'])){
	$UID= 0;
	$CID=$_POST['CID'];
	$Name="Admin";
	$comment=$_POST['comment'];
 	$dateTime= date("M,d,Y h:i:s A");
 	$event = new Event;
	 if ($event->addComment($UID, $CID, $dateTime, $comment,$Name)) {
		$event = null;
	 	header("Location: /adminPanel/complaintData/?id=$CID");
	 	exit;

	}
}else if(isset($_POST['query'])){
	$Name=$_POST['userName'];
	$userMail=$_POST['userMail'];
	$Msg=$_POST['message'];
	$subject="Query From Complaint Box";
	if(sendMail($Name,$userMail,$subject,$Msg)){
	echo '<script>alert("Thanks! ,we will contact you ASAP!")</script>';
		 header("refresh:0; url=/");
	}else{
		echo '<script>alert("There is some problem please try after some time!")</script>';
		 header("refresh:0; url=/");
	}

}

?>