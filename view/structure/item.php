<?php
include_once('model/item.php');
$i = isset($_GET['i']) ? $_GET['i'] : NULL;
// if i is not defined redirect to main page
if($i == NULL){
    header("Location: ./");
}
    $item = Item::getItem($i);
?>

<script>
    function showItemContactInfo(button){
        isItemContactInfoDisplayed = true;
        var currentHeight = $('.item .user').height()+10;
        button.disabled = true;
        $.ajax({
            url:"action/item.php",
            data:{
                action:"item_viewed",
                item_id:button.getAttribute("item_id")
            },
            method:"GET",
            success:function(){
                $('.item .user')
                    .css({display:"block",height:"0px"})//
                    .animate({height:currentHeight},500,"swing");
            },
            fail:function(){
                button.disabled = false;
            }
        })
    }
    function showWriteMessage(){
        
    }
</script>
   
<div class="item item_category<?php echo $item->category_id?>">
    <div class="title"><div class="triangle"></div><?php echo $item->title; ?></div>
    <div class="price"><?php echo $item->price; ?>&nbsp;TL</div>
    <div class="created_at"><?php echo $item->created_at; ?></div>
    <div class="description"><?php echo $item->description; ?></div>
    <div class="actions">
        <input class="show_contact_info" type="button" value="İletişim Bilgilerini Göster" onclick="showItemContactInfo(this)" item_id="<?php $item->item_id; ?>" />
<!--        <input class="share" type="button" value="Paylaş" />-->
    </div>
    <div class="user">
        <?php if(LoggedUser::IsUserLogged()){ ?>
            <div class="username"><?php echo $item->user->username; ?></div>
            <div class="phone">tel: <?php echo $item->user->phone; ?></div>
            <div class="email">mail: <?php echo $item->user->email; ?></div>
        <?php } else { ?>
            <strong>İletişim bilgilerini görmek için üye girişi yapmalısınız.</strong>
        <?php } ?>
    </div>
<!--    <div class="share_networks">-->
<!--        <a href="#">Facebook</a>-->
<!--        <a href="#">Twitter</a>-->
<!--    </div>-->
</div>

