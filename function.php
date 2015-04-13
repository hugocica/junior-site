<?php
$action = $_POST['action'];

if ($action == 'validateEmail') {
	validateEmail();
}

function validateEmail() {
	$email = $_POST['email'];

	sleep(1);

	if (empty($email)) {
		$result['type'] = 'blank';
		$result = json_encode($result);
		echo $result;
		die();
	}

	if (!preg_match('/^[^.0-9]*[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
		$result['type'] = 'invalid';
		$result = json_encode($result);
		echo $result;
		die();
	}

	$result['type'] = 'success';
	$result = json_encode($result);
	echo $result;
	die();
}
?>