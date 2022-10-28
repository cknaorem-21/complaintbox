<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
$_SESSION['userID'] =1;
$_SESSION['userEmail'] = "temp@gmail.com";
if (!isset($_SESSION['id'])) {
	$_SESSION['id'] = 1;
}


if ($_SESSION['id'] == 1) {
	//updateCount();
	$_SESSION['id'] = 2;
} else {
	$script = '';
}
$pageFound=false;
require_once 'vendor/autoload.php';
//require_once 'utils/Form.php';
//require_once 'utils/Registeration.php';
//require_once 'utils/utilFunc.php';



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

	if (empty($uri[2])) {
	$pageFound=true;
		echo $twig->render('userPanel/dash.html', array('title' => 'Dashboard'));
	}else if ($uri[2] == 'newComplaint') {
		$pageFound=true;
		echo $twig->render('userPanel/addcomplaint.html', array('title' => 'New Complaint'));
	}else if ($uri[2] == 'viewComplaint') {
		$pageFound=true;
		echo $twig->render('userPanel/viewComplaint.html', array('title' => 'New Complaint'));
	}


}notFound:if (!$pageFound) {

	echo $twig->render('web/404.html', array('title' => '404!'));
}
?>
