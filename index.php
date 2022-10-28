<?php
require_once 'utils/event.php';
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
$_SESSION['userID'] =1;
$_SESSION['userName'] = "Monish";
$_SESSION['userEmail'] = "monish@gmail.com";
$pageFound=false;
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('resources');
$twig = new Twig_Environment($loader);

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);

// if (isset($_POST['logout'])) {

// 	header('HTTP/1.1 401 Unauthorized');
// 	$errorMsg = 'You have been logged Out';
// 	unset($_POST);
// 	goto notFound;
// }

if (empty($uri[1])) {
		$pageFound=true;
		echo $twig->render('web/home.html', array('title' => 'Home Page'));

}else if ($uri[1]=='userPanel') {
	$userName= $_SESSION['userName'];
	$userEmail= $_SESSION['userEmail'];
	if (empty($uri[2])) {
	$pageFound=true;
		
		echo $twig->render('userPanel/dash.html', array('title' => 'Dashboard','uName'=>$userName,'uEmail'=>$userEmail));
	}else if ($uri[2] == 'newComplaint') {
		$pageFound=true;
		echo $twig->render('userPanel/addcomplaint.html', array('title' => 'New Complaint','uName'=>$userName,'uEmail'=>$userEmail));
	}else if ($uri[2] == 'viewComplaint') {
		$pageFound=true;
		$Events = new Event;
		$Complaints = $Events->getComplaints();
		echo $twig->render('userPanel/viewComplaint.html', array('title' => 'View Complaint','complaints'=>$Complaints,'uName'=>$userName,'uEmail'=>$userEmail));
	}
	else if ($uri[2] == 'complaintDetails') {
		$pageFound=true;
		$id=$_GET['id'];
		$Events = new Event;
		$Complaints = $Events->getComplaintsByID($id);
		echo $twig->render('userPanel/complaintDetails.html', array('title' => 'Complaint','complaints'=>$Complaints,'description' => file_get_contents($Events->getDescription($id)),'uName'=>$userName,'uEmail'=>$userEmail));
	}


}notFound:if (!$pageFound) {

	echo $twig->render('web/404.html', array('title' => '404!'));
}
?>
