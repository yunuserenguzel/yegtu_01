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
//$item->description = "Mezun olmak uzereyim iki dersten kaldim";
$item->image = "images/book.png";
$item->available = 1;
$item->created_at = "2012-05-12";
$item->view_count = 35;
$item->subcategory_id = 3;
$item->user_id = 13;
$item->user_name = "tucan";
$item->user_phone = "05063328969";
$item->user_email = "exculuber@gmail.com";
$item->price = "30 TL";
/*TEST]]>*/
?>

<script>
    function showItemContactInfo(button){
        isItemContactInfoDisplayed = true;
        var currentHeight = $('.item .user').height()+10;
        $('.item .user')
            .css({display:"block",height:"0px"})//
            .animate({height:currentHeight},500,"swing");
        button.disabled = true;
    }
    function showWriteMessage(){
        
    }
</script>
   
<div class="item">
    <div class="title"><div class="triangle"></div><?php echo $item->title; ?></div>
    <div class="price"><?php echo $item->price; ?></div>
    <div class="created_at"><?php echo $item->created_at; ?></div>
    <div class="description"><?php echo $item->description; ?></div>
    <div class="actions">
        <input class="show_contact_info" type="button" value="İletişim Bilgilerini Göster" onclick="showItemContactInfo(this)" />
        <input class="send_message" type="button" value="Mesaj Gönder" />
        <input class="share" type="button" value="Paylaş" />
    </div>
    <div class="user">
        <div class="username"><?php echo $item->user_name; ?></div>
        <div class="phone">tel: <?php echo $item->user_phone; ?></div>
        <div class="email">mail: <?php echo $item->user_email; ?></div>
    </div>
    <div class="write_message">
        <textarea></textarea>
        <input type="button" />
    </div>
    <div class="share_networks">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
    </div>
</div>

