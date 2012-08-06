<?php

$i = isset($_GET['i']) ? $_GET['i'] : NULL;
// if i is not defined redirect to main page
if($i == NULL)
    header("Location: ?");

/*<[[TEST*/
$item = new stdClass();
$item->item_id = 15;
$item->title = "CS 102 Özel ders";
$item->description = "Mezun olmak uzereyim iki dersten kaldim, su an tam zamanli calisiyorum. Haftaici 7'den sonra ya da haftasonlari ders vermekteyim. Gruplar icin indirim uygulanir.
CS201 ve CS202 icin ders sonlarinda ornek sinav sorulari da verilir.";
$item->image = "images/book.png";
$item->available = 1;
$item->created_at = "2012-05-12";
$item->view_count = 35;
$item->subcategory_id = 3;
$item->user_id = 13;
$item->user_name = "tucan";
$item->price = "30 TL";
/*TEST]]>*/

?>


<div class="item">
    <div class="title"><?php echo $item->title; ?></div>
    <div class="created_at"><?php echo $item->created_at; ?></div>
    <div class="description"><?php echo $item->description; ?></div>
    <div class="user"><?php echo $item->user_name; ?></div>
    <div class="actions">
        <input type="button" value="Mesaj Gönder" />
    </div>
</div>

