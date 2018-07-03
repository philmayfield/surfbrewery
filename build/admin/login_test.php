<?php

if($_SESSION['logged_in'] != '1' && $_SESSION['user'] == ''){
	// failed - redirect to login
	header("location: index.php?m=li");
} else {
	// success

	$logged_in = true;
	$user = $_SESSION['user'];

	$userstmt = $conn->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');
	$userstmt->execute(array('login' => $user));
	$userdata = $userstmt->fetch(PDO::FETCH_OBJ);

	$hasAccount = $userstmt->rowCount();

    if($hasAccount != 1){
    	// No account, back to index
        header("location: index.php?m=li");
    }

	// Make an array from the userdata object
	$cats = array();

	foreach (get_object_vars($userdata) as $key => $value) {
		if (strpos($key, 'access') !== false && $value == 1) {
			$cats[] = substr($key, strpos($key, '_') + 1);
			$cats[] = 'edit-'.substr($key, strpos($key, '_') + 1);
		}
	}

	$currBase = substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
	$currPage = substr(basename($_SERVER['PHP_SELF']), 0, strpos(basename($_SERVER['PHP_SELF']), '.'));

	if ($currPage !== 'main' && !in_array($currPage, $cats)) {
		header("location: main.php?m=ac");
	}

}

?>