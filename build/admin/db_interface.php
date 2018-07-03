<?php

if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header("location: index.php?m=li");
    die();
}

require_once('../db_connect.php'); // Sets up $conn

$v = 0;
$id = null;
$rm = null;
$table = null;
$new = false;
$update = false;
$delete = false;

$id = $_POST['id'];
$table = $_POST['table'];
if (isset($_POST['rm'])) $rm = $_POST['rm'];

if($id && $table){
    $update = true;
} else {
    $new = true;
}

if ($id && $table && $rm) {
    $delete = true;
    $update = false;
    $new = false;
}

if($update == true){
    $testStmt = $conn->prepare('SELECT id FROM '.$table.' WHERE id = :id LIMIT 1');
    $testStmt->execute(array('id' => $id));
    $count = $testStmt->rowCount();

    if($count != 1){
        $update = false;
        $new = true;
    }
}

if($delete == true){
    $testStmt = $conn->prepare('SELECT id FROM '.$table.' WHERE id = :id LIMIT 1');
    $testStmt->execute(array('id' => $id));
    $count = $testStmt->rowCount();

    if($count != 1){
        $delete = false;
    }
}


if ($delete) {
    // deleting a record

    $SQL = 'DELETE FROM `'.$table.'` WHERE `id` = '.$id.' LIMIT 1';
} else {
    // adding or changing a record

    // Beginning of SQL query
    if($update){
        $SQL = 'UPDATE `'.$table.'` SET ';
    } 
    if ($new) {
        $SQL = 'INSERT INTO `'.$table.'` (';
        if($id && $table){
            // Inserting new row, but id is known
            $new_keys = '`id`';
            $new_vals = '"'.$id.'"';
            $v = 1;
        } else {
            $new_keys = '';
            $new_vals = '';
        }
    }

    // Middle of SQL query
    foreach($_POST AS $name => $value) {
        if($name != 'table' && $name != 'id'){
            if ($update) {
                if($v > 0){
                    $SQL .= ', ';
                }
                $SQL .= '`'.$name.'` = "'.htmlspecialchars($value, ENT_QUOTES).'"';
            } 
            if ($new) {
                if($v > 0){
                    $new_keys .= ', ';
                    $new_vals .= ', ';
                }
                $new_keys .= '`'.$name.'`';
                $new_vals .= '"'.htmlspecialchars($value, ENT_QUOTES).'"';
            }
            $v++;
        }
    }

    // End of SQL query
    if ($update) {
        $SQL .= ' WHERE `id` = "'.$id.'"';
    }
    if ($new) {
        $SQL .= $new_keys.') VALUES ('.$new_vals.')';
    }
}

try{
    $query = $conn->prepare($SQL);
    $query->execute();

    echo '<div class="alert alert-success" role="alert">';
    if ($update) {
        echo 'Successfully Updated!';
    } 
    if ($new) {
        echo 'Successfully Added!';
    }
    if ($delete) {
        echo 'Successfully Deleted!';
    }
    echo '</div>';
}catch(Exception $e){
    echo '<div class="alert alert-danger" role="alert">Error has occured while inserting data.</div>';
    echo '<br><br>ERROR: ' . $e->getMessage();
    echo '<br><br>Query: ' . $SQL;
}


$conn = null;

?>