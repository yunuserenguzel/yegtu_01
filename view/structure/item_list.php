<?php

$c = isset($_GET['c'])?$_GET['c']:NULL;
$s = isset($_GET['s'])?$_GET['s']:NULL;

include_once('view/atomic/item.php');
$size = 20;
$page = 0;
//$item = [];
if($c == NULL && $s == NULL){
    $items = Item::getNewestItems($size,$page);
}
else if($s == NULL){
    $items = Item::getItemsByCategory($c,$size,$page);
}
else{
    $items = Item::getItemsBySubCategory($s,$size,$page);
}
//print_r($items);
foreach($items as $i){
    if(!isset($i->icon))
        $i->icon = "images/book_gray.png";
    item_atomic_view($i);
}
//for($i=0;$i<20;$i++){
//	$item = new stdclass;
//	$item->title = "Lorem Ipsum is simply dummy text of the printing";
//	$item->item_id = $i;
//	$item->icon = "images/book_gray.png";
//	$item->owner = "tucan";
//	$item->category = $i%3;
//	$item->price = $i*10;
//	item_atomic_view($item);
//}