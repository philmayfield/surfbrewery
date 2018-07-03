<?php

session_start();
$errmsg_arr = array();
$errflag = false;

require_once('../db_connect.php');

// new data

$user = $_POST['uname'];
$password = $_POST['pword'];

if ($user == '') {
    $errmsg_arr[] = 'You must enter your Username';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'You must enter your Password';
    $errflag = true;
}

// query
$result = $conn->prepare("SELECT * FROM users WHERE login= :fdfdfd AND password= :asasas");
$result->bindParam(':fdfdfd', $user);
$result->bindParam(':asasas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);

if ($rows > 0) {
    $_SESSION['logged_in'] = '1';
    $_SESSION['user'] = $user;
    header("location: main.php");
} else {
    $errmsg_arr[] = 'Username or Password is incorrect, please try again.';
    $errflag = true;
}

if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}

?>