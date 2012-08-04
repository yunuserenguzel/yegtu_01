<?php

$c = isset($_GET['c'])?$_GET['c']:NULL;
$s = isset($_GET['s'])?$_GET['s']:NULL;

include_once('view/atomic/item.php'); 
for($i=0;$i<20;$i++){
	$item = new stdclass;
	$item->title = "Lorem Ipsum is simply dummy text of the printing";
	$item->item_id = $i;
	$item->icon = "images/book_gray.png";
	$item->owner = "tucan";
	$item->category = $i%3;
	$item->price = $i*10;
	item_atomic_view($item);
}