<?php 
$id = $_GET['id'];
$item = null;

if ($id && $id !== 'new') {
	$get_items = $conn->prepare('SELECT * FROM '.substr($currPage, strpos($currPage, '-') + 1).' WHERE id = :id');
	$get_items->execute(array('id' => $id));

	$item = $get_items->fetch(PDO::FETCH_OBJ);
}
?>